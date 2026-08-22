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
    <h1 class="text-xl font-bold mb-6">Verifikasi Pembayaran</h1>

    <form method="GET" action="<?php echo e(route('admin.payments')); ?>" class="flex flex-wrap gap-3 mb-6">
        <select name="status" onchange="this.form.submit()" class="rounded-lg border-slate-300 text-sm">
            <option value="pending" <?php if($status == 'pending'): echo 'selected'; endif; ?>>Menunggu Verifikasi</option>
            <option value="approved" <?php if($status == 'approved'): echo 'selected'; endif; ?>>Disetujui</option>
            <option value="rejected" <?php if($status == 'rejected'): echo 'selected'; endif; ?>>Ditolak</option>
        </select>
        <input type="text" name="search" value="<?php echo e(request('search')); ?>" placeholder="Cari kode pesanan / nama murid..."
            class="flex-1 min-w-[240px] rounded-lg border-slate-300 text-sm">
        <button type="submit" class="bg-indigo-600 text-white px-4 rounded-lg text-sm">Cari</button>
    </form>

    <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr>
                    <th class="px-4 py-3">Kode Pesanan</th>
                    <th class="px-4 py-3">Murid</th>
                    <th class="px-4 py-3">Guru</th>
                    <th class="px-4 py-3">Nominal</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-4 py-3 font-medium"><?php echo e($payment->order->order_code); ?></td>
                        <td class="px-4 py-3"><?php echo e($payment->order->student->name); ?></td>
                        <td class="px-4 py-3"><?php echo e($payment->order->tutor->user->name); ?></td>
                        <td class="px-4 py-3">Rp <?php echo e(number_format($payment->amount, 0, ',', '.')); ?></td>
                        <td class="px-4 py-3">
                            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'px-2 py-1 rounded-full text-xs font-medium',
                                'bg-amber-100 text-amber-700' => $payment->status === 'pending',
                                'bg-emerald-100 text-emerald-700' => $payment->status === 'approved',
                                'bg-red-100 text-red-700' => $payment->status === 'rejected',
                            ]); ?>">
                                <?php echo e(ucfirst($payment->status)); ?>

                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <a href="<?php echo e(route('admin.payments.show', $payment)); ?>" class="text-indigo-600 hover:underline text-xs font-medium">
                                Lihat Detail
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="6" class="px-4 py-8 text-center text-slate-400">Tidak ada data.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4"><?php echo e($payments->links()); ?></div>
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