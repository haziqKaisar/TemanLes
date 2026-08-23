<nav class="flex items-center gap-1 border-b border-line mb-8 -mt-2" aria-label="Navigasi area murid">
    <a href="{{ route('marketplace') }}"
        @class([
            'px-4 py-3 text-sm font-medium border-b-2 -mb-px transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded-t',
            'border-board text-board' => request()->routeIs('marketplace'),
            'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs('marketplace'),
        ])
        @if(request()->routeIs('marketplace')) aria-current="page" @endif>
        Cari Guru
    </a>
    <a href="{{ route('student.dashboard') }}"
        @class([
            'px-4 py-3 text-sm font-medium border-b-2 -mb-px transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded-t',
            'border-board text-board' => request()->routeIs('student.dashboard'),
            'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs('student.dashboard'),
        ])
        @if(request()->routeIs('student.dashboard')) aria-current="page" @endif>
        Pesanan Saya
    </a>
</nav>
