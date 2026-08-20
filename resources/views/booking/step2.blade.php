<x-layouts.app title="Booking - Mode & Lokasi">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <form method="POST" action="{{ route('booking.step2.store', $tutor) }}" id="step2-form" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium mb-1.5">Mode Belajar</label>
                    <div class="grid grid-cols-2 gap-3">
                        @if(in_array($tutor->teaching_mode, ['online', 'both']))
                            <label>
                                <input type="radio" name="teaching_mode" value="online" class="sr-only peer" onchange="toggleLocation(false)" @checked(old('teaching_mode') == 'online')>
                                <div class="text-center py-3 rounded-lg border border-slate-300 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 cursor-pointer text-sm font-medium">
                                    💻 Online
                                </div>
                            </label>
                        @endif
                        @if(in_array($tutor->teaching_mode, ['offline', 'both']))
                            <label>
                                <input type="radio" name="teaching_mode" value="offline" class="sr-only peer" onchange="toggleLocation(true)" @checked(old('teaching_mode') == 'offline')>
                                <div class="text-center py-3 rounded-lg border border-slate-300 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 cursor-pointer text-sm font-medium">
                                    📍 Tatap Muka (Offline)
                                </div>
                            </label>
                        @endif
                    </div>
                    @error('teaching_mode') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div id="location-section" class="hidden">
                    <label class="block text-sm font-medium mb-1.5">Tentukan Titik Lokasi di Peta</label>
                    <p class="text-xs text-slate-500 mb-2">Klik pada peta atau geser marker untuk menandai lokasi pertemuan.</p>

                    <div id="map-picker" class="w-full h-72 rounded-lg border border-slate-300"></div>

                    <button type="button" onclick="locateMe()" class="mt-2 text-xs text-indigo-600 hover:underline">
                        📍 Gunakan lokasi saya saat ini
                    </button>

                    <input type="hidden" name="location_lat" id="location_lat">
                    <input type="hidden" name="location_lng" id="location_lng">

                    <div class="mt-3">
                        <label class="block text-sm font-medium mb-1.5">Alamat Lengkap</label>
                        <textarea name="location_address" id="location_address" rows="2"
                            class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Alamat akan terisi otomatis, silakan sesuaikan jika perlu">{{ old('location_address') }}</textarea>
                        @error('location_address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mt-3">
                        <label class="block text-sm font-medium mb-1.5">Patokan / Catatan Lokasi (opsional)</label>
                        <input type="text" name="location_note" value="{{ old('location_note') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Contoh: Rumah cat hijau sebelah minimarket">
                    </div>

                    @error('location_lat') <p class="text-red-500 text-xs mt-1">Silakan tandai titik lokasi pada peta.</p> @enderror
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('booking.step1', $tutor) }}" class="flex-1 text-center border border-slate-300 rounded-lg py-3 font-medium hover:bg-slate-50">
                        Kembali
                    </a>
                    <button type="submit" class="flex-1 bg-indigo-600 text-white rounded-lg py-3 font-medium hover:bg-indigo-700">
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
            const startLat = -6.5971;
            const startLng = 106.8060;

            map = L.map('map-picker').setView([startLat, startLng], 14);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            marker = L.marker([startLat, startLng], { draggable: true }).addTo(map);

            marker.on('dragend', (e) => setLocation(e.target.getLatLng()));
            map.on('click', (e) => {
                marker.setLatLng(e.latlng);
                setLocation(e.latlng);
            });
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
                if (data?.display_name) {
                    document.getElementById('location_address').value = data.display_name;
                }
            } catch (e) {}
        }

        // Kalau sebelumnya user sudah pilih offline (misal validasi gagal & balik ke sini), buka otomatis
        @if(old('teaching_mode') === 'offline')
            toggleLocation(true);
        @endif
    </script>
</x-layouts.app>
