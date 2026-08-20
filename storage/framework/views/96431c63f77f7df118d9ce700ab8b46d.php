<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($title ?? 'Marketplace Guru Les Private'); ?></title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="<?php echo e(route('home')); ?>" class="font-bold text-lg text-indigo-600">
                Guru<span class="text-slate-800">Les</span>
            </a>
            <div class="flex items-center gap-4 text-sm">
                <?php if(auth()->guard()->check()): ?>
                    <span class="text-slate-500">Halo, <?php echo e(auth()->user()->name); ?></span>
                    <?php if(auth()->user()->isStudent()): ?>
                        <a href="<?php echo e(route('student.dashboard')); ?>" class="hover:text-indigo-600">Dashboard Saya</a>
                    <?php elseif(auth()->user()->isTeacher()): ?>
                        <a href="<?php echo e(route('teacher.dashboard')); ?>" class="hover:text-indigo-600">Dashboard Guru</a>
                    <?php elseif(auth()->user()->isAdmin()): ?>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="hover:text-indigo-600">Panel Admin</a>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button class="text-red-500 hover:text-red-600">Keluar</button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="hover:text-indigo-600">Masuk</a>
                    <a href="<?php echo e(route('register')); ?>" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Daftar</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <?php if(session('success')): ?>
            <div class="mb-6 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 text-sm">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php echo e($slot); ?>

    </main>
</body>
</html>
<?php /**PATH C:\laragon\www\TemanLes\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>