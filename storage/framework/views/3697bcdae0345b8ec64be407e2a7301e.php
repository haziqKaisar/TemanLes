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

    <!-- Header Section -->
    <div class="mb-8">
        <span class="inline-block text-xs font-semibold text-[#3B7597] bg-[#6FD1D7]/20 px-3 py-1 rounded-md mb-2">
            Pengaturan Layanan
        </span>
        <h1 class="font-display text-2xl sm:text-3xl font-bold text-[#093C5D]">Mapel &amp; Harga</h1>
        <p class="text-[#3B7597] text-sm mt-0.5">Atur mata pelajaran, jenjang, dan tarif per jam yang kamu tawarkan</p>
    </div>

    <div class="max-w-3xl space-y-8">
        <!-- Daftar Mapel Terpasang -->
        <?php if($tutorSubjects->isEmpty()): ?>
            <div class="text-center py-12 px-4 border-2 border-dashed border-[#6FD1D7]/60 rounded-2xl bg-[#6FD1D7]/5">
                <p class="text-sm font-semibold text-[#093C5D] mb-1">Belum Ada Mapel Ditambahkan</p>
                <p class="text-xs text-[#3B7597]">Tambahkan minimal satu mata pelajaran di bawah ini agar profil kamu muncul di marketplace.</p>
            </div>
        <?php else: ?>
            <div class="space-y-3">
                <h2 class="font-bold text-[#093C5D] text-base mb-3">Mata Pelajaran Aktif</h2>
                <div class="bg-white border border-gray-200 rounded-2xl divide-y divide-gray-100 shadow-sm overflow-hidden">
                    <?php $__currentLoopData = $tutorSubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-l-4 border-l-[#093C5D] hover:bg-[#6FD1D7]/5 transition-colors">
                            <div class="flex-1 min-w-0">
                                <p class="font-bold text-[#093C5D] text-base"><?php echo e($ts->subject->name); ?></p>
                                <span class="inline-block mt-1 text-xs font-bold text-[#093C5D] bg-[#5DF8D8]/40 px-2.5 py-0.5 rounded-full">
                                    <?php echo e($ts->level); ?>

                                </span>
                            </div>

                            <div class="flex items-center gap-3 self-end sm:self-auto">
                                <form method="POST" action="<?php echo e(route('teacher.subjects.update', $ts)); ?>" class="flex items-center gap-1.5 bg-gray-50 p-1.5 rounded-xl border border-gray-200">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <label for="price-<?php echo e($ts->id); ?>" class="sr-only">Harga per jam untuk <?php echo e($ts->subject->name); ?> <?php echo e($ts->level); ?></label>
                                    <span class="text-xs font-bold text-[#3B7597] pl-1">Rp</span>
                                    <input id="price-<?php echo e($ts->id); ?>" type="number" name="price_per_hour" value="<?php echo e($ts->price_per_hour); ?>" min="10000" step="1000"
                                        class="w-28 rounded-lg border border-gray-300 bg-white px-2 py-1 text-sm font-semibold text-[#093C5D] focus:border-[#3B7597] focus:ring-1 focus:ring-[#3B7597] focus:outline-none">
                                    <span class="text-xs font-medium text-gray-500">/jam</span>
                                    <button type="submit" class="bg-[#093C5D] text-[#5DF8D8] text-xs font-bold px-3 py-1.5 rounded-lg hover:bg-[#3B7597] hover:text-white transition-all shadow-xs">
                                        Simpan
                                    </button>
                                </form>

                                <form method="POST" action="<?php echo e(route('teacher.subjects.destroy', $ts)); ?>" onsubmit="return confirm('Hapus <?php echo e($ts->subject->name); ?> — <?php echo e($ts->level); ?> dari daftar mapel kamu?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-xs font-bold text-rose-600 hover:text-rose-800 hover:bg-rose-50 px-2.5 py-2 rounded-lg transition-all">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Form Tambah Mapel Baru -->
        <div class="bg-[#6FD1D7]/10 border border-[#6FD1D7]/40 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center gap-2 mb-4">
                <div class="w-2 h-5 bg-[#093C5D] rounded-full"></div>
                <h2 class="font-bold text-[#093C5D] text-base">Tambah Mapel Baru</h2>
            </div>

            <form method="POST" action="<?php echo e(route('teacher.subjects.store')); ?>" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <?php echo csrf_field(); ?>
                <div>
                    <label for="subject_id" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Mata Pelajaran</label>
                    <select id="subject_id" name="subject_id"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                        <option value="">Pilih mapel</option>
                        <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($subject->id); ?>" <?php if(old('subject_id') == $subject->id): echo 'selected'; endif; ?>><?php echo e($subject->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['subject_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="level" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Jenjang</label>
                    <select id="level" name="level"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                        <option value="">Pilih jenjang</option>
                        <?php $__currentLoopData = ['SD', 'SMP', 'SMA', 'Umum']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lvl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($lvl); ?>" <?php if(old('level') == $lvl): echo 'selected'; endif; ?>><?php echo e($lvl); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['level'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="price_per_hour" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Harga per jam (Rp)</label>
                    <input id="price_per_hour" type="number" name="price_per_hour" min="10000" step="1000" value="<?php echo e(old('price_per_hour')); ?>" placeholder="Contoh: 100000"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                    <?php $__errorArgs = ['price_per_hour'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="sm:col-span-3 pt-2">
                    <button type="submit" class="w-full sm:w-auto bg-[#093C5D] text-[#5DF8D8] rounded-xl px-6 py-3 text-sm font-bold hover:bg-[#3B7597] hover:text-white transition-all shadow-md focus-visible:outline-none">
                        + Tambah Mapel
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
<?php endif; ?><?php /**PATH C:\laragon\www\TemanLes\resources\views/teacher/subjects.blade.php ENDPATH**/ ?>