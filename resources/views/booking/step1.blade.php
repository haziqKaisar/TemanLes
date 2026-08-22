<x-layouts.app title="Pilih Jadwal — TemanLes">
    <div class="max-w-2xl mx-auto">
        <x-booking-stepper :current="1" />

        <div class="bg-white border border-line rounded-2xl p-6">
            <div class="flex items-center gap-3 mb-6 chalk-divider pb-6">
                <div class="w-12 h-12 rounded-full bg-board flex items-center justify-center font-display font-semibold text-white" aria-hidden="true">
                    {{ substr($tutor->user->name, 0, 1) }}
                </div>
                <div>
                    <p class="font-semibold text-ink">{{ $tutor->user->name }}</p>
                    <p class="text-xs text-ink-muted">{{ $tutor->headline }}</p>
                </div>
            </div>

            @if($availabilities->isNotEmpty())
                <div class="bg-paper-alt/50 border border-line rounded-lg p-4 mb-6">
                    <p class="text-sm font-medium text-ink mb-2">Jadwal tersedia</p>
                    <div class="flex flex-wrap gap-2">
                        @php $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']; @endphp
                        @foreach($availabilities as $a)
                            <span class="bg-white border border-line text-ink px-2.5 py-1 rounded-full text-xs">
                                {{ $hari[$a->day_of_week] }} {{ \Carbon\Carbon::parse($a->start_time)->format('H:i') }}–{{ \Carbon\Carbon::parse($a->end_time)->format('H:i') }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="bg-mark/8 border border-mark/20 rounded-lg p-4 mb-6 text-sm text-mark">
                    Guru ini belum mengatur jadwal ketersediaan.
                </div>
            @endif

            <form method="POST" action="{{ route('booking.step1.store', $tutor) }}" class="space-y-5">
                @csrf

                <div>
                    <label for="tutor_subject_id" class="block text-sm font-medium text-ink mb-1.5">Mata pelajaran &amp; jenjang</label>
                    <select id="tutor_subject_id" name="tutor_subject_id" @if($errors->has('tutor_subject_id')) aria-invalid="true" aria-describedby="err-subject" @endif
                        class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        <option value="">Pilih mapel</option>
                        @foreach($subjects as $ts)
                            <option value="{{ $ts->id }}" @selected(old('tutor_subject_id') == $ts->id)>
                                {{ $ts->subject->name }} — {{ $ts->level }} (Rp{{ number_format($ts->price_per_hour, 0, ',', '.') }}/jam)
                            </option>
                        @endforeach
                    </select>
                    @error('tutor_subject_id') <p id="err-subject" class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="scheduled_date" class="block text-sm font-medium text-ink mb-1.5">Tanggal</label>
                        <input id="scheduled_date" type="date" name="scheduled_date" value="{{ old('scheduled_date') }}" min="{{ now()->format('Y-m-d') }}"
                            @if($errors->has('scheduled_date')) aria-invalid="true" aria-describedby="err-date" @endif
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        @error('scheduled_date') <p id="err-date" class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="scheduled_time" class="block text-sm font-medium text-ink mb-1.5">Jam mulai</label>
                        <input id="scheduled_time" type="time" name="scheduled_time" value="{{ old('scheduled_time') }}"
                            @if($errors->has('scheduled_time')) aria-invalid="true" aria-describedby="err-time" @endif
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        @error('scheduled_time') <p id="err-time" class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>

                <fieldset>
                    <legend class="block text-sm font-medium text-ink mb-1.5">Durasi</legend>
                    <div class="flex gap-3">
                        @foreach([60 => '1 jam', 90 => '1,5 jam', 120 => '2 jam'] as $val => $lbl)
                            <label class="flex-1">
                                <input type="radio" name="duration_minutes" value="{{ $val }}" class="sr-only peer" @checked(old('duration_minutes', 60) == $val)>
                                <div class="text-center py-3 rounded-lg border border-line peer-checked:border-board peer-checked:bg-board/8 peer-checked:text-board peer-focus-visible:ring-2 peer-focus-visible:ring-board cursor-pointer text-sm font-medium text-ink transition-colors">
                                    {{ $lbl }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                </fieldset>

                <button type="submit" class="w-full bg-board text-white rounded-lg py-3.5 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
                    Lanjutkan
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
