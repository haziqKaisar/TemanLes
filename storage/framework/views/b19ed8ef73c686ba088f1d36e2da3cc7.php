<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Daftar — TemanLes']); ?>

    <h1 class="font-display text-3xl font-semibold text-ink mb-2">Yuk, mulai belajar</h1>
    <p class="text-ink-muted mb-8">Daftar gratis, cari guru yang cocok buat kamu</p>

    <form method="POST" action="<?php echo e(route('register')); ?>" class="space-y-5">
        <?php echo csrf_field(); ?>

        <div>
            <label for="name" class="block text-sm font-medium text-ink mb-1.5">Nama lengkap</label>
            <input id="name" type="text" name="name" value="<?php echo e(old('name')); ?>" required autofocus autocomplete="name"
                class="w-full rounded-lg border border-line px-3.5 py-3 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-ink mb-1.5">Email</label>
            <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="username"
                class="w-full rounded-lg border border-line px-3.5 py-3 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board"
                placeholder="nama@email.com">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <fieldset>
            <legend class="block text-sm font-medium text-ink mb-1.5">Daftar sebagai</legend>
            <div class="grid grid-cols-2 gap-3">
                <label>
                    <input type="radio" name="role" value="student" class="sr-only peer" <?php if(old('role', 'student') === 'student'): echo 'checked'; endif; ?>>
                    <div class="text-center py-3 rounded-lg border border-line peer-checked:border-board peer-checked:bg-board/8 peer-checked:text-board peer-focus-visible:ring-2 peer-focus-visible:ring-board cursor-pointer text-sm font-medium text-ink transition-colors">
                        Murid
                    </div>
                </label>
                <label>
                    <input type="radio" name="role" value="teacher" class="sr-only peer" <?php if(old('role') === 'teacher'): echo 'checked'; endif; ?>>
                    <div class="text-center py-3 rounded-lg border border-line peer-checked:border-board peer-checked:bg-board/8 peer-checked:text-board peer-focus-visible:ring-2 peer-focus-visible:ring-board cursor-pointer text-sm font-medium text-ink transition-colors">
                        Guru
                    </div>
                </label>
            </div>
            <p class="text-xs text-ink-muted mt-2">Daftar sebagai guru? Profil kamu perlu diverifikasi admin dulu sebelum tampil ke murid.</p>
            <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </fieldset>

        <div>
            <label for="password" class="block text-sm font-medium text-ink mb-1.5">Kata sandi</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                class="w-full rounded-lg border border-line px-3.5 py-3 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board"
                placeholder="••••••••">
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-ink mb-1.5">Konfirmasi kata sandi</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                class="w-full rounded-lg border border-line px-3.5 py-3 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board"
                placeholder="••••••••">
            <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="w-full bg-board text-white rounded-lg py-3.5 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
            Daftar
        </button>
    </form>

    <p class="text-sm text-ink-muted mt-8">
        Sudah punya akun?
        <a href="<?php echo e(route('login')); ?>" class="text-board font-medium hover:text-board-light focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded px-1">Masuk</a>
    </p>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\TemanLes\resources\views/auth/register.blade.php ENDPATH**/ ?>