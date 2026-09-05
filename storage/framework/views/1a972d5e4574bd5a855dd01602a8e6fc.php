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
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

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
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

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

    <div id="teacher-content-wrapper">
        <div class="mb-8">
            <h1 class="font-display text-2xl sm:text-3xl font-bold text-ink tracking-tight mb-1">Jadwal Ketersediaan</h1>
            <p class="text-ink-muted text-sm font-medium">Atur hari dan jam kamu bisa mengajar — murid hanya bisa booking di slot ini</p>
        </div>

        <div class="space-y-8">
            <!-- 2-Column Desktop Section -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Left: List Jadwal Slot -->
                <div class="lg:col-span-7 space-y-4">
                    <div class="flex items-center justify-between">
                        <h2 class="font-display font-bold text-lg text-ink">Slot Jadwal Mengajar</h2>
                        <span class="text-xs font-semibold text-ink-muted"><?php echo e($availabilities->count()); ?> Slot Aktif</span>
                    </div>

                    <?php if($availabilities->isEmpty()): ?>
                        <div class="bg-white border border-dashed border-line rounded-2xl p-10 text-center shadow-xs">
                            <div class="w-12 h-12 rounded-full bg-paper-alt flex items-center justify-center mx-auto text-ink-muted mb-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <h3 class="font-display font-bold text-ink text-base mb-1">Belum Ada Slot Jadwal</h3>
                            <p class="text-xs text-ink-muted max-w-sm mx-auto">Murid tidak dapat memesan les sebelum kamu menambahkan minimal 1 slot ketersediaan hari dan jam mengajar.</p>
                        </div>
                    <?php else: ?>
                        <div class="bg-white border border-line rounded-2xl divide-y divide-line/60 shadow-xs overflow-hidden">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $availabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <div class="p-5 flex items-center justify-between gap-4 hover:bg-paper/30 transition-colors">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-teal/20 text-board font-bold flex items-center justify-center text-sm shrink-0">
                                            <?php echo e(substr($hari[$a->day_of_week], 0, 3)); ?>

                                        </div>
                                        <div>
                                            <p class="font-display font-bold text-ink text-base"><?php echo e($hari[$a->day_of_week]); ?></p>
                                            <p class="text-xs font-semibold text-board flex items-center gap-1 mt-0.5">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                <?php echo e(\Carbon\Carbon::parse($a->start_time)->format('H:i')); ?> – <?php echo e(\Carbon\Carbon::parse($a->end_time)->format('H:i')); ?> WIB
                                            </p>
                                        </div>
                                    </div>

                                    <form method="POST" action="<?php echo e(route('teacher.schedule.destroy', $a)); ?>" onsubmit="return confirm('Hapus slot jadwal <?php echo e($hari[$a->day_of_week]); ?> ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-ink-muted hover:text-board font-semibold text-xs px-3 py-2 rounded-xl hover:bg-paper transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Right: Desktop Graphic/Illustration Card -->
                <div class="lg:col-span-5">
                    <div class="bg-paper-alt/80 border border-line rounded-2xl p-8 text-center flex flex-col items-center justify-center space-y-4 shadow-xs min-h-[320px]">
                        <div class="relative w-28 h-28 flex items-center justify-center">
                            <div class="absolute inset-0 rounded-3xl bg-teal/30 rotate-6"></div>
                            <div class="relative w-24 h-24 rounded-2xl bg-white border border-line flex flex-col items-center justify-center text-board shadow-xs">
                                <svg class="w-10 h-10 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span class="text-[10px] font-black uppercase tracking-wider text-board">Jadwal Les</span>
                            </div>
                            <div class="absolute -bottom-2 -right-2 w-10 h-10 rounded-full bg-board text-white flex items-center justify-center shadow-md">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <h3 class="font-display font-bold text-ink text-base">Atur Slot Waktu Fleksibel</h3>
                            <p class="text-xs text-ink-muted leading-relaxed max-w-xs mx-auto">
                                Tentukan hari dan jam belajar yang nyaman bagi kamu. Murid hanya dapat memilih jadwal yang aktif dalam slot ketersediaan ini.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Card: Form Tambah Slot Jadwal -->
            <div class="bg-white border border-line rounded-2xl p-6 sm:p-8 shadow-xs">
                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-line">
                    <div class="w-10 h-10 rounded-xl bg-teal/20 text-board flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </div>
                    <div>
                        <h2 class="font-display font-bold text-lg text-ink">Tambah Slot Jadwal</h2>
                        <p class="text-xs text-ink-muted">Pilih hari beserta waktu mulai dan selesai mengajar</p>
                    </div>
                </div>

                <form method="POST" action="<?php echo e(route('teacher.schedule.store')); ?>" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="day_of_week" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Hari</label>
                            <select id="day_of_week" name="day_of_week"
                                class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                                <option value="">Pilih hari...</option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $hari; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $nama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <option value="<?php echo e($i); ?>" <?php if(old('day_of_week') == $i): echo 'selected'; endif; ?>><?php echo e($nama); ?></option>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </select>
                            <?php $__errorArgs = ['day_of_week'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs font-semibold mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="start_time" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Jam Mulai</label>
                            <input id="start_time" type="time" name="start_time" value="<?php echo e(old('start_time')); ?>"
                                class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                            <?php $__errorArgs = ['start_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs font-semibold mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="end_time" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Jam Selesai</label>
                            <input id="end_time" type="time" name="end_time" value="<?php echo e(old('end_time')); ?>"
                                class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-medium focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                            <?php $__errorArgs = ['end_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs font-semibold mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="flex justify-end pt-2">
                        <button type="submit" class="w-full sm:w-auto bg-board text-white rounded-xl px-8 py-3.5 font-bold hover:bg-board-light shadow-xs transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board inline-flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Tambah Slot Jadwal
                        </button>
                    </div>
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

<?php /**PATH C:\laragon\www\TemanLes\resources\views/teacher/schedule.blade.php ENDPATH**/ ?>