<x-layouts.app title="ACC Penarikan Saldo Guru">
    <h1 class="text-xl font-bold mb-6">ACC Penarikan Saldo Guru</h1>

    <form method="GET" action="{{ route('admin.payouts') }}" class="mb-6">
        <select name="status" onchange="this.form.submit()" class="rounded-lg border-slate-300 text-sm">
            <option value="pending" @selected($status == 'pending')>Menunggu</option>
            <option value="paid" @selected($status == 'paid')>Sudah Dibayar</option>
            <option value="rejected" @selected($status == 'rejected')>Ditolak</option>
        </select>
    </form>

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
                @forelse($payouts as $payout)
                    <tr>
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
                                    <form method="POST" action="{{ route('admin.payouts.reject', $payout) }}" onsubmit="return confirm('Tolak pengajuan ini?')">
                                        @csrf
                                        <button class="text-red-600 hover:underline text-xs font-medium">Reject</button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.payouts.approve', $payout) }}" onsubmit="return confirm('Sudah ditransfer manual ke guru?')">
                                        @csrf
                                        <button class="text-emerald-600 hover:underline text-xs font-medium">ACC</button>
                                    </form>
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

    <div class="mt-4">{{ $payouts->links() }}</div>
</x-layouts.app>
