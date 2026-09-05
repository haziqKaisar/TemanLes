<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Cari Guru — TemanLes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Cari Guru — TemanLes']); ?>
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

    <!-- Header Section -->
    <div class="mb-8 max-w-2xl">
        <span class="inline-block text-xs font-semibold text-[#3B7597] bg-[#6FD1D7]/20 px-3 py-1 rounded-md mb-2">
            Cari &amp; booking guru privat
        </span>
        <h1 class="font-display text-3xl sm:text-4xl font-bold text-[#093C5D] mb-2 leading-tight">
            Belajar bareng guru yang pas buat kamu.
        </h1>
        <p class="text-[#3B7597] text-sm">
            Pilih mata pelajaran, jenjang, dan cara belajar yang kamu mau — online dari rumah, atau ketemu langsung.
        </p>
    </div>

    <!-- Filter Form: Clean & Neutral Background -->
    <form method="GET" action="<?php echo e(route('home')); ?>" class="bg-white border border-[#6FD1D7]/40 rounded-2xl p-5 mb-8 shadow-sm">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
            <div class="relative">
                <label for="f-subject" class="sr-only">Mata pelajaran</label>
                <select id="f-subject" name="subject_id" onchange="this.form.submit()"
                    class="appearance-none w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2.5 text-sm text-[#093C5D] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#093C5D]">
                    <option value="">Semua mapel</option>
                    <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($subject->id); ?>" <?php if(request('subject_id') == $subject->id): echo 'selected'; endif; ?>><?php echo e($subject->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[#3B7597]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.2 7.5a.75.75 0 011.06.02L10 11.148l3.74-3.628a.75.75 0 111.04 1.08l-4.25 4.125a.75.75 0 01-1.04 0L5.24 8.6a.75.75 0 01-.04-1.06z" clip-rule="evenodd"/></svg>
            </div>

            <div class="relative">
                <label for="f-level" class="sr-only">Jenjang</label>
                <select id="f-level" name="level" onchange="this.form.submit()"
                    class="appearance-none w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2.5 text-sm text-[#093C5D] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#093C5D]">
                    <option value="">Semua jenjang</option>
                    <?php $__currentLoopData = ['SD', 'SMP', 'SMA', 'Umum']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lvl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($lvl); ?>" <?php if(request('level') == $lvl): echo 'selected'; endif; ?>><?php echo e($lvl); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[#3B7597]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.2 7.5a.75.75 0 011.06.02L10 11.148l3.74-3.628a.75.75 0 111.04 1.08l-4.25 4.125a.75.75 0 01-1.04 0L5.24 8.6a.75.75 0 01-.04-1.06z" clip-rule="evenodd"/></svg>
            </div>

            <div class="relative">
                <label for="f-mode" class="sr-only">Cara belajar</label>
                <select id="f-mode" name="mode" onchange="this.form.submit()"
                    class="appearance-none w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2.5 text-sm text-[#093C5D] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#093C5D]">
                    <option value="">Semua cara belajar</option>
                    <option value="online" <?php if(request('mode') == 'online'): echo 'selected'; endif; ?>>Online</option>
                    <option value="offline" <?php if(request('mode') == 'offline'): echo 'selected'; endif; ?>>Tatap muka</option>
                </select>
                <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-[#3B7597]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.2 7.5a.75.75 0 011.06.02L10 11.148l3.74-3.628a.75.75 0 111.04 1.08l-4.25 4.125a.75.75 0 01-1.04 0L5.24 8.6a.75.75 0 01-.04-1.06z" clip-rule="evenodd"/></svg>
            </div>

            <div>
                <label for="f-min" class="sr-only">Harga minimal</label>
                <input id="f-min" type="number" name="min_price" value="<?php echo e(request('min_price')); ?>" placeholder="Harga min"
                    class="w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2.5 text-sm text-[#093C5D] placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#093C5D]">
            </div>

            <div>
                <label for="f-max" class="sr-only">Harga maksimal</label>
                <input id="f-max" type="number" name="max_price" value="<?php echo e(request('max_price')); ?>" placeholder="Harga max"
                    class="w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2.5 text-sm text-[#093C5D] placeholder:text-gray-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#093C5D]">
            </div>
        </div>

        <div class="mt-4 flex items-center justify-between border-t border-gray-100 pt-3">
            <button type="submit" class="text-sm text-[#093C5D] font-semibold hover:text-[#3B7597] focus:outline-none">
                Terapkan filter harga →
            </button>

            <?php if(request()->anyFilled(['subject_id', 'level', 'mode', 'min_price', 'max_price'])): ?>
                <a href="<?php echo e(route('home')); ?>" class="text-xs text-gray-500 hover:text-red-500 transition-colors">
                    Reset filter
                </a>
            <?php endif; ?>
        </div>
    </form>

    <p class="text-sm text-[#3B7597] mb-4"><span class="font-bold text-[#093C5D]"><?php echo e($tutors->total()); ?></span> guru ditemukan</p>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
        <?php $__empty_1 = true; $__currentLoopData = $tutors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tutor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php $minPrice = $tutor->tutorSubjects->min('price_per_hour'); ?>
            <a href="<?php echo e(route('booking.step1', $tutor)); ?>"
                class="group bg-white border border-gray-200 hover:border-[#3B7597] hover:shadow-md transition-all rounded-2xl p-5 block relative overflow-hidden">
                
                <div class="flex items-start gap-3 mb-3">
                    <div class="w-10 h-10 shrink-0 rounded-full bg-[#093C5D] flex items-center justify-center font-display font-bold text-white text-sm" aria-hidden="true">
                        <?php echo e(substr($tutor->user->name, 0, 1)); ?>

                    </div>
                    <div class="min-w-0">
                        <p class="font-semibold text-[#093C5D] text-sm truncate group-hover:text-[#3B7597] transition-colors"><?php echo e($tutor->user->name); ?></p>
                        <p class="text-xs text-gray-500 line-clamp-1"><?php echo e($tutor->headline); ?></p>
                    </div>
                </div>

                <div class="flex items-center gap-1 text-xs mb-3">
                    <svg class="w-4 h-4 text-[#093C5D]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M10 1.5l2.6 5.6 6.1.6-4.6 4.1 1.3 6-5.4-3.1-5.4 3.1 1.3-6-4.6-4.1 6.1-.6z"/></svg>
                    <span class="font-bold text-[#093C5D]"><?php echo e(number_format($tutor->rating_avg, 1)); ?></span>
                    <span class="text-gray-400">(<?php echo e($tutor->rating_count); ?> ulasan)</span>
                </div>

                <!-- Tag dengan Warna Konsisten -->
                <div class="flex flex-wrap gap-1.5 mb-4">
                    <?php $__currentLoopData = $tutor->tutorSubjects->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="text-xs bg-[#6FD1D7]/20 text-[#093C5D] px-2.5 py-0.5 rounded-md font-medium">
                            <?php echo e($ts->subject->name); ?> · <?php echo e($ts->level); ?>

                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="border-t border-gray-100 pt-3 flex items-center justify-between text-xs">
                    <span class="flex items-center gap-1 text-gray-500">
                        <?php if(in_array($tutor->teaching_mode, ['online', 'both'])): ?>
                            <svg class="w-3.5 h-3.5 text-[#3B7597]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2h-3l1 2H8l1-2H6a2 2 0 01-2-2V5z"/></svg>
                        <?php endif; ?>
                        <?php if(in_array($tutor->teaching_mode, ['offline', 'both'])): ?>
                            <svg class="w-3.5 h-3.5 text-[#3B7597]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 2a6 6 0 016 6c0 4.5-6 10-6 10S4 12.5 4 8a6 6 0 016-6zm0 8a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                        <?php endif; ?>
                        <?php echo e($tutor->teaching_mode === 'both' ? 'Online & offline' : ($tutor->teaching_mode === 'online' ? 'Online' : 'Tatap muka')); ?>

                    </span>
                    <?php if($minPrice): ?>
                        <span class="font-bold text-[#093C5D] text-sm">mulai Rp<?php echo e(number_format($minPrice / 1000, 0)); ?>rb</span>
                    <?php endif; ?>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full text-center py-12 border border-gray-200 rounded-2xl bg-white p-6">
                <p class="text-[#093C5D] font-semibold mb-1">Belum ada guru yang cocok</p>
                <p class="text-xs text-gray-500 mb-4">Coba atur ulang filter pencarian kamu.</p>
                <a href="<?php echo e(route('home')); ?>" class="text-xs font-semibold text-[#093C5D] hover:underline">Bersihkan semua filter</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="mt-8"><?php echo e($tutors->links()); ?></div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\TemanLes\resources\views/marketplace/index.blade.php ENDPATH**/ ?>