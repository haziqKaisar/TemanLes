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

    <!-- Header Section -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <span class="inline-block text-xs font-semibold text-[#3B7597] bg-[#6FD1D7]/20 px-3 py-1 rounded-md mb-2">
                Panel Pengajar
            </span>
            <h1 class="font-display text-2xl sm:text-3xl font-bold text-[#093C5D]">Dashboard Guru</h1>
            <p class="text-[#3B7597] text-sm mt-0.5">Pantau jadwal mengajar &amp; kelola pendapatan kamu</p>
        </div>
        <a href="<?php echo e(route('teacher.withdraw')); ?>" 
           class="inline-flex items-center justify-center bg-[#093C5D] text-[#5DF8D8] px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-[#3B7597] hover:text-white transition-all shadow-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#093C5D]">
            Tarik Saldo →
        </a>
    </div>

    <!-- Cards Stats: Aksen Lebih Berwarna Namun Rapi -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <!-- Saldo Tersedia (Sorotan Utama) -->
        <div class="bg-gradient-to-br from-[#093C5D] to-[#3B7597] rounded-2xl p-5 text-white shadow-sm relative overflow-hidden">
            <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-[#5DF8D8]/10 rounded-full blur-xl pointer-events-none"></div>
            <p class="text-xs font-medium text-[#6FD1D7] mb-1">Saldo Tersedia</p>
            <p class="font-display text-2xl sm:text-3xl font-bold text-[#5DF8D8]">
                Rp<?php echo e(number_format($wallet->balance ?? 0, 0, ',', '.')); ?>

            </p>
        </div>

        <!-- Total Pendapatan -->
        <div class="bg-white border border-[#6FD1D7]/40 rounded-2xl p-5 shadow-sm">
            <p class="text-xs font-semibold text-[#3B7597] mb-1">Total Pendapatan</p>
            <p class="font-display text-2xl font-bold text-[#093C5D]">
                Rp<?php echo e(number_format($wallet->total_earned ?? 0, 0, ',', '.')); ?>

            </p>
        </div>

        <!-- Total Ditarik -->
        <div class="bg-white border border-gray-200 rounded-2xl p-5 shadow-sm">
            <p class="text-xs font-semibold text-gray-500 mb-1">Total Ditarik</p>
            <p class="font-display text-2xl font-bold text-[#093C5D]">
                Rp<?php echo e(number_format($wallet->total_withdrawn ?? 0, 0, ',', '.')); ?>

            </p>
        </div>
    </div>

    <?php
        $labels = [
            'pending_payment' => 'Menunggu bayar', 
            'waiting_verification' => 'Diverifikasi',
            'confirmed' => 'Terkonfirmasi', 
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan', 
            'rejected' => 'Ditolak',
        ];
    ?>

    <h2 class="font-display font-bold text-lg text-[#093C5D] mb-4">Jadwal Mengajar</h2>

    <!-- Table Section: Clean & Readable -->
    <div class="bg-white border border-gray-200 rounded-2xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-[#093C5D] text-[#5DF8D8]">
                    <tr>
                        <th class="px-5 py-3.5 font-bold">Kode</th>
                        <th class="px-5 py-3.5 font-bold">Murid</th>
                        <th class="px-5 py-3.5 font-bold">Jadwal</th>
                        <th class="px-5 py-3.5 font-bold">Mode</th>
                        <th class="px-5 py-3.5 font-bold">Status</th>
                        <th class="px-5 py-3.5 font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php $__empty_1 = true; $__currentLoopData = $orders ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-[#6FD1D7]/10 transition-colors">
                            <td class="px-5 py-4 font-bold text-[#093C5D]"><?php echo e($order->order_code); ?></td>
                            <td class="px-5 py-4 font-semibold text-[#093C5D]"><?php echo e($order->student->name); ?></td>
                            <td class="px-5 py-4 text-[#3B7597] font-medium">
                                <?php echo e($order->scheduled_date->format('d M Y')); ?>, <?php echo e($order->scheduled_time); ?>

                            </td>
                            <td class="px-5 py-4">
                                <span class="inline-block bg-gray-100 text-[#093C5D] px-2.5 py-1 rounded-md text-xs font-medium">
                                    <?php echo e($order->teaching_mode === 'online' ? 'Online' : 'Tatap muka'); ?>

                                </span>
                            </td>
                            <td class="px-5 py-4">
                                <?php
                                    $statusClasses = match($order->status) {
                                        'pending_payment', 'waiting_verification' => 'bg-[#3B7597]/15 text-[#3B7597]',
                                        'confirmed' => 'bg-[#6FD1D7]/30 text-[#093C5D]',
                                        'completed' => 'bg-[#5DF8D8]/30 text-[#093C5D]',
                                        'cancelled', 'rejected' => 'bg-rose-100 text-rose-700',
                                        default => 'bg-gray-100 text-gray-700'
                                    };
                                ?>
                                <span class="px-3 py-1 rounded-full text-xs font-bold inline-block <?php echo e($statusClasses); ?>">
                                    <?php echo e($labels[$order->status] ?? $order->status); ?>

                                </span>
                            </td>
                            <td class="px-5 py-4">
                                <?php if($order->status === 'confirmed' && !$order->teacher_confirmed_at): ?>
                                    <?php if($order->scheduled_at->isPast()): ?>
                                        <form method="POST" action="<?php echo e(route('teacher.orders.confirm', $order)); ?>" onsubmit="return confirm('Konfirmasi bahwa kamu sudah mengajar les ini?')">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="bg-[#093C5D] text-[#5DF8D8] px-3.5 py-1.5 rounded-lg text-xs font-bold hover:bg-[#3B7597] hover:text-white transition-all shadow-xs focus-visible:outline-none">
                                                Konfirmasi Selesai
                                            </button>
                                        </form>
                                    <?php else: ?>
                                        <span class="text-xs text-gray-400 font-medium">Bisa dikonfirmasi setelah jadwal</span>
                                    <?php endif; ?>
                                <?php elseif($order->status === 'confirmed' && $order->teacher_confirmed_at): ?>
                                    <span class="text-xs text-[#3B7597] font-semibold italic">Menunggu konfirmasi murid</span>
                                <?php elseif($order->status === 'completed'): ?>
                                    <span class="text-xs font-bold text-[#093C5D] bg-[#5DF8D8]/40 px-2.5 py-1 rounded-md">
                                        +Rp<?php echo e(number_format($order->tutor_earning_amount, 0, ',', '.')); ?>

                                    </span>
                                <?php else: ?>
                                    <span class="text-xs text-gray-400">—</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="px-5 py-10 text-center text-gray-400 font-medium">
                                Belum ada jadwal mengajar.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if(isset($orders)): ?>
        <div class="mt-6"><?php echo e($orders->links()); ?></div>
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
<?php endif; ?><?php /**PATH C:\laragon\www\TemanLes\resources\views/teacher/dashboard.blade.php ENDPATH**/ ?>