<x-layouts.app title="Mapel & Harga — TemanLes">
    <x-teacher-subnav />

    <div id="teacher-content-wrapper">
        <div class="mb-8">
            <h1 class="font-display text-2xl sm:text-3xl font-bold text-ink tracking-tight mb-1">Mapel &amp; Harga</h1>
            <p class="text-ink-muted text-sm font-medium">Atur mata pelajaran, jenjang, dan tarif per jam yang kamu tawarkan ke murid</p>
        </div>

        <div class="w-full space-y-8">
            <!-- List Mapel Existing -->
            @if($tutorSubjects->isEmpty())
                <div class="bg-white border border-dashed border-line rounded-2xl p-12 text-center shadow-xs">
                    <div class="w-12 h-12 rounded-full bg-paper-alt flex items-center justify-center mx-auto text-ink-muted mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="font-display font-bold text-ink text-base mb-1">Belum Ada Mapel Ditambahkan</h3>
                    <p class="text-xs text-ink-muted max-w-md mx-auto">Tambahkan minimal satu mata pelajaran dan tentukan harga per jam agar profil kamu dapat muncul di marketplace pencarian guru.</p>
                </div>
            @else
                <div class="space-y-4">
                    <h2 class="font-display font-bold text-lg text-ink">Daftar Mapel Aktif</h2>
                    <div class="space-y-3">
                        @foreach($tutorSubjects as $ts)
                            <div class="bg-white border border-line/80 rounded-2xl p-5 shadow-xs hover:shadow-md transition-all flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <div class="flex items-center gap-4 flex-1 min-w-0">
                                    <div class="w-12 h-12 rounded-xl bg-teal/20 text-board flex items-center justify-center shrink-0">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                    </div>
                                    <div>
                                        <h3 class="font-display font-bold text-ink text-base sm:text-lg mb-1">{{ $ts->subject->name }}</h3>
                                        <span class="inline-block bg-teal/20 text-board border border-teal/30 px-3 py-0.5 rounded-lg text-xs font-extrabold uppercase tracking-wide">
                                            {{ $ts->level }}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex flex-wrap items-center gap-3 pt-3 md:pt-0 border-t md:border-t-0 border-line">
                                    <form method="POST" action="{{ route('teacher.subjects.update', $ts) }}" class="flex items-center gap-2">
                                        @csrf
                                        @method('PUT')
                                        <label for="price-{{ $ts->id }}" class="sr-only">Harga per jam untuk {{ $ts->subject->name }} {{ $ts->level }}</label>
                                        <div class="relative flex items-center">
                                            <span class="absolute left-3 text-xs font-bold text-ink-muted">Rp</span>
                                            <input id="price-{{ $ts->id }}" type="number" name="price_per_hour" value="{{ $ts->price_per_hour }}" min="10000" step="1000"
                                                class="w-36 rounded-xl border border-line bg-paper/30 pl-8 pr-12 py-2 text-sm text-ink font-bold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                                            <span class="absolute right-3 text-xs font-medium text-ink-muted">/jam</span>
                                        </div>
                                        <button type="submit" class="bg-board/10 text-board hover:bg-board hover:text-white font-bold text-xs px-4 py-2.5 rounded-xl transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                                            Simpan
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('teacher.subjects.destroy', $ts) }}" onsubmit="return confirm('Hapus {{ $ts->subject->name }} — {{ $ts->level }} dari daftar mapel kamu?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-ink-muted hover:text-board font-semibold text-xs px-3 py-2.5 rounded-xl hover:bg-paper transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Form Tambah Mapel Baru -->
            <div class="bg-white border border-line rounded-2xl p-6 sm:p-8 shadow-xs">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-line">
                    <div class="w-10 h-10 rounded-xl bg-teal/20 text-board flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <div>
                        <h2 class="font-display font-bold text-lg text-ink">Tambah Mapel Baru</h2>
                        <p class="text-xs text-ink-muted">Pilih mata pelajaran, jenjang sekolah, dan tetapkan tarif les kamu</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('teacher.subjects.store') }}" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="subject_id" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Mata Pelajaran</label>
                            <select id="subject_id" name="subject_id"
                                class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                                <option value="">Pilih mapel...</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}" @selected(old('subject_id') == $subject->id)>{{ $subject->name }}</option>
                                @endforeach
                            </select>
                            @error('subject_id') <p class="text-mark text-xs font-semibold mt-1.5">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="level" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Jenjang</label>
                            <select id="level" name="level"
                                class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                                <option value="">Pilih jenjang...</option>
                                @foreach(['SD', 'SMP', 'SMA', 'Umum'] as $lvl)
                                    <option value="{{ $lvl }}" @selected(old('level') == $lvl)>{{ $lvl }}</option>
                                @endforeach
                            </select>
                            @error('level') <p class="text-mark text-xs font-semibold mt-1.5">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="price_per_hour" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Harga Per Jam (Rp)</label>
                            <input id="price_per_hour" type="number" name="price_per_hour" min="10000" step="1000" value="{{ old('price_per_hour') }}" placeholder="Contoh: 100000"
                                class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                            @error('price_per_hour') <p class="text-mark text-xs font-semibold mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex justify-end pt-2">
                        <button type="submit" class="w-full sm:w-auto bg-board text-white rounded-xl px-8 py-3.5 font-bold hover:bg-board-light shadow-xs transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board inline-flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Tambah Mapel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>

