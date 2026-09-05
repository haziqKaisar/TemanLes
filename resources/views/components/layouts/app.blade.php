@props(['title' => 'TemanLes', 'compact' => false])

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'TemanLes' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body class="bg-paper text-ink antialiased">

    <a href="#konten" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-50 focus:bg-board focus:text-white focus:px-4 focus:py-2 focus:rounded-lg focus:text-sm focus:font-medium">
        Lewati ke konten utama
    </a>

    <nav class="bg-white/95 backdrop-blur border-b border-line sticky top-0 z-40 shadow-xs" aria-label="Navigasi utama">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 font-display font-bold text-xl text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded-lg transition-transform hover:scale-[1.01]">
                <span class="inline-flex items-center justify-center h-7 w-7 rounded-lg bg-teal/20 text-board font-extrabold text-sm">TL</span>
                <span>Teman <span class="text-board font-extrabold">Les</span></span>
            </a>

            <div class="flex items-center gap-4 sm:gap-6 text-sm">
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('marketplace') }}" class="hidden md:inline text-ink-muted hover:text-board font-medium">Cari Guru</a>
                    @endif
                    @if(auth()->user()->isStudent())
                        <a href="{{ route('student.dashboard') }}" class="text-ink hover:text-board font-semibold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded px-1.5 py-1">Pesanan Saya</a>
                    @elseif(auth()->user()->isTeacher())
                        <a href="{{ route('teacher.dashboard') }}" class="text-ink hover:text-board font-semibold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded px-1.5 py-1 flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-board"></span>
                            Dashboard Guru
                        </a>
                    @elseif(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-ink hover:text-board font-semibold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded px-1.5 py-1">Panel Admin</a>
                    @endif
                    <span class="hidden sm:inline text-ink-muted border-l border-line pl-4 font-medium">Halo, <span class="text-ink font-semibold">{{ auth()->user()->name }}</span></span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-ink-muted hover:text-board font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded px-2 py-1 transition-colors">
                            Keluar
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-ink hover:text-board font-semibold px-2 py-1">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-board text-white px-4 py-2 rounded-xl font-medium hover:bg-board-light transition-colors shadow-xs">
                        Daftar
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main id="konten" @class([
        'max-w-7xl mx-auto px-4 sm:px-6 lg:px-8',
        'py-4 sm:py-5 lg:h-[calc(100vh-64px)] lg:overflow-hidden' => $compact,
        'py-6 sm:py-8' => ! $compact,
    ])>
        @if (session('success'))
            <div role="status" class="mb-8 bg-white border border-line margin-mark rounded-r-lg px-4 py-3 text-sm flex items-start gap-3">
                <svg class="w-5 h-5 text-success shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-ink">{{ session('success') }}</span>
            </div>
        @endif
                @if (session('error'))
            <div role="alert" class="mb-8 bg-white border border-line border-l-[3px] border-l-mark rounded-r-lg px-4 py-3 text-sm flex items-start gap-3">
                <svg class="w-5 h-5 text-mark shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-5a1 1 0 112 0 1 1 0 01-2 0zm1-9a1 1 0 011 1v5a1 1 0 11-2 0V5a1 1 0 011-1z" clip-rule="evenodd"/></svg>
                <span class="text-ink">{{ session('error') }}</span>
            </div>
        @endif

        {{ $slot }}
    </main>

    @unless($compact)
    <footer class="border-t border-line mt-16 bg-white/60">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-7 text-sm text-ink-muted flex flex-col sm:flex-row items-center justify-between gap-3">
            <p>&copy; {{ date('Y') }} TemanLes. All rights reserved.</p>
            <div class="flex items-center gap-5">
                <a href="{{ route('home') }}" class="hover:text-board">Beranda</a>
                @auth <a href="{{ route('marketplace') }}" class="hover:text-board">Cari Guru</a> @endauth
                <a href="#" class="hover:text-board">Syarat &amp; Ketentuan</a>
            </div>
        </div>
    </footer>
    @endunless
</body>
</html>
