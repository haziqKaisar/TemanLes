<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Pembayaran — TemanLes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Pembayaran — TemanLes']); ?>
    <div class="max-w-2xl mx-auto">
        <?php if (isset($component)) { $__componentOriginale91995af3ce42fe38ee3d3f5bfa23634 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale91995af3ce42fe38ee3d3f5bfa23634 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.booking-stepper','data' => ['current' => 4]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('booking-stepper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['current' => 4]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale91995af3ce42fe38ee3d3f5bfa23634)): ?>
<?php $attributes = $__attributesOriginale91995af3ce42fe38ee3d3f5bfa23634; ?>
<?php unset($__attributesOriginale91995af3ce42fe38ee3d3f5bfa23634); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale91995af3ce42fe38ee3d3f5bfa23634)): ?>
<?php $component = $__componentOriginale91995af3ce42fe38ee3d3f5bfa23634; ?>
<?php unset($__componentOriginale91995af3ce42fe38ee3d3f5bfa23634); ?>
<?php endif; ?>

        <div class="bg-white border border-line rounded-2xl p-6">
            <div class="bg-chalk/12 border border-chalk/30 rounded-lg p-4 text-sm text-ink mb-6">
                Pesanan <strong><?php echo e($order->order_code); ?></strong> dibuat. Transfer <strong>Rp<?php echo e(number_format($order->total_price, 0, ',', '.')); ?></strong> ke salah satu rekening di bawah, lalu unggah bukti transfernya.
            </div>

            <form method="POST" action="<?php echo e(route('payment.store', $order)); ?>" enctype="multipart/form-data" class="space-y-5">
                <?php echo csrf_field(); ?>

                <fieldset>
                    <legend class="block text-sm font-medium text-ink mb-1.5">Transfer ke rekening</legend>
                    <div class="space-y-2">
                        <?php $__currentLoopData = $bankAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="flex items-center gap-3 border border-line rounded-lg p-3 cursor-pointer has-[:checked]:border-board has-[:checked]:bg-board/8 has-[:focus-visible]:ring-2 has-[:focus-visible]:ring-board transition-colors">
                                <input type="radio" name="bank_account_id" value="<?php echo e($bank->id); ?>" class="w-4 h-4 accent-board">
                                <div class="text-sm">
                                    <p class="font-medium text-ink"><?php echo e($bank->bank_name); ?> — <?php echo e($bank->account_number); ?></p>
                                    <p class="text-ink-muted">a.n <?php echo e($bank->account_holder); ?></p>
                                </div>
                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php $__errorArgs = ['bank_account_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </fieldset>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="transfer_date" class="block text-sm font-medium text-ink mb-1.5">Tanggal transfer</label>
                        <input id="transfer_date" type="date" name="transfer_date" max="<?php echo e(now()->format('Y-m-d')); ?>"
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        <?php $__errorArgs = ['transfer_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label for="sender_name" class="block text-sm font-medium text-ink mb-1.5">Nama pengirim</label>
                        <input id="sender_name" type="text" name="sender_name"
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        <?php $__errorArgs = ['sender_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div>
                    <label for="proof_file" class="block text-sm font-medium text-ink mb-1.5">Bukti transfer</label>
                    <div class="border border-dashed border-line rounded-lg p-4">
                        <input id="proof_file" type="file" name="proof_file" accept=".jpg,.jpeg,.png,.pdf"
                            class="w-full text-sm text-ink-muted file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-board file:text-white file:text-sm file:font-medium hover:file:bg-board-light file:cursor-pointer focus-visible:outline-none">
                        <p class="text-xs text-ink-muted mt-2">JPG, PNG, atau PDF — maksimal 5MB</p>
                    </div>
                    <?php $__errorArgs = ['proof_file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-mark text-xs mt-1.5"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="w-full bg-board text-white rounded-lg py-3.5 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
                    Kirim bukti transfer
                </button>
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
<?php /**PATH C:\laragon\www\TemanLes\resources\views/booking/payment.blade.php ENDPATH**/ ?>