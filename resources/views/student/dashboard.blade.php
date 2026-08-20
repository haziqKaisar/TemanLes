<x-layouts.app title="Dashboard Saya">
    <div class="mb-8">
        <h1 class="text-2xl font-bold mb-1">Dashboard Saya</h1>
        <p class="text-slate-500 text-sm">Pantau status pesanan les kamu di sini</p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr>
                    <th class="px-4 py-3">Kode Pesanan</th>
                    <th class="px-4 py-3">Guru</th>
                    <th class="px-4 py-3">Mapel</th>
                    <th class="px-4 py-3">Jadwal</th>
                    <th class="px-4 py-3">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($orders as $order)
                    <tr>
                        <td class="px-4 py-3 font-medium">{{ $order->order_code }}</td>
                        <td class="px-4 py-3">{{ $order->tutor->user->name }}</td>
                        <td class="px-4 py-3">{{ $order->tutorSubject->subject->name }} - {{ $order->tutorSubject->level }}</td>
                        <td class="px-4 py-3">{{ $order->scheduled_date->format('d M Y') }}, {{ $order->scheduled_time }}</td>
                        <td class="px-4 py-3">
                            <span @class([
                                'px-2 py-1 rounded-full text-xs font-medium',
                                'bg-amber-100 text-amber-700' => in_array($order->status, ['pending_payment', 'waiting_verification']),
                                'bg-emerald-100 text-emerald-700' => in_array($order->status, ['confirmed', 'completed']),
                                'bg-red-100 text-red-700' => in_array($order->status, ['cancelled', 'rejected']),
                            ])>
                                {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-8 text-center text-slate-400">Belum ada pesanan. <a href="{{ route('home') }}" class="text-indigo-600 hover:underline">Cari guru sekarang</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $orders->links() }}</div>
</x-layouts.app>
