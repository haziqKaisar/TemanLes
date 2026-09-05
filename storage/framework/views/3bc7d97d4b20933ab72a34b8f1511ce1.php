<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Kelola Pencairan Saldo Guru']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Kelola Pencairan Saldo Guru']); ?>
    <?php
        $tabs = ['pending' => 'Menunggu', 'approved' => 'Diproses', 'paid' => 'Selesai', 'rejected' => 'Ditolak'];
        $statusStyle = ['pending' => 'bg-amber-50 text-amber-700 ring-amber-100', 'approved' => 'bg-sky-50 text-sky-700 ring-sky-100', 'paid' => 'bg-emerald-50 text-emerald-700 ring-emerald-100', 'rejected' => 'bg-rose-50 text-rose-700 ring-rose-100'];
    ?>

    <div class="mb-7 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
        <div><nav aria-label="Breadcrumb" class="mb-4 flex items-center gap-2 text-xs text-ink-muted"><a href="<?php echo e(route('admin.dashboard')); ?>" class="hover:text-board">Panel Admin</a><span aria-hidden="true">›</span><span class="text-ink">Kelola Pencairan Saldo Guru</span></nav><h1 class="font-display text-3xl font-bold tracking-tight text-ink">Kelola Pencairan Saldo Guru</h1><p class="mt-2 text-sm text-ink-muted">Tinjau permintaan pencairan saldo dari para guru.</p></div>
        <div class="flex min-w-[180px] items-center gap-3 rounded-xl border border-line bg-white px-4 py-3 shadow-sm"><span class="grid h-10 w-10 place-items-center rounded-xl bg-chalk/30 text-success"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V9l7-5 7 5v12"/></svg></span><div><p class="text-xs text-ink-muted">Menunggu persetujuan</p><p class="text-2xl font-extrabold text-ink"><?php echo e($statusCounts['pending'] ?? 0); ?></p></div></div>
    </div>

    <section class="overflow-hidden rounded-2xl border border-line bg-white shadow-sm">
        <div class="overflow-x-auto border-b border-line"><nav class="flex min-w-max gap-1 px-4" aria-label="Status pencairan"><?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabStatus => $tabLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><a href="<?php echo e(route('admin.payouts', array_filter(['status' => $tabStatus, 'search' => request('search')]))); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-b-2 px-4 py-4 text-sm font-bold', 'border-board text-board' => $status === $tabStatus, 'border-transparent text-ink-muted hover:text-board' => $status !== $tabStatus]); ?>"><?php echo e($tabLabel); ?> <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['ml-2 rounded-full px-2 py-0.5 text-xs', 'bg-chalk/30 text-success' => $tabStatus !== 'rejected', 'bg-rose-100 text-rose-700' => $tabStatus === 'rejected']); ?>"><?php echo e($statusCounts[$tabStatus] ?? 0); ?></span></a><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></nav></div>
        <form method="GET" action="<?php echo e(route('admin.payouts')); ?>" class="flex flex-col gap-3 border-b border-line bg-paper/60 p-4 sm:flex-row"><input type="hidden" name="status" value="<?php echo e($status); ?>"><label class="relative flex-1"><span class="sr-only">Cari guru</span><svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-ink-muted" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg><input type="search" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari nama guru..." class="w-full rounded-lg border-line bg-white py-2.5 pl-10 pr-3 text-sm text-ink placeholder:text-ink-muted focus:border-board focus:ring-board"></label><button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg border border-board bg-white px-4 py-2.5 text-sm font-bold text-board hover:bg-board hover:text-white"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 5h16l-6 7v5l-4 2v-7L4 5Z"/></svg>Filter</button></form>

        <div class="divide-y divide-line">
            <?php $__empty_1 = true; $__currentLoopData = $payouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <article class="p-4 sm:p-5"><div class="flex flex-col gap-4 md:flex-row md:items-center"><div class="flex min-w-0 flex-1 items-center gap-3"><span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-board/10 text-sm font-bold text-board"><?php echo e(strtoupper(substr($payout->tutor->user->name, 0, 2))); ?></span><div class="min-w-0"><p class="truncate text-sm font-bold text-ink"><?php echo e($payout->tutor->user->name); ?></p><p class="mt-1 truncate text-xs text-ink-muted"><?php echo e($payout->bank_name); ?> · <?php echo e($payout->account_number); ?> · a.n. <?php echo e($payout->account_holder); ?></p></div></div><div class="md:w-48"><p class="text-base font-extrabold text-board">Rp<?php echo e(number_format($payout->amount, 0, ',', '.')); ?></p><p class="mt-1 text-xs text-ink-muted">Diajukan <?php echo e($payout->created_at->translatedFormat('d M Y, H:i')); ?></p></div><div class="flex items-center gap-3 md:w-48 md:justify-end"><span class="inline-flex rounded-full px-2.5 py-1 text-xs font-bold ring-1 ring-inset <?php echo e($statusStyle[$payout->status]); ?>"><?php echo e($tabs[$payout->status]); ?></span><?php if($payout->status === 'pending'): ?><div class="flex gap-2"><form method="POST" action="<?php echo e(route('admin.payouts.reject', $payout)); ?>" onsubmit="return confirm('Tolak pengajuan ini?')"><?php echo csrf_field(); ?><button class="rounded-lg border border-rose-300 px-3 py-2 text-xs font-bold text-rose-600 hover:bg-rose-50">Tolak</button></form><form method="POST" action="<?php echo e(route('admin.payouts.approve', $payout)); ?>" onsubmit="return confirm('Sudah mentransfer dana ke guru?')"><?php echo csrf_field(); ?><button class="rounded-lg bg-board px-3 py-2 text-xs font-bold text-white hover:bg-board-light">Setujui</button></form></div><?php endif; ?></div></div></article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="px-5 py-14 text-center text-sm text-ink-muted">Tidak ada permintaan pencairan dengan status ini.</p>
            <?php endif; ?>
        </div>
        <?php if($payouts->hasPages()): ?><div class="border-t border-line px-5 py-4"><?php echo e($payouts->links()); ?></div><?php endif; ?>
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
<?php /**PATH C:\laragon\www\TemanLes\resources\views/admin/payouts/index.blade.php ENDPATH**/ ?>