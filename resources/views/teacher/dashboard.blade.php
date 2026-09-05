<x-layouts.app title="Dashboard Guru — TemanLes">
    <x-teacher-subnav />

    <div id="teacher-content-wrapper">
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="font-display text-2xl sm:text-3xl font-bold text-ink tracking-tight mb-1">Dashboard Guru</h1>
                <p class="text-ink-muted text-sm font-medium">Pantau jadwal mengajar & ringkasan pendapatan kamu</p>
            </div>
            <a href="{{ route('teacher.withdraw') }}" onclick="window.setTeacherNavIndex && window.setTeacherNavIndex(0, 4)" class="inline-flex items-center justify-center gap-2 bg-board text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-board-light shadow-xs transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                Tarik Saldo
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- Saldo Tersedia -->
            <div class="bg-white border border-line/80 rounded-2xl p-6 shadow-xs hover:shadow-md transition-all flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-ink-muted uppercase tracking-wider mb-1.5">Saldo Tersedia</p>
                    <p class="font-display text-2xl lg:text-3xl font-extrabold text-board">Rp{{ number_format($wallet->balance ?? 0, 0, ',', '.') }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-teal/20 text-board flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
            </div>

            <!-- Total Pendapatan -->
            <div class="bg-white border border-line/80 rounded-2xl p-6 shadow-xs hover:shadow-md transition-all flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-ink-muted uppercase tracking-wider mb-1.5">Total Pendapatan</p>
                    <p class="font-display text-2xl lg:text-3xl font-extrabold text-ink">Rp{{ number_format($wallet->total_earned ?? 0, 0, ',', '.') }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-teal/20 text-board flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
            </div>

            <!-- Total Ditarik -->
            <div class="bg-white border border-line/80 rounded-2xl p-6 shadow-xs hover:shadow-md transition-all flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-ink-muted uppercase tracking-wider mb-1.5">Total Ditarik</p>
                    <p class="font-display text-2xl lg:text-3xl font-extrabold text-ink">Rp{{ number_format($wallet->total_withdrawn ?? 0, 0, ',', '.') }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-teal/20 text-board flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                </div>
            </div>
        </div>

        @php
            $labels = [
                'pending_payment' => 'Menunggu bayar', 'waiting_verification' => 'Diverifikasi',
                'confirmed' => 'Terkonfirmasi', 'completed' => 'Selesai',
                'cancelled' => 'Dibatalkan', 'rejected' => 'Ditolak',
            ];
        @endphp

        <div class="flex items-center justify-between mb-4">
            <h2 class="font-display font-bold text-xl text-ink">Jadwal Mengajar</h2>
            <span class="text-xs font-semibold text-ink-muted">Desktop Table View</span>
        </div>

        <div class="bg-white border border-line rounded-2xl overflow-hidden shadow-xs">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-paper-alt/80 text-ink border-b border-line text-xs font-bold uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">Kode</th>
                            <th class="px-6 py-4">Murid</th>
                            <th class="px-6 py-4">Jadwal</th>
                            <th class="px-6 py-4">Mode</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-line/60">
                        @forelse($orders ?? [] as $order)
                            <tr class="hover:bg-paper/40 transition-colors">
                                <td class="px-6 py-4 font-bold text-board font-mono">{{ $order->order_code }}</td>
                                <td class="px-6 py-4 font-semibold text-ink">{{ $order->student->name }}</td>
                                <td class="px-6 py-4 text-ink-muted font-medium">{{ $order->scheduled_date->format('d M Y') }}, {{ $order->scheduled_time }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 text-ink-muted text-xs font-semibold">
                                        @if($order->teaching_mode === 'online')
                                            <span class="w-2 h-2 rounded-full bg-teal"></span> Online
                                        @else
                                            <span class="w-2 h-2 rounded-full bg-board"></span> Tatap muka
                                        @endif
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span @class([
                                        'px-3 py-1 rounded-full text-xs font-bold inline-block',
                                        'bg-paper-alt text-ink' => in_array($order->status, ['pending_payment', 'waiting_verification']),
                                        'bg-board/10 text-board' => $order->status === 'confirmed',
                                        'bg-teal/20 text-board' => $order->status === 'completed',
                                        'bg-slate-200 text-slate-700' => in_array($order->status, ['cancelled', 'rejected']),
                                    ])>
                                        {{ $labels[$order->status] ?? $order->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if($order->status === 'confirmed' && !$order->teacher_confirmed_at)
                                        @if($order->scheduled_at->isPast())
                                            <form method="POST" action="{{ route('teacher.orders.confirm', $order) }}" onsubmit="return confirm('Konfirmasi bahwa kamu sudah mengajar les ini?')">
                                                @csrf
                                                <button type="submit" class="bg-board text-white px-3.5 py-1.5 rounded-lg text-xs font-bold hover:bg-board-light shadow-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                                                    Konfirmasi selesai
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-xs text-ink-muted font-medium">Bisa dikonfirmasi setelah jadwal</span>
                                        @endif
                                    @elseif($order->status === 'confirmed' && $order->teacher_confirmed_at)
                                        <span class="text-xs text-ink-muted font-medium">Menunggu konfirmasi murid</span>
                                    @elseif($order->status === 'completed')
                                        <span class="text-xs text-board font-bold">Rp{{ number_format($order->tutor_earning_amount, 0, ',', '.') }} masuk saldo</span>
                                    @else
                                        <span class="text-xs text-ink-muted">—</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-ink-muted font-medium">
                                    <div class="max-w-xs mx-auto text-center space-y-2">
                                        <div class="w-12 h-12 rounded-full bg-paper-alt flex items-center justify-center mx-auto text-ink-muted">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                        <p class="text-ink font-semibold">Belum ada jadwal mengajar.</p>
                                        <p class="text-xs text-ink-muted">Jadwal yang dibooking oleh murid akan muncul secara otomatis di sini.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if(isset($orders))
            <div class="mt-6">{{ $orders->links() }}</div>
        @endif
    </div>
</x-layouts.app>

