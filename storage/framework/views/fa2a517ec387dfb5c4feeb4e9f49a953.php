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

    <div id="teacher-content-wrapper">
        <div class="mb-8">
            <h1 class="font-display text-2xl sm:text-3xl font-bold text-ink tracking-tight mb-1">Tarik Saldo</h1>
            <p class="text-ink-muted text-sm font-medium">Ajukan penarikan saldo hasil mengajar langsung ke rekening bank kamu</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            <!-- Left: Main Desktop Form Card -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-2xl border border-line p-6 sm:p-8 shadow-xs space-y-6">
                    <!-- Highlight Saldo Tersedia -->
                    <div class="bg-paper/60 border border-line/80 rounded-2xl p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-ink-muted mb-1">Saldo Tersedia</p>
                            <p class="font-display text-3xl sm:text-4xl font-extrabold text-board">Rp <?php echo e(number_format($wallet->balance, 0, ',', '.')); ?></p>
                        </div>
                        <div class="w-12 h-12 rounded-xl bg-teal/20 text-board flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                    </div>

                    <!-- Form Penarikan -->
                    <form method="POST" action="<?php echo e(route('teacher.withdraw.store')); ?>" class="space-y-6">
                        <?php echo csrf_field(); ?>
                        <div>
                            <label for="amount" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Jumlah Penarikan (Rp)</label>
                            <input id="amount" type="number" name="amount" min="50000" value="<?php echo e(old('amount')); ?>" placeholder="Contoh: 100000"
                                class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-semibold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                            <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs font-semibold mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <label for="bank_name" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Nama Bank</label>
                            <input id="bank_name" type="text" name="bank_name" value="<?php echo e(old('bank_name')); ?>" placeholder="Contoh: BCA, Mandiri, BRI, BNI"
                                class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-semibold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                            <?php $__errorArgs = ['bank_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs font-semibold mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="account_number" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Nomor Rekening</label>
                                <input id="account_number" type="text" name="account_number" value="<?php echo e(old('account_number')); ?>" placeholder="Masukkan nomor rekening"
                                    class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-semibold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                                <?php $__errorArgs = ['account_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs font-semibold mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div>
                                <label for="account_holder" class="block text-xs font-bold uppercase tracking-wider text-ink mb-2">Atas Nama</label>
                                <input id="account_holder" type="text" name="account_holder" value="<?php echo e(old('account_holder')); ?>" placeholder="Sesuai nama di rekening"
                                    class="w-full rounded-xl border border-line bg-paper/30 px-4 py-3 text-sm text-ink font-semibold focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board transition-all">
                                <?php $__errorArgs = ['account_holder'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs font-semibold mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-board text-white rounded-xl py-3.5 font-bold hover:bg-board-light shadow-xs transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board inline-flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            Ajukan Penarikan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right: Wallet Graphic/Illustration Card -->
            <div class="lg:col-span-5">
                <div class="bg-paper-alt/80 border border-line rounded-2xl p-8 text-center flex flex-col items-center justify-center space-y-5 shadow-xs min-h-[380px]">
                    <div class="relative w-32 h-32 flex items-center justify-center">
                        <div class="absolute inset-0 rounded-full bg-teal/30 scale-105"></div>
                        <div class="relative w-28 h-28 rounded-3xl bg-white border border-line flex items-center justify-center text-board shadow-xs">
                            <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 10h18M7 15h1m4 0h1m-7 4h12a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div class="absolute -top-1 -right-1 w-10 h-10 rounded-full bg-board text-white flex items-center justify-center shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <h3 class="font-display font-bold text-ink text-base">Proses Penarikan Aman</h3>
                        <p class="text-xs text-ink-muted leading-relaxed max-w-xs mx-auto">
                            Permintaan penarikan saldo kamu akan diverifikasi dan ditransfer oleh tim admin TemanLes ke rekening bank yang kamu daftarkan.
                        </p>
                    </div>

                    <div class="pt-2">
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-board bg-white/80 border border-line px-3.5 py-1.5 rounded-full shadow-2xs">
                            <span class="w-2 h-2 rounded-full bg-teal"></span> Minimal penarikan Rp 50.000
                        </span>
                    </div>
                </div>
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

<?php /**PATH C:\laragon\www\TemanLes\resources\views/teacher/withdraw.blade.php ENDPATH**/ ?>