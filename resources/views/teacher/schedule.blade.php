<x-layouts.app title="Jadwal — TemanLes">
    <x-teacher-subnav />

    @php $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']; @endphp

    <!-- Header Section -->
    <div class="mb-8">
        <span class="inline-block text-xs font-semibold text-[#3B7597] bg-[#6FD1D7]/20 px-3 py-1 rounded-md mb-2">
            Pengaturan Operasional
        </span>
        <h1 class="font-display text-2xl sm:text-3xl font-bold text-[#093C5D]">Jadwal Ketersediaan</h1>
        <p class="text-[#3B7597] text-sm mt-0.5">Atur hari dan jam kamu bisa mengajar — murid hanya bisa booking di slot ini</p>
    </div>

    <div class="max-w-3xl space-y-8">
        <!-- Daftar Slot Jadwal -->
        @if($availabilities->isEmpty())
            <div class="text-center py-12 px-4 border-2 border-dashed border-[#6FD1D7]/60 rounded-2xl bg-[#6FD1D7]/5">
                <p class="text-sm font-semibold text-[#093C5D] mb-1">Belum Ada Jadwal Mengajar</p>
                <p class="text-xs text-[#3B7597]">Murid tidak akan bisa melakukan pemesanan sampai kamu menambahkan minimal satu slot waktu.</p>
            </div>
        @else
            <div class="space-y-3">
                <h2 class="font-bold text-[#093C5D] text-base mb-3">Slot Waktu Aktif</h2>
                <div class="bg-white border border-gray-200 rounded-2xl divide-y divide-gray-100 shadow-sm overflow-hidden">
                    @foreach($availabilities as $a)
                        <div x-data="{ isEditing: false }" class="p-4 sm:p-5 border-l-4 border-l-[#093C5D] hover:bg-[#6FD1D7]/5 transition-colors">
                            
                            <!-- Tampilan Normal -->
                            <div x-show="!isEditing" class="flex items-center justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    <span class="inline-block text-xs font-bold text-[#093C5D] bg-[#5DF8D8]/40 px-3 py-1 rounded-lg">
                                        {{ $hari[$a->day_of_week] }}
                                    </span>
                                    <span class="font-bold text-[#093C5D] text-sm sm:text-base">
                                        {{ \Carbon\Carbon::parse($a->start_time)->format('H:i') }} – {{ \Carbon\Carbon::parse($a->end_time)->format('H:i') }}
                                    </span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <!-- Tombol Edit -->
                                    <button type="button" @click="isEditing = true" class="text-xs font-bold text-[#093C5D] hover:text-[#3B7597] hover:bg-[#6FD1D7]/20 px-2.5 py-1.5 rounded-lg transition-all">
                                        Edit
                                    </button>

                                    <!-- Tombol Hapus -->
                                    <form method="POST" action="{{ route('teacher.schedule.destroy', $a) }}" onsubmit="return confirm('Hapus slot jadwal {{ $hari[$a->day_of_week] }} ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-bold text-rose-600 hover:text-rose-800 hover:bg-rose-50 px-2.5 py-1.5 rounded-lg transition-all">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Tampilan Form Edit Inline -->
                            <div x-show="isEditing" x-cloak class="pt-1">
                                <form method="POST" action="{{ route('teacher.schedule.update', $a) }}" class="grid grid-cols-1 sm:grid-cols-4 gap-3 items-end">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div>
                                        <label class="block text-xs font-semibold text-[#093C5D] mb-1">Hari</label>
                                        <select name="day_of_week" class="w-full rounded-xl border border-gray-300 bg-white px-2.5 py-1.5 text-xs text-[#093C5D] focus:border-[#3B7597] focus:outline-none">
                                            @foreach($hari as $i => $nama)
                                                <option value="{{ $i }}" @selected($a->day_of_week == $i)>{{ $nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-semibold text-[#093C5D] mb-1">Jam Mulai</label>
                                        <input type="time" name="start_time" value="{{ \Carbon\Carbon::parse($a->start_time)->format('H:i') }}" class="w-full rounded-xl border border-gray-300 bg-white px-2.5 py-1.5 text-xs text-[#093C5D] focus:border-[#3B7597] focus:outline-none">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-semibold text-[#093C5D] mb-1">Jam Selesai</label>
                                        <input type="time" name="end_time" value="{{ \Carbon\Carbon::parse($a->end_time)->format('H:i') }}" class="w-full rounded-xl border border-gray-300 bg-white px-2.5 py-1.5 text-xs text-[#093C5D] focus:border-[#3B7597] focus:outline-none">
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <button type="submit" class="bg-[#093C5D] text-[#5DF8D8] text-xs font-bold px-3 py-2 rounded-xl hover:bg-[#3B7597] transition-all">
                                            Simpan
                                        </button>
                                        <button type="button" @click="isEditing = false" class="bg-gray-100 text-gray-600 text-xs font-bold px-3 py-2 rounded-xl hover:bg-gray-200 transition-all">
                                            Batal
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Form Tambah Slot Jadwal -->
        <div class="bg-[#6FD1D7]/10 border border-[#6FD1D7]/40 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center gap-2 mb-4">
                <div class="w-2 h-5 bg-[#093C5D] rounded-full"></div>
                <h2 class="font-bold text-[#093C5D] text-base">Tambah Slot Jadwal</h2>
            </div>

            <form method="POST" action="{{ route('teacher.schedule.store') }}" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                @csrf
                <div>
                    <label for="day_of_week" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Hari</label>
                    <select id="day_of_week" name="day_of_week"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                        <option value="">Pilih hari</option>
                        @foreach($hari as $i => $nama)
                            <option value="{{ $i }}" @selected(old('day_of_week') == $i)>{{ $nama }}</option>
                        @endforeach
                    </select>
                    @error('day_of_week') <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="start_time" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Jam Mulai</label>
                    <input id="start_time" type="time" name="start_time" value="{{ old('start_time') }}"
                        class="w-full rounded-xl border border-gray-300 bg-[#ffffff] px-3 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                    @error('start_time') <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="end_time" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Jam Selesai</label>
                    <input id="end_time" type="time" name="end_time" value="{{ old('end_time') }}"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                    @error('end_time') <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="sm:col-span-3 pt-2">
                    <button type="submit" class="w-full sm:w-auto bg-[#093C5D] text-[#5DF8D8] rounded-xl px-6 py-3 text-sm font-bold hover:bg-[#3B7597] hover:text-white transition-all shadow-md focus-visible:outline-none">
                        + Tambah Jadwal
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>