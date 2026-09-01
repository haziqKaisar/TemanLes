<x-layouts.app title="Menunggu Verifikasi — TemanLes">
    <div class="max-w-lg mx-auto text-center bg-white border border-line rounded-2xl p-10 mt-8">
        @if($tutor && $tutor->verification_status === 'rejected')
            <div class="w-14 h-14 rounded-full bg-mark/10 text-mark flex items-center justify-center mx-auto mb-5">
                <svg class="w-7 h-7" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.7 7.29a1 1 0 00-1.4 1.42L8.59 10l-1.3 1.29a1 1 0 101.42 1.42L10 11.41l1.29 1.3a1 1 0 001.42-1.42L11.41 10l1.3-1.29a1 1 0 00-1.42-1.42L10 8.59l-1.29-1.3z" clip-rule="evenodd"/></svg>
            </div>
            <h1 class="font-display text-xl font-semibold text-ink mb-2">Pendaftaran ditolak</h1>
            <p class="text-sm text-ink-muted">
                @if($tutor->rejection_reason)
                    Alasan: {{ $tutor->rejection_reason }}
                @else
                    Admin menolak profil guru kamu. Hubungi tim TemanLes untuk info lebih lanjut.
                @endif
            </p>
        @else
            <div class="w-14 h-14 rounded-full bg-chalk/20 text-ink flex items-center justify-center mx-auto mb-5">
                <svg class="w-7 h-7" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.29.7l2.5 2.5a1 1 0 001.42-1.4L11 9.58V6z" clip-rule="evenodd"/></svg>
            </div>
            <h1 class="font-display text-xl font-semibold text-ink mb-2">Akun kamu sedang diverifikasi</h1>
            <p class="text-sm text-ink-muted">
                Tim TemanLes sedang meninjau pendaftaran kamu sebagai guru. Setelah disetujui, kamu bisa melengkapi profil, menambahkan mapel, dan mengatur jadwal mengajar.
            </p>
        @endif
    </div>
</x-layouts.app>
