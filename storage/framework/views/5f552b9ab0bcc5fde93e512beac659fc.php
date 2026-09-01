<nav class="flex items-center gap-1 border-b border-line mb-8 -mt-2 overflow-x-auto" aria-label="Navigasi area guru">
    <a href="<?php echo e(route('teacher.dashboard')); ?>"
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'px-4 py-3 text-sm font-medium border-b-2 -mb-px transition-colors whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded-t',
            'border-board text-board' => request()->routeIs('teacher.dashboard'),
            'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs('teacher.dashboard'),
        ]); ?>"
        <?php if(request()->routeIs('teacher.dashboard')): ?> aria-current="page" <?php endif; ?>>
        Dashboard
    </a>
    <a href="<?php echo e(route('teacher.profile.edit')); ?>"
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'px-4 py-3 text-sm font-medium border-b-2 -mb-px transition-colors whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded-t',
            'border-board text-board' => request()->routeIs('teacher.profile.*'),
            'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs('teacher.profile.*'),
        ]); ?>"
        <?php if(request()->routeIs('teacher.profile.*')): ?> aria-current="page" <?php endif; ?>>
        Edit Profil
    </a>
    <a href="<?php echo e(route('teacher.subjects.index')); ?>"
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'px-4 py-3 text-sm font-medium border-b-2 -mb-px transition-colors whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded-t',
            'border-board text-board' => request()->routeIs('teacher.subjects.*'),
            'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs('teacher.subjects.*'),
        ]); ?>"
        <?php if(request()->routeIs('teacher.subjects.*')): ?> aria-current="page" <?php endif; ?>>
        Mapel &amp; Harga
    </a>
    <a href="<?php echo e(route('teacher.schedule.index')); ?>"
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'px-4 py-3 text-sm font-medium border-b-2 -mb-px transition-colors whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded-t',
            'border-board text-board' => request()->routeIs('teacher.schedule.*'),
            'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs('teacher.schedule.*'),
        ]); ?>"
        <?php if(request()->routeIs('teacher.schedule.*')): ?> aria-current="page" <?php endif; ?>>
        Jadwal
    </a>
    <a href="<?php echo e(route('teacher.withdraw')); ?>"
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'px-4 py-3 text-sm font-medium border-b-2 -mb-px transition-colors whitespace-nowrap focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board rounded-t',
            'border-board text-board' => request()->routeIs('teacher.withdraw'),
            'border-transparent text-ink-muted hover:text-ink' => ! request()->routeIs('teacher.withdraw'),
        ]); ?>"
        <?php if(request()->routeIs('teacher.withdraw')): ?> aria-current="page" <?php endif; ?>>
        Tarik Saldo
    </a>
</nav>
<?php /**PATH C:\laragon\www\TemanLes\resources\views/components/teacher-subnav.blade.php ENDPATH**/ ?>