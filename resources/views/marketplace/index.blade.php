<x-layouts.app title="Cari Guru — TemanLes">

    <div class="mb-10 max-w-2xl">
        <p class="text-sm font-medium text-board mb-2 tracking-wide">Cari &amp; booking guru privat</p>
        <h1 class="font-display text-3xl sm:text-4xl font-semibold text-ink mb-3 leading-tight">
            Belajar bareng guru yang pas buat kamu.
        </h1>
        <p class="text-ink-muted">
            Pilih mata pelajaran, jenjang, dan cara belajar yang kamu mau — online dari rumah, atau ketemu langsung.
        </p>
    </div>

    <form method="GET" action="{{ route('home') }}" class="bg-white border border-line rounded-2xl p-5 mb-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
            <div class="relative">
                <label for="f-subject" class="sr-only">Mata pelajaran</label>
                <select id="f-subject" name="subject_id" onchange="this.form.submit()"
                    class="appearance-none w-full rounded-lg border border-line bg-paper px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                    <option value="">Semua mapel</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" @selected(request('subject_id') == $subject->id)>{{ $subject->name }}</option>
                    @endforeach
                </select>
                <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-ink-muted" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.2 7.5a.75.75 0 011.06.02L10 11.148l3.74-3.628a.75.75 0 111.04 1.08l-4.25 4.125a.75.75 0 01-1.04 0L5.24 8.6a.75.75 0 01-.04-1.06z" clip-rule="evenodd"/></svg>
            </div>

            <div class="relative">
                <label for="f-level" class="sr-only">Jenjang</label>
                <select id="f-level" name="level" onchange="this.form.submit()"
                    class="appearance-none w-full rounded-lg border border-line bg-paper px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                    <option value="">Semua jenjang</option>
                    @foreach(['SD', 'SMP', 'SMA', 'Umum'] as $lvl)
                        <option value="{{ $lvl }}" @selected(request('level') == $lvl)>{{ $lvl }}</option>
                    @endforeach
                </select>
                <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-ink-muted" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.2 7.5a.75.75 0 011.06.02L10 11.148l3.74-3.628a.75.75 0 111.04 1.08l-4.25 4.125a.75.75 0 01-1.04 0L5.24 8.6a.75.75 0 01-.04-1.06z" clip-rule="evenodd"/></svg>
            </div>

            <div class="relative">
                <label for="f-mode" class="sr-only">Cara belajar</label>
                <select id="f-mode" name="mode" onchange="this.form.submit()"
                    class="appearance-none w-full rounded-lg border border-line bg-paper px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                    <option value="">Semua cara belajar</option>
                    <option value="online" @selected(request('mode') == 'online')>Online</option>
                    <option value="offline" @selected(request('mode') == 'offline')>Tatap muka</option>
                </select>
                <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-ink-muted" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.2 7.5a.75.75 0 011.06.02L10 11.148l3.74-3.628a.75.75 0 111.04 1.08l-4.25 4.125a.75.75 0 01-1.04 0L5.24 8.6a.75.75 0 01-.04-1.06z" clip-rule="evenodd"/></svg>
            </div>

            <div>
                <label for="f-min" class="sr-only">Harga minimal</label>
                <input id="f-min" type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Harga min"
                    class="w-full rounded-lg border border-line bg-paper px-3 py-2.5 text-sm text-ink placeholder:text-ink-muted focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
            </div>

            <div>
                <label for="f-max" class="sr-only">Harga maksimal</label>
                <input id="f-max" type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Harga max"
                    class="w-full rounded-lg border border-line bg-paper px-3 py-2.5 text-sm text-ink placeholder:text-ink-muted focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
            </div>
        </div>

        <button type="submit" class="mt-3 text-sm text-board font-medium hover:text-board-light focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded px-1">
            Terapkan filter harga →
        </button>

        @if(request()->anyFilled(['subject_id', 'level', 'mode', 'min_price', 'max_price']))
            <a href="{{ route('home') }}" class="mt-3 ml-4 text-sm text-ink-muted hover:text-mark focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark rounded px-1">
                Bersihkan filter
            </a>
        @endif
    </form>

    <p class="text-sm text-ink-muted mb-4">{{ $tutors->total() }} guru ditemukan</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($tutors as $tutor)
            @php $minPrice = $tutor->tutorSubjects->min('price_per_hour'); @endphp
            <a href="{{ route('booking.step1', $tutor) }}"
    class="group bg-white border border-line hover:border-board hover:shadow-md hover:-translate-y-0.5 rounded-2xl p-5 transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board block">
                <div class="flex items-start gap-3 mb-4">
                    <div class="w-11 h-11 shrink-0 rounded-full bg-board flex items-center justify-center font-display font-semibold text-white" aria-hidden="true">
                        {{ substr($tutor->user->name, 0, 1) }}
                    </div>
                    <div class="min-w-0">
                        <p class="font-semibold text-ink truncate">{{ $tutor->user->name }}</p>
                        <p class="text-xs text-ink-muted line-clamp-1">{{ $tutor->headline }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-1.5 text-sm mb-3">
                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="#5DF8D8" stroke="#093C5D" stroke-width="0.6" aria-hidden="true"><path d="M10 1.5l2.6 5.6 6.1.6-4.6 4.1 1.3 6-5.4-3.1-5.4 3.1 1.3-6-4.6-4.1 6.1-.6z"/></svg>
                    <span class="font-medium text-ink">{{ number_format($tutor->rating_avg, 1) }}</span>
                    <span class="text-ink-muted">({{ $tutor->rating_count }} ulasan)</span>
                </div>

                <div class="flex flex-wrap gap-1.5 mb-4">
                    @foreach($tutor->tutorSubjects->take(3) as $ts)
                        <span class="text-xs bg-board/8 text-board px-2.5 py-1 rounded-full font-medium">{{ $ts->subject->name }} · {{ $ts->level }}</span>
                    @endforeach
                </div>

                <div class="chalk-divider pt-3 flex items-center justify-between text-sm">
                    <span class="flex items-center gap-1.5 text-ink-muted">
                        @if(in_array($tutor->teaching_mode, ['online', 'both']))
                            <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2h-3l1 2H8l1-2H6a2 2 0 01-2-2V5z"/></svg>
                        @endif
                        @if(in_array($tutor->teaching_mode, ['offline', 'both']))
                            <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 2a6 6 0 016 6c0 4.5-6 10-6 10S4 12.5 4 8a6 6 0 016-6zm0 8a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                        @endif
                        {{ $tutor->teaching_mode === 'both' ? 'Online & tatap muka' : ($tutor->teaching_mode === 'online' ? 'Online' : 'Tatap muka') }}
                    </span>
                    @if($minPrice)
                        <span class="font-semibold text-ink">mulai Rp{{ number_format($minPrice / 1000, 0) }}rb</span>
                    @endif
                </div>
            </a>
        @empty
            <div class="col-span-full text-center py-16 border border-dashed border-line rounded-2xl">
                <p class="text-ink font-medium mb-1">Belum ada guru yang cocok</p>
                <p class="text-sm text-ink-muted mb-4">Coba longgarkan filter pencarian kamu.</p>
                <a href="{{ route('home') }}" class="text-sm text-board font-medium hover:text-board-light focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded px-2 py-1">Bersihkan semua filter</a>
            </div>
        @endforelse
    </div>

    <div class="mt-8">{{ $tutors->links() }}</div>
</x-layouts.app>
