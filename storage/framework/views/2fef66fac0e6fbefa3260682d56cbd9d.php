<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Pilih Jadwal — TemanLes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Pilih Jadwal — TemanLes']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="max-w-2xl mx-auto">
        <?php if (isset($component)) { $__componentOriginale91995af3ce42fe38ee3d3f5bfa23634 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale91995af3ce42fe38ee3d3f5bfa23634 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.booking-stepper','data' => ['current' => 1]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('booking-stepper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['current' => 1]); ?>
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
            <div class="flex items-center gap-3 mb-6 chalk-divider pb-6">
                <div class="w-12 h-12 rounded-full bg-board flex items-center justify-center font-display font-semibold text-white" aria-hidden="true">
                    <?php echo e(substr($tutor->user->name, 0, 1)); ?>

                </div>
                <div>
                    <p class="font-semibold text-ink"><?php echo e($tutor->user->name); ?></p>
                    <p class="text-xs text-ink-muted"><?php echo e($tutor->headline); ?></p>
                </div>
            </div>

            <?php if($availabilities->isNotEmpty()): ?>
                <div class="bg-paper-alt/50 border border-line rounded-lg p-4 mb-6">
                    <p class="text-sm font-medium text-ink mb-2">Jadwal tersedia</p>
                    <div class="flex flex-wrap gap-2">
                        <?php $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $availabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <span class="bg-white border border-line text-ink px-2.5 py-1 rounded-full text-xs">
                                <?php echo e($hari[$a->day_of_week]); ?> <?php echo e(\Carbon\Carbon::parse($a->start_time)->format('H:i')); ?>–<?php echo e(\Carbon\Carbon::parse($a->end_time)->format('H:i')); ?>

                            </span>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="bg-mark/8 border border-mark/20 rounded-lg p-4 mb-6 text-sm text-mark">
                    Guru ini belum mengatur jadwal ketersediaan.
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('booking.step1.store', $tutor)); ?>" class="space-y-5">
                <?php echo csrf_field(); ?>

                <div>
                    <label for="tutor_subject_id" class="block text-sm font-medium text-ink mb-1.5">Mata pelajaran &amp; jenjang</label>
                    <select id="tutor_subject_id" name="tutor_subject_id" <?php if($errors->has('tutor_subject_id')): ?> aria-invalid="true" aria-describedby="err-subject" <?php endif; ?>
                        class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        <option value="">Pilih mapel</option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <option value="<?php echo e($ts->id); ?>" <?php if(old('tutor_subject_id') == $ts->id): echo 'selected'; endif; ?>>
                                <?php echo e($ts->subject->name); ?> — <?php echo e($ts->level); ?> (Rp<?php echo e(number_format($ts->price_per_hour, 0, ',', '.')); ?>/jam)
                            </option>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </select>
                    <?php $__errorArgs = ['tutor_subject_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p id="err-subject" class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="scheduled_date" class="block text-sm font-medium text-ink mb-1.5">Tanggal</label>
                        <input id="scheduled_date" type="date" name="scheduled_date" value="<?php echo e(old('scheduled_date')); ?>" min="<?php echo e(now()->format('Y-m-d')); ?>"
                            <?php if($errors->has('scheduled_date')): ?> aria-invalid="true" aria-describedby="err-date" <?php endif; ?>
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        <?php $__errorArgs = ['scheduled_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p id="err-date" class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label for="scheduled_time" class="block text-sm font-medium text-ink mb-1.5">Jam mulai</label>
                        <input id="scheduled_time" type="time" name="scheduled_time" value="<?php echo e(old('scheduled_time')); ?>"
                            <?php if($errors->has('scheduled_time')): ?> aria-invalid="true" aria-describedby="err-time" <?php endif; ?>
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        <?php $__errorArgs = ['scheduled_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p id="err-time" class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <fieldset>
                    <legend class="block text-sm font-medium text-ink mb-1.5">Durasi</legend>
                    <div class="flex gap-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = [60 => '1 jam', 90 => '1,5 jam', 120 => '2 jam']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $lbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <label class="flex-1">
                                <input type="radio" name="duration_minutes" value="<?php echo e($val); ?>" class="sr-only peer" <?php if(old('duration_minutes', 60) == $val): echo 'checked'; endif; ?>>
                                <div class="text-center py-3 rounded-lg border border-line peer-checked:border-board peer-checked:bg-board/8 peer-checked:text-board peer-focus-visible:ring-2 peer-focus-visible:ring-board cursor-pointer text-sm font-medium text-ink transition-colors">
                                    <?php echo e($lbl); ?>

                                </div>
                            </label>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </fieldset>

                <button type="submit" class="w-full bg-board text-white rounded-lg py-3.5 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
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