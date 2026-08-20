<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Cari Guru Les Private']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Cari Guru Les Private']); ?>
    <div class="mb-8">
        <h1 class="text-2xl font-bold mb-1">Cari Guru Les Private</h1>
        <p class="text-slate-500 text-sm">Temukan guru terbaik sesuai kebutuhan belajarmu</p>
    </div>

    <form method="GET" action="<?php echo e(route('home')); ?>" class="bg-white rounded-2xl border border-slate-100 p-4 mb-6 grid grid-cols-1 md:grid-cols-5 gap-3">
        <select name="subject_id" onchange="this.form.submit()" class="rounded-lg border-slate-300 text-sm">
            <option value="">Semua Mapel</option>
            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($subject->id); ?>" <?php if(request('subject_id') == $subject->id): echo 'selected'; endif; ?>><?php echo e($subject->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <select name="level" onchange="this.form.submit()" class="rounded-lg border-slate-300 text-sm">
            <option value="">Semua Jenjang</option>
            <?php $__currentLoopData = ['SD', 'SMP', 'SMA', 'Umum']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lvl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($lvl); ?>" <?php if(request('level') == $lvl): echo 'selected'; endif; ?>><?php echo e($lvl); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>

        <select name="mode" onchange="this.form.submit()" class="rounded-lg border-slate-300 text-sm">
            <option value="">Semua Mode</option>
            <option value="online" <?php if(request('mode') == 'online'): echo 'selected'; endif; ?>>Online</option>
            <option value="offline" <?php if(request('mode') == 'offline'): echo 'selected'; endif; ?>>Tatap Muka</option>
        </select>

        <input type="number" name="min_price" value="<?php echo e(request('min_price')); ?>" placeholder="Harga min" class="rounded-lg border-slate-300 text-sm">
        <input type="number" name="max_price" value="<?php echo e(request('max_price')); ?>" placeholder="Harga max" class="rounded-lg border-slate-300 text-sm">

        <button type="submit" class="hidden">Filter</button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <?php $__empty_1 = true; $__currentLoopData = $tutors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tutor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white rounded-2xl border border-slate-100 p-5 hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center font-bold text-indigo-600">
                        <?php echo e(substr($tutor->user->name, 0, 1)); ?>

                    </div>
                    <div>
                        <p class="font-semibold"><?php echo e($tutor->user->name); ?></p>
                        <p class="text-xs text-slate-500"><?php echo e($tutor->headline); ?></p>
                    </div>
                </div>

                <div class="flex items-center gap-1 text-amber-500 text-sm mb-3">
                    ⭐ <?php echo e(number_format($tutor->rating_avg, 1)); ?>

                    <span class="text-slate-400">(<?php echo e($tutor->rating_count); ?> ulasan)</span>
                </div>

                <div class="flex flex-wrap gap-1.5 mb-4">
                    <?php $__currentLoopData = $tutor->tutorSubjects->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded-full"><?php echo e($ts->subject->name); ?> · <?php echo e($ts->level); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <a href="<?php echo e(route('booking.step1', $tutor)); ?>" class="block text-center bg-indigo-600 text-white rounded-lg py-2.5 text-sm font-medium hover:bg-indigo-700">
                    Lihat & Booking
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-3 text-center py-16 text-slate-400">Belum ada guru yang cocok dengan filter kamu.</div>
        <?php endif; ?>
    </div>

    <div class="mt-6"><?php echo e($tutors->links()); ?></div>
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
<?php /**PATH C:\laragon\www\TemanLes\resources\views/marketplace/index.blade.php ENDPATH**/ ?>