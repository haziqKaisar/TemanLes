<x-layouts.app title="Jadwal — TemanLes">
    <x-teacher-subnav />

    @php $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']; @endphp

    <div id="teacher-content-wrapper">
        <div class="mb-8">
            <h1 class="font-display text-2xl sm:text-3xl font-bold text-ink tracking-tight mb-1">Jadwal Ketersediaan</h1>
            <p class="text-ink-muted text-sm font-medium">Atur hari dan jam kamu bisa mengajar — murid hanya bisa booking di slot ini</p>
        </div>

        <div class="space-y-8">
            <!-- 2-Column Desktop Section -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Left: List Jadwal Slot -->
                <div class="lg:col-span-7 space-y-4">
                    <div class="flex items-center justify-between">
                        <h2 class="font-display font-bold text-lg text-ink">Slot Jadwal Mengajar</h2>
                        <span class="text-xs font-semibold text-ink-muted">{{ $availabilities->count() }} Slot Aktif</span>
                    </div>

                    @if($availabilities->isEmpty())
                        <div class="bg-white border border-dashed border-line rounded-2xl p-10 text-center shadow-xs">
                            <div class="w-12 h-12 rounded-full bg-paper-alt flex items-center justify-center mx-auto text-ink-muted mb-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <h3 class="font-display font-bold text-ink text-base mb-1">Belum Ada Slot Jadwal</h3>
                            <p class="text-xs text-ink-muted max-w-sm mx-auto">Murid tidak dapat memesan les sebelum kamu menambahkan minimal 1 slot ketersediaan hari dan jam mengajar.</p>
                        </div>
                    @else
                        <div class="bg-white border border-line rounded-2xl divide-y divide-line/60 shadow-xs overflow-hidden">
                            @foreach($availabilities as $a)
                                <div class="p-5 flex items-center justify-between gap-4 hover:bg-paper/30 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-teal/20 text-board font-bold flex items-center justify-center text-sm shrink-0">
                                            {{ substr($hari[$a->day_of_week], 0, 3) }}
                                        </div>
                                        <div>
                                            <p class="font-display font-bold text-ink text-base">{{ $hari[$a->day_of_week] }}</p>
                                            <p class="text-xs font-semibold text-board flex items-center gap-1 mt-0.5">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                {{ \Carbon\Carbon::parse($a->start_time)->format('H:i') }} – {{ \Carbon\Carbon::parse($a->end_time)->format('H:i') }} WIB
                                            </p>
                                        </div>
                                    </div>

                                    <form method="POST" action="{{ route('teacher.schedule.destroy', $a) }}" onsubmit="return confirm('Hapus slot jadwal {{ $hari[$a->day_of_week] }} ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-ink-muted hover:text-board font-semibold text-xs px-3 py-2 rounded-xl hover:bg-paper transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Right: Desktop Graphic/Illustration Card -->
                <div class="lg:col-span-5">
                    <div class="bg-paper-alt/80 border border-line rounded-2xl p-8 text-center flex flex-col items-center justify-center space-y-4 shadow-xs min-h-[320px]">
                        <div class="relative w-28 h-28 flex items-center justify-center">
                            <div class="absolute inset-0 rounded-3xl bg-teal/30 rotate-6"></div>
                            <div class="relative w-24 h-24 rounded-2xl bg-white border border-line flex flex-col items-center justify-center text-board shadow-xs">
                                <svg class="w-10 h-10 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span class="text-[10px] font-black uppercase tracking-wider text-board">Jadwal Les</span>
                            </div>
                            <div class="absolute -bottom-2 -right-2 w-10 h-10 rounded-full bg-board text-white flex items-center justify-center shadow-md">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <h3 class="font-display font-bold text-ink text-base">Atur Slot Waktu Fleksibel</h3>
                            <p class="text-xs text-ink-muted leading-relaxed max-w-xs mx-auto">
                                Tentukan hari dan jam belajar yang nyaman bagi kamu. Murid hanya dapat memilih jadwal yang aktif dalam slot ketersediaan ini.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Card: Form Tambah Slot Jadwal -->
            <div class="bg-white border border-line rounded-2xl p-6 sm:p-8 shadow-xs">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-line">
                    <div class="w-10 h-10 rounded-xl bg-teal/20 text-board flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <div>
                        <h2 class="font-display font-bold text-lg text-ink">Tambah Slot Jadwal</h2>
                        <p class="text-xs text-ink-muted">Pilih hari beserta waktu mulai dan selesai mengajar</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('teacher.schedule.store') }}" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="day_of_week" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Hari</label>
                            <select id="day_of_week" name="day_of_week"
                                class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                                <option value="">Pilih hari...</option>
                                @foreach($hari as $i => $nama)
                                    <option value="{{ $i }}" @selected(old('day_of_week') == $i)>{{ $nama }}</option>
                                @endforeach
                            </select>
                            @error('day_of_week') <p class="text-mark text-xs font-semibold mt-1.5">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="start_time" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Jam Mulai</label>
                            <input id="start_time" type="time" name="start_time" value="{{ old('start_time') }}"
                                class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                            @error('start_time') <p class="text-mark text-xs font-semibold mt-1.5">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="end_time" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Jam Selesai</label>
                            <input id="end_time" type="time" name="end_time" value="{{ old('end_time') }}"
                                class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                            @error('end_time') <p class="text-mark text-xs font-semibold mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex justify-end pt-2">
                        <button type="submit" class="w-full sm:w-auto bg-board text-white rounded-xl px-8 py-3.5 font-bold hover:bg-board-light shadow-xs transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board inline-flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Tambah Slot Jadwal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>

