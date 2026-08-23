<x-layouts.app title="Edit Profil — TemanLes">
    <x-teacher-subnav />

    <div class="mb-8">
        <h1 class="font-display text-2xl font-semibold text-ink mb-1">Edit Profil</h1>
        <p class="text-ink-muted text-sm">Perbarui informasi yang tampil ke murid di marketplace</p>
    </div>

    <div class="max-w-2xl bg-white border border-line rounded-2xl p-6">
        <form method="POST" action="{{ route('teacher.profile.update') }}" class="space-y-6" x-data="gpsProfilePicker(@js($tutor->default_latitude), @js($tutor->default_longitude))" x-init="init()">
            @csrf
            @method('PUT')

            <div>
                <h2 class="font-semibold text-ink mb-4 text-sm">Data diri</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-ink mb-1.5">Nama lengkap</label>
                        <input id="name" type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        @error('name') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-ink mb-1.5">Nomor HP <span class="text-ink-muted font-normal">(opsional)</span></label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}"
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        @error('phone') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="chalk-divider pt-6">
                <h2 class="font-semibold text-ink mb-4 text-sm">Profil mengajar</h2>

                <div class="mb-4">
                    <label for="headline" class="block text-sm font-medium text-ink mb-1.5">Judul singkat</label>
                    <input id="headline" type="text" name="headline" value="{{ old('headline', $tutor->headline) }}" placeholder="Contoh: Guru Matematika & Fisika Berpengalaman 5 Tahun"
                        class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                    @error('headline') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label for="bio" class="block text-sm font-medium text-ink mb-1.5">Tentang saya</label>
                    <textarea id="bio" name="bio" rows="4"
                        class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board"
                        placeholder="Ceritakan pengalaman dan gaya mengajarmu">{{ old('bio', $tutor->bio) }}</textarea>
                    @error('bio') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="education" class="block text-sm font-medium text-ink mb-1.5">Pendidikan</label>
                        <input id="education" type="text" name="education" value="{{ old('education', $tutor->education) }}" placeholder="Contoh: S1 Pendidikan Matematika - UI"
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        @error('education') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="experience_years" class="block text-sm font-medium text-ink mb-1.5">Lama pengalaman (tahun)</label>
                        <input id="experience_years" type="number" min="0" max="60" name="experience_years" value="{{ old('experience_years', $tutor->experience_years) }}"
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        @error('experience_years') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="chalk-divider pt-6">
                <h2 class="font-semibold text-ink mb-4 text-sm">Cara mengajar</h2>

                <fieldset class="mb-4">
                    <legend class="sr-only">Cara mengajar</legend>
                    <div class="grid grid-cols-3 gap-3">
                        @foreach(['online' => 'Online', 'offline' => 'Tatap muka', 'both' => 'Keduanya'] as $val => $lbl)
                            <label>
                                <input type="radio" name="teaching_mode" value="{{ $val }}" class="sr-only peer" x-on:change="toggleMap('{{ $val }}')" @checked(old('teaching_mode', $tutor->teaching_mode) == $val)>
                                <div class="text-center py-3 rounded-lg border border-line peer-checked:border-board peer-checked:bg-board/8 peer-checked:text-board peer-focus-visible:ring-2 peer-focus-visible:ring-board cursor-pointer text-sm font-medium text-ink transition-colors">
                                    {{ $lbl }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                    @error('teaching_mode') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                </fieldset>

                <div x-show="showMap" x-cloak class="space-y-3">
                    <p class="text-sm font-medium text-ink">Lokasi mengajar default</p>
                    <div id="map-picker-profile" class="w-full h-64 rounded-lg border border-line"></div>

                    <input type="hidden" name="default_latitude" id="default_latitude" value="{{ old('default_latitude', $tutor->default_latitude) }}">
                    <input type="hidden" name="default_longitude" id="default_longitude" value="{{ old('default_longitude', $tutor->default_longitude) }}">

                    <div>
                        <label for="default_address" class="block text-sm font-medium text-ink mb-1.5">Alamat</label>
                        <textarea id="default_address" name="default_address" rows="2"
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">{{ old('default_address', $tutor->default_address) }}</textarea>
                        @error('default_address') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="bg-board text-white rounded-lg px-6 py-3 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
                Simpan perubahan
            </button>
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
