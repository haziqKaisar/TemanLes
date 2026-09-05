<x-layouts.app title="Dashboard Guru — TemanLes">
    <x-teacher-subnav />

    <!-- Header Section -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <span class="inline-block text-xs font-semibold text-[#3B7597] bg-[#6FD1D7]/20 px-3 py-1 rounded-md mb-2">
                Panel Pengajar
            </span>
            <h1 class="font-display text-2xl sm:text-3xl font-bold text-[#093C5D]">Dashboard Guru</h1>
            <p class="text-[#3B7597] text-sm mt-0.5">Pantau jadwal mengajar &amp; kelola pendapatan kamu</p>
        </div>
        <a href="{{ route('teacher.withdraw') }}" 
           class="inline-flex items-center justify-center bg-[#093C5D] text-[#5DF8D8] px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-[#3B7597] hover:text-white transition-all shadow-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#093C5D]">
            Tarik Saldo →
        </a>
    </div>

    <!-- Cards Stats: Aksen Lebih Berwarna Namun Rapi -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <!-- Saldo Tersedia (Sorotan Utama) -->
        <div class="bg-gradient-to-br from-[#093C5D] to-[#3B7597] rounded-2xl p-5 text-white shadow-sm relative overflow-hidden">
            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-[#5DF8D8]/10 rounded-full blur-xl pointer-events-none"></div>
            <p class="text-xs font-medium text-[#6FD1D7] mb-1">Saldo Tersedia</p>
            <p class="font-display text-2xl sm:text-3xl font-bold text-[#5DF8D8]">
                Rp{{ number_format($wallet->balance ?? 0, 0, ',', '.') }}
            </p>
        </div>

        <!-- Total Pendapatan -->
        <div class="bg-white border border-[#6FD1D7]/40 rounded-2xl p-5 shadow-sm">
            <p class="text-xs font-semibold text-[#3B7597] mb-1">Total Pendapatan</p>
            <p class="font-display text-2xl font-bold text-[#093C5D]">
                Rp{{ number_format($wallet->total_earned ?? 0, 0, ',', '.') }}
            </p>
        </div>

        <!-- Total Ditarik -->
        <div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm">
            <p class="text-xs font-semibold text-gray-500 mb-1">Total Ditarik</p>
            <p class="font-display text-2xl font-bold text-[#093C5D]">
                Rp{{ number_format($wallet->total_withdrawn ?? 0, 0, ',', '.') }}
            </p>
        </div>
    </div>

    @php
        $labels = [
            'pending_payment' => 'Menunggu bayar', 
            'waiting_verification' => 'Diverifikasi',
            'confirmed' => 'Terkonfirmasi', 
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan', 
            'rejected' => 'Ditolak',
        ];
    @endphp

    <h2 class="font-display font-bold text-lg text-[#093C5D] mb-4">Jadwal Mengajar</h2>

    <!-- Table Section: Clean & Readable -->
    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-[#093C5D] text-[#5DF8D8]">
                    <tr>
                        <th class="px-5 py-3.5 font-bold">Kode</th>
                        <th class="px-5 py-3.5 font-bold">Murid</th>
                        <th class="px-5 py-3.5 font-bold">Jadwal</th>
                        <th class="px-5 py-3.5 font-bold">Mode</th>
                        <th class="px-5 py-3.5 font-bold">Status</th>
                        <th class="px-5 py-3.5 font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($orders ?? [] as $order)
                        <tr class="hover:bg-[#6FD1D7]/10 transition-colors">
                            <td class="px-5 py-4 font-bold text-[#093C5D]">{{ $order->order_code }}</td>
                            <td class="px-5 py-4 font-semibold text-[#093C5D]">{{ $order->student->name }}</td>
                            <td class="px-5 py-4 text-[#3B7597] font-medium">
                                {{ $order->scheduled_date->format('d M Y') }}, {{ $order->scheduled_time }}
                            </td>
                            <td class="px-5 py-4">
                                <span class="inline-block bg-gray-100 text-[#093C5D] px-2.5 py-1 rounded-md text-xs font-medium">
                                    {{ $order->teaching_mode === 'online' ? 'Online' : 'Tatap muka' }}
                                </span>
                            </td>
                            <td class="px-5 py-4">
                                @php
                                    $statusClasses = match($order->status) {
                                        'pending_payment', 'waiting_verification' => 'bg-[#3B7597]/15 text-[#3B7597]',
                                        'confirmed' => 'bg-[#6FD1D7]/30 text-[#093C5D]',
                                        'completed' => 'bg-[#5DF8D8]/30 text-[#093C5D]',
                                        'cancelled', 'rejected' => 'bg-rose-100 text-rose-700',
                                        default => 'bg-gray-100 text-gray-700'
                                    };
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-bold inline-block {{ $statusClasses }}">
                                    {{ $labels[$order->status] ?? $order->status }}
                                </span>
                            </td>
                            <td class="px-5 py-4">
                                @if($order->status === 'confirmed' && !$order->teacher_confirmed_at)
                                    @if($order->scheduled_at->isPast())
                                        <form method="POST" action="{{ route('teacher.orders.confirm', $order) }}" onsubmit="return confirm('Konfirmasi bahwa kamu sudah mengajar les ini?')">
                                            @csrf
                                            <button type="submit" class="bg-[#093C5D] text-[#5DF8D8] px-3.5 py-1.5 rounded-lg text-xs font-bold hover:bg-[#3B7597] hover:text-white transition-all shadow-xs focus-visible:outline-none">
                                                Konfirmasi Selesai
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-xs text-gray-400 font-medium">Bisa dikonfirmasi setelah jadwal</span>
                                    @endif
                                @elseif($order->status === 'confirmed' && $order->teacher_confirmed_at)
                                    <span class="text-xs text-[#3B7597] font-semibold italic">Menunggu konfirmasi murid</span>
                                @elseif($order->status === 'completed')
                                    <span class="text-xs font-bold text-[#093C5D] bg-[#5DF8D8]/40 px-2.5 py-1 rounded-md">
                                        +Rp{{ number_format($order->tutor_earning_amount, 0, ',', '.') }}
                                    </span>
                                @else
                                    <span class="text-xs text-gray-400">—</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-10 text-center text-gray-400 font-medium">
                                Belum ada jadwal mengajar.
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
</x-layouts.app>