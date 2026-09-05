<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['current']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['current']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $steps = ['Jadwal', 'Lokasi', 'Ringkasan', 'Bayar'];
?>

<ol class="flex items-center gap-2 sm:gap-4 mb-8" aria-label="Langkah booking">
    <?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $n = $i + 1; ?>
        <li class="flex items-center gap-2 <?php echo e($n < count($steps) ? 'flex-1' : ''); ?>">
            <div class="flex items-center gap-2">
                <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'w-8 h-8 rounded-full flex items-center justify-center text-xs font-semibold shrink-0',
                    'bg-board text-white' => $n < $current,
                    'bg-board text-white ring-2 ring-offset-2 ring-offset-paper ring-board' => $n === $current,
                    'bg-white border border-line text-ink-muted' => $n > $current,
                ]); ?>"
                <?php if($n === $current): ?> aria-current="step" <?php endif; ?>>
                    <?php if($n < $current): ?>
                        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                    <?php else: ?>
                        <?php echo e($n); ?>

                    <?php endif; ?>
                </span>
                <span class="<?php echo \Illuminate\Support\Arr::toCssClasses(['text-sm font-medium hidden sm:inline', 'text-ink' => $n <= $current, 'text-ink-muted' => $n > $current]); ?>"><?php echo e($label); ?></span>
            </div>
            <?php if($n < count($steps)): ?>
                <span class="flex-1 h-px <?php echo e($n < $current ? 'bg-board' : 'bg-line'); ?>" aria-hidden="true"></span>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ol>
<?php /**PATH C:\laragon\www\TemanLes\resources\views/components/booking-stepper.blade.php ENDPATH**/ ?>