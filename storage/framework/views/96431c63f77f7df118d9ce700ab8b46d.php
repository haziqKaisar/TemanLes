<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title' => 'TemanLes', 'compact' => false]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title' => 'TemanLes', 'compact' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($title ?? 'TemanLes'); ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body class="bg-paper text-ink antialiased">

    <a href="#konten" class="sr-only focus:not-sr-only focus:fixed focus:top-3 focus:left-3 focus:z-50 focus:bg-board focus:text-white focus:px-4 focus:py-2 focus:rounded-lg focus:text-sm focus:font-medium">
        Lewati ke konten utama
    </a>

    <nav class="bg-paper border-b border-line sticky top-0 z-40" aria-label="Navigasi utama">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between">
            <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2.5 font-display font-semibold text-xl text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-paper rounded">
                <span class="inline-block h-3 w-3 rounded-full bg-gradient-to-br from-board to-mark shadow-sm ring-2 ring-mark/30" aria-hidden="true"></span>
                Teman <span class="text-board">Les</span>
            </a>

            <div class="flex items-center gap-3 sm:gap-5 text-sm">
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->isAdmin()): ?>
                        <a href="<?php echo e(route('marketplace')); ?>" class="hidden md:inline text-ink-muted hover:text-board font-medium">Cari Guru</a>
                    <?php endif; ?>
                    <?php if(auth()->user()->isStudent()): ?>
                        <a href="<?php echo e(route('student.dashboard')); ?>" class="text-ink hover:text-board font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-paper rounded px-1">Pesanan Saya</a>
                    <?php elseif(auth()->user()->isTeacher()): ?>
                        <a href="<?php echo e(route('teacher.dashboard')); ?>" class="text-ink hover:text-board font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-paper rounded px-1">Dashboard Guru</a>
                    <?php elseif(auth()->user()->isAdmin()): ?>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-ink hover:text-board font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-paper rounded px-1">Panel Admin</a>
                    <?php endif; ?>
                    <span class="hidden sm:inline text-ink-muted">Halo, <?php echo e(auth()->user()->name); ?></span>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="text-ink-muted hover:text-mark font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-paper rounded px-1">
                            Keluar
                        </button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="text-ink hover:text-board font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-paper rounded px-1">Masuk</a>
                    <a href="<?php echo e(route('register')); ?>" class="bg-gradient-to-r from-board to-chalk text-white px-4 py-2.5 rounded-lg font-medium shadow-sm shadow-board/20 hover:to-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-paper">
                        Daftar
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main id="konten" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'max-w-6xl mx-auto px-4 sm:px-6',
        'py-4 sm:py-5 lg:h-[calc(100vh-64px)] lg:overflow-hidden' => $compact,
        'py-8 sm:py-10' => ! $compact,
    ]); ?>">
        <?php if(session('success')): ?>
            <div role="status" class="mb-8 bg-white border border-line margin-mark rounded-r-lg px-4 py-3 text-sm flex items-start gap-3">
                <svg class="w-5 h-5 text-success shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/>
                </svg>
                <span class="text-ink"><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>
                <?php if(session('error')): ?>
            <div role="alert" class="mb-8 bg-white border border-line border-l-[3px] border-l-mark rounded-r-lg px-4 py-3 text-sm flex items-start gap-3">
                <svg class="w-5 h-5 text-mark shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-5a1 1 0 112 0 1 1 0 01-2 0zm1-9a1 1 0 011 1v5a1 1 0 11-2 0V5a1 1 0 011-1z" clip-rule="evenodd"/></svg>
                <span class="text-ink"><?php echo e(session('error')); ?></span>
            </div>
        <?php endif; ?>

        <?php echo e($slot); ?>

    </main>

    <?php if (! ($compact)): ?>
    <footer class="border-t border-line mt-16 bg-white/60">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-7 text-sm text-ink-muted flex flex-col sm:flex-row items-center justify-between gap-3">
            <p>&copy; <?php echo e(date('Y')); ?> TemanLes. All rights reserved.</p>
            <div class="flex items-center gap-5">
                <a href="<?php echo e(route('home')); ?>" class="hover:text-board">Beranda</a>
                <?php if(auth()->guard()->check()): ?> <a href="<?php echo e(route('marketplace')); ?>" class="hover:text-board">Cari Guru</a> <?php endif; ?>
                <a href="#" class="hover:text-board">Syarat &amp; Ketentuan</a>
            </div>
        </div>
    </footer>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\laragon\www\TemanLes\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>