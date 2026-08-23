<x-layouts.app title="Jadwal — TemanLes">
    <x-teacher-subnav />

    @php $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']; @endphp

    <div class="mb-8">
        <h1 class="font-display text-2xl font-semibold text-ink mb-1">Jadwal Ketersediaan</h1>
        <p class="text-ink-muted text-sm">Atur hari dan jam kamu bisa mengajar — murid hanya bisa booking di slot ini</p>
    </div>

    <div class="max-w-2xl space-y-6">
        @if($availabilities->isEmpty())
            <div class="text-center py-10 border border-dashed border-line rounded-2xl text-sm text-ink-muted">
                Belum ada jadwal. Murid tidak akan bisa booking sampai kamu menambahkan slot waktu.
            </div>
        @else
            <div class="bg-white border border-line rounded-2xl divide-y divide-line">
                @foreach($availabilities as $a)
                    <div class="p-4 flex items-center justify-between gap-3">
                        <div>
                            <span class="font-medium text-ink">{{ $hari[$a->day_of_week] }}</span>
                            <span class="text-ink-muted text-sm ml-2">{{ \Carbon\Carbon::parse($a->start_time)->format('H:i') }} – {{ \Carbon\Carbon::parse($a->end_time)->format('H:i') }}</span>
                        </div>
                        <form method="POST" action="{{ route('teacher.schedule.destroy', $a) }}" onsubmit="return confirm('Hapus slot jadwal {{ $hari[$a->day_of_week] }} ini?')">
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
            <h2 class="font-semibold text-ink text-sm mb-4">Tambah slot jadwal</h2>
            <form method="POST" action="{{ route('teacher.schedule.store') }}" class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                @csrf
                <div>
                    <label for="day_of_week" class="block text-xs font-medium text-ink mb-1.5">Hari</label>
                    <select id="day_of_week" name="day_of_week"
                        class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        <option value="">Pilih hari</option>
                        @foreach($hari as $i => $nama)
                            <option value="{{ $i }}" @selected(old('day_of_week') == $i)>{{ $nama }}</option>
                        @endforeach
                    </select>
                    @error('day_of_week') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="start_time" class="block text-xs font-medium text-ink mb-1.5">Jam mulai</label>
                    <input id="start_time" type="time" name="start_time" value="{{ old('start_time') }}"
                        class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                    @error('start_time') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="end_time" class="block text-xs font-medium text-ink mb-1.5">Jam selesai</label>
                    <input id="end_time" type="time" name="end_time" value="{{ old('end_time') }}"
                        class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                    @error('end_time') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                </div>
                <div class="sm:col-span-3">
                    <button type="submit" class="bg-board text-white rounded-lg px-5 py-2.5 text-sm font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
                        Tambah jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
