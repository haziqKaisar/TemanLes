<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Booking - Pilih Mapel & Jadwal']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Booking - Pilih Mapel & Jadwal']); ?>
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <div class="flex items-center gap-3 mb-6 pb-6 border-b border-slate-100">
                <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center font-bold text-indigo-600">
                    <?php echo e(substr($tutor->user->name, 0, 1)); ?>

                </div>
                <div>
                    <p class="font-semibold"><?php echo e($tutor->user->name); ?></p>
                    <p class="text-xs text-slate-500"><?php echo e($tutor->headline); ?></p>
                </div>
            </div>

            <?php if($availabilities->isNotEmpty()): ?>
    <div class="bg-indigo-50 border border-indigo-100 rounded-lg p-4 mb-5 text-sm">
        <p class="font-medium text-indigo-700 mb-2">📅 Jadwal Ketersediaan Guru</p>
        <div class="flex flex-wrap gap-2">
            <?php
                $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            ?>
            <?php $__currentLoopData = $availabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="bg-white border border-indigo-200 text-indigo-700 px-3 py-1 rounded-full text-xs">
                    <?php echo e($hari[$a->day_of_week]); ?>: <?php echo e(\Carbon\Carbon::parse($a->start_time)->format('H:i')); ?> - <?php echo e(\Carbon\Carbon::parse($a->end_time)->format('H:i')); ?>

                </span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php else: ?>
    <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 mb-5 text-sm text-amber-700">
        ⚠️ Guru ini belum mengatur jadwal ketersediaan. Booking mungkin tidak akan berhasil.
    </div>
<?php endif; ?>

            <form method="POST" action="<?php echo e(route('booking.step1.store', $tutor)); ?>" class="space-y-5">
                <?php echo csrf_field(); ?>

                <div>
                    <label class="block text-sm font-medium mb-1.5">Pilih Mata Pelajaran & Jenjang</label>
                    <select name="tutor_subject_id" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">-- Pilih --</option>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($ts->id); ?>" <?php if(old('tutor_subject_id') == $ts->id): echo 'selected'; endif; ?>>
                                <?php echo e($ts->subject->name); ?> - Jenjang <?php echo e($ts->level); ?> (Rp <?php echo e(number_format($ts->price_per_hour, 0, ',', '.')); ?>/jam)
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['tutor_subject_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1.5">Tanggal</label>
                        <input type="date" name="scheduled_date" value="<?php echo e(old('scheduled_date')); ?>" min="<?php echo e(now()->format('Y-m-d')); ?>"
                            class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <?php $__errorArgs = ['scheduled_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1.5">Jam Mulai</label>
                        <input type="time" name="scheduled_time" value="<?php echo e(old('scheduled_time')); ?>"
                            class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <?php $__errorArgs = ['scheduled_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1.5">Durasi</label>
                    <div class="flex gap-3">
                        <?php $__currentLoopData = [60 => '1 Jam', 90 => '1.5 Jam', 120 => '2 Jam']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $lbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="flex-1">
                                <input type="radio" name="duration_minutes" value="<?php echo e($val); ?>" class="sr-only peer" <?php if(old('duration_minutes', 60) == $val): echo 'checked'; endif; ?>>
                                <div class="text-center py-2 rounded-lg border border-slate-300 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 cursor-pointer text-sm">
                                    <?php echo e($lbl); ?>

                                </div>
                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white rounded-lg py-3 font-medium hover:bg-indigo-700">
                    Lanjutkan
                </button>
            </form>
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
<?php /**PATH C:\laragon\www\TemanLes\resources\views/booking/step1.blade.php ENDPATH**/ ?>