<x-layouts.app title="Dashboard Guru — TemanLes">
    <x-teacher-subnav />
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="font-display text-2xl font-semibold text-ink mb-1">Dashboard Guru</h1>
            <p class="text-ink-muted text-sm">Pantau jadwal & pendapatan kamu</p>
        </div>
        <a href="{{ route('teacher.withdraw') }}" class="bg-board text-white px-4 py-2.5 rounded-lg text-sm font-medium hover:bg-board-light focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
            Tarik Saldo
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <div class="bg-white border border-line rounded-2xl p-5">
            <p class="text-sm text-ink-muted mb-1">Saldo tersedia</p>
            <p class="font-display text-2xl font-semibold text-board">Rp{{ number_format($wallet->balance ?? 0, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white border border-line rounded-2xl p-5">
            <p class="text-sm text-ink-muted mb-1">Total pendapatan</p>
            <p class="font-display text-2xl font-semibold text-ink">Rp{{ number_format($wallet->total_earned ?? 0, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white border border-line rounded-2xl p-5">
            <p class="text-sm text-ink-muted mb-1">Total ditarik</p>
            <p class="font-display text-2xl font-semibold text-ink">Rp{{ number_format($wallet->total_withdrawn ?? 0, 0, ',', '.') }}</p>
        </div>
    </div>

    @php
        $labels = [
            'pending_payment' => 'Menunggu bayar', 'waiting_verification' => 'Diverifikasi',
            'confirmed' => 'Terkonfirmasi', 'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan', 'rejected' => 'Ditolak',
        ];
    @endphp

    <h2 class="font-display font-semibold text-lg text-ink mb-4">Jadwal mengajar</h2>
    <div class="bg-white border border-line rounded-2xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-paper-alt text-ink-muted text-left">
                <tr>
                    <th class="px-4 py-3 font-medium">Kode</th>
                    <th class="px-4 py-3 font-medium">Murid</th>
                    <th class="px-4 py-3 font-medium">Jadwal</th>
                    <th class="px-4 py-3 font-medium">Mode</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-4 py-3 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-line">
                @forelse($orders ?? [] as $order)
                    <tr>
                        <td class="px-4 py-3 font-medium text-ink">{{ $order->order_code }}</td>
                        <td class="px-4 py-3 text-ink">{{ $order->student->name }}</td>
                        <td class="px-4 py-3 text-ink-muted">{{ $order->scheduled_date->format('d M Y') }}, {{ $order->scheduled_time }}</td>
                        <td class="px-4 py-3 text-ink-muted">{{ $order->teaching_mode === 'online' ? 'Online' : 'Tatap muka' }}</td>
                        <td class="px-4 py-3">
                            <span @class([
                                'px-2.5 py-1 rounded-full text-xs font-medium',
                                'bg-chalk/20 text-ink' => in_array($order->status, ['pending_payment', 'waiting_verification']),
                                'bg-board/10 text-board' => $order->status === 'confirmed',
                                'bg-success/10 text-success' => $order->status === 'completed',
                                'bg-mark/10 text-mark' => in_array($order->status, ['cancelled', 'rejected']),
                            ])>
                                {{ $labels[$order->status] ?? $order->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            @if($order->status === 'confirmed' && !$order->teacher_confirmed_at)
                                @if($order->scheduled_at->isPast())
                                    <form method="POST" action="{{ route('teacher.orders.confirm', $order) }}" onsubmit="return confirm('Konfirmasi bahwa kamu sudah mengajar les ini?')">
                                        @csrf
                                        <button type="submit" class="bg-board text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-board-light focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                                            Konfirmasi selesai
                                        </button>
                                    </form>
                                @else
                                    <span class="text-xs text-ink-muted">Bisa dikonfirmasi setelah jadwal</span>
                                @endif
                            @elseif($order->status === 'confirmed' && $order->teacher_confirmed_at)
                                <span class="text-xs text-ink-muted">Menunggu konfirmasi murid</span>
                            @elseif($order->status === 'completed')
                                <span class="text-xs text-success font-medium">Rp{{ number_format($order->tutor_earning_amount, 0, ',', '.') }} masuk saldo</span>
                            @else
                                <span class="text-xs text-ink-muted">—</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-ink-muted">Belum ada jadwal mengajar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(isset($orders))
        <div class="mt-4">{{ $orders->links() }}</div>
    @endif
</x-layouts.app>
