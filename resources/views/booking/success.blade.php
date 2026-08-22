<x-layouts.app title="Berhasil — TemanLes">
    <div class="max-w-lg mx-auto text-center bg-white border border-line rounded-2xl p-10">
        <div class="w-14 h-14 rounded-full bg-success/12 text-success flex items-center justify-center mx-auto mb-5">
            <svg class="w-7 h-7" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
        </div>
        <h1 class="font-display text-xl font-semibold text-ink mb-2">Bukti transfer terkirim</h1>
        <p class="text-sm text-ink-muted mb-6">Tim kami akan memverifikasi pembayaran dalam 1×24 jam. Kamu bisa pantau statusnya di halaman pesanan.</p>
        <a href="{{ route('student.dashboard') }}" class="inline-block bg-board text-white rounded-lg px-6 py-3 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
            Lihat pesanan saya
        </a>
    </div>
</x-layouts.app>
