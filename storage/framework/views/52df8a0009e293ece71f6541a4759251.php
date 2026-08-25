<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Berhasil — TemanLes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Berhasil — TemanLes']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="max-w-lg mx-auto text-center bg-white border border-line rounded-2xl p-10">
        <div class="w-14 h-14 rounded-full bg-success/12 text-success flex items-center justify-center mx-auto mb-5">
            <svg class="w-7 h-7" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
        </div>
        <h1 class="font-display text-xl font-semibold text-ink mb-2">Bukti transfer terkirim</h1>
        <p class="text-sm text-ink-muted mb-6">Tim kami akan memverifikasi pembayaran dalam 1×24 jam. Kamu bisa pantau statusnya di halaman pesanan.</p>
        <a href="<?php echo e(route('student.dashboard')); ?>" class="inline-block bg-board text-white rounded-lg px-6 py-3 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
            Lihat pesanan saya
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
<?php /**PATH C:\laragon\www\TemanLes\resources\views/booking/success.blade.php ENDPATH**/ ?>