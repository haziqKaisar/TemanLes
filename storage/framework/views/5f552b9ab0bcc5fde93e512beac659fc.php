<?php
    $routes = [
        ['name' => 'Dashboard', 'route' => 'teacher.dashboard', 'is_active' => request()->routeIs('teacher.dashboard'), 'idx' => 0],
        ['name' => 'Edit Profil', 'route' => 'teacher.profile.edit', 'is_active' => request()->routeIs('teacher.profile.*'), 'idx' => 1],
        ['name' => 'Mapel & Harga', 'route' => 'teacher.subjects.index', 'is_active' => request()->routeIs('teacher.subjects.*'), 'idx' => 2],
        ['name' => 'Jadwal', 'route' => 'teacher.schedule.index', 'is_active' => request()->routeIs('teacher.schedule.*'), 'idx' => 3],
        ['name' => 'Tarik Saldo', 'route' => 'teacher.withdraw', 'is_active' => request()->routeIs('teacher.withdraw'), 'idx' => 4],
    ];

    $currentIdx = 0;
    foreach($routes as $item) {
        if ($item['is_active']) {
            $currentIdx = $item['idx'];
            break;
        }
    }
?>

<div class="mb-8">
    <nav class="bg-paper-alt/80 p-1.5 rounded-2xl border border-line flex items-center gap-1.5 overflow-x-auto shadow-xs" aria-label="Navigasi area guru">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a href="<?php echo e(route($item['route'])); ?>"
                data-nav-index="<?php echo e($item['idx']); ?>"
                onclick="window.setTeacherNavIndex(<?php echo e($currentIdx); ?>, <?php echo e($item['idx']); ?>)"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'px-5 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 whitespace-nowrap flex items-center justify-center gap-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board',
                    'bg-white text-board shadow-xs border border-line/60 font-bold' => $item['is_active'],
                    'text-ink-muted hover:text-ink hover:bg-white/60' => ! $item['is_active'],
                ]); ?>"
                <?php if($item['is_active']): ?> aria-current="page" <?php endif; ?>>
                <?php if($item['is_active']): ?>
                    <span class="w-1.5 h-1.5 rounded-full bg-board"></span>
                <?php endif; ?>
                <?php echo e($item['name']); ?>

            </a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
    </nav>
</div>

<script>
    if (typeof window.setTeacherNavIndex === 'undefined') {
        window.setTeacherNavIndex = function(currentIdx, targetIdx) {
            sessionStorage.setItem('teacher_nav_prev_idx', currentIdx);
            sessionStorage.setItem('teacher_nav_target_idx', targetIdx);
        };
    }

    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('teacher-content-wrapper');
        if (!container) return;

        const prevIdxStr = sessionStorage.getItem('teacher_nav_prev_idx');
        const targetIdxStr = sessionStorage.getItem('teacher_nav_target_idx');

        if (prevIdxStr !== null && targetIdxStr !== null) {
            const prevIdx = parseInt(prevIdxStr, 10);
            const targetIdx = parseInt(targetIdxStr, 10);

            if (targetIdx > prevIdx) {
                container.classList.add('animate-slide-in-right');
            } else if (targetIdx < prevIdx) {
                container.classList.add('animate-slide-in-left');
            }

            sessionStorage.removeItem('teacher_nav_prev_idx');
            sessionStorage.removeItem('teacher_nav_target_idx');
        }
    });
</script>

<?php /**PATH C:\laragon\www\TemanLes\resources\views/components/teacher-subnav.blade.php ENDPATH**/ ?>