<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Dashboard Guru — TemanLes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Dashboard Guru — TemanLes']); ?>
    <?php if (isset($component)) { $__componentOriginale498924ff5b74ca89381c496bdb04986 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale498924ff5b74ca89381c496bdb04986 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.teacher-subnav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('teacher-subnav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale498924ff5b74ca89381c496bdb04986)): ?>
<?php $attributes = $__attributesOriginale498924ff5b74ca89381c496bdb04986; ?>
<?php unset($__attributesOriginale498924ff5b74ca89381c496bdb04986); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale498924ff5b74ca89381c496bdb04986)): ?>
<?php $component = $__componentOriginale498924ff5b74ca89381c496bdb04986; ?>
<?php unset($__componentOriginale498924ff5b74ca89381c496bdb04986); ?>
<?php endif; ?>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="font-display text-2xl font-semibold text-ink mb-1">Dashboard Guru</h1>
            <p class="text-ink-muted text-sm">Pantau jadwal & pendapatan kamu</p>
        </div>
        <a href="<?php echo e(route('teacher.withdraw')); ?>" class="bg-board text-white px-4 py-2.5 rounded-lg text-sm font-medium hover:bg-board-light focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
            Tarik Saldo
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <div class="bg-white border border-line rounded-2xl p-5">
            <p class="text-sm text-ink-muted mb-1">Saldo tersedia</p>
            <p class="font-display text-2xl font-semibold text-board">Rp<?php echo e(number_format($wallet->balance ?? 0, 0, ',', '.')); ?></p>
        </div>
        <div class="bg-white border border-line rounded-2xl p-5">
            <p class="text-sm text-ink-muted mb-1">Total pendapatan</p>
            <p class="font-display text-2xl font-semibold text-ink">Rp<?php echo e(number_format($wallet->total_earned ?? 0, 0, ',', '.')); ?></p>
        </div>
        <div class="bg-white border border-line rounded-2xl p-5">
            <p class="text-sm text-ink-muted mb-1">Total ditarik</p>
            <p class="font-display text-2xl font-semibold text-ink">Rp<?php echo e(number_format($wallet->total_withdrawn ?? 0, 0, ',', '.')); ?></p>
        </div>
    </div>

    <?php
        $labels = [
            'pending_payment' => 'Menunggu bayar', 'waiting_verification' => 'Diverifikasi',
            'confirmed' => 'Terkonfirmasi', 'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan', 'rejected' => 'Ditolak',
        ];
    ?>

    <h2 class="font-display font-semibold text-lg text-ink mb-4">Jadwal mengajar</h2>
    <div class="bg-white border border-line rounded-2xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-paper-alt text-ink-muted text-left">
                <tr>
                    <th class="px-4 py-3 font-medium">Kode</th>
                    <th class="px-4 py-3 font-medium">Murid</th>
                    <th class="px-4 py-3 font-medium">Jadwal</th>
                    <th class="px-4 py-3 font-medium">Mode</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-4 py-3 font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-line">
                <?php $__empty_1 = true; $__currentLoopData = $orders ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-4 py-3 font-medium text-ink"><?php echo e($order->order_code); ?></td>
                        <td class="px-4 py-3 text-ink"><?php echo e($order->student->name); ?></td>
                        <td class="px-4 py-3 text-ink-muted"><?php echo e($order->scheduled_date->format('d M Y')); ?>, <?php echo e($order->scheduled_time); ?></td>
                        <td class="px-4 py-3 text-ink-muted"><?php echo e($order->teaching_mode === 'online' ? 'Online' : 'Tatap muka'); ?></td>
                        <td class="px-4 py-3">
                            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'px-2.5 py-1 rounded-full text-xs font-medium',
                                'bg-chalk/20 text-ink' => in_array($order->status, ['pending_payment', 'waiting_verification']),
                                'bg-board/10 text-board' => $order->status === 'confirmed',
                                'bg-success/10 text-success' => $order->status === 'completed',
                                'bg-mark/10 text-mark' => in_array($order->status, ['cancelled', 'rejected']),
                            ]); ?>">
                                <?php echo e($labels[$order->status] ?? $order->status); ?>

                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <?php if($order->status === 'confirmed' && !$order->teacher_confirmed_at): ?>
                                <?php if($order->scheduled_at->isPast()): ?>
                                    <form method="POST" action="<?php echo e(route('teacher.orders.confirm', $order)); ?>" onsubmit="return confirm('Konfirmasi bahwa kamu sudah mengajar les ini?')">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="bg-board text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-board-light focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                                            Konfirmasi selesai
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <span class="text-xs text-ink-muted">Bisa dikonfirmasi setelah jadwal</span>
                                <?php endif; ?>
                            <?php elseif($order->status === 'confirmed' && $order->teacher_confirmed_at): ?>
                                <span class="text-xs text-ink-muted">Menunggu konfirmasi murid</span>
                            <?php elseif($order->status === 'completed'): ?>
                                <span class="text-xs text-success font-medium">Rp<?php echo e(number_format($order->tutor_earning_amount, 0, ',', '.')); ?> masuk saldo</span>
                            <?php else: ?>
                                <span class="text-xs text-ink-muted">—</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="6" class="px-4 py-8 text-center text-ink-muted">Belum ada jadwal mengajar.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if(isset($orders)): ?>
        <div class="mt-4"><?php echo e($orders->links()); ?></div>
    <?php endif; ?>
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
<?php /**PATH C:\laragon\www\TemanLes\resources\views/teacher/dashboard.blade.php ENDPATH**/ ?>