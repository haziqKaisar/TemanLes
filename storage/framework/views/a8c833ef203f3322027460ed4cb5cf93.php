<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'TemanLes — Belajar Bareng Guru yang Pas Buat Kamu']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'TemanLes — Belajar Bareng Guru yang Pas Buat Kamu']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>


    <section class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-8 lg:py-16">
        <div>
            <p class="text-sm font-medium text-board mb-3 tracking-wide">Marketplace guru les privat</p>
            <h1 class="font-display text-4xl sm:text-5xl font-semibold text-ink leading-[1.1] mb-5">
                Cari guru privat,<br>bukan tebak-tebakan.
            </h1>
            <p class="text-ink-muted text-lg mb-8 max-w-md">
                Bandingkan guru berdasarkan mapel, jenjang, dan harga. Booking, bayar aman, belajar — semua di satu tempat.
            </p>

            <div class="flex flex-wrap gap-3 mb-8">
                <a href="<?php echo e(route('register')); ?>" class="bg-board text-white px-6 py-3.5 rounded-lg font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
                    Daftar sebagai murid
                </a>
                <a href="<?php echo e(route('login')); ?>" class="border border-line px-6 py-3.5 rounded-lg font-medium text-ink hover:bg-paper-alt transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                    Saya sudah punya akun
                </a>
            </div>

            <?php if($tutorCount > 0): ?>
                <p class="text-sm text-ink-muted">
                    <span class="font-semibold text-ink"><?php echo e($tutorCount); ?> guru</span> sudah terverifikasi dan siap mengajar.
                </p>
            <?php endif; ?>
        </div>

        <div class="relative">
            <div class="bg-white border border-line rounded-2xl p-5 shadow-lg -rotate-2 max-w-sm mx-auto">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-11 h-11 rounded-full bg-board flex items-center justify-center font-display font-semibold text-white" aria-hidden="true">B</div>
                    <div>
                        <p class="font-semibold text-ink text-sm">Budi Santoso</p>
                        <p class="text-xs text-ink-muted">Guru Matematika & Fisika</p>
                    </div>
                </div>
                <div class="flex items-center gap-1.5 text-sm mb-3">
                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="#5DF8D8" stroke="#093C5D" stroke-width="0.6" aria-hidden="true"><path d="M10 1.5l2.6 5.6 6.1.6-4.6 4.1 1.3 6-5.4-3.1-5.4 3.1 1.3-6-4.6-4.1 6.1-.6z"/></svg>
                    <span class="font-medium text-ink">4.8</span>
                    <span class="text-ink-muted">(12 ulasan)</span>
                </div>
                <div class="flex gap-1.5 mb-4">
                    <span class="text-xs bg-board/8 text-board px-2.5 py-1 rounded-full font-medium">Matematika · SMA</span>
                    <span class="text-xs bg-board/8 text-board px-2.5 py-1 rounded-full font-medium">Fisika · SMA</span>
                </div>
                <div class="chalk-divider pt-3 flex items-center justify-between text-sm">
                    <span class="text-ink-muted">Online & tatap muka</span>
                    <span class="font-semibold text-ink">mulai Rp80rb</span>
                </div>
            </div>
            <p class="text-center text-xs text-ink-muted mt-4">Contoh tampilan profil guru</p>
        </div>
    </section>

    <section class="chalk-divider pt-14 pb-14">
        <h2 class="font-display text-2xl font-semibold text-ink mb-10 text-center">Cara kerjanya</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
            <div>
                <span class="font-display text-3xl font-semibold text-board/30">01</span>
                <h3 class="font-semibold text-ink mt-3 mb-2">Cari & pilih guru</h3>
                <p class="text-sm text-ink-muted">Filter berdasarkan mapel, jenjang, harga, dan cara belajar — online atau tatap muka.</p>
            </div>
            <div>
                <span class="font-display text-3xl font-semibold text-board/30">02</span>
                <h3 class="font-semibold text-ink mt-3 mb-2">Booking & bayar</h3>
                <p class="text-sm text-ink-muted">Tentukan jadwal, transfer ke rekening resmi TemanLes, unggah bukti — tim kami verifikasi.</p>
            </div>
            <div>
                <span class="font-display text-3xl font-semibold text-board/30">03</span>
                <h3 class="font-semibold text-ink mt-3 mb-2">Belajar dengan tenang</h3>
                <p class="text-sm text-ink-muted">Dana kamu ditahan sampai les selesai dan dikonfirmasi kedua pihak — bukan langsung ke guru.</p>
            </div>
        </div>
    </section>

    <section class="chalk-divider pt-14 pb-14">
        <div class="bg-white border border-line margin-mark rounded-r-2xl p-8 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div>
                <h2 class="font-display text-2xl font-semibold text-ink mb-3">Dana kamu aman, sampai les benar-benar selesai.</h2>
                <p class="text-sm text-ink-muted">
                    Pembayaran tidak langsung ke guru. Uangmu ditahan sistem sampai admin memverifikasi transfer, dan hanya dicairkan setelah <strong class="text-ink">kamu dan guru sama-sama mengonfirmasi</strong> bahwa les sudah dilaksanakan.
                </p>
            </div>
            <ul class="space-y-3 text-sm">
                <li class="flex items-start gap-2.5">
                    <svg class="w-5 h-5 text-success shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                    <span class="text-ink">Bukti transfer diverifikasi manual oleh tim kami</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <svg class="w-5 h-5 text-success shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                    <span class="text-ink">Guru wajib melengkapi profil & ijazah sebelum tampil di marketplace</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <svg class="w-5 h-5 text-success shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                    <span class="text-ink">Konfirmasi dua arah sebelum dana cair ke guru</span>
                </li>
            </ul>
        </div>
    </section>

    <?php if($subjects->isNotEmpty()): ?>
        <section class="chalk-divider pt-14 pb-14">
            <h2 class="font-display text-2xl font-semibold text-ink mb-6 text-center">Mapel yang tersedia</h2>
            <div class="flex flex-wrap justify-center gap-2.5">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <span class="text-sm bg-board/8 text-board px-3.5 py-2 rounded-full font-medium"><?php echo e($subject->name); ?></span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <section class="chalk-divider pt-14 pb-8 text-center">
        <h2 class="font-display text-2xl font-semibold text-ink mb-3">Siap mulai belajar?</h2>
        <p class="text-ink-muted mb-6">Daftar gratis, cari guru yang cocok dalam hitungan menit.</p>
        <a href="<?php echo e(route('register')); ?>" class="inline-block bg-board text-white px-7 py-3.5 rounded-lg font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
            Daftar sekarang
        </a>
    </section>

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
<?php /**PATH C:\laragon\www\TemanLes\resources\views/landing.blade.php ENDPATH**/ ?>