<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Pesanan Saya — TemanLes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Pesanan Saya — TemanLes']); ?>
    <div class="mb-8">
        <h1 class="font-display text-2xl font-semibold text-ink mb-1">Pesanan saya</h1>
        <p class="text-ink-muted text-sm">Pantau status les yang sudah kamu booking</p>
    </div>

    <div class="hidden sm:block bg-white border border-line rounded-2xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-paper-alt text-ink-muted text-left">
                <tr>
                    <th class="px-4 py-3 font-medium">Kode</th>
                    <th class="px-4 py-3 font-medium">Guru</th>
                    <th class="px-4 py-3 font-medium">Mapel</th>
                    <th class="px-4 py-3 font-medium">Jadwal</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-line">
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-4 py-3 font-medium text-ink"><?php echo e($order->order_code); ?></td>
                        <td class="px-4 py-3 text-ink"><?php echo e($order->tutor->user->name); ?></td>
                        <td class="px-4 py-3 text-ink-muted"><?php echo e($order->tutorSubject->subject->name); ?> — <?php echo e($order->tutorSubject->level); ?></td>
                        <td class="px-4 py-3 text-ink-muted"><?php echo e($order->scheduled_date->format('d M Y')); ?>, <?php echo e($order->scheduled_time); ?></td>
                        <td class="px-4 py-3">
                            <?php
                                $labels = [
                                    'pending_payment' => 'Menunggu bayar', 'waiting_verification' => 'Diverifikasi',
                                    'confirmed' => 'Terkonfirmasi', 'completed' => 'Selesai',
                                    'cancelled' => 'Dibatalkan', 'rejected' => 'Ditolak',
                                ];
                            ?>
                            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'px-2.5 py-1 rounded-full text-xs font-medium',
                                'bg-chalk/15 text-ink' => in_array($order->status, ['pending_payment', 'waiting_verification']),
                                'bg-board/10 text-board' => $order->status === 'confirmed',
                                'bg-success/10 text-success' => $order->status === 'completed',
                                'bg-mark/10 text-mark' => in_array($order->status, ['cancelled', 'rejected']),
                            ]); ?>">
                                <?php echo e($labels[$order->status] ?? $order->status); ?>

                            </span>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" class="px-4 py-12 text-center text-ink-muted">Belum ada pesanan. <a href="<?php echo e(route('home')); ?>" class="text-board font-medium hover:underline">Cari guru sekarang</a></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="sm:hidden space-y-3">
        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white border border-line rounded-xl p-4">
                <div class="flex justify-between items-start mb-2">
                    <p class="font-medium text-ink text-sm"><?php echo e($order->order_code); ?></p>
                    <?php
                        $labels = [
                            'pending_payment' => 'Menunggu bayar', 'waiting_verification' => 'Diverifikasi',
                            'confirmed' => 'Terkonfirmasi', 'completed' => 'Selesai',
                            'cancelled' => 'Dibatalkan', 'rejected' => 'Ditolak',
                        ];
                    ?>
                    <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'px-2.5 py-1 rounded-full text-xs font-medium shrink-0',
                        'bg-chalk/15 text-ink' => in_array($order->status, ['pending_payment', 'waiting_verification']),
                        'bg-board/10 text-board' => $order->status === 'confirmed',
                        'bg-success/10 text-success' => $order->status === 'completed',
                        'bg-mark/10 text-mark' => in_array($order->status, ['cancelled', 'rejected']),
                    ]); ?>"><?php echo e($labels[$order->status] ?? $order->status); ?></span>
                </div>
                <p class="text-sm text-ink"><?php echo e($order->tutor->user->name); ?></p>
                <p class="text-xs text-ink-muted"><?php echo e($order->tutorSubject->subject->name); ?> — <?php echo e($order->tutorSubject->level); ?></p>
                <p class="text-xs text-ink-muted mt-1"><?php echo e($order->scheduled_date->format('d M Y')); ?>, <?php echo e($order->scheduled_time); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-12 text-ink-muted text-sm">Belum ada pesanan. <a href="<?php echo e(route('home')); ?>" class="text-board font-medium">Cari guru sekarang</a></div>
        <?php endif; ?>
    </div>

    <div class="mt-6"><?php echo e($orders->links()); ?></div>
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
<?php /**PATH C:\laragon\www\TemanLes\resources\views/student/dashboard.blade.php ENDPATH**/ ?>