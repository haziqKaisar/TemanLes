<x-layouts.app title="{{ $tutor->user->name }} — TemanLes">

    <a href="{{ route('marketplace') }}" class="inline-flex items-center gap-1.5 text-sm text-ink-muted hover:text-ink mb-6 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded px-1">
        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M12.7 15.3a1 1 0 01-1.4 0l-5-5a1 1 0 010-1.4l5-5a1 1 0 111.4 1.4L8.42 9.5H16a1 1 0 110 2H8.42l4.3 4.3a1 1 0 010 1.4z" clip-rule="evenodd"/></svg>
        Kembali ke marketplace
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Kolom kiri: Info & Tabs -->
        <div class="lg:col-span-2 space-y-6">

            <!-- INFO UTAMA (Selalu Tampil) -->
            <div class="bg-white border border-line rounded-2xl p-6">
                <div class="flex items-start gap-4 mb-5">
                    <div class="w-16 h-16 shrink-0 rounded-full bg-board flex items-center justify-center font-display font-semibold text-white text-2xl" aria-hidden="true">
                        {{ substr($tutor->user->name, 0, 1) }}
                    </div>
                    <div class="min-w-0">
                        <h1 class="font-display text-2xl font-semibold text-ink">{{ $tutor->user->name }}</h1>
                        <p class="text-sm text-ink-muted">{{ $tutor->headline }}</p>
                        <div class="flex items-center gap-1.5 text-sm mt-2">
                            <svg class="w-4 h-4" viewBox="0 0 20 20" fill="#5DF8D8" stroke="#093C5D" stroke-width="0.6" aria-hidden="true"><path d="M10 1.5l2.6 5.6 6.1.6-4.6 4.1 1.3 6-5.4-3.1-5.4 3.1 1.3-6-4.6-4.1 6.1-.6z"/></svg>
                            <span class="font-medium text-ink">{{ number_format($tutor->rating_avg, 1) }}</span>
                            <span class="text-ink-muted">({{ $tutor->rating_count }} ulasan)</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2 chalk-divider pt-4">
                    <span class="text-xs bg-board/8 text-board px-2.5 py-1 rounded-full font-medium">
                        {{ $tutor->experience_years }} tahun mengajar
                    </span>
                    @if($tutor->education)
                        <span class="text-xs bg-board/8 text-board px-2.5 py-1 rounded-full font-medium">{{ $tutor->education }}</span>
                    @endif
                    <span class="text-xs bg-board/8 text-board px-2.5 py-1 rounded-full font-medium">
                        {{ $tutor->teaching_mode === 'both' ? 'Online & tatap muka' : ($tutor->teaching_mode === 'online' ? 'Online' : 'Tatap muka') }}
                    </span>
                </div>
            </div>

            <!-- NAVIGASI TABS -->
            <div class="bg-white border border-line rounded-2xl overflow-hidden">
                <div class="flex border-b border-line overflow-x-auto hide-scrollbar">
                    <button class="tab-btn active px-5 py-4 text-sm font-semibold text-board border-b-2 border-board whitespace-nowrap focus:outline-none" data-target="tab-tentang">
                        Tentang
                    </button>
                    <button class="tab-btn px-5 py-4 text-sm font-medium text-ink-muted border-b-2 border-transparent hover:text-ink whitespace-nowrap focus:outline-none" data-target="tab-pelajaran">
                        Mata Pelajaran
                    </button>
                    <button class="tab-btn px-5 py-4 text-sm font-medium text-ink-muted border-b-2 border-transparent hover:text-ink whitespace-nowrap focus:outline-none" data-target="tab-jadwal">
                        Jadwal & Lokasi
                    </button>
                    <button class="tab-btn px-5 py-4 text-sm font-medium text-ink-muted border-b-2 border-transparent hover:text-ink whitespace-nowrap focus:outline-none" data-target="tab-ulasan">
                        Ulasan
                    </button>
                </div>

                <!-- KONTEN TABS -->
                <div class="p-6">

                    <!-- TAB 1: TENTANG -->
                    <div id="tab-tentang" class="tab-content block">
                        <h2 class="font-semibold text-ink mb-3">Tentang Guru</h2>
                        @if($tutor->bio)
                            <p class="text-sm text-ink-muted leading-relaxed whitespace-pre-line">{{ $tutor->bio }}</p>
                        @else
                            <p class="text-sm text-ink-muted">Guru ini belum menambahkan deskripsi profil.</p>
                        @endif
                    </div>

                    <!-- TAB 2: MATA PELAJARAN -->
                    <div id="tab-pelajaran" class="tab-content hidden">
                        <h2 class="font-semibold text-ink mb-4">Mata Pelajaran &amp; Harga</h2>
                        @if($tutor->tutorSubjects->isNotEmpty())
                            <div class="divide-y divide-line">
                                @foreach($tutor->tutorSubjects as $ts)
                                    <div class="flex items-center justify-between py-3 first:pt-0 last:pb-0">
                                        <span class="text-sm text-ink">{{ $ts->subject->name }} <span class="text-ink-muted">— {{ $ts->level }}</span></span>
                                        <span class="text-sm font-semibold text-ink">Rp{{ number_format($ts->price_per_hour, 0, ',', '.') }}/jam</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-sm text-ink-muted">Guru ini belum menambahkan mata pelajaran.</p>
                        @endif
                    </div>

                    <!-- TAB 3: JADWAL & LOKASI -->
                    <div id="tab-jadwal" class="tab-content hidden space-y-6">
                        <div>
                            <h2 class="font-semibold text-ink mb-4">Jadwal Tersedia</h2>
                            @if($tutor->availabilities->isNotEmpty())
                                <div class="flex flex-wrap gap-2">
                                    @php $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']; @endphp
                                    @foreach($tutor->availabilities as $a)
                                        <span class="bg-paper-alt text-ink px-3 py-1.5 rounded-full text-xs">
                                            {{ $hari[$a->day_of_week] }} {{ \Carbon\Carbon::parse($a->start_time)->format('H:i') }}–{{ \Carbon\Carbon::parse($a->end_time)->format('H:i') }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-sm text-ink-muted">Guru ini belum mengatur jadwal ketersediaan.</p>
                            @endif
                        </div>

                        @if(in_array($tutor->teaching_mode, ['offline', 'both']) && $tutor->default_address)
                            <div class="chalk-divider pt-6">
                                <h2 class="font-semibold text-ink mb-2">Area Mengajar Tatap Muka</h2>
                                <p class="text-sm text-ink-muted">{{ $tutor->default_address }}</p>
                                <p class="text-xs text-ink-muted mt-1">Titik lokasi pasti akan ditentukan bersama saat proses booking.</p>
                            </div>
                        @endif
                    </div>

                    <!-- TAB 4: ULASAN -->
                    <div id="tab-ulasan" class="tab-content hidden">
                        <h2 class="font-semibold text-ink mb-4">Ulasan Murid</h2>
                        @if($tutor->reviews->isNotEmpty())
                            <div class="space-y-5">
                                @foreach($tutor->reviews as $review)
                                    <div class="chalk-divider pt-4 first:pt-0 first:border-t-0">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-sm font-medium text-ink">{{ explode(' ', $review->student->name)[0] }}</span>
                                            <div class="flex items-center gap-1">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="{{ $i <= $review->rating ? '#5DF8D8' : '#E1DED4' }}" stroke="#093C5D" stroke-width="0.5" aria-hidden="true"><path d="M10 1.5l2.6 5.6 6.1.6-4.6 4.1 1.3 6-5.4-3.1-5.4 3.1 1.3-6-4.6-4.1 6.1-.6z"/></svg>
                                                @endfor
                                            </div>
                                        </div>
                                        @if($review->comment)
                                            <p class="text-sm text-ink-muted">{{ $review->comment }}</p>
                                        @endif
                                        <p class="text-xs text-ink-muted mt-1">{{ $review->created_at->translatedFormat('d M Y') }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-sm text-ink-muted">Belum ada ulasan untuk guru ini.</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <!-- Kolom kanan: CTA booking (Tetap Sticky) -->
        <div class="lg:col-span-1">
            <div class="bg-white border border-line rounded-2xl p-6 sticky top-24">
                <p class="text-sm text-ink-muted mb-1">Mulai dari</p>
                @php $minPrice = $tutor->tutorSubjects->min('price_per_hour'); @endphp
                <p class="font-display text-2xl font-semibold text-ink mb-5">
                    {{ $minPrice ? 'Rp' . number_format($minPrice, 0, ',', '.') . '/jam' : '—' }}
                </p>

                @if($tutor->tutorSubjects->isNotEmpty())
                    <a href="{{ route('booking.step1', $tutor) }}" class="block text-center bg-board text-white rounded-lg py-3.5 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
                        Booking Sekarang
                    </a>
                @else
                    <p class="text-sm text-ink-muted text-center">Guru ini belum bisa dibooking.</p>
                @endif

                <a href="{{ route('marketplace') }}" class="block text-center mt-3 text-sm text-ink-muted hover:text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded py-1">
                    Kembali ke marketplace
                </a>
            </div>
        </div>
    </div>

    <!-- Script Logika Tabs -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // 1. Hapus status aktif dari semua tombol
                    tabButtons.forEach(btn => {
                        btn.classList.remove('text-board', 'border-board', 'font-semibold');
                        btn.classList.add('text-ink-muted', 'border-transparent', 'font-medium');
                    });

                    // 2. Tambahkan status aktif ke tombol yang diklik
                    button.classList.add('text-board', 'border-board', 'font-semibold');
                    button.classList.remove('text-ink-muted', 'border-transparent', 'font-medium');

                    // 3. Sembunyikan semua konten tab
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                        content.classList.remove('block');
                    });

                    // 4. Tampilkan konten tab yang sesuai dengan data-target
                    const targetId = button.getAttribute('data-target');
                    const targetContent = document.getElementById(targetId);
                    if (targetContent) {
                        targetContent.classList.remove('hidden');
                        targetContent.classList.add('block');
                    }
                });
            });
        });
    </script>

    <style>
        /* Opsional: Sembunyikan scrollbar bawaan browser pada menu tabs di HP */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</x-layouts.app>
