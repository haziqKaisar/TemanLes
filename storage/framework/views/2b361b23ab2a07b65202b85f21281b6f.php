<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Panel Admin']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Panel Admin']); ?>
    <?php ($maxBookings = max($weeklyBookings->max('total'), 1)); ?>

    <section class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <p class="mb-1 text-xs font-semibold tracking-wider text-board">PANEL ADMIN</p>
            <h1 class="font-display text-3xl font-bold tracking-tight text-ink">Selamat datang kembali, <?php echo e(strtok(auth()->user()->name, ' ')); ?> <span aria-hidden="true">👋</span></h1>
            <p class="mt-1 text-sm text-ink-muted">Pantau aktivitas TemanLes dan kelola transaksi platform hari ini.</p>
        </div>
        <div class="flex min-w-[205px] items-center gap-3 rounded-xl border border-line bg-white px-4 py-3">
            <span class="grid h-9 w-9 place-items-center rounded-lg bg-paper-alt text-board" aria-hidden="true"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/></svg></span>
            <div><p class="text-xs font-semibold text-ink"><?php echo e(now()->translatedFormat('l, d F Y')); ?></p><p class="mt-0.5 text-xs text-ink-muted"><?php echo e(now()->format('H:i')); ?> WIB</p></div>
        </div>
    </section>

    <section class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4" aria-label="Ringkasan platform">
        <?php if (isset($component)) { $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.stat-card','data' => ['label' => 'Guru Aktif','value' => $stats['activeTutors'],'tone' => 'blue','icon' => 'users']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Guru Aktif','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stats['activeTutors']),'tone' => 'blue','icon' => 'users']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $attributes = $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $component = $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.stat-card','data' => ['label' => 'Siswa Terdaftar','value' => $stats['students'],'tone' => 'sky','icon' => 'academic']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Siswa Terdaftar','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stats['students']),'tone' => 'sky','icon' => 'academic']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $attributes = $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $component = $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.stat-card','data' => ['label' => 'Booking Hari Ini','value' => $stats['todayBookings'],'tone' => 'green','icon' => 'calendar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Booking Hari Ini','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stats['todayBookings']),'tone' => 'green','icon' => 'calendar']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $attributes = $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $component = $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin.stat-card','data' => ['label' => 'Pendapatan Bulan Ini','value' => 'Rp ' . number_format($stats['monthlyRevenue'], 0, ',', '.'),'tone' => 'teal','icon' => 'wallet']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin.stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Pendapatan Bulan Ini','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Rp ' . number_format($stats['monthlyRevenue'], 0, ',', '.')),'tone' => 'teal','icon' => 'wallet']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $attributes = $__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__attributesOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6)): ?>
