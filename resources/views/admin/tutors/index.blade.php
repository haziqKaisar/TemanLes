<x-layouts.app title="Verifikasi Guru — TemanLes">
    <h1 class="font-display text-xl font-semibold text-ink mb-6">Verifikasi Guru</h1>

    <form method="GET" action="{{ route('admin.tutors') }}" class="mb-6">
        <select name="status" onchange="this.form.submit()" class="rounded-lg border border-line px-3 py-2 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
            <option value="pending" @selected($status == 'pending')>Menunggu verifikasi</option>
            <option value="verified" @selected($status == 'verified')>Terverifikasi</option>
            <option value="rejected" @selected($status == 'rejected')>Ditolak</option>
        </select>
    </form>

    <div class="space-y-4">
        @forelse($tutors as $tutor)
            <div class="bg-white border border-line rounded-2xl p-5">
                <div class="flex items-start justify-between gap-4 mb-3">
                    <div>
                        <p class="font-semibold text-ink">{{ $tutor->user->name }}</p>
                        <p class="text-sm text-ink-muted">{{ $tutor->user->email }}</p>
                    </div>
                    <span @class([
                        'px-2.5 py-1 rounded-full text-xs font-medium shrink-0',
                        'bg-chalk/20 text-ink' => $tutor->verification_status === 'pending',
                        'bg-success/10 text-success' => $tutor->verification_status === 'verified',
                        'bg-mark/10 text-mark' => $tutor->verification_status === 'rejected',
                    ])>{{ ucfirst($tutor->verification_status) }}</span>
                </div>

                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm mb-4">
                    <div><dt class="text-ink-muted">Judul singkat</dt><dd class="text-ink">{{ $tutor->headline ?: '— belum diisi' }}</dd></div>
                    <div><dt class="text-ink-muted">Pendidikan</dt><dd class="text-ink">{{ $tutor->education ?: '— belum diisi' }}</dd></div>
                    <div><dt class="text-ink-muted">Pengalaman</dt><dd class="text-ink">{{ $tutor->experience_years }} tahun</dd></div>
                    <div><dt class="text-ink-muted">Daftar sejak</dt><dd class="text-ink">{{ $tutor->created_at->format('d M Y') }}</dd></div>
                </dl>

                @if($tutor->verification_status === 'pending')
                    <div class="flex flex-wrap items-start gap-3 chalk-divider pt-4">
                        <form method="POST" action="{{ route('admin.tutors.approve', $tutor) }}" onsubmit="return confirm('Verifikasi guru {{ $tutor->user->name }}?')">
                            @csrf
                            <button type="submit" class="bg-success text-white px-4 py-2 rounded-lg text-sm font-medium hover:opacity-90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-success">
                                ACC / Verifikasi
                            </button>
                        </form>

                        <details class="flex-1 min-w-[240px]">
                            <summary class="cursor-pointer text-sm font-medium text-mark list-none px-4 py-2 border border-mark/30 rounded-lg inline-block focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark">
                                Tolak
                            </summary>
                            <form method="POST" action="{{ route('admin.tutors.reject', $tutor) }}" class="mt-3">
                                @csrf
                                <textarea name="rejection_reason" rows="2" placeholder="Alasan penolakan" required
                                    class="w-full rounded-lg border border-line px-3 py-2 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark"></textarea>
                                <button type="submit" class="mt-2 bg-mark text-white px-4 py-2 rounded-lg text-sm font-medium hover:opacity-90 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark">
                                    Kirim penolakan
                                </button>
                            </form>
                        </details>
                    </div>
                @endif
            </div>
        @empty
            <div class="text-center py-12 text-ink-muted text-sm border border-dashed border-line rounded-2xl">Tidak ada data.</div>
        @endforelse
    </div>

    <div class="mt-6">{{ $tutors->links() }}</div>
</x-layouts.app>
