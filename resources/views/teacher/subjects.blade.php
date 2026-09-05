<x-layouts.app title="Mapel & Harga — TemanLes">
    <x-teacher-subnav />

    <!-- Header Section -->
    <div class="mb-8">
        <span class="inline-block text-xs font-semibold text-[#3B7597] bg-[#6FD1D7]/20 px-3 py-1 rounded-md mb-2">
            Pengaturan Layanan
        </span>
        <h1 class="font-display text-2xl sm:text-3xl font-bold text-[#093C5D]">Mapel &amp; Harga</h1>
        <p class="text-[#3B7597] text-sm mt-0.5">Atur mata pelajaran, jenjang, dan tarif per jam yang kamu tawarkan</p>
    </div>

    <div class="max-w-3xl space-y-8">
        <!-- Daftar Mapel Terpasang -->
        @if($tutorSubjects->isEmpty())
            <div class="text-center py-12 px-4 border-2 border-dashed border-[#6FD1D7]/60 rounded-2xl bg-[#6FD1D7]/5">
                <p class="text-sm font-semibold text-[#093C5D] mb-1">Belum Ada Mapel Ditambahkan</p>
                <p class="text-xs text-[#3B7597]">Tambahkan minimal satu mata pelajaran di bawah ini agar profil kamu muncul di marketplace.</p>
            </div>
        @else
            <div class="space-y-3">
                <h2 class="font-bold text-[#093C5D] text-base mb-3">Mata Pelajaran Aktif</h2>
                <div class="bg-white border border-gray-200 rounded-2xl divide-y divide-gray-100 shadow-sm overflow-hidden">
                    @foreach($tutorSubjects as $ts)
                        <div class="p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-l-4 border-l-[#093C5D] hover:bg-[#6FD1D7]/5 transition-colors">
                            <div class="flex-1 min-w-0">
                                <p class="font-bold text-[#093C5D] text-base">{{ $ts->subject->name }}</p>
                                <span class="inline-block mt-1 text-xs font-bold text-[#093C5D] bg-[#5DF8D8]/40 px-2.5 py-0.5 rounded-full">
                                    {{ $ts->level }}
                                </span>
                            </div>

                            <div class="flex items-center gap-3 self-end sm:self-auto">
                                <form method="POST" action="{{ route('teacher.subjects.update', $ts) }}" class="flex items-center gap-1.5 bg-gray-50 p-1.5 rounded-xl border border-gray-200">
                                    @csrf
                                    @method('PUT')
                                    <label for="price-{{ $ts->id }}" class="sr-only">Harga per jam untuk {{ $ts->subject->name }} {{ $ts->level }}</label>
                                    <span class="text-xs font-bold text-[#3B7597] pl-1">Rp</span>
                                    <input id="price-{{ $ts->id }}" type="number" name="price_per_hour" value="{{ $ts->price_per_hour }}" min="10000" step="1000"
                                        class="w-28 rounded-lg border border-gray-300 bg-white px-2 py-1 text-sm font-semibold text-[#093C5D] focus:border-[#3B7597] focus:ring-1 focus:ring-[#3B7597] focus:outline-none">
                                    <span class="text-xs font-medium text-gray-500">/jam</span>
                                    <button type="submit" class="bg-[#093C5D] text-[#5DF8D8] text-xs font-bold px-3 py-1.5 rounded-lg hover:bg-[#3B7597] hover:text-white transition-all shadow-xs">
                                        Simpan
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('teacher.subjects.destroy', $ts) }}" onsubmit="return confirm('Hapus {{ $ts->subject->name }} — {{ $ts->level }} dari daftar mapel kamu?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-rose-600 hover:text-rose-800 hover:bg-rose-50 px-2.5 py-2 rounded-lg transition-all">
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
        <div class="bg-[#6FD1D7]/10 border border-[#6FD1D7]/40 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center gap-2 mb-4">
                <div class="w-2 h-5 bg-[#093C5D] rounded-full"></div>
                <h2 class="font-bold text-[#093C5D] text-base">Tambah Mapel Baru</h2>
            </div>

            <form method="POST" action="{{ route('teacher.subjects.store') }}" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                @csrf
                <div>
                    <label for="subject_id" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Mata Pelajaran</label>
                    <select id="subject_id" name="subject_id"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                        <option value="">Pilih mapel</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}" @selected(old('subject_id') == $subject->id)>{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    @error('subject_id') <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="level" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Jenjang</label>
                    <select id="level" name="level"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                        <option value="">Pilih jenjang</option>
                        @foreach(['SD', 'SMP', 'SMA', 'Umum'] as $lvl)
                            <option value="{{ $lvl }}" @selected(old('level') == $lvl)>{{ $lvl }}</option>
                        @endforeach
                    </select>
                    @error('level') <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="price_per_hour" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Harga per jam (Rp)</label>
                    <input id="price_per_hour" type="number" name="price_per_hour" min="10000" step="1000" value="{{ old('price_per_hour') }}" placeholder="Contoh: 100000"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                    @error('price_per_hour') <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="sm:col-span-3 pt-2">
                    <button type="submit" class="w-full sm:w-auto bg-[#093C5D] text-[#5DF8D8] rounded-xl px-6 py-3 text-sm font-bold hover:bg-[#3B7597] hover:text-white transition-all shadow-md focus-visible:outline-none">
                        + Tambah Mapel
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>