<?php $component = $__componentOriginal3c3cb599308b2d9971dae437d0b6bab6; ?>
<?php unset($__componentOriginal3c3cb599308b2d9971dae437d0b6bab6); ?>
<?php endif; ?>
    </section>

    <section class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-12">
        <div class="rounded-2xl border border-line bg-white p-6 lg:col-span-6">
            <div class="mb-4 flex items-center gap-2 text-ink"><svg class="h-5 w-5 text-success" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 9v4m0 4h.01M10.3 3.9 2.7 17a2 2 0 0 0 1.73 3h15.14a2 2 0 0 0 1.73-3L13.7 3.9a2 2 0 0 0-3.4 0Z"/></svg><h2 class="font-display text-lg font-bold">Perlu Perhatian</h2></div>
            <div class="space-y-3">
                <a href="<?php echo e(route('admin.payments')); ?>" class="group flex items-center gap-3 rounded-xl border border-chalk/50 bg-paper px-4 py-3 hover:border-board/40 hover:bg-paper-alt">
                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-chalk/30 text-success"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18M7 15h2"/></svg></span>
                    <span class="min-w-0 flex-1"><span class="block text-sm font-bold text-ink"><?php echo e($pendingPayments); ?> pembayaran menunggu verifikasi</span><span class="mt-0.5 block text-xs text-ink-muted">Ada bukti transfer yang perlu diperiksa.</span></span>
                    <span class="hidden items-center gap-1 text-xs font-bold text-success sm:flex">Periksa <span aria-hidden="true">›</span></span>
                </a>
                <a href="<?php echo e(route('admin.payouts')); ?>" class="group flex items-center gap-3 rounded-xl border border-line bg-paper px-4 py-3 hover:border-board/40 hover:bg-paper-alt">
                    <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-board/10 text-board"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/></svg></span>
                    <span class="min-w-0 flex-1"><span class="block text-sm font-bold text-ink"><?php echo e($pendingPayouts); ?> permintaan pencairan guru</span><span class="mt-0.5 block text-xs text-ink-muted">Guru sedang menunggu pencairan saldo.</span></span>
                    <span class="hidden items-center gap-1 text-xs font-bold text-board sm:flex">Lihat <span aria-hidden="true">›</span></span>
                </a>
                <a href="<?php echo e(route('admin.tutors')); ?>" class="bg-white rounded-2xl border border-line p-6 hover:shadow-md transition block">
            <p class="text-sm text-ink-muted mb-1">Verifikasi Guru</p>
            <p class="text-lg font-semibold text-ink">ACC pendaftaran guru baru &rarr;</p>
        </a>
            </div>
        </div>

        <a href="<?php echo e(route('admin.payments')); ?>" class="group rounded-2xl border border-line bg-white p-6 hover:border-board/40 lg:col-span-3">
            <span class="grid h-11 w-11 place-items-center rounded-xl bg-board/10 text-board"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18M7 15h2"/></svg></span>
            <p class="mt-3 text-sm font-bold text-ink">Verifikasi Pembayaran</p><p class="mt-1 text-2xl font-extrabold text-ink"><?php echo e($pendingPayments); ?></p><p class="mt-1 text-xs text-ink-muted">Pembayaran menunggu verifikasi</p>
            <span class="mt-4 flex items-center justify-center gap-2 rounded-lg bg-board px-3 py-2.5 text-sm font-bold text-white group-hover:bg-board-light">Cek Pembayaran <span aria-hidden="true">›</span></span>
        </a>

        <a href="<?php echo e(route('admin.payouts')); ?>" class="group rounded-2xl border border-line bg-white p-6 hover:border-success/40 lg:col-span-3">
            <span class="grid h-11 w-11 place-items-center rounded-xl bg-chalk/30 text-success"><svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6"/></svg></span>
            <p class="mt-3 text-sm font-bold text-ink">Penarikan Saldo Guru</p><p class="mt-1 text-2xl font-extrabold text-ink"><?php echo e($pendingPayouts); ?></p><p class="mt-1 text-xs text-ink-muted">Permintaan menunggu persetujuan</p>
            <span class="mt-4 flex items-center justify-center gap-2 rounded-lg bg-success px-3 py-2.5 text-sm font-bold text-white group-hover:bg-board">Kelola Uang <span aria-hidden="true">›</span></span>
        </a>
    </section>

    <section class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-12">
        <div class="rounded-2xl border border-line bg-white p-6 lg:col-span-6">
            <div class="flex items-center justify-between"><div class="flex items-center gap-2"><svg class="h-5 w-5 text-board" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/></svg><h2 class="font-display text-lg font-bold text-ink">Ringkasan Booking</h2></div><span class="text-xs text-ink-muted">Minggu ini</span></div>
            <div class="mt-6 flex h-40 items-end justify-between gap-3 border-b border-line px-2">
                <?php $__currentLoopData = $weeklyBookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex h-full flex-1 flex-col items-center justify-end gap-1"><span class="text-xs font-semibold text-ink-muted"><?php echo e($booking['total'] ?: ''); ?></span><div class="w-full max-w-10 rounded-t-md bg-chalk/75" style="height: <?php echo e(max(6, ($booking['total'] / $maxBookings) * 110)); ?>px"></div><span class="pb-1 text-xs text-ink-muted"><?php echo e($booking['label']); ?></span></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="rounded-2xl border border-line bg-white p-6 lg:col-span-6">
            <div class="flex items-center justify-between"><h2 class="font-display text-lg font-bold text-ink">Aktivitas Terbaru</h2><a href="<?php echo e(route('admin.payments')); ?>" class="text-xs font-bold text-board hover:text-board-light">Lihat pembayaran</a></div>
            <div class="mt-3 divide-y divide-line">
                <?php $__empty_1 = true; $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="flex items-center gap-3 py-3"><span class="grid h-8 w-8 shrink-0 place-items-center rounded-lg <?php echo e($activity['type'] === 'payment' ? 'bg-board/10 text-board' : 'bg-chalk/30 text-success'); ?>"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><?php if($activity['type'] === 'payment'): ?><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18"/><?php else: ?><path d="M3 21h18M5 21V9l7-5 7 5v12"/><?php endif; ?></svg></span><div class="min-w-0 flex-1"><p class="truncate text-sm font-bold text-ink"><?php echo e($activity['title']); ?></p><p class="truncate text-xs text-ink-muted"><?php echo e($activity['description']); ?></p></div><div class="text-right"><p class="text-xs font-bold text-success">Rp<?php echo e(number_format($activity['amount'], 0, ',', '.')); ?></p><p class="mt-0.5 text-xs text-ink-muted"><?php echo e($activity['created_at']->diffForHumans()); ?></p></div></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="py-10 text-center text-sm text-ink-muted">Belum ada aktivitas transaksi.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\TemanLes\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>