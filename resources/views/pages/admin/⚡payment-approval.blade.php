<?php

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
#[Title('Verifikasi Pembayaran')]
new class extends Component {
    use WithPagination;

    public string $filterStatus = 'pending';
    public string $search = '';
    public ?int $activePaymentId = null;
    public string $rejection_reason = '';

    public function updatingFilterStatus(): void { $this->resetPage(); }
    public function updatingSearch(): void { $this->resetPage(); }

    public function openDetail(int $paymentId): void
    {
        $this->activePaymentId = $paymentId;
        $this->rejection_reason = '';
    }

    public function closeDetail(): void
    {
        $this->activePaymentId = null;
    }

    #[Computed]
    public function activePayment(): ?Payment
    {
        if (! $this->activePaymentId) {
            return null;
        }

        return Payment::with(['order.student', 'order.tutor.user', 'order.tutorSubject.subject', 'bankAccount'])
            ->find($this->activePaymentId);
    }

    #[Computed]
    public function payments()
    {
        return Payment::with(['order.student', 'order.tutor.user'])
            ->when($this->filterStatus, fn ($q) => $q->where('status', $this->filterStatus))
            ->when($this->search, function ($q) {
                $q->whereHas('order', function ($q) {
                    $q->where('order_code', 'like', "%{$this->search}%")
                        ->orWhereHas('student', fn ($q) => $q->where('name', 'like', "%{$this->search}%"));
                });
            })
            ->latest()
            ->paginate(10);
    }

    public function approve(int $paymentId): void
    {
        DB::transaction(function () use ($paymentId) {
            $payment = Payment::where('status', 'pending')->findOrFail($paymentId);

            $payment->update([
                'status' => 'approved',
                'verified_by' => Auth::id(),
                'verified_at' => now(),
            ]);

            $payment->order->update(['status' => 'confirmed']);
        });

        $this->closeDetail();
        session()->flash('success', 'Pembayaran berhasil disetujui. Pesanan terkonfirmasi.');
    }

    public function reject(int $paymentId): void
    {
        $this->validate(['rejection_reason' => 'required|string|min:5|max:500']);

        DB::transaction(function () use ($paymentId) {
            $payment = Payment::where('status', 'pending')->findOrFail($paymentId);

            $payment->update([
                'status' => 'rejected',
                'rejection_reason' => $this->rejection_reason,
                'verified_by' => Auth::id(),
                'verified_at' => now(),
            ]);

            $payment->order->update(['status' => 'pending_payment']);
        });

        $this->closeDetail();
        session()->flash('success', 'Pembayaran ditolak. Murid akan diminta upload ulang bukti transfer.');
    }
};

?>

