<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Detail Pembayaran']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Detail Pembayaran']); ?>
    <a href="<?php echo e(route('admin.payments')); ?>" class="text-sm text-slate-500 hover:text-slate-700 mb-4 inline-block">&larr; Kembali ke daftar</a>

    <div class="bg-white rounded-2xl border border-slate-100 p-6 max-w-2xl">
        <h3 class="font-semibold text-lg mb-4">Detail Pembayaran - <?php echo e($payment->order->order_code); ?></h3>

        <dl class="grid grid-cols-2 gap-4 text-sm mb-4">
            <div><dt class="text-slate-500">Murid</dt><dd class="font-medium"><?php echo e($payment->order->student->name); ?></dd></div>
            <div><dt class="text-slate-500">Guru</dt><dd class="font-medium"><?php echo e($payment->order->tutor->user->name); ?></dd></div>
            <div><dt class="text-slate-500">Mapel</dt><dd class="font-medium"><?php echo e($payment->order->tutorSubject->subject->name); ?> - <?php echo e($payment->order->tutorSubject->level); ?></dd></div>
            <div><dt class="text-slate-500">Jadwal</dt><dd class="font-medium"><?php echo e($payment->order->scheduled_date->format('d M Y')); ?>, <?php echo e($payment->order->scheduled_time); ?></dd></div>
            <div><dt class="text-slate-500">Nominal</dt><dd class="font-medium">Rp <?php echo e(number_format($payment->amount, 0, ',', '.')); ?></dd></div>
            <div><dt class="text-slate-500">Rek. Tujuan</dt><dd class="font-medium"><?php echo e($payment->bankAccount->bank_name); ?> - <?php echo e($payment->bankAccount->account_number); ?></dd></div>
            <div><dt class="text-slate-500">Pengirim</dt><dd class="font-medium"><?php echo e($payment->sender_name); ?></dd></div>
            <div><dt class="text-slate-500">Tgl Transfer</dt><dd class="font-medium"><?php echo e($payment->transfer_date?->format('d M Y')); ?></dd></div>
        </dl>

        <div class="mb-4">
            <p class="text-sm text-slate-500 mb-2">Bukti Transfer</p>
            <?php if(str_ends_with($payment->proof_file, '.pdf')): ?>
                <a href="<?php echo e(Storage::url($payment->proof_file)); ?>" target="_blank" class="text-indigo-600 underline text-sm">Buka file PDF</a>
            <?php else: ?>
                <img src="<?php echo e(Storage::url($payment->proof_file)); ?>" class="rounded-lg border max-h-80 object-contain">
            <?php endif; ?>
        </div>

        <?php if($payment->status === 'pending'): ?>
            <div class="space-y-4 border-t border-slate-100 pt-4">
                <form method="POST" action="<?php echo e(route('admin.payments.reject', $payment)); ?>">
                    <?php echo csrf_field(); ?>
                    <textarea name="rejection_reason" rows="2" placeholder="Alasan penolakan (wajib diisi jika reject)"
                        class="w-full rounded-lg border-slate-300 text-sm mb-2"></textarea>
                    <?php $__errorArgs = ['rejection_reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mb-2"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <div class="flex gap-3">
                        <button type="submit" onclick="return confirm('Yakin ingin menolak pembayaran ini?')"
                            class="flex-1 border border-red-300 text-red-600 rounded-lg py-2.5 font-medium hover:bg-red-50">
                            Reject
                        </button>
                </form>
                <form method="POST" action="<?php echo e(route('admin.payments.approve', $payment)); ?>" class="flex-1">
                    <?php echo csrf_field(); ?>
                        <button type="submit" onclick="return confirm('Yakin ingin menyetujui pembayaran ini?')"
                            class="w-full bg-emerald-600 text-white rounded-lg py-2.5 font-medium hover:bg-emerald-700">
                            ACC / Setujui
                        </button>
                </form>
                    </div>
            </div>
        <?php else: ?>
            <div class="bg-slate-50 rounded-lg p-3 text-xs text-slate-500">
                Pembayaran ini sudah diverifikasi oleh <?php echo e($payment->verifier?->name); ?> pada <?php echo e($payment->verified_at?->format('d M Y H:i')); ?>.
                <?php if($payment->rejection_reason): ?>
                    <br>Alasan: <?php echo e($payment->rejection_reason); ?>

                <?php endif; ?>
            </div>
        <?php endif; ?>
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
<?php /**PATH C:\laragon\www\TemanLes\resources\views/admin/payments/show.blade.php ENDPATH**/ ?>