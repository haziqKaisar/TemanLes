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
    <?php if (isset($component)) { $__componentOriginalcfa20efd198a91198fb752d5f323edcc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcfa20efd198a91198fb752d5f323edcc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.student-subnav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('student-subnav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcfa20efd198a91198fb752d5f323edcc)): ?>
<?php $attributes = $__attributesOriginalcfa20efd198a91198fb752d5f323edcc; ?>
<?php unset($__attributesOriginalcfa20efd198a91198fb752d5f323edcc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcfa20efd198a91198fb752d5f323edcc)): ?>
<?php $component = $__componentOriginalcfa20efd198a91198fb752d5f323edcc; ?>
<?php unset($__componentOriginalcfa20efd198a91198fb752d5f323edcc); ?>
<?php endif; ?>

    <div class="mb-8">
        <h1 class="font-display text-2xl font-semibold text-ink mb-1">Pesanan saya</h1>
        <p class="text-ink-muted text-sm">Pantau status les yang sudah kamu booking</p>
    </div>

    <?php
        $labels = [
            'pending_payment' => 'Menunggu bayar', 'waiting_verification' => 'Diverifikasi',
            'confirmed' => 'Terkonfirmasi', 'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan', 'rejected' => 'Ditolak',
        ];
    ?>

    <div class="hidden sm:block bg-white border border-line rounded-2xl overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-paper-alt text-ink-muted text-left">
                <tr>
                    <th class="px-4 py-3 font-medium">Kode</th>
                    <th class="px-4 py-3 font-medium">Guru</th>
                    <th class="px-4 py-3 font-medium">Mapel</th>
                    <th class="px-4 py-3 font-medium">Jadwal</th>
                    <th class="px-4 py-3 font-medium">Status</th>
                    <th class="px-4 py-3 font-medium">Aksi</th>
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
                            <?php if($order->status === 'confirmed' && !$order->student_confirmed_at): ?>
                                <?php if($order->scheduled_at->isPast()): ?>
                                    <form method="POST" action="<?php echo e(route('student.orders.confirm', $order)); ?>" onsubmit="return confirm('Konfirmasi bahwa les sudah dilaksanakan?')">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="bg-board text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-board-light focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                                            Konfirmasi selesai
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <span class="text-xs text-ink-muted">Bisa dikonfirmasi setelah jadwal</span>
                                <?php endif; ?>
                            <?php elseif($order->status === 'confirmed' && $order->student_confirmed_at): ?>
                                <span class="text-xs text-ink-muted">Menunggu konfirmasi guru</span>
                            <?php elseif($order->status === 'completed'): ?>
                                <span class="text-xs text-success font-medium">Selesai ✓</span>
                            <?php else: ?>
                                <span class="text-xs text-ink-muted">—</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="6" class="px-4 py-12 text-center text-ink-muted">Belum ada pesanan. <a href="<?php echo e(route('marketplace')); ?>" class="text-board font-medium hover:underline">Cari guru sekarang</a></td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="sm:hidden space-y-3">
        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white border border-line rounded-xl p-4">
                <div class="flex justify-between items-start mb-2">
                    <p class="font-medium text-ink text-sm"><?php echo e($order->order_code); ?></p>
                    <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'px-2.5 py-1 rounded-full text-xs font-medium shrink-0',
                        'bg-chalk/20 text-ink' => in_array($order->status, ['pending_payment', 'waiting_verification']),
                        'bg-board/10 text-board' => $order->status === 'confirmed',
                        'bg-success/10 text-success' => $order->status === 'completed',
                        'bg-mark/10 text-mark' => in_array($order->status, ['cancelled', 'rejected']),
                    ]); ?>"><?php echo e($labels[$order->status] ?? $order->status); ?></span>
                </div>
                <p class="text-sm text-ink"><?php echo e($order->tutor->user->name); ?></p>
                <p class="text-xs text-ink-muted"><?php echo e($order->tutorSubject->subject->name); ?> — <?php echo e($order->tutorSubject->level); ?></p>
                <p class="text-xs text-ink-muted mt-1 mb-3"><?php echo e($order->scheduled_date->format('d M Y')); ?>, <?php echo e($order->scheduled_time); ?></p>

                <?php if($order->status === 'confirmed' && !$order->student_confirmed_at && $order->scheduled_at->isPast()): ?>
                    <form method="POST" action="<?php echo e(route('student.orders.confirm', $order)); ?>" onsubmit="return confirm('Konfirmasi bahwa les sudah dilaksanakan?')">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="w-full bg-board text-white py-2 rounded-lg text-xs font-medium">Konfirmasi selesai</button>
                    </form>
                <?php elseif($order->status === 'confirmed' && $order->student_confirmed_at): ?>
                    <p class="text-xs text-ink-muted">Menunggu konfirmasi guru</p>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-12 text-ink-muted text-sm">Belum ada pesanan. <a href="<?php echo e(route('marketplace')); ?>" class="text-board font-medium">Cari guru sekarang</a></div>
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