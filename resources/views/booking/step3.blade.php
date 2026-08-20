<x-layouts.app title="Booking - Ringkasan">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 space-y-4">
            <h3 class="font-semibold text-lg">Ringkasan Pesanan</h3>
            <dl class="text-sm divide-y divide-slate-100">
                <div class="flex justify-between py-2">
                    <dt class="text-slate-500">Mapel & Jenjang</dt>
                    <dd class="font-medium">{{ $tutorSubject->subject->name }} - {{ $tutorSubject->level }}</dd>
                </div>
                <div class="flex justify-between py-2">
                    <dt class="text-slate-500">Jadwal</dt>
                    <dd class="font-medium">{{ \Carbon\Carbon::parse($bookingData['scheduled_date'])->translatedFormat('d M Y') }}, {{ $bookingData['scheduled_time'] }}</dd>
                </div>
                <div class="flex justify-between py-2">
                    <dt class="text-slate-500">Durasi</dt>
                    <dd class="font-medium">{{ $bookingData['duration_minutes'] }} menit</dd>
                </div>
                <div class="flex justify-between py-2">
                    <dt class="text-slate-500">Mode</dt>
                    <dd class="font-medium">{{ $bookingData['teaching_mode'] === 'online' ? 'Online' : 'Tatap Muka' }}</dd>
                </div>
                @if($bookingData['teaching_mode'] === 'offline')
                    <div class="flex justify-between py-2">
                        <dt class="text-slate-500">Lokasi</dt>
                        <dd class="font-medium text-right max-w-[60%]">{{ $bookingData['location_address'] }}</dd>
                    </div>
                @endif
                <div class="flex justify-between py-3 text-base">
                    <dt class="font-semibold">Total Biaya</dt>
                    <dd class="font-bold text-indigo-600">Rp {{ number_format($total, 0, ',', '.') }}</dd>
                </div>
            </dl>

            <div class="flex gap-3">
                <a href="{{ route('booking.step2', $tutor) }}" class="flex-1 text-center border border-slate-300 rounded-lg py-3 font-medium hover:bg-slate-50">
                    Kembali
                </a>
                <form method="POST" action="{{ route('booking.confirm', $tutor) }}" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full bg-indigo-600 text-white rounded-lg py-3 font-medium hover:bg-indigo-700">
                        Konfirmasi & Lanjut Bayar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
