<x-layouts.app title="Booking - Pilih Mapel & Jadwal">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <div class="flex items-center gap-3 mb-6 pb-6 border-b border-slate-100">
                <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center font-bold text-indigo-600">
                    {{ substr($tutor->user->name, 0, 1) }}
                </div>
                <div>
                    <p class="font-semibold">{{ $tutor->user->name }}</p>
                    <p class="text-xs text-slate-500">{{ $tutor->headline }}</p>
                </div>
            </div>

            @if($availabilities->isNotEmpty())
    <div class="bg-indigo-50 border border-indigo-100 rounded-lg p-4 mb-5 text-sm">
        <p class="font-medium text-indigo-700 mb-2">📅 Jadwal Ketersediaan Guru</p>
        <div class="flex flex-wrap gap-2">
            @php
                $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            @endphp
            @foreach($availabilities as $a)
                <span class="bg-white border border-indigo-200 text-indigo-700 px-3 py-1 rounded-full text-xs">
                    {{ $hari[$a->day_of_week] }}: {{ \Carbon\Carbon::parse($a->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($a->end_time)->format('H:i') }}
                </span>
            @endforeach
        </div>
    </div>
@else
    <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 mb-5 text-sm text-amber-700">
        ⚠️ Guru ini belum mengatur jadwal ketersediaan. Booking mungkin tidak akan berhasil.
    </div>
@endif

            <form method="POST" action="{{ route('booking.step1.store', $tutor) }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium mb-1.5">Pilih Mata Pelajaran & Jenjang</label>
                    <select name="tutor_subject_id" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">-- Pilih --</option>
                        @foreach($subjects as $ts)
                            <option value="{{ $ts->id }}" @selected(old('tutor_subject_id') == $ts->id)>
                                {{ $ts->subject->name }} - Jenjang {{ $ts->level }} (Rp {{ number_format($ts->price_per_hour, 0, ',', '.') }}/jam)
                            </option>
                        @endforeach
                    </select>
                    @error('tutor_subject_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1.5">Tanggal</label>
                        <input type="date" name="scheduled_date" value="{{ old('scheduled_date') }}" min="{{ now()->format('Y-m-d') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        @error('scheduled_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1.5">Jam Mulai</label>
                        <input type="time" name="scheduled_time" value="{{ old('scheduled_time') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        @error('scheduled_time') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1.5">Durasi</label>
                    <div class="flex gap-3">
                        @foreach([60 => '1 Jam', 90 => '1.5 Jam', 120 => '2 Jam'] as $val => $lbl)
                            <label class="flex-1">
                                <input type="radio" name="duration_minutes" value="{{ $val }}" class="sr-only peer" @checked(old('duration_minutes', 60) == $val)>
                                <div class="text-center py-2 rounded-lg border border-slate-300 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 cursor-pointer text-sm">
                                    {{ $lbl }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white rounded-lg py-3 font-medium hover:bg-indigo-700">
                    Lanjutkan
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