<div>
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-bold">Verifikasi Pembayaran</h1>
    </div>

    <div class="flex flex-wrap gap-3 mb-6">
        <select wire:model.live="filterStatus" class="rounded-lg border-slate-300 text-sm">
            <option value="pending">Menunggu Verifikasi</option>
            <option value="approved">Disetujui</option>
            <option value="rejected">Ditolak</option>
            <option value="">Semua</option>
        </select>
        <input type="text" wire:model.live.debounce.400ms="search" placeholder="Cari kode pesanan / nama murid..."
            class="flex-1 min-w-[240px] rounded-lg border-slate-300 text-sm">
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr>
                    <th class="px-4 py-3">Kode Pesanan</th>
                    <th class="px-4 py-3">Murid</th>
                    <th class="px-4 py-3">Guru</th>
                    <th class="px-4 py-3">Nominal</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($this->payments as $payment)
                    <tr wire:key="payment-{{ $payment->id }}">
                        <td class="px-4 py-3 font-medium">{{ $payment->order->order_code }}</td>
                        <td class="px-4 py-3">{{ $payment->order->student->name }}</td>
                        <td class="px-4 py-3">{{ $payment->order->tutor->user->name }}</td>
                        <td class="px-4 py-3">Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">
                            <span @class([
                                'px-2 py-1 rounded-full text-xs font-medium',
                                'bg-amber-100 text-amber-700' => $payment->status === 'pending',
                                'bg-emerald-100 text-emerald-700' => $payment->status === 'approved',
                                'bg-red-100 text-red-700' => $payment->status === 'rejected',
                            ])>
                                {{ ucfirst($payment->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <button wire:click="openDetail({{ $payment->id }})" class="text-indigo-600 hover:underline text-xs font-medium">
                                Lihat Detail
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-slate-400">Tidak ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $this->payments->links() }}</div>

    @if($this->activePayment)
        <div class="fixed inset-0 bg-black/40 flex items-center justify-center z-50 p-4" wire:click.self="closeDetail">
            <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto p-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="font-semibold text-lg">Detail Pembayaran - {{ $this->activePayment->order->order_code }}</h3>
                    <button wire:click="closeDetail" class="text-slate-400 hover:text-slate-600">✕</button>
                </div>

                <dl class="grid grid-cols-2 gap-4 text-sm mb-4">
                    <div><dt class="text-slate-500">Murid</dt><dd class="font-medium">{{ $this->activePayment->order->student->name }}</dd></div>
                    <div><dt class="text-slate-500">Guru</dt><dd class="font-medium">{{ $this->activePayment->order->tutor->user->name }}</dd></div>
                    <div><dt class="text-slate-500">Mapel</dt><dd class="font-medium">{{ $this->activePayment->order->tutorSubject->subject->name }} - {{ $this->activePayment->order->tutorSubject->level }}</dd></div>
                    <div><dt class="text-slate-500">Jadwal</dt><dd class="font-medium">{{ $this->activePayment->order->scheduled_date->format('d M Y') }}, {{ $this->activePayment->order->scheduled_time }}</dd></div>
                    <div><dt class="text-slate-500">Nominal</dt><dd class="font-medium">Rp {{ number_format($this->activePayment->amount, 0, ',', '.') }}</dd></div>
                    <div><dt class="text-slate-500">Rek. Tujuan</dt><dd class="font-medium">{{ $this->activePayment->bankAccount->bank_name }} - {{ $this->activePayment->bankAccount->account_number }}</dd></div>
                    <div><dt class="text-slate-500">Pengirim</dt><dd class="font-medium">{{ $this->activePayment->sender_name }}</dd></div>
                    <div><dt class="text-slate-500">Tgl Transfer</dt><dd class="font-medium">{{ $this->activePayment->transfer_date?->format('d M Y') }}</dd></div>
                </dl>

                <div class="mb-4">
                    <p class="text-sm text-slate-500 mb-2">Bukti Transfer</p>
                    @if(str_ends_with($this->activePayment->proof_file, '.pdf'))
                        <a href="{{ Storage::url($this->activePayment->proof_file) }}" target="_blank" class="text-indigo-600 underline text-sm">Buka file PDF</a>
                    @else
                        <img src="{{ Storage::url($this->activePayment->proof_file) }}" class="rounded-lg border max-h-80 object-contain">
                    @endif
                </div>

                @if($this->activePayment->status === 'pending')
                    <div class="space-y-3 border-t border-slate-100 pt-4">
                        <textarea wire:model="rejection_reason" rows="2" placeholder="Alasan penolakan (wajib diisi jika reject)"
                            class="w-full rounded-lg border-slate-300 text-sm"></textarea>
                        @error('rejection_reason') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror

                        <div class="flex gap-3">
                            <button wire:click="reject({{ $this->activePayment->id }})" wire:confirm="Yakin ingin menolak pembayaran ini?"
                                class="flex-1 border border-red-300 text-red-600 rounded-lg py-2.5 font-medium hover:bg-red-50">
                                Reject
                            </button>
                            <button wire:click="approve({{ $this->activePayment->id }})" wire:confirm="Yakin ingin menyetujui pembayaran ini?"
                                class="flex-1 bg-emerald-600 text-white rounded-lg py-2.5 font-medium hover:bg-emerald-700">
                                ACC / Setujui
                            </button>
                        </div>
                    </div>
                @else
                    <div class="bg-slate-50 rounded-lg p-3 text-xs text-slate-500">
                        Pembayaran ini sudah diverifikasi oleh {{ $this->activePayment->verifier?->name }} pada {{ $this->activePayment->verified_at?->format('d M Y H:i') }}.
                        @if($this->activePayment->rejection_reason)
                            <br>Alasan: {{ $this->activePayment->rejection_reason }}
                        @endif
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
