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

    <!-- Header Section dengan sentuhan warna -->
    <div class="mb-8 p-6 rounded-2xl bg-gradient-to-r from-[#093C5D] to-[#3B7597] text-white shadow-md relative overflow-hidden">
        <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-[#5DF8D8]/20 rounded-full blur-2xl pointer-events-none"></div>
        <h1 class="font-display text-2xl sm:text-3xl font-bold mb-1">Pesanan Saya</h1>
        <p class="text-[#6FD1D7] text-sm font-medium">Pantau status les dan konfirmasi jadwal yang sudah selesai</p>
    </div>

    <?php
        $labels = [
            'pending_payment' => 'Menunggu Bayar', 
            'waiting_verification' => 'Diverifikasi',
            'confirmed' => 'Terkonfirmasi', 
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan', 
            'rejected' => 'Ditolak',
        ];
    ?>

    <!-- Tampilan Desktop (Tabel) -->
    <div class="hidden sm:block bg-white shadow-sm rounded-2xl overflow-hidden border border-[#6FD1D7]/30">
        <table class="w-full text-sm">
            <thead class="bg-[#093C5D] text-[#5DF8D8] text-left">
                <tr>
                    <th class="px-5 py-4 font-bold">Kode</th>
                    <th class="px-5 py-4 font-bold">Guru</th>
                    <th class="px-5 py-4 font-bold">Mapel</th>
                    <th class="px-5 py-4 font-bold">Jadwal</th>
                    <th class="px-5 py-4 font-bold">Status</th>
                    <th class="px-5 py-4 font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#6FD1D7]/20">
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-[#6FD1D7]/10 transition-colors">
                        <td class="px-5 py-4 font-bold text-[#093C5D]"><?php echo e($order->order_code); ?></td>
                        <td class="px-5 py-4 font-semibold text-[#093C5D]"><?php echo e($order->tutor->user->name); ?></td>
                        <td class="px-5 py-4">
                            <span class="inline-block bg-[#3B7597]/15 text-[#093C5D] px-2.5 py-1 rounded-md text-xs font-semibold">
                                <?php echo e($order->tutorSubject->subject->name); ?> — <?php echo e($order->tutorSubject->level); ?>

                            </span>
                        </td>
                        <td class="px-5 py-4 text-[#3B7597] font-medium">
                            <?php echo e($order->scheduled_date->format('d M Y')); ?>, <?php echo e($order->scheduled_time); ?>

                        </td>
                        <td class="px-5 py-4">
                            <?php
                                $statusClasses = match($order->status) {
                                    'pending_payment', 'waiting_verification' => 'bg-[#3B7597] text-white',
                                    'confirmed' => 'bg-[#6FD1D7] text-[#093C5D]',
                                    'completed' => 'bg-[#5DF8D8] text-[#093C5D]',
                                    'cancelled', 'rejected' => 'bg-rose-100 text-rose-700',
                                    default => 'bg-gray-100 text-gray-700'
                                };
                            ?>
                            <span class="px-3 py-1 rounded-full text-xs font-bold shadow-sm inline-block <?php echo e($statusClasses); ?>">
                                <?php echo e($labels[$order->status] ?? $order->status); ?>

                            </span>
                        </td>
                        <td class="px-5 py-4">
                            <?php if($order->status === 'confirmed' && !$order->student_confirmed_at): ?>
                                <?php if($order->scheduled_at->isPast()): ?>
                                    <form method="POST" action="<?php echo e(route('student.orders.confirm', $order)); ?>" onsubmit="return confirm('Konfirmasi bahwa les sudah dilaksanakan?')">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="bg-[#093C5D] text-[#5DF8D8] px-3.5 py-1.5 rounded-lg text-xs font-bold hover:bg-[#3B7597] hover:text-white transition-all shadow-sm focus-visible:outline-none">
                                            Konfirmasi selesai
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <span class="text-xs text-[#3B7597] font-medium bg-[#6FD1D7]/20 px-2.5 py-1 rounded-lg">Belum Mulai</span>
                                <?php endif; ?>
                            <?php elseif($order->status === 'confirmed' && $order->student_confirmed_at): ?>
                                <span class="text-xs text-[#3B7597] font-semibold italic">Menunggu konfirmasi guru</span>
                            <?php elseif($order->status === 'completed'): ?>
                                <span class="text-xs text-[#093C5D] font-bold bg-[#5DF8D8] px-2.5 py-1 rounded-lg">Selesai ✓</span>
                            <?php else: ?>
                                <span class="text-xs text-[#3B7597]">—</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-5 py-12 text-center text-[#3B7597]">
                            Belum ada pesanan. <a href="<?php echo e(route('marketplace')); ?>" class="text-[#093C5D] font-bold hover:underline">Cari guru sekarang</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Tampilan Mobile (Cards) -->
    <div class="sm:hidden space-y-4">
        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $statusClasses = match($order->status) {
                    'pending_payment', 'waiting_verification' => 'bg-[#3B7597] text-white',
                    'confirmed' => 'bg-[#6FD1D7] text-[#093C5D]',
                    'completed' => 'bg-[#5DF8D8] text-[#093C5D]',
                    'cancelled', 'rejected' => 'bg-rose-100 text-rose-700',
                    default => 'bg-gray-100 text-gray-700'
                };
            ?>
            <div class="bg-white border-l-4 border-[#093C5D] shadow-sm rounded-xl p-4 relative overflow-hidden">
                <div class="flex justify-between items-start mb-3">
                    <p class="font-bold text-[#093C5D] text-sm"><?php echo e($order->order_code); ?></p>
                    <span class="px-3 py-1 rounded-full text-xs font-bold shrink-0 shadow-sm <?php echo e($statusClasses); ?>">
                        <?php echo e($labels[$order->status] ?? $order->status); ?>

                    </span>
                </div>
                <p class="text-base font-bold text-[#093C5D] mb-0.5"><?php echo e($order->tutor->user->name); ?></p>
                <div class="mb-2">
                    <span class="inline-block bg-[#3B7597]/15 text-[#093C5D] px-2 py-0.5 rounded text-xs font-semibold">
                        <?php echo e($order->tutorSubject->subject->name); ?> — <?php echo e($order->tutorSubject->level); ?>

                    </span>
                </div>
                <p class="text-xs text-[#3B7597] font-medium mb-4">
                    📅 <?php echo e($order->scheduled_date->format('d M Y')); ?>, <?php echo e($order->scheduled_time); ?>

                </p>

                <?php if($order->status === 'confirmed' && !$order->student_confirmed_at && $order->scheduled_at->isPast()): ?>
                    <form method="POST" action="<?php echo e(route('student.orders.confirm', $order)); ?>" onsubmit="return confirm('Konfirmasi bahwa les sudah dilaksanakan?')">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="w-full bg-[#093C5D] text-[#5DF8D8] py-2.5 rounded-lg text-xs font-bold hover:bg-[#3B7597] transition-all shadow-sm">
                            Konfirmasi Selesai
                        </button>
                    </form>
                <?php elseif($order->status === 'confirmed' && $order->student_confirmed_at): ?>
                    <p class="text-xs text-[#3B7597] font-medium bg-[#6FD1D7]/20 p-2 rounded-lg text-center italic">Menunggu konfirmasi guru</p>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-12 text-[#3B7597] text-sm bg-white rounded-xl shadow-sm">
                Belum ada pesanan. <a href="<?php echo e(route('marketplace')); ?>" class="text-[#093C5D] font-bold hover:underline">Cari guru sekarang</a>
            </div>
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
<?php endif; ?><?php /**PATH C:\laragon\www\TemanLes\resources\views/student/dashboard.blade.php ENDPATH**/ ?>