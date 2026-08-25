<x-layouts.app title="Detail Pembayaran">
    <a href="{{ route('admin.payments') }}" class="text-sm text-slate-500 hover:text-slate-700 mb-4 inline-block">&larr; Kembali ke daftar</a>

    <div class="bg-white rounded-2xl border border-slate-100 p-6 max-w-2xl">
        <h3 class="font-semibold text-lg mb-4">Detail Pembayaran - {{ $payment->order->order_code }}</h3>

        <dl class="grid grid-cols-2 gap-4 text-sm mb-4">
            <div><dt class="text-slate-500">Murid</dt><dd class="font-medium">{{ $payment->order->student->name }}</dd></div>
            <div><dt class="text-slate-500">Guru</dt><dd class="font-medium">{{ $payment->order->tutor->user->name }}</dd></div>
            <div><dt class="text-slate-500">Mapel</dt><dd class="font-medium">{{ $payment->order->tutorSubject->subject->name }} - {{ $payment->order->tutorSubject->level }}</dd></div>
            <div><dt class="text-slate-500">Jadwal</dt><dd class="font-medium">{{ $payment->order->scheduled_date->format('d M Y') }}, {{ $payment->order->scheduled_time }}</dd></div>
            <div><dt class="text-slate-500">Nominal</dt><dd class="font-medium">Rp {{ number_format($payment->amount, 0, ',', '.') }}</dd></div>
            <div><dt class="text-slate-500">Rek. Tujuan</dt><dd class="font-medium">{{ $payment->bankAccount->bank_name }} - {{ $payment->bankAccount->account_number }}</dd></div>
            <div><dt class="text-slate-500">Pengirim</dt><dd class="font-medium">{{ $payment->sender_name }}</dd></div>
            <div><dt class="text-slate-500">Tgl Transfer</dt><dd class="font-medium">{{ $payment->transfer_date?->format('d M Y') }}</dd></div>
        </dl>

        <div class="mb-4">
            <p class="text-sm text-slate-500 mb-2">Bukti Transfer</p>
            @if($payment->proofExists())
                <div class="flex h-96 items-center justify-center overflow-hidden rounded-lg border bg-slate-50">
                    <img src="{{ route('admin.payments.proof', $payment) }}" alt="Bukti transfer" class="max-h-full max-w-full object-contain">
                </div>
            @else
                <p class="text-sm text-red-500">File bukti transfer tidak ditemukan.</p>
            @endif
        </div>

        @if($payment->status === 'pending')
            <div class="space-y-4 border-t border-slate-100 pt-4">
                <form method="POST" action="{{ route('admin.payments.reject', $payment) }}">
                    @csrf
                    <textarea name="rejection_reason" rows="2" placeholder="Alasan penolakan (wajib diisi jika reject)"
                        class="w-full rounded-lg border-slate-300 text-sm mb-2"></textarea>
                    @error('rejection_reason') <p class="text-red-500 text-xs mb-2">{{ $message }}</p> @enderror

                    <div class="flex gap-3">
                        <button type="submit" onclick="return confirm('Yakin ingin menolak pembayaran ini?')"
                            class="flex-1 border border-red-300 text-red-600 rounded-lg py-2.5 font-medium hover:bg-red-50">
                            Reject
                        </button>
                </form>
                <form method="POST" action="{{ route('admin.payments.approve', $payment) }}" class="flex-1">
                    @csrf
                        <button type="submit" onclick="return confirm('Yakin ingin menyetujui pembayaran ini?')"
                            class="w-full bg-emerald-600 text-white rounded-lg py-2.5 font-medium hover:bg-emerald-700">
                            ACC / Setujui
                        </button>
                </form>
                    </div>
            </div>
        @else
            <div class="bg-slate-50 rounded-lg p-3 text-xs text-slate-500">
                Pembayaran ini sudah diverifikasi oleh {{ $payment->verifier?->name }} pada {{ $payment->verified_at?->format('d M Y H:i') }}.
                @if($payment->rejection_reason)
                    <br>Alasan: {{ $payment->rejection_reason }}
                @endif
            </div>
        @endif
    </div>
</x-layouts.app>
