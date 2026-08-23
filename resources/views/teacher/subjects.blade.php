<x-layouts.app title="Mapel & Harga — TemanLes">
    <x-teacher-subnav />

    <div class="mb-8">
        <h1 class="font-display text-2xl font-semibold text-ink mb-1">Mapel &amp; Harga</h1>
        <p class="text-ink-muted text-sm">Atur mata pelajaran, jenjang, dan tarif per jam yang kamu tawarkan</p>
    </div>

    <div class="max-w-2xl space-y-6">
        @if($tutorSubjects->isEmpty())
            <div class="text-center py-10 border border-dashed border-line rounded-2xl text-sm text-ink-muted">
                Belum ada mapel. Tambahkan minimal satu supaya kamu muncul di marketplace.
            </div>
        @else
            <div class="bg-white border border-line rounded-2xl divide-y divide-line">
                @foreach($tutorSubjects as $ts)
                    <div class="p-4 flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4">
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-ink">{{ $ts->subject->name }}</p>
                            <span class="text-xs bg-board/8 text-board px-2 py-0.5 rounded-full font-medium">{{ $ts->level }}</span>
                        </div>

                        <form method="POST" action="{{ route('teacher.subjects.update', $ts) }}" class="flex items-center gap-2">
                            @csrf
                            @method('PUT')
                            <label for="price-{{ $ts->id }}" class="sr-only">Harga per jam untuk {{ $ts->subject->name }} {{ $ts->level }}</label>
                            <span class="text-sm text-ink-muted">Rp</span>
                            <input id="price-{{ $ts->id }}" type="number" name="price_per_hour" value="{{ $ts->price_per_hour }}" min="10000" step="1000"
                                class="w-28 rounded-lg border border-line px-2.5 py-1.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                            <span class="text-sm text-ink-muted">/jam</span>
                            <button type="submit" class="text-xs font-medium text-board hover:text-board-light focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded px-2 py-1.5">
                                Simpan
                            </button>
                        </form>

                        <form method="POST" action="{{ route('teacher.subjects.destroy', $ts) }}" onsubmit="return confirm('Hapus {{ $ts->subject->name }} — {{ $ts->level }} dari daftar mapel kamu?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs font-medium text-mark hover:underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark rounded px-1">
                                Hapus
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="bg-white border border-line rounded-2xl p-5">
            <h2 class="font-semibold text-ink text-sm mb-4">Tambah mapel baru</h2>
            <form method="POST" action="{{ route('teacher.subjects.store') }}" class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                @csrf
                <div>
                    <label for="subject_id" class="block text-xs font-medium text-ink mb-1.5">Mata pelajaran</label>
                    <select id="subject_id" name="subject_id"
                        class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        <option value="">Pilih mapel</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}" @selected(old('subject_id') == $subject->id)>{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    @error('subject_id') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="level" class="block text-xs font-medium text-ink mb-1.5">Jenjang</label>
                    <select id="level" name="level"
                        class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        <option value="">Pilih jenjang</option>
                        @foreach(['SD', 'SMP', 'SMA', 'Umum'] as $lvl)
                            <option value="{{ $lvl }}" @selected(old('level') == $lvl)>{{ $lvl }}</option>
                        @endforeach
                    </select>
                    @error('level') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="price_per_hour" class="block text-xs font-medium text-ink mb-1.5">Harga per jam</label>
                    <input id="price_per_hour" type="number" name="price_per_hour" min="10000" step="1000" value="{{ old('price_per_hour') }}" placeholder="Contoh: 100000"
                        class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                    @error('price_per_hour') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div class="sm:col-span-3">
                    <button type="submit" class="bg-board text-white rounded-lg px-5 py-2.5 text-sm font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
                        Tambah mapel
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
