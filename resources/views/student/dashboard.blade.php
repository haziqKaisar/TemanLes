<x-layouts.app title="Pesanan Saya — TemanLes">
    <div class="mb-8">
        <h1 class="font-display text-2xl font-semibold text-ink mb-1">Pesanan saya</h1>
        <p class="text-ink-muted text-sm">Pantau status les yang sudah kamu booking</p>
    </div>

    <div class="hidden sm:block bg-white border border-line rounded-2xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-paper-alt text-ink-muted text-left">
                <tr>
                    <th class="px-4 py-3 font-medium">Kode</th>
                    <th class="px-4 py-3 font-medium">Guru</th>
                    <th class="px-4 py-3 font-medium">Mapel</th>
                    <th class="px-4 py-3 font-medium">Jadwal</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-line">
                @forelse($orders as $order)
                    <tr>
                        <td class="px-4 py-3 font-medium text-ink">{{ $order->order_code }}</td>
                        <td class="px-4 py-3 text-ink">{{ $order->tutor->user->name }}</td>
                        <td class="px-4 py-3 text-ink-muted">{{ $order->tutorSubject->subject->name }} — {{ $order->tutorSubject->level }}</td>
                        <td class="px-4 py-3 text-ink-muted">{{ $order->scheduled_date->format('d M Y') }}, {{ $order->scheduled_time }}</td>
                        <td class="px-4 py-3">
                            @php
                                $labels = [
                                    'pending_payment' => 'Menunggu bayar', 'waiting_verification' => 'Diverifikasi',
                                    'confirmed' => 'Terkonfirmasi', 'completed' => 'Selesai',
                                    'cancelled' => 'Dibatalkan', 'rejected' => 'Ditolak',
                                ];
                            @endphp
                            <span @class([
                                'px-2.5 py-1 rounded-full text-xs font-medium',
                                'bg-chalk/15 text-ink' => in_array($order->status, ['pending_payment', 'waiting_verification']),
                                'bg-board/10 text-board' => $order->status === 'confirmed',
                                'bg-success/10 text-success' => $order->status === 'completed',
                                'bg-mark/10 text-mark' => in_array($order->status, ['cancelled', 'rejected']),
                            ])>
                                {{ $labels[$order->status] ?? $order->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-12 text-center text-ink-muted">Belum ada pesanan. <a href="{{ route('home') }}" class="text-board font-medium hover:underline">Cari guru sekarang</a></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="sm:hidden space-y-3">
        @forelse($orders as $order)
            <div class="bg-white border border-line rounded-xl p-4">
                <div class="flex justify-between items-start mb-2">
                    <p class="font-medium text-ink text-sm">{{ $order->order_code }}</p>
                    @php
                        $labels = [
                            'pending_payment' => 'Menunggu bayar', 'waiting_verification' => 'Diverifikasi',
                            'confirmed' => 'Terkonfirmasi', 'completed' => 'Selesai',
                            'cancelled' => 'Dibatalkan', 'rejected' => 'Ditolak',
                        ];
                    @endphp
                    <span @class([
                        'px-2.5 py-1 rounded-full text-xs font-medium shrink-0',
                        'bg-chalk/15 text-ink' => in_array($order->status, ['pending_payment', 'waiting_verification']),
                        'bg-board/10 text-board' => $order->status === 'confirmed',
                        'bg-success/10 text-success' => $order->status === 'completed',
                        'bg-mark/10 text-mark' => in_array($order->status, ['cancelled', 'rejected']),
                    ])>{{ $labels[$order->status] ?? $order->status }}</span>
                </div>
                <p class="text-sm text-ink">{{ $order->tutor->user->name }}</p>
                <p class="text-xs text-ink-muted">{{ $order->tutorSubject->subject->name }} — {{ $order->tutorSubject->level }}</p>
                <p class="text-xs text-ink-muted mt-1">{{ $order->scheduled_date->format('d M Y') }}, {{ $order->scheduled_time }}</p>
            </div>
        @empty
            <div class="text-center py-12 text-ink-muted text-sm">Belum ada pesanan. <a href="{{ route('home') }}" class="text-board font-medium">Cari guru sekarang</a></div>
        @endforelse
    </div>

    <div class="mt-6">{{ $orders->links() }}</div>
</x-layouts.app>
