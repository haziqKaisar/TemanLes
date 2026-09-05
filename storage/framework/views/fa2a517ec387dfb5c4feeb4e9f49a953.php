<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Tarik Saldo — TemanLes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Tarik Saldo — TemanLes']); ?>
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
    <div class="mb-8 max-w-xl mx-auto">
        <span class="inline-block text-xs font-semibold text-[#3B7597] bg-[#6FD1D7]/20 px-3 py-1 rounded-md mb-2">
            Pencairan Dana
        </span>
        <h1 class="font-display text-2xl sm:text-3xl font-bold text-[#093C5D]">Tarik Saldo</h1>
        <p class="text-[#3B7597] text-sm mt-0.5">Tarik penghasilan mengajar kamu langsung ke rekening bank</p>
    </div>

    <div class="max-w-xl mx-auto">
        <div class="bg-white border border-gray-200 rounded-2xl p-6 sm:p-8 shadow-sm">
            
            <!-- Informasi Saldo -->
            <div class="bg-gradient-to-r from-[#093C5D] to-[#3B7597] rounded-2xl p-6 text-white mb-6 shadow-xs">
                <p class="text-xs font-semibold text-[#6FD1D7] uppercase tracking-wider mb-1">Saldo Tersedia</p>
                <div class="flex items-baseline gap-1">
                    <span class="text-3xl sm:text-4xl font-extrabold text-[#5DF8D8]">
                        Rp <?php echo e(number_format($wallet->balance, 0, ',', '.')); ?>

                    </span>
                </div>
            </div>

            <!-- Form Penarikan -->
            <form method="POST" action="<?php echo e(route('teacher.withdraw.store')); ?>" class="space-y-5">
                <?php echo csrf_field(); ?>
                
                <div>
                    <label for="amount" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Jumlah Penarikan (Rp)</label>
                    <input id="amount" type="number" name="amount" min="50000" value="<?php echo e(old('amount')); ?>" placeholder="Minimal Rp 50.000"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] font-semibold focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                    <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="bank_name" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Nama Bank</label>
                    <input id="bank_name" type="text" name="bank_name" value="<?php echo e(old('bank_name')); ?>" placeholder="Contoh: BCA, Mandiri, BRI"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                    <?php $__errorArgs = ['bank_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="account_number" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Nomor Rekening</label>
                        <input id="account_number" type="text" name="account_number" value="<?php echo e(old('account_number')); ?>" placeholder="1234567890"
                            class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                        <?php $__errorArgs = ['account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div>
                        <label for="account_holder" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Atas Nama</label>
                        <input id="account_holder" type="text" name="account_holder" value="<?php echo e(old('account_holder')); ?>" placeholder="Nama Sesuai Rekening"
                            class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                        <?php $__errorArgs = ['account_holder'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="pt-3">
                    <button type="submit" class="w-full bg-[#093C5D] text-[#5DF8D8] rounded-xl py-3 px-4 text-sm font-bold hover:bg-[#3B7597] hover:text-white transition-all shadow-md focus-visible:outline-none">
                        Ajukan Penarikan
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
<?php endif; ?><?php /**PATH C:\laragon\www\TemanLes\resources\views/teacher/withdraw.blade.php ENDPATH**/ ?>