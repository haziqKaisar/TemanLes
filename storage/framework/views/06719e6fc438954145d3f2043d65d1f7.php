<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Booking - Ringkasan']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Booking - Ringkasan']); ?>
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 space-y-4">
            <h3 class="font-semibold text-lg">Ringkasan Pesanan</h3>
            <dl class="text-sm divide-y divide-slate-100">
                <div class="flex justify-between py-2">
                    <dt class="text-slate-500">Mapel & Jenjang</dt>
                    <dd class="font-medium"><?php echo e($tutorSubject->subject->name); ?> - <?php echo e($tutorSubject->level); ?></dd>
                </div>
                <div class="flex justify-between py-2">
                    <dt class="text-slate-500">Jadwal</dt>
                    <dd class="font-medium"><?php echo e(\Carbon\Carbon::parse($bookingData['scheduled_date'])->translatedFormat('d M Y')); ?>, <?php echo e($bookingData['scheduled_time']); ?></dd>
                </div>
                <div class="flex justify-between py-2">
                    <dt class="text-slate-500">Durasi</dt>
                    <dd class="font-medium"><?php echo e($bookingData['duration_minutes']); ?> menit</dd>
                </div>
                <div class="flex justify-between py-2">
                    <dt class="text-slate-500">Mode</dt>
                    <dd class="font-medium"><?php echo e($bookingData['teaching_mode'] === 'online' ? 'Online' : 'Tatap Muka'); ?></dd>
                </div>
                <?php if($bookingData['teaching_mode'] === 'offline'): ?>
                    <div class="flex justify-between py-2">
                        <dt class="text-slate-500">Lokasi</dt>
                        <dd class="font-medium text-right max-w-[60%]"><?php echo e($bookingData['location_address']); ?></dd>
                    </div>
                <?php endif; ?>
                <div class="flex justify-between py-3 text-base">
                    <dt class="font-semibold">Total Biaya</dt>
                    <dd class="font-bold text-indigo-600">Rp <?php echo e(number_format($total, 0, ',', '.')); ?></dd>
                </div>
            </dl>

            <div class="flex gap-3">
                <a href="<?php echo e(route('booking.step2', $tutor)); ?>" class="flex-1 text-center border border-slate-300 rounded-lg py-3 font-medium hover:bg-slate-50">
                    Kembali
                </a>
                <form method="POST" action="<?php echo e(route('booking.confirm', $tutor)); ?>" class="flex-1">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full bg-indigo-600 text-white rounded-lg py-3 font-medium hover:bg-indigo-700">
                        Konfirmasi & Lanjut Bayar
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