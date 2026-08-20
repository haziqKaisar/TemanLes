<x-layouts.app title="Cari Guru Les Private">
    <div class="mb-8">
        <h1 class="text-2xl font-bold mb-1">Cari Guru Les Private</h1>
        <p class="text-slate-500 text-sm">Temukan guru terbaik sesuai kebutuhan belajarmu</p>
    </div>

    <form method="GET" action="{{ route('home') }}" class="bg-white rounded-2xl border border-slate-100 p-4 mb-6 grid grid-cols-1 md:grid-cols-5 gap-3">
        <select name="subject_id" onchange="this.form.submit()" class="rounded-lg border-slate-300 text-sm">
            <option value="">Semua Mapel</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" @selected(request('subject_id') == $subject->id)>{{ $subject->name }}</option>
            @endforeach
        </select>

        <select name="level" onchange="this.form.submit()" class="rounded-lg border-slate-300 text-sm">
            <option value="">Semua Jenjang</option>
            @foreach(['SD', 'SMP', 'SMA', 'Umum'] as $lvl)
                <option value="{{ $lvl }}" @selected(request('level') == $lvl)>{{ $lvl }}</option>
            @endforeach
        </select>

        <select name="mode" onchange="this.form.submit()" class="rounded-lg border-slate-300 text-sm">
            <option value="">Semua Mode</option>
            <option value="online" @selected(request('mode') == 'online')>Online</option>
            <option value="offline" @selected(request('mode') == 'offline')>Tatap Muka</option>
        </select>

        <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Harga min" class="rounded-lg border-slate-300 text-sm">
        <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Harga max" class="rounded-lg border-slate-300 text-sm">

        <button type="submit" class="hidden">Filter</button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        @forelse($tutors as $tutor)
            <div class="bg-white rounded-2xl border border-slate-100 p-5 hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center font-bold text-indigo-600">
                        {{ substr($tutor->user->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="font-semibold">{{ $tutor->user->name }}</p>
                        <p class="text-xs text-slate-500">{{ $tutor->headline }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-1 text-amber-500 text-sm mb-3">
                    ⭐ {{ number_format($tutor->rating_avg, 1) }}
                    <span class="text-slate-400">({{ $tutor->rating_count }} ulasan)</span>
                </div>

                <div class="flex flex-wrap gap-1.5 mb-4">
                    @foreach($tutor->tutorSubjects->take(3) as $ts)
                        <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded-full">{{ $ts->subject->name }} · {{ $ts->level }}</span>
                    @endforeach
                </div>

                <a href="{{ route('booking.step1', $tutor) }}" class="block text-center bg-indigo-600 text-white rounded-lg py-2.5 text-sm font-medium hover:bg-indigo-700">
                    Lihat & Booking
                </a>
            </div>
        @empty
            <div class="col-span-3 text-center py-16 text-slate-400">Belum ada guru yang cocok dengan filter kamu.</div>
        @endforelse
    </div>

    <div class="mt-6">{{ $tutors->links() }}</div>
</x-layouts.app>
