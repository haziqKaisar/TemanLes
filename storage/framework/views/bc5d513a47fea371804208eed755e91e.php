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
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

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
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

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

    <div id="teacher-content-wrapper">
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="font-display text-2xl sm:text-3xl font-bold text-ink tracking-tight mb-1">Dashboard Guru</h1>
                <p class="text-ink-muted text-sm font-medium">Pantau jadwal mengajar & ringkasan pendapatan kamu</p>
            </div>
            <a href="<?php echo e(route('teacher.withdraw')); ?>" onclick="window.setTeacherNavIndex && window.setTeacherNavIndex(0, 4)" class="inline-flex items-center justify-center gap-2 bg-board text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-board-light shadow-xs transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                Tarik Saldo
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- Saldo Tersedia -->
            <div class="bg-white border border-line/80 rounded-2xl p-6 shadow-xs hover:shadow-md transition-all flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-ink-muted uppercase tracking-wider mb-1.5">Saldo Tersedia</p>
                    <p class="font-display text-2xl lg:text-3xl font-extrabold text-board">Rp<?php echo e(number_format($wallet->balance ?? 0, 0, ',', '.')); ?></p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-teal/20 text-board flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
            </div>

            <!-- Total Pendapatan -->
            <div class="bg-white border border-line/80 rounded-2xl p-6 shadow-xs hover:shadow-md transition-all flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-ink-muted uppercase tracking-wider mb-1.5">Total Pendapatan</p>
                    <p class="font-display text-2xl lg:text-3xl font-extrabold text-ink">Rp<?php echo e(number_format($wallet->total_earned ?? 0, 0, ',', '.')); ?></p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-teal/20 text-board flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
            </div>

            <!-- Total Ditarik -->
            <div class="bg-white border border-line/80 rounded-2xl p-6 shadow-xs hover:shadow-md transition-all flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-ink-muted uppercase tracking-wider mb-1.5">Total Ditarik</p>
                    <p class="font-display text-2xl lg:text-3xl font-extrabold text-ink">Rp<?php echo e(number_format($wallet->total_withdrawn ?? 0, 0, ',', '.')); ?></p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-teal/20 text-board flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                </div>
            </div>
        </div>

        <?php
            $labels = [
                'pending_payment' => 'Menunggu bayar', 'waiting_verification' => 'Diverifikasi',
                'confirmed' => 'Terkonfirmasi', 'completed' => 'Selesai',
                'cancelled' => 'Dibatalkan', 'rejected' => 'Ditolak',
            ];
        ?>

        <div class="flex items-center justify-between mb-4">
            <h2 class="font-display font-bold text-xl text-ink">Jadwal Mengajar</h2>
            <span class="text-xs font-semibold text-ink-muted">Desktop Table View</span>
        </div>

        <div class="bg-white border border-line rounded-2xl overflow-hidden shadow-xs">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-paper-alt/80 text-ink border-b border-line text-xs font-bold uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">Kode</th>
                            <th class="px-6 py-4">Murid</th>
                            <th class="px-6 py-4">Jadwal</th>
                            <th class="px-6 py-4">Mode</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-line/60">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <tr class="hover:bg-paper/40 transition-colors">
                                <td class="px-6 py-4 font-bold text-board font-mono"><?php echo e($order->order_code); ?></td>
                                <td class="px-6 py-4 font-semibold text-ink"><?php echo e($order->student->name); ?></td>
                                <td class="px-6 py-4 text-ink-muted font-medium"><?php echo e($order->scheduled_date->format('d M Y')); ?>, <?php echo e($order->scheduled_time); ?></td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1.5 text-ink-muted text-xs font-semibold">
                                        <?php if($order->teaching_mode === 'online'): ?>
                                            <span class="w-2 h-2 rounded-full bg-teal"></span> Online
                                        <?php else: ?>
                                            <span class="w-2 h-2 rounded-full bg-board"></span> Tatap muka
                                        <?php endif; ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                        'px-3 py-1 rounded-full text-xs font-bold inline-block',
                                        'bg-paper-alt text-ink' => in_array($order->status, ['pending_payment', 'waiting_verification']),
                                        'bg-board/10 text-board' => $order->status === 'confirmed',
                                        'bg-teal/20 text-board' => $order->status === 'completed',
                                        'bg-slate-200 text-slate-700' => in_array($order->status, ['cancelled', 'rejected']),
                                    ]); ?>">
                                        <?php echo e($labels[$order->status] ?? $order->status); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if($order->status === 'confirmed' && !$order->teacher_confirmed_at): ?>
                                        <?php if($order->scheduled_at->isPast()): ?>
                                            <form method="POST" action="<?php echo e(route('teacher.orders.confirm', $order)); ?>" onsubmit="return confirm('Konfirmasi bahwa kamu sudah mengajar les ini?')">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="bg-board text-white px-3.5 py-1.5 rounded-lg text-xs font-bold hover:bg-board-light shadow-xs focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                                                    Konfirmasi selesai
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <span class="text-xs text-ink-muted font-medium">Bisa dikonfirmasi setelah jadwal</span>
                                        <?php endif; ?>
                                    <?php elseif($order->status === 'confirmed' && $order->teacher_confirmed_at): ?>
                                        <span class="text-xs text-ink-muted font-medium">Menunggu konfirmasi murid</span>
                                    <?php elseif($order->status === 'completed'): ?>
                                        <span class="text-xs text-board font-bold">Rp<?php echo e(number_format($order->tutor_earning_amount, 0, ',', '.')); ?> masuk saldo</span>
                                    <?php else: ?>
                                        <span class="text-xs text-ink-muted">—</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-ink-muted font-medium">
                                    <div class="max-w-xs mx-auto text-center space-y-2">
                                        <div class="w-12 h-12 rounded-full bg-paper-alt flex items-center justify-center mx-auto text-ink-muted">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        </div>
                                        <p class="text-ink font-semibold">Belum ada jadwal mengajar.</p>
                                        <p class="text-xs text-ink-muted">Jadwal yang dibooking oleh murid akan muncul secara otomatis di sini.</p>
                                    </div>
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
    </div>
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