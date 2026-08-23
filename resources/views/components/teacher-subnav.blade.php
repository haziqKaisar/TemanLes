<nav class="flex items-center gap-1 border-b border-line mb-8 -mt-2 overflow-x-auto" aria-label="Navigasi area guru">
    <a href="{{ route('teacher.dashboard') }}"
        @class([
            'px-4 py-3 text-sm font-medium border-b-2 -mb-px transition-colors whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded-t',
            'border-board text-board' => request()->routeIs('teacher.dashboard'),
            'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs('teacher.dashboard'),
        ])
        @if(request()->routeIs('teacher.dashboard')) aria-current="page" @endif>
        Dashboard
    </a>
    <a href="{{ route('teacher.profile.edit') }}"
        @class([
            'px-4 py-3 text-sm font-medium border-b-2 -mb-px transition-colors whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded-t',
            'border-board text-board' => request()->routeIs('teacher.profile.*'),
            'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs('teacher.profile.*'),
        ])
        @if(request()->routeIs('teacher.profile.*')) aria-current="page" @endif>
        Edit Profil
    </a>
    <a href="{{ route('teacher.subjects.index') }}"
        @class([
            'px-4 py-3 text-sm font-medium border-b-2 -mb-px transition-colors whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded-t',
            'border-board text-board' => request()->routeIs('teacher.subjects.*'),
            'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs('teacher.subjects.*'),
        ])
        @if(request()->routeIs('teacher.subjects.*')) aria-current="page" @endif>
        Mapel &amp; Harga
    </a>
    <a href="{{ route('teacher.schedule.index') }}"
        @class([
            'px-4 py-3 text-sm font-medium border-b-2 -mb-px transition-colors whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded-t',
            'border-board text-board' => request()->routeIs('teacher.schedule.*'),
            'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs('teacher.schedule.*'),
        ])
        @if(request()->routeIs('teacher.schedule.*')) aria-current="page" @endif>
        Jadwal
    </a>
    <a href="{{ route('teacher.withdraw') }}"
        @class([
            'px-4 py-3 text-sm font-medium border-b-2 -mb-px transition-colors whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded-t',
            'border-board text-board' => request()->routeIs('teacher.withdraw'),
            'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs('teacher.withdraw'),
        ])
        @if(request()->routeIs('teacher.withdraw')) aria-current="page" @endif>
        Tarik Saldo
    </a>
</nav>
