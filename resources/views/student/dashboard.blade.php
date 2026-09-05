<x-layouts.app title="Pesanan Saya — TemanLes">
    <x-student-subnav />

    <!-- Header Section dengan sentuhan warna -->
    <div class="mb-8 p-6 rounded-2xl bg-gradient-to-r from-[#093C5D] to-[#3B7597] text-white shadow-md relative overflow-hidden">
        <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-[#5DF8D8]/20 rounded-full blur-2xl pointer-events-none"></div>
        <h1 class="font-display text-2xl sm:text-3xl font-bold mb-1">Pesanan Saya</h1>
        <p class="text-[#6FD1D7] text-sm font-medium">Pantau status les dan konfirmasi jadwal yang sudah selesai</p>
    </div>

    @php
        $labels = [
            'pending_payment' => 'Menunggu Bayar', 
            'waiting_verification' => 'Diverifikasi',
            'confirmed' => 'Terkonfirmasi', 
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan', 
            'rejected' => 'Ditolak',
        ];
    @endphp

    <!-- Tampilan Desktop (Tabel) -->
    <div class="hidden sm:block bg-white shadow-sm rounded-2xl overflow-hidden border border-[#6FD1D7]/30">
        <table class="w-full text-sm">
            <thead class="bg-[#093C5D] text-[#5DF8D8] text-left">
                <tr>
                    <th class="px-5 py-4 font-bold">Kode</th>
                    <th class="px-5 py-4 font-bold">Guru</th>
                    <th class="px-5 py-4 font-bold">Mapel</th>
                    <th class="px-5 py-4 font-bold">Jadwal</th>
                    <th class="px-5 py-4 font-bold">Status</th>
                    <th class="px-5 py-4 font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#6FD1D7]/20">
                @forelse($orders as $order)
                    <tr class="hover:bg-[#6FD1D7]/10 transition-colors">
                        <td class="px-5 py-4 font-bold text-[#093C5D]">{{ $order->order_code }}</td>
                        <td class="px-5 py-4 font-semibold text-[#093C5D]">{{ $order->tutor->user->name }}</td>
                        <td class="px-5 py-4">
                            <span class="inline-block bg-[#3B7597]/15 text-[#093C5D] px-2.5 py-1 rounded-md text-xs font-semibold">
                                {{ $order->tutorSubject->subject->name }} — {{ $order->tutorSubject->level }}
                            </span>
                        </td>
                        <td class="px-5 py-4 text-[#3B7597] font-medium">
                            {{ $order->scheduled_date->format('d M Y') }}, {{ $order->scheduled_time }}
                        </td>
                        <td class="px-5 py-4">
                            @php
                                $statusClasses = match($order->status) {
                                    'pending_payment', 'waiting_verification' => 'bg-[#3B7597] text-white',
                                    'confirmed' => 'bg-[#6FD1D7] text-[#093C5D]',
                                    'completed' => 'bg-[#5DF8D8] text-[#093C5D]',
                                    'cancelled', 'rejected' => 'bg-rose-100 text-rose-700',
                                    default => 'bg-gray-100 text-gray-700'
                                };
                            @endphp
                            <span class="px-3 py-1 rounded-full text-xs font-bold shadow-sm inline-block {{ $statusClasses }}">
                                {{ $labels[$order->status] ?? $order->status }}
                            </span>
                        </td>
                        <td class="px-5 py-4">
                            @if($order->status === 'confirmed' && !$order->student_confirmed_at)
                                @if($order->scheduled_at->isPast())
                                    <form method="POST" action="{{ route('student.orders.confirm', $order) }}" onsubmit="return confirm('Konfirmasi bahwa les sudah dilaksanakan?')">
                                        @csrf
                                        <button type="submit" class="bg-[#093C5D] text-[#5DF8D8] px-3.5 py-1.5 rounded-lg text-xs font-bold hover:bg-[#3B7597] hover:text-white transition-all shadow-sm focus-visible:outline-none">
                                            Konfirmasi selesai
                                        </button>
                                    </form>
                                @else
                                    <span class="text-xs text-[#3B7597] font-medium bg-[#6FD1D7]/20 px-2.5 py-1 rounded-lg">Belum Mulai</span>
                                @endif
                            @elseif($order->status === 'confirmed' && $order->student_confirmed_at)
                                <span class="text-xs text-[#3B7597] font-semibold italic">Menunggu konfirmasi guru</span>
                            @elseif($order->status === 'completed')
                                <span class="text-xs text-[#093C5D] font-bold bg-[#5DF8D8] px-2.5 py-1 rounded-lg">Selesai ✓</span>
                            @else
                                <span class="text-xs text-[#3B7597]">—</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-5 py-12 text-center text-[#3B7597]">
                            Belum ada pesanan. <a href="{{ route('marketplace') }}" class="text-[#093C5D] font-bold hover:underline">Cari guru sekarang</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Tampilan Mobile (Cards) -->
    <div class="sm:hidden space-y-4">
        @forelse($orders as $order)
            @php
                $statusClasses = match($order->status) {
                    'pending_payment', 'waiting_verification' => 'bg-[#3B7597] text-white',
                    'confirmed' => 'bg-[#6FD1D7] text-[#093C5D]',
                    'completed' => 'bg-[#5DF8D8] text-[#093C5D]',
                    'cancelled', 'rejected' => 'bg-rose-100 text-rose-700',
                    default => 'bg-gray-100 text-gray-700'
                };
            @endphp
            <div class="bg-white border-l-4 border-[#093C5D] shadow-sm rounded-xl p-4 relative overflow-hidden">
                <div class="flex justify-between items-start mb-3">
                    <p class="font-bold text-[#093C5D] text-sm">{{ $order->order_code }}</p>
                    <span class="px-3 py-1 rounded-full text-xs font-bold shrink-0 shadow-sm {{ $statusClasses }}">
                        {{ $labels[$order->status] ?? $order->status }}
                    </span>
                </div>
                <p class="text-base font-bold text-[#093C5D] mb-0.5">{{ $order->tutor->user->name }}</p>
                <div class="mb-2">
                    <span class="inline-block bg-[#3B7597]/15 text-[#093C5D] px-2 py-0.5 rounded text-xs font-semibold">
                        {{ $order->tutorSubject->subject->name }} — {{ $order->tutorSubject->level }}
                    </span>
                </div>
                <p class="text-xs text-[#3B7597] font-medium mb-4">
                    📅 {{ $order->scheduled_date->format('d M Y') }}, {{ $order->scheduled_time }}
                </p>

                @if($order->status === 'confirmed' && !$order->student_confirmed_at && $order->scheduled_at->isPast())
                    <form method="POST" action="{{ route('student.orders.confirm', $order) }}" onsubmit="return confirm('Konfirmasi bahwa les sudah dilaksanakan?')">
                        @csrf
                        <button type="submit" class="w-full bg-[#093C5D] text-[#5DF8D8] py-2.5 rounded-lg text-xs font-bold hover:bg-[#3B7597] transition-all shadow-sm">
                            Konfirmasi Selesai
                        </button>
                    </form>
                @elseif($order->status === 'confirmed' && $order->student_confirmed_at)
                    <p class="text-xs text-[#3B7597] font-medium bg-[#6FD1D7]/20 p-2 rounded-lg text-center italic">Menunggu konfirmasi guru</p>
                @endif
            </div>
        @empty
            <div class="text-center py-12 text-[#3B7597] text-sm bg-white rounded-xl shadow-sm">
                Belum ada pesanan. <a href="{{ route('marketplace') }}" class="text-[#093C5D] font-bold hover:underline">Cari guru sekarang</a>
            </div>
        @endforelse
    </div>

    <div class="mt-6">{{ $orders->links() }}</div>
</x-layouts.app>