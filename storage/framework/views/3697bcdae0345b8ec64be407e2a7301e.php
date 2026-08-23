<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Mapel & Harga — TemanLes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Mapel & Harga — TemanLes']); ?>
    <?php if (isset($component)) { $__componentOriginale498924ff5b74ca89381c496bdb04986 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale498924ff5b74ca89381c496bdb04986 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.teacher-subnav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('teacher-subnav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale498924ff5b74ca89381c496bdb04986)): ?>
<?php $attributes = $__attributesOriginale498924ff5b74ca89381c496bdb04986; ?>
<?php unset($__attributesOriginale498924ff5b74ca89381c496bdb04986); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale498924ff5b74ca89381c496bdb04986)): ?>
<?php $component = $__componentOriginale498924ff5b74ca89381c496bdb04986; ?>
<?php unset($__componentOriginale498924ff5b74ca89381c496bdb04986); ?>
<?php endif; ?>

    <div class="mb-8">
        <h1 class="font-display text-2xl font-semibold text-ink mb-1">Mapel &amp; Harga</h1>
        <p class="text-ink-muted text-sm">Atur mata pelajaran, jenjang, dan tarif per jam yang kamu tawarkan</p>
    </div>

    <div class="max-w-2xl space-y-6">
        <?php if($tutorSubjects->isEmpty()): ?>
            <div class="text-center py-10 border border-dashed border-line rounded-2xl text-sm text-ink-muted">
                Belum ada mapel. Tambahkan minimal satu supaya kamu muncul di marketplace.
            </div>
        <?php else: ?>
            <div class="bg-white border border-line rounded-2xl divide-y divide-line">
                <?php $__currentLoopData = $tutorSubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="p-4 flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-4">
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-ink"><?php echo e($ts->subject->name); ?></p>
                            <span class="text-xs bg-board/8 text-board px-2 py-0.5 rounded-full font-medium"><?php echo e($ts->level); ?></span>
                        </div>

                        <form method="POST" action="<?php echo e(route('teacher.subjects.update', $ts)); ?>" class="flex items-center gap-2">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <label for="price-<?php echo e($ts->id); ?>" class="sr-only">Harga per jam untuk <?php echo e($ts->subject->name); ?> <?php echo e($ts->level); ?></label>
                            <span class="text-sm text-ink-muted">Rp</span>
                            <input id="price-<?php echo e($ts->id); ?>" type="number" name="price_per_hour" value="<?php echo e($ts->price_per_hour); ?>" min="10000" step="1000"
                                class="w-28 rounded-lg border border-line px-2.5 py-1.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                            <span class="text-sm text-ink-muted">/jam</span>
                            <button type="submit" class="text-xs font-medium text-board hover:text-board-light focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded px-2 py-1.5">
                                Simpan
                            </button>
                        </form>

                        <form method="POST" action="<?php echo e(route('teacher.subjects.destroy', $ts)); ?>" onsubmit="return confirm('Hapus <?php echo e($ts->subject->name); ?> — <?php echo e($ts->level); ?> dari daftar mapel kamu?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-xs font-medium text-mark hover:underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark rounded px-1">
                                Hapus
                            </button>
                        </form>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <div class="bg-white border border-line rounded-2xl p-5">
            <h2 class="font-semibold text-ink text-sm mb-4">Tambah mapel baru</h2>
            <form method="POST" action="<?php echo e(route('teacher.subjects.store')); ?>" class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                <?php echo csrf_field(); ?>
                <div>
                    <label for="subject_id" class="block text-xs font-medium text-ink mb-1.5">Mata pelajaran</label>
                    <select id="subject_id" name="subject_id"
                        class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        <option value="">Pilih mapel</option>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subject->id); ?>" <?php if(old('subject_id') == $subject->id): echo 'selected'; endif; ?>><?php echo e($subject->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['subject_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label for="level" class="block text-xs font-medium text-ink mb-1.5">Jenjang</label>
                    <select id="level" name="level"
                        class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        <option value="">Pilih jenjang</option>
                        <?php $__currentLoopData = ['SD', 'SMP', 'SMA', 'Umum']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lvl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($lvl); ?>" <?php if(old('level') == $lvl): echo 'selected'; endif; ?>><?php echo e($lvl); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label for="price_per_hour" class="block text-xs font-medium text-ink mb-1.5">Harga per jam</label>
                    <input id="price_per_hour" type="number" name="price_per_hour" min="10000" step="1000" value="<?php echo e(old('price_per_hour')); ?>" placeholder="Contoh: 100000"
                        class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                    <?php $__errorArgs = ['price_per_hour'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="sm:col-span-3">
                    <button type="submit" class="bg-board text-white rounded-lg px-5 py-2.5 text-sm font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
                        Tambah mapel
                    </button>
                </div>
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
<?php /**PATH C:\laragon\www\TemanLes\resources\views/teacher/subjects.blade.php ENDPATH**/ ?>