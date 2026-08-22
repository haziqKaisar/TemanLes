<x-layouts.app title="Mode & Lokasi — TemanLes">
    <div class="max-w-2xl mx-auto">
        <x-booking-stepper :current="2" />

        <div class="bg-white border border-line rounded-2xl p-6">
            <form method="POST" action="{{ route('booking.step2.store', $tutor) }}" class="space-y-5">
                @csrf

                <fieldset>
                    <legend class="block text-sm font-medium text-ink mb-1.5">Cara belajar</legend>
                    <div class="grid grid-cols-2 gap-3">
                        @if(in_array($tutor->teaching_mode, ['online', 'both']))
                            <label>
                                <input type="radio" name="teaching_mode" value="online" class="sr-only peer" onchange="toggleLocation(false)" @checked(old('teaching_mode') == 'online')>
                                <div class="flex items-center justify-center gap-2 py-3.5 rounded-lg border border-line peer-checked:border-board peer-checked:bg-board/8 peer-checked:text-board peer-focus-visible:ring-2 peer-focus-visible:ring-board cursor-pointer text-sm font-medium text-ink transition-colors">
                                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2h-3l1 2H8l1-2H6a2 2 0 01-2-2V5z"/></svg>
                                    Online
                                </div>
                            </label>
                        @endif
                        @if(in_array($tutor->teaching_mode, ['offline', 'both']))
                            <label>
                                <input type="radio" name="teaching_mode" value="offline" class="sr-only peer" onchange="toggleLocation(true)" @checked(old('teaching_mode') == 'offline')>
                                <div class="flex items-center justify-center gap-2 py-3.5 rounded-lg border border-line peer-checked:border-board peer-checked:bg-board/8 peer-checked:text-board peer-focus-visible:ring-2 peer-focus-visible:ring-board cursor-pointer text-sm font-medium text-ink transition-colors">
                                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 2a6 6 0 016 6c0 4.5-6 10-6 10S4 12.5 4 8a6 6 0 016-6zm0 8a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                    Tatap muka
                                </div>
                            </label>
                        @endif
                    </div>
                    @error('teaching_mode') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                </fieldset>

                <div id="location-section" class="hidden space-y-4">
                    <div class="bg-paper-alt/50 border border-dashed border-line rounded-lg p-3 text-xs text-ink-muted">
                        Klik pada peta atau geser penanda untuk menandai lokasi pertemuan.
                    </div>

                    <div>
                        <div id="map-picker" class="w-full h-64 rounded-lg border border-line" role="application" aria-label="Peta pemilih lokasi"></div>
                        <button type="button" onclick="locateMe()" class="mt-2 flex items-center gap-1.5 text-xs text-board font-medium hover:text-board-light focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded px-1">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.06a5.002 5.002 0 00-3.94 3.94H4a1 1 0 100 2h.06a5.002 5.002 0 003.94 3.94V15a1 1 0 102 0v-.06a5.002 5.002 0 003.94-3.94H15a1 1 0 100-2h-.06A5.002 5.002 0 0011 5.06V5zm-1 8a3 3 0 110-6 3 3 0 010 6z" clip-rule="evenodd"/></svg>
                            Gunakan lokasi saya saat ini
                        </button>
                    </div>

                    <input type="hidden" name="location_lat" id="location_lat">
                    <input type="hidden" name="location_lng" id="location_lng">

                    <div>
                        <label for="location_address" class="block text-sm font-medium text-ink mb-1.5">Alamat lengkap</label>
                        <textarea id="location_address" name="location_address" rows="2"
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board"
                            placeholder="Terisi otomatis dari peta, sesuaikan bila perlu">{{ old('location_address') }}</textarea>
                        @error('location_address') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="location_note" class="block text-sm font-medium text-ink mb-1.5">Patokan <span class="text-ink-muted font-normal">(opsional)</span></label>
                        <input id="location_note" type="text" name="location_note" value="{{ old('location_note') }}"
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board"
                            placeholder="Contoh: rumah cat hijau sebelah minimarket">
                    </div>

                    @error('location_lat') <p class="text-mark text-xs">Silakan tandai titik lokasi pada peta.</p> @enderror
                </div>

                <div class="flex gap-3 pt-2">
                    <a href="{{ route('booking.step1', $tutor) }}" class="flex-1 text-center border border-line rounded-lg py-3.5 font-medium text-ink hover:bg-paper-alt transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        Kembali
                    </a>
                    <button type="submit" class="flex-1 bg-board text-white rounded-lg py-3.5 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
                        Lanjutkan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let map, marker;

        function toggleLocation(show) {
            const section = document.getElementById('location-section');
            if (show) {
                section.classList.remove('hidden');
                if (!map) initMap();
            } else {
                section.classList.add('hidden');
            }
        }

        function initMap() {
            const startLat = -6.5971, startLng = 106.8060;
            map = L.map('map-picker').setView([startLat, startLng], 14);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
            marker = L.marker([startLat, startLng], { draggable: true }).addTo(map);
            marker.on('dragend', (e) => setLocation(e.target.getLatLng()));
            map.on('click', (e) => { marker.setLatLng(e.latlng); setLocation(e.latlng); });
        }

        function locateMe() {
            if (!navigator.geolocation) return;
            navigator.geolocation.getCurrentPosition((pos) => {
                const latlng = { lat: pos.coords.latitude, lng: pos.coords.longitude };
                map.setView(latlng, 16);
                marker.setLatLng(latlng);
                setLocation(latlng);
            });
        }

        async function setLocation(latlng) {
            document.getElementById('location_lat').value = latlng.lat;
            document.getElementById('location_lng').value = latlng.lng;
            try {
                const res = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latlng.lat}&lon=${latlng.lng}`);
                const data = await res.json();
                if (data?.display_name) document.getElementById('location_address').value = data.display_name;
            } catch (e) {}
        }

        @if(old('teaching_mode') === 'offline')
            toggleLocation(true);
        @endif
    </script>
</x-layouts.app>
