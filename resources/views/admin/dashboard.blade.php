<x-layouts.app title="Panel Admin">
    @php($maxBookings = max($weeklyBookings->max('total'), 1))

    <!-- Header Section -->
    <section class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <span class="inline-block rounded-md bg-[#6FD1D7]/20 px-3 py-1 text-xs font-bold tracking-wider text-[#093C5D] border border-[#6FD1D7]/40">
                PANEL ADMIN
            </span>
            <h1 class="font-display mt-2 text-3xl font-extrabold tracking-tight text-[#093C5D] sm:text-4xl">
                Selamat datang kembali, <span class="text-[#3B7597]">{{ strtok(auth()->user()->name, ' ') }}</span> <span aria-hidden="true">👋</span>
            </h1>
            <p class="mt-1 text-sm font-medium text-[#3B7597]">Pantau aktivitas TemanLes dan kelola transaksi platform hari ini.</p>
        </div>
        <div class="flex min-w-[210px] items-center gap-3.5 rounded-2xl border border-[#6FD1D7]/30 bg-[#6FD1D7]/10 p-4 shadow-sm">
            <span class="grid h-10 w-10 place-items-center rounded-xl bg-[#093C5D] text-[#5DF8D8] shadow-md shadow-[#093C5D]/20" aria-hidden="true">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/></svg>
            </span>
            <div>
                <p class="text-xs font-bold text-[#093C5D]">{{ now()->translatedFormat('l, d F Y') }}</p>
                <p class="mt-0.5 text-xs font-semibold text-[#3B7597]">{{ now()->format('H:i') }} WIB</p>
            </div>
        </div>
    </section>

    <!-- Stat Cards Section -->
    <section class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4" aria-label="Ringkasan platform">
        <!-- Card 1: Guru Aktif -->
        <div class="relative overflow-hidden rounded-2xl bg-[#093C5D] p-6 text-white shadow-lg shadow-[#093C5D]/20 transition-all hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-[#6FD1D7]">Guru Aktif</p>
                    <h3 class="mt-2 text-3xl font-extrabold text-white">{{ $stats['activeTutors'] }}</h3>
                </div>
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#3B7597]/40 text-[#5DF8D8]">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
            </div>
            <div class="absolute -bottom-6 -right-6 h-24 w-24 rounded-full bg-[#5DF8D8]/10 blur-xl"></div>
        </div>

        <!-- Card 2: Siswa Terdaftar -->
        <div class="relative overflow-hidden rounded-2xl bg-[#3B7597] p-6 text-white shadow-lg shadow-[#3B7597]/20 transition-all hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-[#5DF8D8]">Siswa Terdaftar</p>
                    <h3 class="mt-2 text-3xl font-extrabold text-white">{{ $stats['students'] }}</h3>
                </div>
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#093C5D]/40 text-[#6FD1D7]">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg>
                </div>
            </div>
            <div class="absolute -bottom-6 -right-6 h-24 w-24 rounded-full bg-[#6FD1D7]/20 blur-xl"></div>
        </div>

        <!-- Card 3: Booking Hari Ini -->
        <div class="relative overflow-hidden rounded-2xl bg-[#6FD1D7] p-6 text-[#093C5D] shadow-lg shadow-[#6FD1D7]/25 transition-all hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-[#093C5D]/80">Booking Hari Ini</p>
                    <h3 class="mt-2 text-3xl font-extrabold text-[#093C5D]">{{ $stats['todayBookings'] }}</h3>
                </div>
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#093C5D]/10 text-[#093C5D]">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
            </div>
            <div class="absolute -bottom-6 -right-6 h-24 w-24 rounded-full bg-white/30 blur-xl"></div>
        </div>

        <!-- Card 4: Pendapatan Bulan Ini -->
        <div class="relative overflow-hidden rounded-2xl bg-[#5DF8D8] p-6 text-[#093C5D] shadow-lg shadow-[#5DF8D8]/30 transition-all hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-[#093C5D]/80">Pendapatan Bulan Ini</p>
                    <h3 class="mt-2 text-2xl font-extrabold text-[#093C5D] xl:text-3xl">Rp {{ number_format($stats['monthlyRevenue'], 0, ',', '.') }}</h3>
                </div>
                <div class="grid h-12 w-12 place-items-center rounded-xl bg-[#093C5D]/10 text-[#093C5D]">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
            </div>
            <div class="absolute -bottom-6 -right-6 h-24 w-24 rounded-full bg-white/40 blur-xl"></div>
        </div>
    </section>

    <!-- Action & Attention Grid -->
    <section class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-12">
        <!-- List Perlu Perhatian -->
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm lg:col-span-6">
            <div class="mb-5 flex items-center gap-2.5">
                <span class="grid h-8 w-8 place-items-center rounded-lg bg-[#093C5D] text-[#5DF8D8]">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v4m0 4h.01M10.3 3.9 2.7 17a2 2 0 0 0 1.73 3h15.14a2 2 0 0 0 1.73-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg>
                </span>
                <h2 class="font-display text-lg font-bold text-[#093C5D]">Perlu Perhatian</h2>
            </div>
            
            <div class="space-y-3">
                <!-- Item 1: Pembayaran -->
                <a href="{{ route('admin.payments') }}" class="group flex items-center gap-4 rounded-xl border border-[#6FD1D7]/30 bg-[#6FD1D7]/10 p-4 transition-all hover:border-[#6FD1D7] hover:bg-[#6FD1D7]/20 hover:shadow-md">
                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-[#093C5D] text-[#6FD1D7] shadow-md shadow-[#093C5D]/10">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18M7 15h2"/></svg>
                    </span>
                    <span class="min-w-0 flex-1">
                        <span class="block text-sm font-bold text-[#093C5D]">{{ $pendingPayments }} Pembayaran Menunggu</span>
                        <span class="mt-0.5 block text-xs font-medium text-[#3B7597]">Ada bukti transfer yang perlu diperiksa.</span>
                    </span>
                    <span class="hidden items-center gap-1 text-xs font-bold text-[#3B7597] sm:flex group-hover:translate-x-1 transition-transform">
                        Periksa <span aria-hidden="true">›</span>
                    </span>
                </a>

                <!-- Item 2: Pencairan Guru -->
                <a href="{{ route('admin.payouts') }}" class="group flex items-center gap-4 rounded-xl border border-[#5DF8D8]/40 bg-[#5DF8D8]/15 p-4 transition-all hover:border-[#5DF8D8] hover:bg-[#5DF8D8]/25 hover:shadow-md">
                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-[#3B7597] text-[#5DF8D8] shadow-md shadow-[#3B7597]/10">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/></svg>
                    </span>
                    <span class="min-w-0 flex-1">
                        <span class="block text-sm font-bold text-[#093C5D]">{{ $pendingPayouts }} Permintaan Pencairan</span>
                        <span class="mt-0.5 block text-xs font-medium text-[#3B7597]">Guru sedang menunggu pencairan saldo.</span>
                    </span>
                    <span class="hidden items-center gap-1 text-xs font-bold text-[#3B7597] sm:flex group-hover:translate-x-1 transition-transform">
                        Lihat <span aria-hidden="true">›</span>
                    </span>
                </a>

                <!-- Item 3: Verifikasi Guru -->
                <a href="{{ route('admin.tutors') }}" class="group flex items-center gap-4 rounded-xl border border-[#3B7597]/20 bg-[#3B7597]/5 p-4 transition-all hover:border-[#3B7597] hover:bg-[#3B7597]/15 hover:shadow-md">
                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-[#093C5D] text-[#5DF8D8] shadow-md shadow-[#093C5D]/10">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="8.5" cy="7" r="4"/><polyline points="17 11 19 13 23 9"/></svg>
                    </span>
                    <span class="min-w-0 flex-1">
                        <span class="block text-sm font-bold text-[#093C5D]">Verifikasi Pendaftaran Guru</span>
                        <span class="mt-0.5 block text-xs font-medium text-[#3B7597]">ACC pendaftaran guru baru.</span>
                    </span>
                    <span class="hidden items-center gap-1 text-xs font-bold text-[#3B7597] sm:flex group-hover:translate-x-1 transition-transform">
                        Proses <span aria-hidden="true">›</span>
                    </span>
                </a>
            </div>
        </div>

        <!-- Action Card: Verifikasi Pembayaran -->
        <a href="{{ route('admin.payments') }}" class="group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-[#6FD1D7]/40 bg-gradient-to-b from-[#6FD1D7]/10 to-white p-6 shadow-sm transition-all hover:border-[#3B7597] hover:shadow-md lg:col-span-3">
            <div>
                <span class="grid h-12 w-12 place-items-center rounded-xl bg-[#093C5D] text-[#6FD1D7] shadow-md shadow-[#093C5D]/15">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18M7 15h2"/></svg>
                </span>
                <p class="mt-4 text-sm font-bold text-[#093C5D]">Verifikasi Pembayaran</p>
                <p class="mt-1 text-3xl font-black text-[#093C5D]">{{ $pendingPayments }}</p>
                <p class="mt-1 text-xs font-medium text-[#3B7597]">Pembayaran menunggu verifikasi</p>
            </div>
            <span class="mt-6 flex items-center justify-center gap-2 rounded-xl bg-[#093C5D] px-4 py-3 text-sm font-bold text-[#5DF8D8] shadow-md shadow-[#093C5D]/20 transition-all group-hover:bg-[#3B7597] group-hover:text-white">
                Cek Pembayaran <span aria-hidden="true" class="transition-transform group-hover:translate-x-1">›</span>
            </span>
        </a>

        <!-- Action Card: Penarikan Saldo Guru -->
        <a href="{{ route('admin.payouts') }}" class="group relative flex flex-col justify-between overflow-hidden rounded-2xl border border-[#5DF8D8]/50 bg-gradient-to-b from-[#5DF8D8]/15 to-white p-6 shadow-sm transition-all hover:border-[#3B7597] hover:shadow-md lg:col-span-3">
            <div>
                <span class="grid h-12 w-12 place-items-center rounded-xl bg-[#3B7597] text-[#5DF8D8] shadow-md shadow-[#3B7597]/15">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/></svg>
                </span>
                <p class="mt-4 text-sm font-bold text-[#093C5D]">Penarikan Saldo Guru</p>
                <p class="mt-1 text-3xl font-black text-[#093C5D]">{{ $pendingPayouts }}</p>
                <p class="mt-1 text-xs font-medium text-[#3B7597]">Permintaan menunggu persetujuan</p>
            </div>
            <span class="mt-6 flex items-center justify-center gap-2 rounded-xl bg-[#3B7597] px-4 py-3 text-sm font-bold text-white shadow-md shadow-[#3B7597]/20 transition-all group-hover:bg-[#093C5D] group-hover:text-[#5DF8D8]">
                Kelola Uang <span aria-hidden="true" class="transition-transform group-hover:translate-x-1">›</span>
            </span>
        </a>
    </section>

    <!-- Analytics & Activity Section -->
    <section class="mt-8 grid grid-cols-1 gap-6 lg:grid-cols-12">
        <!-- Grafik Booking Minggu Ini -->
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm lg:col-span-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <span class="grid h-8 w-8 place-items-center rounded-lg bg-[#6FD1D7]/20 text-[#093C5D]">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/></svg>
                    </span>
                    <h2 class="font-display text-lg font-bold text-[#093C5D]">Ringkasan Booking</h2>
                </div>
                <span class="rounded-full bg-[#6FD1D7]/20 px-3 py-1 text-xs font-bold text-[#093C5D]">Minggu Ini</span>
            </div>
            
            <div class="mt-8 flex h-44 items-end justify-between gap-3 border-b border-gray-100 px-2 pb-2">
                @foreach($weeklyBookings as $booking)
                    <div class="flex h-full flex-1 flex-col items-center justify-end gap-1.5">
                        <span class="text-xs font-bold text-[#3B7597]">{{ $booking['total'] ?: '' }}</span>
                        <div class="w-full max-w-[36px] rounded-t-lg bg-[#3B7597] transition-all hover:bg-[#093C5D]" style="height: {{ max(10, ($booking['total'] / $maxBookings) * 110) }}px"></div>
                        <span class="text-xs font-semibold text-[#3B7597]">{{ $booking['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm lg:col-span-6">
            <div class="flex items-center justify-between">
                <h2 class="font-display text-lg font-bold text-[#093C5D]">Aktivitas Terbaru</h2>
                <a href="{{ route('admin.payments') }}" class="text-xs font-bold text-[#3B7597] hover:text-[#093C5D] hover:underline">
                    Lihat pembayaran &rarr;
                </a>
            </div>
            
            <div class="mt-4 divide-y divide-gray-100">
                @forelse($activities as $activity)
                    <div class="flex items-center gap-3.5 py-3.5 transition-colors hover:bg-[#6FD1D7]/10 rounded-lg px-2">
                        <span class="grid h-9 w-9 shrink-0 place-items-center rounded-xl {{ $activity['type'] === 'payment' ? 'bg-[#6FD1D7]/30 text-[#093C5D]' : 'bg-[#5DF8D8]/40 text-[#093C5D]' }}">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                @if($activity['type'] === 'payment')
                                    <rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/>
                                @else
                                    <path d="M3 21h18M5 21V9l7-5 7 5v12"/>
                                @endif
                            </svg>
                        </span>
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-bold text-[#093C5D]">{{ $activity['title'] }}</p>
                            <p class="truncate text-xs font-medium text-[#3B7597]">{{ $activity['description'] }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs font-extrabold text-[#093C5D]">+Rp{{ number_format($activity['amount'], 0, ',', '.') }}</p>
                            <p class="mt-0.5 text-[10px] font-medium text-[#3B7597]">{{ $activity['created_at']->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <div class="py-12 text-center">
                        <p class="text-sm font-medium text-[#3B7597]">Belum ada aktivitas transaksi.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layouts.app>