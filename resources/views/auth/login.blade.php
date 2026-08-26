<x-guest-layout title="Masuk — TemanLes">

    <h1 class="font-display text-3xl font-semibold text-ink mb-2">Halo, selamat datang kembali</h1>
    <p class="text-ink-muted mb-8">Masuk untuk lanjut cari &amp; booking guru privat</p>

    @if (session('status'))
        <div role="status" class="mb-6 bg-success/10 text-success text-sm rounded-lg px-4 py-3">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-ink mb-1.5">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                class="w-full rounded-lg border border-line px-3.5 py-3 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board"
                placeholder="nama@email.com">
            @error('email') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-ink mb-1.5">Kata sandi</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full rounded-lg border border-line px-3.5 py-3 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board"
                placeholder="••••••••">
            @error('password') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-between text-sm">
            <label class="flex items-center gap-2 text-ink-muted">
                <input type="checkbox" name="remember" class="rounded border-line w-4 h-4 accent-board">
                Ingat saya
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-board font-medium hover:text-board-light focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded px-1">
                    Lupa kata sandi?
                </a>
            @endif
        </div>

        <button type="submit" class="w-full bg-board text-white rounded-lg py-3.5 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
            Masuk
        </button>
    </form>

    <p class="text-sm text-ink-muted mt-8">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-board font-medium hover:text-board-light focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded px-1">Daftar</a>
    </p>

</x-guest-layout>
