<x-layouts.app title="Edit Profil — TemanLes">
    <x-teacher-subnav />

    <div id="teacher-content-wrapper">
        <div class="mb-8">
            <h1 class="font-display text-2xl sm:text-3xl font-bold text-ink tracking-tight mb-1">Edit Profil</h1>
            <p class="text-ink-muted text-sm font-medium">Perbarui informasi diri dan profil mengajar yang tampil ke murid di marketplace</p>
        </div>

        <form method="POST" action="{{ route('teacher.profile.update') }}" class="space-y-8" x-data="gpsProfilePicker(@js($tutor->default_latitude), @js($tutor->default_longitude))" x-init="init()">
            @csrf
            @method('PUT')

            <!-- Section 1: Data Diri -->
            <div class="bg-white border border-line rounded-2xl p-6 sm:p-8 shadow-xs">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-line">
                    <div class="w-10 h-10 rounded-xl bg-teal/20 text-board flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <div>
                        <h2 class="font-display font-bold text-lg text-ink">Data Diri</h2>
                        <p class="text-xs text-ink-muted">Informasi identitas akun kamu</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Nama Lengkap</label>
                        <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                            class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                        @error('name') <p class="text-mark text-xs font-semibold mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Nomor HP <span class="text-ink-muted font-normal lowercase">(opsional)</span></label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                            class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all" placeholder="Contoh: 081234567890">
                        @error('phone') <p class="text-mark text-xs font-semibold mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Section 2: Profil Mengajar -->
            <div class="bg-white border border-line rounded-2xl p-6 sm:p-8 shadow-xs">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-line">
                    <div class="w-10 h-10 rounded-xl bg-teal/20 text-board flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <div>
                        <h2 class="font-display font-bold text-lg text-ink">Profil Mengajar</h2>
                        <p class="text-xs text-ink-muted">Highlight keahlian dan deskripsi diri untuk menarik minat calon murid</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label for="headline" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Judul Singkat Profil</label>
                        <input id="headline" type="text" name="headline" value="{{ old('headline', $tutor->headline) }}" placeholder="Contoh: Guru Matematika & Fisika Berpengalaman 5 Tahun"
                            class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                        @error('headline') <p class="text-mark text-xs font-semibold mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="bio" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Tentang Saya</label>
                        <textarea id="bio" name="bio" rows="4"
                            class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all"
                            placeholder="Ceritakan latar belakang pendidikan, metode mengajar, serta prestasi murid yang pernah kamu bimbing">{{ old('bio', $tutor->bio) }}</textarea>
                        @error('bio') <p class="text-mark text-xs font-semibold mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="education" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Pendidikan</label>
                            <input id="education" type="text" name="education" value="{{ old('education', $tutor->education) }}" placeholder="Contoh: S1 Pendidikan Matematika - UI"
                                class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                            @error('education') <p class="text-mark text-xs font-semibold mt-1.5">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="experience_years" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Lama Pengalaman (Tahun)</label>
                            <input id="experience_years" type="number" min="0" max="60" name="experience_years" value="{{ old('experience_years', $tutor->experience_years) }}"
                                class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                            @error('experience_years') <p class="text-mark text-xs font-semibold mt-1.5">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 3: Cara Mengajar & Lokasi -->
            <div class="bg-white border border-line rounded-2xl p-6 sm:p-8 shadow-xs">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-line">
                    <div class="w-10 h-10 rounded-xl bg-teal/20 text-board flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h2 class="font-display font-bold text-lg text-ink">Cara & Lokasi Mengajar</h2>
                        <p class="text-xs text-ink-muted">Pilih preferensi sistem belajar dan lokasi jangkauan les kamu</p>
                    </div>
                </div>

                <fieldset class="mb-6">
                    <legend class="block text-xs font-bold uppercase tracking-wider text-ink mb-3">Sistem Belajar</legend>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        @foreach(['online' => 'Online', 'offline' => 'Tatap Muka', 'both' => 'Keduanya'] as $val => $lbl)
                            <label class="block cursor-pointer">
                                <input type="radio" name="teaching_mode" value="{{ $val }}" class="sr-only peer" x-on:change="toggleMap('{{ $val }}')" @checked(old('teaching_mode', $tutor->teaching_mode) == $val)>
                                <div class="text-center py-3.5 px-4 rounded-xl border border-line peer-checked:border-board peer-checked:bg-board/10 peer-checked:text-board peer-checked:font-bold peer-focus-visible:ring-2 peer-focus-visible:ring-board text-sm font-semibold text-ink transition-all hover:bg-paper/50">
                                    {{ $lbl }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                    @error('teaching_mode') <p class="text-mark text-xs font-semibold mt-1.5">{{ $message }}</p> @enderror
                </fieldset>

                <div x-show="showMap" x-cloak class="space-y-4 pt-2">
                    <p class="text-xs font-bold uppercase tracking-wider text-ink">Lokasi Mengajar Default</p>
                    <div id="map-picker-profile" class="w-full h-72 rounded-xl border border-line overflow-hidden shadow-xs"></div>

                    <input type="hidden" name="default_latitude" id="default_latitude" value="{{ old('default_latitude', $tutor->default_latitude) }}">
                    <input type="hidden" name="default_longitude" id="default_longitude" value="{{ old('default_longitude', $tutor->default_longitude) }}">

                    <div>
                        <label for="default_address" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Alamat Lengkap</label>
                        <textarea id="default_address" name="default_address" rows="2"
                            class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all"
                            placeholder="Alamat patokan lokasi tempat tinggal / area mengajar kamu">{{ old('default_address', $tutor->default_address) }}</textarea>
                        @error('default_address') <p class="text-mark text-xs font-semibold mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <!-- Submit CTA -->
            <div class="flex items-center justify-end pt-2">
                <button type="submit" class="w-full sm:w-auto bg-board text-white rounded-xl px-8 py-3.5 font-bold hover:bg-board-light shadow-xs transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <script>
        function gpsProfilePicker(initLat, initLng) {
            return {
                map: null,
                marker: null,
                showMap: {{ in_array(old('teaching_mode', $tutor->teaching_mode), ['offline', 'both']) ? 'true' : 'false' }},

                init() {
                    if (this.showMap) this.$nextTick(() => this.initMap(initLat, initLng));
                },

                toggleMap(mode) {
                    this.showMap = mode === 'offline' || mode === 'both';
                    if (this.showMap && !this.map) {
                        this.$nextTick(() => this.initMap(initLat, initLng));
                    }
                },

                initMap(lat, lng) {
                    const startLat = lat || -6.5971, startLng = lng || 106.8060;
                    this.map = L.map('map-picker-profile').setView([startLat, startLng], 13);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; OpenStreetMap contributors'
                    }).addTo(this.map);
                    this.marker = L.marker([startLat, startLng], { draggable: true }).addTo(this.map);
                    this.marker.on('dragend', (e) => this.setLocation(e.target.getLatLng()));
                    this.map.on('click', (e) => { this.marker.setLatLng(e.latlng); this.setLocation(e.latlng); });
                },

                setLocation(latlng) {
                    document.getElementById('default_latitude').value = latlng.lat;
                    document.getElementById('default_longitude').value = latlng.lng;
                }
            }
        }
    </script>
</x-layouts.app>

