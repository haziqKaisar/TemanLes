<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Verifikasi Pembayaran']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Verifikasi Pembayaran']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php
        $tabs = ['pending' => 'Menunggu', 'approved' => 'Disetujui', 'rejected' => 'Ditolak'];
        $statusStyle = [
            'pending' => 'bg-amber-50 text-amber-700 ring-amber-100',
            'approved' => 'bg-emerald-50 text-emerald-700 ring-emerald-100',
            'rejected' => 'bg-rose-50 text-rose-700 ring-rose-100',
        ];
    ?>

    <div class="mb-7 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <nav aria-label="Breadcrumb" class="mb-4 flex items-center gap-2 text-xs text-ink-muted"><a href="<?php echo e(route('admin.dashboard')); ?>" class="hover:text-board">Panel Admin</a><span aria-hidden="true">›</span><span class="text-ink">Verifikasi Pembayaran</span></nav>
            <h1 class="font-display text-3xl font-bold tracking-tight text-ink">Verifikasi Pembayaran</h1>
            <p class="mt-2 text-sm text-ink-muted">Periksa bukti transfer dari murid sebelum mengonfirmasi pesanan.</p>
        </div>
        <div class="flex min-w-[180px] items-center gap-3 rounded-xl border border-line bg-white px-4 py-3 shadow-sm"><span class="grid h-10 w-10 place-items-center rounded-xl bg-chalk/30 text-success"><svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/></svg></span><div><p class="text-xs text-ink-muted">Menunggu verifikasi</p><p class="text-2xl font-extrabold text-ink"><?php echo e($statusCounts['pending'] ?? 0); ?></p></div></div>
    </div>

    <section class="overflow-hidden rounded-2xl border border-line bg-white shadow-sm">
        <div class="overflow-x-auto border-b border-line">
            <nav class="flex min-w-max gap-1 px-4" aria-label="Status pembayaran">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabStatus => $tabLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <a href="<?php echo e(route('admin.payments', array_filter(['status' => $tabStatus, 'search' => request('search')]))); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-b-2 px-4 py-4 text-sm font-bold', 'border-board text-board' => $status === $tabStatus, 'border-transparent text-ink-muted hover:text-board' => $status !== $tabStatus]); ?>"><?php echo e($tabLabel); ?> <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['ml-2 rounded-full px-2 py-0.5 text-xs', 'bg-chalk/30 text-success' => $tabStatus !== 'rejected', 'bg-rose-100 text-rose-700' => $tabStatus === 'rejected']); ?>"><?php echo e($statusCounts[$tabStatus] ?? 0); ?></span></a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </nav>
        </div>

        <form method="GET" action="<?php echo e(route('admin.payments')); ?>" class="flex flex-col gap-3 border-b border-line bg-paper/60 p-4 sm:flex-row">
            <input type="hidden" name="status" value="<?php echo e($status); ?>">
            <label class="relative flex-1"><span class="sr-only">Cari pembayaran</span><svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-ink-muted" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg><input type="search" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari nama murid atau kode pesanan..." class="w-full rounded-lg border-line bg-white py-2.5 pl-10 pr-3 text-sm text-ink placeholder:text-ink-muted focus:border-board focus:ring-board"></label>
            <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg border border-board bg-white px-4 py-2.5 text-sm font-bold text-board hover:bg-board hover:text-white"><svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 5h16l-6 7v5l-4 2v-7L4 5Z"/></svg>Filter</button>
        </form>

        <div class="hidden overflow-x-auto md:block">
            <table class="w-full min-w-[760px] text-left text-sm">
                <thead class="border-b border-line bg-paper/50 text-xs font-bold text-ink-muted"><tr><th class="px-5 py-3.5">Murid</th><th class="px-5 py-3.5">Booking</th><th class="px-5 py-3.5">Jumlah</th><th class="px-5 py-3.5">Waktu transfer</th><th class="px-5 py-3.5">Status</th><th class="px-5 py-3.5 text-right">Aksi</th></tr></thead>
                <tbody class="divide-y divide-line">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <tr class="hover:bg-paper/50"><td class="px-5 py-4"><div class="flex items-center gap-3"><span class="grid h-9 w-9 place-items-center rounded-xl bg-board/10 text-xs font-bold text-board"><?php echo e(strtoupper(substr($payment->order->student->name, 0, 2))); ?></span><div><p class="font-bold text-ink"><?php echo e($payment->order->student->name); ?></p><p class="mt-0.5 text-xs text-ink-muted"><?php echo e($payment->order->order_code); ?></p></div></div></td><td class="px-5 py-4"><p class="font-medium text-ink"><?php echo e($payment->order->tutorSubject->subject->name ?? 'Les privat'); ?></p><p class="mt-0.5 text-xs text-ink-muted">Tutor: <?php echo e($payment->order->tutor->user->name); ?></p></td><td class="px-5 py-4 font-bold text-board">Rp<?php echo e(number_format($payment->amount, 0, ',', '.')); ?></td><td class="px-5 py-4 text-xs leading-5 text-ink-muted"><?php echo e($payment->transfer_date?->translatedFormat('d M Y') ?? '—'); ?><br><?php echo e($payment->created_at->format('H:i')); ?> WIB</td><td class="px-5 py-4"><span class="inline-flex rounded-full px-2.5 py-1 text-xs font-bold ring-1 ring-inset <?php echo e($statusStyle[$payment->status]); ?>"><?php echo e($tabs[$payment->status]); ?></span></td><td class="px-5 py-4 text-right"><a href="<?php echo e(route('admin.payments.show', $payment)); ?>" class="inline-flex rounded-lg border border-board px-3 py-2 text-xs font-bold text-board hover:bg-board hover:text-white">Lihat</a></td></tr>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        <tr><td colspan="6" class="px-5 py-14 text-center text-sm text-ink-muted">Tidak ada pembayaran dengan status ini.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="divide-y divide-line md:hidden">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <article class="p-4"><div class="flex items-start justify-between gap-3"><div class="flex min-w-0 items-center gap-3"><span class="grid h-9 w-9 shrink-0 place-items-center rounded-xl bg-board/10 text-xs font-bold text-board"><?php echo e(strtoupper(substr($payment->order->student->name, 0, 2))); ?></span><div class="min-w-0"><p class="truncate text-sm font-bold text-ink"><?php echo e($payment->order->student->name); ?></p><p class="truncate text-xs text-ink-muted"><?php echo e($payment->order->order_code); ?></p></div></div><span class="shrink-0 rounded-full px-2 py-1 text-xs font-bold <?php echo e($statusStyle[$payment->status]); ?>"><?php echo e($tabs[$payment->status]); ?></span></div><div class="mt-4 flex items-end justify-between gap-3"><div><p class="text-sm font-bold text-board">Rp<?php echo e(number_format($payment->amount, 0, ',', '.')); ?></p><p class="mt-1 text-xs text-ink-muted"><?php echo e($payment->order->tutorSubject->subject->name ?? 'Les privat'); ?> · <?php echo e($payment->created_at->format('d M, H:i')); ?></p></div><a href="<?php echo e(route('admin.payments.show', $payment)); ?>" class="rounded-lg border border-board px-3 py-2 text-xs font-bold text-board">Lihat</a></div></article>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <p class="px-5 py-14 text-center text-sm text-ink-muted">Tidak ada pembayaran dengan status ini.</p>
            <?php endif; ?>
        </div>

        <?php if($payments->hasPages()): ?><div class="border-t border-line px-5 py-4"><?php echo e($payments->links()); ?></div><?php endif; ?>
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
<?php /**PATH C:\laragon\www\TemanLes\resources\views/admin/payments/index.blade.php ENDPATH**/ ?>