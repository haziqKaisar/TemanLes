<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Jadwal — TemanLes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Jadwal — TemanLes']); ?>
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

    <?php $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']; ?>

    <!-- Header Section -->
    <div class="mb-8">
        <span class="inline-block text-xs font-semibold text-[#3B7597] bg-[#6FD1D7]/20 px-3 py-1 rounded-md mb-2">
            Pengaturan Operasional
        </span>
        <h1 class="font-display text-2xl sm:text-3xl font-bold text-[#093C5D]">Jadwal Ketersediaan</h1>
        <p class="text-[#3B7597] text-sm mt-0.5">Atur hari dan jam kamu bisa mengajar — murid hanya bisa booking di slot ini</p>
    </div>

    <div class="max-w-3xl space-y-8">
        <!-- Daftar Slot Jadwal -->
        <?php if($availabilities->isEmpty()): ?>
            <div class="text-center py-12 px-4 border-2 border-dashed border-[#6FD1D7]/60 rounded-2xl bg-[#6FD1D7]/5">
                <p class="text-sm font-semibold text-[#093C5D] mb-1">Belum Ada Jadwal Mengajar</p>
                <p class="text-xs text-[#3B7597]">Murid tidak akan bisa melakukan pemesanan sampai kamu menambahkan minimal satu slot waktu.</p>
            </div>
        <?php else: ?>
            <div class="space-y-3">
                <h2 class="font-bold text-[#093C5D] text-base mb-3">Slot Waktu Aktif</h2>
                <div class="bg-white border border-gray-200 rounded-2xl divide-y divide-gray-100 shadow-sm overflow-hidden">
                    <?php $__currentLoopData = $availabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div x-data="{ isEditing: false }" class="p-4 sm:p-5 border-l-4 border-l-[#093C5D] hover:bg-[#6FD1D7]/5 transition-colors">
                            
                            <!-- Tampilan Normal -->
                            <div x-show="!isEditing" class="flex items-center justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    <span class="inline-block text-xs font-bold text-[#093C5D] bg-[#5DF8D8]/40 px-3 py-1 rounded-lg">
                                        <?php echo e($hari[$a->day_of_week]); ?>

                                    </span>
                                    <span class="font-bold text-[#093C5D] text-sm sm:text-base">
                                        <?php echo e(\Carbon\Carbon::parse($a->start_time)->format('H:i')); ?> – <?php echo e(\Carbon\Carbon::parse($a->end_time)->format('H:i')); ?>

                                    </span>
                                </div>

                                <div class="flex items-center gap-2">
                                    <!-- Tombol Edit -->
                                    <button type="button" @click="isEditing = true" class="text-xs font-bold text-[#093C5D] hover:text-[#3B7597] hover:bg-[#6FD1D7]/20 px-2.5 py-1.5 rounded-lg transition-all">
                                        Edit
                                    </button>

                                    <!-- Tombol Hapus -->
                                    <form method="POST" action="<?php echo e(route('teacher.schedule.destroy', $a)); ?>" onsubmit="return confirm('Hapus slot jadwal <?php echo e($hari[$a->day_of_week]); ?> ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-xs font-bold text-rose-600 hover:text-rose-800 hover:bg-rose-50 px-2.5 py-1.5 rounded-lg transition-all">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Tampilan Form Edit Inline -->
                            <div x-show="isEditing" x-cloak class="pt-1">
                                <form method="POST" action="<?php echo e(route('teacher.schedule.update', $a)); ?>" class="grid grid-cols-1 sm:grid-cols-4 gap-3 items-end">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    
                                    <div>
                                        <label class="block text-xs font-semibold text-[#093C5D] mb-1">Hari</label>
                                        <select name="day_of_week" class="w-full rounded-xl border border-gray-300 bg-white px-2.5 py-1.5 text-xs text-[#093C5D] focus:border-[#3B7597] focus:outline-none">
                                            <?php $__currentLoopData = $hari; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $nama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($i); ?>" <?php if($a->day_of_week == $i): echo 'selected'; endif; ?>><?php echo e($nama); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div>
                                        <label class="block text-xs font-semibold text-[#093C5D] mb-1">Jam Mulai</label>
                                        <input type="time" name="start_time" value="<?php echo e(\Carbon\Carbon::parse($a->start_time)->format('H:i')); ?>" class="w-full rounded-xl border border-gray-300 bg-white px-2.5 py-1.5 text-xs text-[#093C5D] focus:border-[#3B7597] focus:outline-none">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-semibold text-[#093C5D] mb-1">Jam Selesai</label>
                                        <input type="time" name="end_time" value="<?php echo e(\Carbon\Carbon::parse($a->end_time)->format('H:i')); ?>" class="w-full rounded-xl border border-gray-300 bg-white px-2.5 py-1.5 text-xs text-[#093C5D] focus:border-[#3B7597] focus:outline-none">
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <button type="submit" class="bg-[#093C5D] text-[#5DF8D8] text-xs font-bold px-3 py-2 rounded-xl hover:bg-[#3B7597] transition-all">
                                            Simpan
                                        </button>
                                        <button type="button" @click="isEditing = false" class="bg-gray-100 text-gray-600 text-xs font-bold px-3 py-2 rounded-xl hover:bg-gray-200 transition-all">
                                            Batal
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Form Tambah Slot Jadwal -->
        <div class="bg-[#6FD1D7]/10 border border-[#6FD1D7]/40 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center gap-2 mb-4">
                <div class="w-2 h-5 bg-[#093C5D] rounded-full"></div>
                <h2 class="font-bold text-[#093C5D] text-base">Tambah Slot Jadwal</h2>
            </div>

            <form method="POST" action="<?php echo e(route('teacher.schedule.store')); ?>" class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <?php echo csrf_field(); ?>
                <div>
                    <label for="day_of_week" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Hari</label>
                    <select id="day_of_week" name="day_of_week"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                        <option value="">Pilih hari</option>
                        <?php $__currentLoopData = $hari; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $nama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($i); ?>" <?php if(old('day_of_week') == $i): echo 'selected'; endif; ?>><?php echo e($nama); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['day_of_week'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="start_time" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Jam Mulai</label>
                    <input id="start_time" type="time" name="start_time" value="<?php echo e(old('start_time')); ?>"
                        class="w-full rounded-xl border border-gray-300 bg-[#ffffff] px-3 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                    <?php $__errorArgs = ['start_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="end_time" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Jam Selesai</label>
                    <input id="end_time" type="time" name="end_time" value="<?php echo e(old('end_time')); ?>"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                    <?php $__errorArgs = ['end_time'];
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
                        + Tambah Jadwal
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
<?php endif; ?><?php /**PATH C:\laragon\www\TemanLes\resources\views/teacher/schedule.blade.php ENDPATH**/ ?>