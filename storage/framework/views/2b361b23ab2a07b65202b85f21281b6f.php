<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Panel Admin']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Panel Admin']); ?>
    <div class="mb-8">
        <h1 class="text-2xl font-bold mb-1">Panel Admin</h1>
        <p class="text-slate-500 text-sm">Dashboard keuangan & manajemen platform</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">
        <a href="<?php echo e(route('admin.payments')); ?>" class="bg-white rounded-2xl border border-slate-100 p-6 hover:shadow-md transition block">
            <p class="text-sm text-slate-500 mb-1">Verifikasi Pembayaran</p>
            <p class="text-lg font-semibold">Cek bukti transfer murid &rarr;</p>
        </a>
        <a href="<?php echo e(route('admin.payouts')); ?>" class="bg-white rounded-2xl border border-slate-100 p-6 hover:shadow-md transition block">
            <p class="text-sm text-slate-500 mb-1">Penarikan Saldo Guru</p>
            <p class="text-lg font-semibold">ACC pencairan dana guru &rarr;</p>
        </a>
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
<?php /**PATH C:\laragon\www\TemanLes\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>