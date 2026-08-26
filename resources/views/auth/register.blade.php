<x-guest-layout title="Daftar — TemanLes">

    <h1 class="font-display text-3xl font-semibold text-ink mb-2">Yuk, mulai belajar</h1>
    <p class="text-ink-muted mb-8">Daftar gratis, cari guru yang cocok buat kamu</p>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-ink mb-1.5">Nama lengkap</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                class="w-full rounded-lg border border-line px-3.5 py-3 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
            @error('name') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-ink mb-1.5">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                class="w-full rounded-lg border border-line px-3.5 py-3 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board"
                placeholder="nama@email.com">
            @error('email') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
        </div>

        <fieldset>
            <legend class="block text-sm font-medium text-ink mb-1.5">Daftar sebagai</legend>
            <div class="grid grid-cols-2 gap-3">
                <label>
                    <input type="radio" name="role" value="student" class="sr-only peer" @checked(old('role', 'student') === 'student')>
                    <div class="text-center py-3 rounded-lg border border-line peer-checked:border-board peer-checked:bg-board/8 peer-checked:text-board peer-focus-visible:ring-2 peer-focus-visible:ring-board cursor-pointer text-sm font-medium text-ink transition-colors">
                        Murid
                    </div>
                </label>
                <label>
                    <input type="radio" name="role" value="teacher" class="sr-only peer" @checked(old('role') === 'teacher')>
                    <div class="text-center py-3 rounded-lg border border-line peer-checked:border-board peer-checked:bg-board/8 peer-checked:text-board peer-focus-visible:ring-2 peer-focus-visible:ring-board cursor-pointer text-sm font-medium text-ink transition-colors">
                        Guru
                    </div>
                </label>
            </div>
            <p class="text-xs text-ink-muted mt-2">Daftar sebagai guru? Profil kamu perlu diverifikasi admin dulu sebelum tampil ke murid.</p>
            @error('role') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
        </fieldset>

        <div>
            <label for="password" class="block text-sm font-medium text-ink mb-1.5">Kata sandi</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                class="w-full rounded-lg border border-line px-3.5 py-3 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board"
                placeholder="••••••••">
            @error('password') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-ink mb-1.5">Konfirmasi kata sandi</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                class="w-full rounded-lg border border-line px-3.5 py-3 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board"
                placeholder="••••••••">
            @error('password_confirmation') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="w-full bg-board text-white rounded-lg py-3.5 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
            Daftar
        </button>
    </form>

    <p class="text-sm text-ink-muted mt-8">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-board font-medium hover:text-board-light focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded px-1">Masuk</a>
    </p>

</x-guest-layout>
