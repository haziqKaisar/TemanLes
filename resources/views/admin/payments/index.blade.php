<x-layouts.app title="Verifikasi Pembayaran">
    <h1 class="text-xl font-bold mb-6">Verifikasi Pembayaran</h1>

    <form method="GET" action="{{ route('admin.payments') }}" class="flex flex-wrap gap-3 mb-6">
        <select name="status" onchange="this.form.submit()" class="rounded-lg border-slate-300 text-sm">
            <option value="pending" @selected($status == 'pending')>Menunggu Verifikasi</option>
            <option value="approved" @selected($status == 'approved')>Disetujui</option>
            <option value="rejected" @selected($status == 'rejected')>Ditolak</option>
        </select>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kode pesanan / nama murid..."
            class="flex-1 min-w-[240px] rounded-lg border-slate-300 text-sm">
        <button type="submit" class="bg-indigo-600 text-white px-4 rounded-lg text-sm">Cari</button>
    </form>

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
                @forelse($payments as $payment)
                    <tr>
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
                            <a href="{{ route('admin.payments.show', $payment) }}" class="text-indigo-600 hover:underline text-xs font-medium">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-slate-400">Tidak ada data.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $payments->links() }}</div>
</x-layouts.app>
