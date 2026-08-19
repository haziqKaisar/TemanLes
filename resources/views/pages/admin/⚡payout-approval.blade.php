<?php

use App\Models\Payout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

return new
    #[Layout('layouts::app')]
    #[Title('Cari Guru Les Private')]
    class extends Component {
    use WithPagination;

    public string $filterStatus = 'pending';

    #[Computed]
    public function payouts()
    {
        return Payout::with(['tutor.user'])
            ->when($this->filterStatus, fn ($q) => $q->where('status', $this->filterStatus))
            ->latest()
            ->paginate(10);
    }

    public function approve(int $payoutId): void
    {
        DB::transaction(function () use ($payoutId) {
            $payout = Payout::where('status', 'pending')->findOrFail($payoutId);
            $wallet = $payout->wallet;

            abort_if($wallet->balance < $payout->amount, 422, 'Saldo guru tidak mencukupi.');

            $wallet->balance -= $payout->amount;
            $wallet->total_withdrawn += $payout->amount;
            $wallet->save();

            $payout->update([
                'status' => 'paid',
                'processed_by' => Auth::id(),
                'processed_at' => now(),
            ]);

            $wallet->transactions()->create([
                'order_id' => null,
                'type' => 'debit',
                'amount' => $payout->amount,
                'balance_after' => $wallet->balance,
                'description' => "Pencairan dana ke {$payout->bank_name} - {$payout->account_number}",
            ]);
        });

        session()->flash('success', 'Penarikan saldo disetujui & ditandai sudah dibayar.');
    }

    public function reject(int $payoutId): void
    {
        Payout::where('status', 'pending')->findOrFail($payoutId)->update([
            'status' => 'rejected',
            'admin_note' => 'Ditolak oleh admin',
            'processed_by' => Auth::id(),
            'processed_at' => now(),
        ]);

        session()->flash('success', 'Pengajuan penarikan ditolak.');
    }
};

?>

<div>
    <h1 class="text-xl font-bold mb-6">ACC Penarikan Saldo Guru</h1>

    <select wire:model.live="filterStatus" class="rounded-lg border-slate-300 text-sm mb-6">
        <option value="pending">Menunggu</option>
        <option value="paid">Sudah Dibayar</option>
        <option value="rejected">Ditolak</option>
        <option value="">Semua</option>
    </select>

    <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr>
                    <th class="px-4 py-3">Guru</th>
                    <th class="px-4 py-3">Jumlah</th>
                    <th class="px-4 py-3">Rekening Tujuan</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($this->payouts as $payout)
                    <tr wire:key="payout-{{ $payout->id }}">
                        <td class="px-4 py-3 font-medium">{{ $payout->tutor->user->name }}</td>
                        <td class="px-4 py-3">Rp {{ number_format($payout->amount, 0, ',', '.') }}</td>
                        <td class="px-4 py-3">{{ $payout->bank_name }} - {{ $payout->account_number }} (a.n {{ $payout->account_holder }})</td>
                        <td class="px-4 py-3">
                            <span @class([
                                'px-2 py-1 rounded-full text-xs font-medium',
                                'bg-amber-100 text-amber-700' => $payout->status === 'pending',
                                'bg-emerald-100 text-emerald-700' => $payout->status === 'paid',
                                'bg-red-100 text-red-700' => $payout->status === 'rejected',
                            ])>
                                {{ ucfirst($payout->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            @if($payout->status === 'pending')
                                <div class="flex gap-2">
                                    <button wire:click="reject({{ $payout->id }})" wire:confirm="Tolak pengajuan ini?" class="text-red-600 hover:underline text-xs font-medium">Reject</button>
                                    <button wire:click="approve({{ $payout->id }})" wire:confirm="Sudah ditransfer manual ke guru?" class="text-emerald-600 hover:underline text-xs font-medium">ACC</button>
                                </div>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-8 text-center text-slate-400">Tidak ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $this->payouts->links() }}</div>
</div>
