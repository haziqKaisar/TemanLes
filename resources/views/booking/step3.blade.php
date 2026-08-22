<x-layouts.app title="Ringkasan — TemanLes">
    <div class="max-w-2xl mx-auto">
        <x-booking-stepper :current="3" />

        <div class="bg-white border border-line rounded-2xl p-6">
            <h1 class="font-display text-xl font-semibold text-ink mb-5">Ringkasan pesanan</h1>

            <dl class="text-sm divide-y divide-dashed divide-line">
                <div class="flex justify-between py-3">
                    <dt class="text-ink-muted">Mapel &amp; jenjang</dt>
                    <dd class="font-medium text-ink text-right">{{ $tutorSubject->subject->name }} — {{ $tutorSubject->level }}</dd>
                </div>
                <div class="flex justify-between py-3">
                    <dt class="text-ink-muted">Jadwal</dt>
                    <dd class="font-medium text-ink text-right">{{ \Carbon\Carbon::parse($bookingData['scheduled_date'])->translatedFormat('d M Y') }}, {{ $bookingData['scheduled_time'] }}</dd>
                </div>
                <div class="flex justify-between py-3">
                    <dt class="text-ink-muted">Durasi</dt>
                    <dd class="font-medium text-ink">{{ $bookingData['duration_minutes'] }} menit</dd>
                </div>
                <div class="flex justify-between py-3">
                    <dt class="text-ink-muted">Cara belajar</dt>
                    <dd class="font-medium text-ink">{{ $bookingData['teaching_mode'] === 'online' ? 'Online' : 'Tatap muka' }}</dd>
                </div>
                @if($bookingData['teaching_mode'] === 'offline')
                    <div class="flex justify-between py-3">
                        <dt class="text-ink-muted">Lokasi</dt>
                        <dd class="font-medium text-ink text-right max-w-[65%]">{{ $bookingData['location_address'] }}</dd>
                    </div>
                @endif
            </dl>

            <div class="margin-mark bg-paper-alt/50 rounded-r-lg px-4 py-3 mt-4 flex justify-between items-baseline">
                <span class="font-medium text-ink">Total biaya</span>
                <span class="font-display font-semibold text-xl text-ink">Rp{{ number_format($total, 0, ',', '.') }}</span>
            </div>

            <div class="flex gap-3 mt-6">
                <a href="{{ route('booking.step2', $tutor) }}" class="flex-1 text-center border border-line rounded-lg py-3.5 font-medium text-ink hover:bg-paper-alt transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                    Kembali
                </a>
                <form method="POST" action="{{ route('booking.confirm', $tutor) }}" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full bg-board text-white rounded-lg py-3.5 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
                        Konfirmasi &amp; lanjut bayar
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
