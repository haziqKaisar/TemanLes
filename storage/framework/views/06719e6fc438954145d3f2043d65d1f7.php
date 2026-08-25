<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Ringkasan — TemanLes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Ringkasan — TemanLes']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="max-w-2xl mx-auto">
        <?php if (isset($component)) { $__componentOriginale91995af3ce42fe38ee3d3f5bfa23634 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale91995af3ce42fe38ee3d3f5bfa23634 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.booking-stepper','data' => ['current' => 3]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('booking-stepper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['current' => 3]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale91995af3ce42fe38ee3d3f5bfa23634)): ?>
<?php $attributes = $__attributesOriginale91995af3ce42fe38ee3d3f5bfa23634; ?>
<?php unset($__attributesOriginale91995af3ce42fe38ee3d3f5bfa23634); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale91995af3ce42fe38ee3d3f5bfa23634)): ?>
<?php $component = $__componentOriginale91995af3ce42fe38ee3d3f5bfa23634; ?>
<?php unset($__componentOriginale91995af3ce42fe38ee3d3f5bfa23634); ?>
<?php endif; ?>

        <div class="bg-white border border-line rounded-2xl p-6">
            <h1 class="font-display text-xl font-semibold text-ink mb-5">Ringkasan pesanan</h1>

            <dl class="text-sm divide-y divide-dashed divide-line">
                <div class="flex justify-between py-3">
                    <dt class="text-ink-muted">Mapel &amp; jenjang</dt>
                    <dd class="font-medium text-ink text-right"><?php echo e($tutorSubject->subject->name); ?> — <?php echo e($tutorSubject->level); ?></dd>
                </div>
                <div class="flex justify-between py-3">
                    <dt class="text-ink-muted">Jadwal</dt>
                    <dd class="font-medium text-ink text-right"><?php echo e(\Carbon\Carbon::parse($bookingData['scheduled_date'])->translatedFormat('d M Y')); ?>, <?php echo e($bookingData['scheduled_time']); ?></dd>
                </div>
                <div class="flex justify-between py-3">
                    <dt class="text-ink-muted">Durasi</dt>
                    <dd class="font-medium text-ink"><?php echo e($bookingData['duration_minutes']); ?> menit</dd>
                </div>
                <div class="flex justify-between py-3">
                    <dt class="text-ink-muted">Cara belajar</dt>
                    <dd class="font-medium text-ink"><?php echo e($bookingData['teaching_mode'] === 'online' ? 'Online' : 'Tatap muka'); ?></dd>
                </div>
                <?php if($bookingData['teaching_mode'] === 'offline'): ?>
                    <div class="flex justify-between py-3">
                        <dt class="text-ink-muted">Lokasi</dt>
                        <dd class="font-medium text-ink text-right max-w-[65%]"><?php echo e($bookingData['location_address']); ?></dd>
                    </div>
                <?php endif; ?>
            </dl>

            <div class="margin-mark bg-paper-alt/50 rounded-r-lg px-4 py-3 mt-4 flex justify-between items-baseline">
                <span class="font-medium text-ink">Total biaya</span>
                <span class="font-display font-semibold text-xl text-ink">Rp<?php echo e(number_format($total, 0, ',', '.')); ?></span>
            </div>

            <div class="flex gap-3 mt-6">
                <a href="<?php echo e(route('booking.step2', $tutor)); ?>" class="flex-1 text-center border border-line rounded-lg py-3.5 font-medium text-ink hover:bg-paper-alt transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                    Kembali
                </a>
                <form method="POST" action="<?php echo e(route('booking.confirm', $tutor)); ?>" class="flex-1">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full bg-board text-white rounded-lg py-3.5 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
                        Konfirmasi &amp; lanjut bayar
                    </button>
                </form>
            </div>
        </div>
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
<?php /**PATH C:\laragon\www\TemanLes\resources\views/booking/step3.blade.php ENDPATH**/ ?>