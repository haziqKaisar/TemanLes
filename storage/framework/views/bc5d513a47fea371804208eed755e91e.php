<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Dashboard Guru']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Dashboard Guru']); ?>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold mb-1">Dashboard Guru</h1>
            <p class="text-slate-500 text-sm">Pantau jadwal & pendapatan kamu</p>
        </div>
        <a href="<?php echo e(route('teacher.withdraw')); ?>" class="bg-indigo-600 text-white px-4 py-2.5 rounded-lg text-sm font-medium hover:bg-indigo-700">
            Tarik Saldo
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
        <div class="bg-white rounded-2xl border border-slate-100 p-5">
            <p class="text-sm text-slate-500 mb-1">Saldo Tersedia</p>
            <p class="text-2xl font-bold text-indigo-600">Rp <?php echo e(number_format($wallet->balance ?? 0, 0, ',', '.')); ?></p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-5">
            <p class="text-sm text-slate-500 mb-1">Total Pendapatan</p>
            <p class="text-2xl font-bold">Rp <?php echo e(number_format($wallet->total_earned ?? 0, 0, ',', '.')); ?></p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-100 p-5">
            <p class="text-sm text-slate-500 mb-1">Total Ditarik</p>
            <p class="text-2xl font-bold">Rp <?php echo e(number_format($wallet->total_withdrawn ?? 0, 0, ',', '.')); ?></p>
        </div>
    </div>

    <h2 class="font-semibold text-lg mb-4">Jadwal Mengajar</h2>
    <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr>
                    <th class="px-4 py-3">Kode Pesanan</th>
                    <th class="px-4 py-3">Murid</th>
                    <th class="px-4 py-3">Jadwal</th>
                    <th class="px-4 py-3">Mode</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php $__empty_1 = true; $__currentLoopData = $orders ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-4 py-3 font-medium"><?php echo e($order->order_code); ?></td>
                        <td class="px-4 py-3"><?php echo e($order->student->name); ?></td>
                        <td class="px-4 py-3"><?php echo e($order->scheduled_date->format('d M Y')); ?>, <?php echo e($order->scheduled_time); ?></td>
                        <td class="px-4 py-3"><?php echo e($order->teaching_mode === 'online' ? 'Online' : 'Tatap Muka'); ?></td>
                        <td class="px-4 py-3">
                            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'px-2 py-1 rounded-full text-xs font-medium',
                                'bg-amber-100 text-amber-700' => in_array($order->status, ['pending_payment', 'waiting_verification']),
                                'bg-blue-100 text-blue-700' => $order->status === 'confirmed',
                                'bg-emerald-100 text-emerald-700' => $order->status === 'completed',
                                'bg-red-100 text-red-700' => in_array($order->status, ['cancelled', 'rejected']),
                            ]); ?>">
                                <?php echo e(ucfirst(str_replace('_', ' ', $order->status))); ?>

                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <?php if($order->status === 'confirmed'): ?>
                                <form method="POST" action="<?php echo e(route('teacher.orders.complete', $order)); ?>" onsubmit="return confirm('Konfirmasi bahwa les sudah selesai dilaksanakan? Dana akan langsung masuk ke saldo kamu.')">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="bg-emerald-600 text-white px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-emerald-700">
                                        Tandai Selesai
                                    </button>
                                </form>
                            <?php elseif($order->status === 'completed'): ?>
                                <span class="text-emerald-600 text-xs">✓ Rp <?php echo e(number_format($order->tutor_earning_amount, 0, ',', '.')); ?> masuk saldo</span>
                            <?php else: ?>
                                <span class="text-slate-400 text-xs">-</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="6" class="px-4 py-8 text-center text-slate-400">Belum ada jadwal mengajar.</td></tr>
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