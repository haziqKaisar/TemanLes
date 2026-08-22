<x-layouts.app title="Dashboard Guru">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold mb-1">Dashboard Guru</h1>
            <p class="text-slate-500 text-sm">Pantau jadwal & pendapatan kamu</p>
        </div>
        <a href="{{ route('teacher.withdraw') }}" class="bg-indigo-600 text-white px-4 py-2.5 rounded-lg text-sm font-medium hover:bg-indigo-700">
            Tarik Saldo
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <div class="bg-white rounded-2xl border border-slate-100 p-5">
            <p class="text-sm text-slate-500 mb-1">Saldo Tersedia</p>
            <p class="text-2xl font-bold text-indigo-600">Rp {{ number_format($wallet->balance ?? 0, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-5">
            <p class="text-sm text-slate-500 mb-1">Total Pendapatan</p>
            <p class="text-2xl font-bold">Rp {{ number_format($wallet->total_earned ?? 0, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-5">
            <p class="text-sm text-slate-500 mb-1">Total Ditarik</p>
            <p class="text-2xl font-bold">Rp {{ number_format($wallet->total_withdrawn ?? 0, 0, ',', '.') }}</p>
        </div>
    </div>

    <h2 class="font-semibold text-lg mb-4">Jadwal Mengajar</h2>
    <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr>
                    <th class="px-4 py-3">Kode Pesanan</th>
                    <th class="px-4 py-3">Murid</th>
                    <th class="px-4 py-3">Jadwal</th>
                    <th class="px-4 py-3">Mode</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($orders ?? [] as $order)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $order->order_code }}</td>
                        <td class="px-4 py-3">{{ $order->student->name }}</td>
                        <td class="px-4 py-3">{{ $order->scheduled_date->format('d M Y') }}, {{ $order->scheduled_time }}</td>
                        <td class="px-4 py-3">{{ $order->teaching_mode === 'online' ? 'Online' : 'Tatap Muka' }}</td>
                        <td class="px-4 py-3">
                            <span @class([
                                'px-2 py-1 rounded-full text-xs font-medium',
                                'bg-amber-100 text-amber-700' => in_array($order->status, ['pending_payment', 'waiting_verification']),
                                'bg-blue-100 text-blue-700' => $order->status === 'confirmed',
                                'bg-emerald-100 text-emerald-700' => $order->status === 'completed',
                                'bg-red-100 text-red-700' => in_array($order->status, ['cancelled', 'rejected']),
                            ])>
                                {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            @if($order->status === 'confirmed')
                                <form method="POST" action="{{ route('teacher.orders.complete', $order) }}" onsubmit="return confirm('Konfirmasi bahwa les sudah selesai dilaksanakan? Dana akan langsung masuk ke saldo kamu.')">
                                    @csrf
                                    <button type="submit" class="bg-emerald-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-emerald-700">
                                        Tandai Selesai
                                    </button>
                                </form>
                            @elseif($order->status === 'completed')
                                <span class="text-emerald-600 text-xs">✓ Rp {{ number_format($order->tutor_earning_amount, 0, ',', '.') }} masuk saldo</span>
                            @else
                                <span class="text-slate-400 text-xs">-</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-slate-400">Belum ada jadwal mengajar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($orders))
        <div class="mt-4">{{ $orders->links() }}</div>
    @endif
</x-layouts.app>
