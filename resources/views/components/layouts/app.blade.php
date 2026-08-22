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

    <nav class="bg-paper border-b border-line sticky top-0 z-40" aria-label="Navigasi utama">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2 font-display font-semibold text-lg text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-paper rounded">
                <span class="inline-block w-2 h-2 rounded-full bg-mark" aria-hidden="true"></span>
                Teman<span class="text-board">Les</span>
            </a>

            <div class="flex items-center gap-3 sm:gap-5 text-sm">
                @auth
                    <span class="hidden sm:inline text-ink-muted">Halo, {{ auth()->user()->name }}</span>
                    @if(auth()->user()->isStudent())
                        <a href="{{ route('student.dashboard') }}" class="text-ink hover:text-board font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-paper rounded px-1">Pesanan Saya</a>
                    @elseif(auth()->user()->isTeacher())
                        <a href="{{ route('teacher.dashboard') }}" class="text-ink hover:text-board font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-paper rounded px-1">Dashboard Guru</a>
                    @elseif(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="text-ink hover:text-board font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-paper rounded px-1">Panel Admin</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-ink-muted hover:text-mark font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-paper rounded px-1">
                            Keluar
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-ink hover:text-board font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-paper rounded px-1">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-board text-white px-4 py-2.5 rounded-lg font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-paper">
                        Daftar
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main id="konten" class="max-w-6xl mx-auto px-4 sm:px-6 py-10">
        @if (session('success'))
            <div role="status" class="mb-8 bg-white border border-line margin-mark rounded-r-lg px-4 py-3 text-sm flex items-start gap-3">
                <svg class="w-5 h-5 text-success shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-ink">{{ session('success') }}</span>
            </div>
        @endif

        {{ $slot }}
    </main>

    <footer class="border-t border-line mt-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 text-sm text-ink-muted flex flex-col sm:flex-row items-center justify-between gap-3">
            <p>&copy; {{ date('Y') }} TemanLes. Belajar bareng, di mana saja.</p>
        </div>
    </footer>
</body>
</html>
