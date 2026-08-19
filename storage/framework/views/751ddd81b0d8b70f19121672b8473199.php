<?php
use App\Models\Subject;
use App\Models\Tutor;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
?>

📂 File: resources/views/pages/student/⚡tutor-marketplace.blade.php

<div>
    <div class="mb-8">
        <h1 class="text-2xl font-bold mb-1">Cari Guru Les Private</h1>
        <p class="text-slate-500 text-sm">Temukan guru terbaik sesuai kebutuhan belajarmu</p>
    </div>
    <div class="bg-white rounded-2xl border border-slate-100 p-4 mb-6 grid grid-cols-1 md:grid-cols-5 gap-3">
        <select wire:model.live="subject_id" class="rounded-lg border-slate-300 text-sm">
            <option value="">Semua Mapel</option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <option value="<?php echo e($subject->id); ?>"><?php echo e($subject->name); ?></option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </select>
        <select wire:model.live="level" class="rounded-lg border-slate-300 text-sm">
            <option value="">Semua Jenjang</option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['SD', 'SMP', 'SMA', 'Umum']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lvl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <option value="<?php echo e($lvl); ?>"><?php echo e($lvl); ?></option>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </select>
        <select wire:model.live="mode" class="rounded-lg border-slate-300 text-sm">
            <option value="">Semua Mode</option>
            <option value="online">Online</option>
            <option value="offline">Tatap Muka</option>
        </select>
        <input type="number" wire:model.live.debounce.500ms="min_price" placeholder="Harga min" class="rounded-lg border-slate-300 text-sm">
        <input type="number" wire:model.live.debounce.500ms="max_price" placeholder="Harga max" class="rounded-lg border-slate-300 text-sm">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $this->tutors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tutor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'tutor-'.e($tutor->id).''; ?>wire:key="tutor-<?php echo e($tutor->id); ?>" class="bg-white rounded-2xl border border-slate-100 p-5 hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center font-bold text-indigo-600">
                        <?php echo e(substr($tutor->user->name, 0, 1)); ?>

                    </div>
                    <div>
                        <p class="font-semibold"><?php echo e($tutor->user->name); ?></p>
                        <p class="text-xs text-slate-500"><?php echo e($tutor->headline); ?></p>
                    </div>
                </div>
                <div class="flex items-center gap-1 text-amber-500 text-sm mb-3">
                    ⭐ <?php echo e(number_format($tutor->rating_avg, 1)); ?>

                    <span class="text-slate-400">(<?php echo e($tutor->rating_count); ?> ulasan)</span>
                </div>
                <div class="flex flex-wrap gap-1.5 mb-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $tutor->tutorSubjects->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded-full"><?php echo e($ts->subject->name); ?> · <?php echo e($ts->level); ?></span>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
                <a href="<?php echo e(route('booking.wizard', $tutor)); ?>" class="block text-center bg-indigo-600 text-white rounded-lg py-2.5 text-sm font-medium hover:bg-indigo-700">
                    Lihat & Booking
                </a>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <div class="col-span-3 text-center py-16 text-slate-400">Belum ada guru yang cocok dengan filter kamu.</div>
        <?php endif; ?>
    </div>
    <div class="mt-6"><?php echo e($this->tutors->links()); ?></div>
</div><?php /**PATH C:\laragon\www\TemanLes\storage\framework\views/livewire/views/490280b7.blade.php ENDPATH**/ ?>