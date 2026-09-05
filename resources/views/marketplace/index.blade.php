<x-layouts.app title="Cari Guru — TemanLes">
    <x-student-subnav />

    <!-- Header Section -->
    <div class="mb-8 max-w-2xl">
        <span class="inline-block text-xs font-semibold text-[#3B7597] bg-[#6FD1D7]/20 px-3 py-1 rounded-md mb-2">
            Cari &amp; booking guru privat
        </span>
        <h1 class="font-display text-3xl sm:text-4xl font-bold text-[#093C5D] mb-2 leading-tight">
            Belajar bareng guru yang pas buat kamu.
        </h1>
        <p class="text-[#3B7597] text-sm">
            Pilih mata pelajaran, jenjang, dan cara belajar yang kamu mau — online dari rumah, atau ketemu langsung.
        </p>
    </div>

    <!-- Filter Form: Clean & Neutral Background -->
    <form method="GET" action="{{ route('home') }}" class="bg-white border border-[#6FD1D7]/40 rounded-2xl p-5 mb-8 shadow-sm">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
            <div class="relative">
                <label for="f-subject" class="sr-only">Mata pelajaran</label>
                <select id="f-subject" name="subject_id" onchange="this.form.submit()"
                    class="appearance-none w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2.5 text-sm text-[#093C5D] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#093C5D]">
                    <option value="">Semua mapel</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" @selected(request('subject_id') == $subject->id)>{{ $subject->name }}</option>
                    @endforeach
                </select>
                <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[#3B7597]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.2 7.5a.75.75 0 011.06.02L10 11.148l3.74-3.628a.75.75 0 111.04 1.08l-4.25 4.125a.75.75 0 01-1.04 0L5.24 8.6a.75.75 0 01-.04-1.06z" clip-rule="evenodd"/></svg>
            </div>

            <div class="relative">
                <label for="f-level" class="sr-only">Jenjang</label>
                <select id="f-level" name="level" onchange="this.form.submit()"
                    class="appearance-none w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2.5 text-sm text-[#093C5D] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#093C5D]">
                    <option value="">Semua jenjang</option>
                    @foreach(['SD', 'SMP', 'SMA', 'Umum'] as $lvl)
                        <option value="{{ $lvl }}" @selected(request('level') == $lvl)>{{ $lvl }}</option>
                    @endforeach
                </select>
                <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[#3B7597]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.2 7.5a.75.75 0 011.06.02L10 11.148l3.74-3.628a.75.75 0 111.04 1.08l-4.25 4.125a.75.75 0 01-1.04 0L5.24 8.6a.75.75 0 01-.04-1.06z" clip-rule="evenodd"/></svg>
            </div>

            <div class="relative">
                <label for="f-mode" class="sr-only">Cara belajar</label>
                <select id="f-mode" name="mode" onchange="this.form.submit()"
                    class="appearance-none w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2.5 text-sm text-[#093C5D] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#093C5D]">
                    <option value="">Semua cara belajar</option>
                    <option value="online" @selected(request('mode') == 'online')>Online</option>
                    <option value="offline" @selected(request('mode') == 'offline')>Tatap muka</option>
                </select>
                <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[#3B7597]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.2 7.5a.75.75 0 011.06.02L10 11.148l3.74-3.628a.75.75 0 111.04 1.08l-4.25 4.125a.75.75 0 01-1.04 0L5.24 8.6a.75.75 0 01-.04-1.06z" clip-rule="evenodd"/></svg>
            </div>

            <div>
                <label for="f-min" class="sr-only">Harga minimal</label>
                <input id="f-min" type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Harga min"
                    class="w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2.5 text-sm text-[#093C5D] placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#093C5D]">
            </div>

            <div>
                <label for="f-max" class="sr-only">Harga maksimal</label>
                <input id="f-max" type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Harga max"
                    class="w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2.5 text-sm text-[#093C5D] placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#093C5D]">
            </div>
        </div>

        <div class="mt-4 flex items-center justify-between border-t border-gray-100 pt-3">
            <button type="submit" class="text-sm text-[#093C5D] font-semibold hover:text-[#3B7597] focus:outline-none">
                Terapkan filter harga →
            </button>

            @if(request()->anyFilled(['subject_id', 'level', 'mode', 'min_price', 'max_price']))
                <a href="{{ route('home') }}" class="text-xs text-gray-500 hover:text-red-500 transition-colors">
                    Reset filter
                </a>
            @endif
        </div>
    </form>

    <p class="text-sm text-[#3B7597] mb-4"><span class="font-bold text-[#093C5D]">{{ $tutors->total() }}</span> guru ditemukan</p>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($tutors as $tutor)
            @php $minPrice = $tutor->tutorSubjects->min('price_per_hour'); @endphp
            <a href="{{ route('booking.step1', $tutor) }}"
                class="group bg-white border border-gray-200 hover:border-[#3B7597] hover:shadow-md transition-all rounded-2xl p-5 block relative overflow-hidden">
                
                <div class="flex items-start gap-3 mb-3">
                    <div class="w-10 h-10 shrink-0 rounded-full bg-[#093C5D] flex items-center justify-center font-display font-bold text-white text-sm" aria-hidden="true">
                        {{ substr($tutor->user->name, 0, 1) }}
                    </div>
                    <div class="min-w-0">
                        <p class="font-semibold text-[#093C5D] text-sm truncate group-hover:text-[#3B7597] transition-colors">{{ $tutor->user->name }}</p>
                        <p class="text-xs text-gray-500 line-clamp-1">{{ $tutor->headline }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-1 text-xs mb-3">
                    <svg class="w-4 h-4 text-[#093C5D]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M10 1.5l2.6 5.6 6.1.6-4.6 4.1 1.3 6-5.4-3.1-5.4 3.1 1.3-6-4.6-4.1 6.1-.6z"/></svg>
                    <span class="font-bold text-[#093C5D]">{{ number_format($tutor->rating_avg, 1) }}</span>
                    <span class="text-gray-400">({{ $tutor->rating_count }} ulasan)</span>
                </div>

                <!-- Tag dengan Warna Konsisten -->
                <div class="flex flex-wrap gap-1.5 mb-4">
                    @foreach($tutor->tutorSubjects->take(3) as $ts)
                        <span class="text-xs bg-[#6FD1D7]/20 text-[#093C5D] px-2.5 py-0.5 rounded-md font-medium">
                            {{ $ts->subject->name }} · {{ $ts->level }}
                        </span>
                    @endforeach
                </div>

                <div class="border-t border-gray-100 pt-3 flex items-center justify-between text-xs">
                    <span class="flex items-center gap-1 text-gray-500">
                        @if(in_array($tutor->teaching_mode, ['online', 'both']))
                            <svg class="w-3.5 h-3.5 text-[#3B7597]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2h-3l1 2H8l1-2H6a2 2 0 01-2-2V5z"/></svg>
                        @endif
                        @if(in_array($tutor->teaching_mode, ['offline', 'both']))
                            <svg class="w-3.5 h-3.5 text-[#3B7597]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 2a6 6 0 016 6c0 4.5-6 10-6 10S4 12.5 4 8a6 6 0 016-6zm0 8a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                        @endif
                        {{ $tutor->teaching_mode === 'both' ? 'Online & offline' : ($tutor->teaching_mode === 'online' ? 'Online' : 'Tatap muka') }}
                    </span>
                    @if($minPrice)
                        <span class="font-bold text-[#093C5D] text-sm">mulai Rp{{ number_format($minPrice / 1000, 0) }}rb</span>
                    @endif
                </div>
            </a>
        @empty
            <div class="col-span-full text-center py-12 border border-gray-200 rounded-2xl bg-white p-6">
                <p class="text-[#093C5D] font-semibold mb-1">Belum ada guru yang cocok</p>
                <p class="text-xs text-gray-500 mb-4">Coba atur ulang filter pencarian kamu.</p>
                <a href="{{ route('home') }}" class="text-xs font-semibold text-[#093C5D] hover:underline">Bersihkan semua filter</a>
            </div>
        @endforelse
    </div>

    <div class="mt-8">{{ $tutors->links() }}</div>
</x-layouts.app>