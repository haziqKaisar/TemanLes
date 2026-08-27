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


    <section class="relative overflow-hidden py-10 lg:py-16">
        <div class="absolute inset-x-0 top-0 -z-10 h-80 rounded-[2rem] bg-[radial-gradient(circle_at_top_left,rgba(111,209,215,0.18),transparent_32%),radial-gradient(circle_at_top_right,rgba(93,248,216,0.14),transparent_30%),radial-gradient(circle_at_bottom_left,rgba(59,117,151,0.08),transparent_34%)] blur-3xl"></div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">
            <div class="max-w-xl">
                <p class="text-sm font-semibold text-board mb-4 tracking-[0.2em] uppercase">Marketplace guru les privat</p>
                <h1 class="font-display text-4xl sm:text-5xl lg:text-[4.15rem] font-semibold text-ink leading-[1.02] mb-5 tracking-tight">
                    Cari guru privat,<br>bukan tebak-tebakan.
                </h1>
                <p class="text-base sm:text-lg leading-8 text-ink-muted mb-9 max-w-md">
                    Bandingkan guru berdasarkan mapel, jenjang, dan harga. Booking, bayar aman, belajar — semua di satu tempat.
                </p>

                <div class="flex flex-wrap gap-3.5 mb-8">
                    <a href="<?php echo e(route('register')); ?>" class="inline-flex items-center justify-center bg-board text-white px-6 py-3.5 rounded-xl font-semibold shadow-sm shadow-board/15 hover:bg-board-light hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-chalk focus-visible:ring-offset-2 focus-visible:ring-offset-paper">
                        Daftar sebagai murid
                    </a>
                    <a href="<?php echo e(route('login')); ?>" class="inline-flex items-center justify-center border border-line bg-white px-6 py-3.5 rounded-xl font-semibold text-board hover:border-board hover:bg-board/5 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board focus-visible:ring-offset-2 focus-visible:ring-offset-paper">
                        Saya sudah punya akun
                    </a>
                </div>

                <?php if($tutorCount > 0): ?>
                    <p class="text-sm text-ink-muted">
                        <span class="font-semibold text-ink"><?php echo e($tutorCount); ?> guru</span> sudah terverifikasi dan siap mengajar.
                    </p>
                <?php endif; ?>
            </div>

            <div class="relative flex justify-center lg:justify-end">
                <div class="absolute -inset-4 -z-10 rounded-[2rem] bg-[radial-gradient(circle_at_top,rgba(111,209,215,0.22),transparent_42%),radial-gradient(circle_at_bottom_right,rgba(93,248,216,0.18),transparent_38%)] blur-2xl"></div>

                <div class="w-full max-w-md rounded-[2rem] bg-white border border-line shadow-[0_22px_55px_rgba(9,60,93,0.10)] p-5 sm:p-6 rotate-[-1deg]">
                    <div class="flex items-center gap-3.5 mb-5">
                        <div class="relative shrink-0">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-board to-chalk flex items-center justify-center font-display font-semibold text-white ring-4 ring-board/10" aria-hidden="true">B</div>
                            <span class="absolute -bottom-1 -right-1 inline-flex h-5 w-5 items-center justify-center rounded-full bg-mark text-board ring-2 ring-white" aria-hidden="true">
                                <svg class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                            </span>
                        </div>
                        <div class="min-w-0">
                            <div class="flex flex-wrap items-center gap-2">
                                <p class="font-semibold text-ink text-sm sm:text-base">Budi Santoso</p>
                                <span class="inline-flex items-center gap-1 rounded-full bg-mark/20 px-2 py-0.5 text-[10px] font-semibold uppercase tracking-wide text-board">
                                    Terverifikasi
                                </span>
                            </div>
                            <p class="text-xs sm:text-sm text-ink-muted">Guru Matematika &amp; Fisika</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-1.5 text-sm mb-3">
                        <svg class="w-4 h-4 text-chalk shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M10 1.5l2.6 5.6 6.1.6-4.6 4.1 1.3 6-5.4-3.1-5.4 3.1 1.3-6-4.6-4.1 6.1-.6z"/></svg>
                        <span class="font-medium text-ink">4.8</span>
                        <span class="text-ink-muted">(12 ulasan)</span>
                    </div>

                    <div class="flex gap-1.5 mb-4 flex-wrap">
                        <span class="text-xs bg-chalk/15 text-board px-2.5 py-1 rounded-full font-medium border border-chalk/20">Matematika · SMA</span>
                        <span class="text-xs bg-chalk/15 text-board px-2.5 py-1 rounded-full font-medium border border-chalk/20">Fisika · SMA</span>
                    </div>

                    <div class="rounded-2xl bg-paper-alt border border-line p-4">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-xs uppercase tracking-[0.18em] text-ink-muted font-semibold mb-1">Mulai dari</p>
                                <p class="font-display text-3xl font-semibold text-ink tracking-tight">Rp80rb</p>
                            </div>
                            <div class="h-12 w-12 rounded-2xl bg-chalk/15 flex items-center justify-center text-ink" aria-hidden="true">
                                <svg class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor"><path d="M10 1.5l2.6 5.6 6.1.6-4.6 4.1 1.3 6-5.4-3.1-5.4 3.1 1.3-6-4.6-4.1 6.1-.6z"/></svg>
                            </div>
                        </div>
                        <div class="mt-4 h-px bg-line"></div>
                        <div class="pt-3 flex items-center justify-between text-sm gap-4">
                            <span class="text-ink-muted">Online &amp; tatap muka</span>
                            <span class="font-semibold text-ink">siap booking</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="chalk-divider pt-16 pb-16">
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12">
            <p class="text-sm font-semibold text-board mb-3 tracking-[0.22em] uppercase">Cara kerja TemanLes</p>
            <h2 class="font-display text-2xl sm:text-3xl font-semibold text-ink">Cara kerjanya</h2>
            <div class="mx-auto mt-4 h-px w-20 bg-line"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-0 items-stretch">
            <article class="group relative rounded-[1.75rem] border border-line border-t-4 border-t-board bg-white p-7 sm:p-8 shadow-sm lg:rounded-r-none lg:border-r-0 transition-shadow hover:shadow-[0_18px_48px_rgba(9,60,93,0.08)]">
                <div class="flex items-start justify-between gap-4 mb-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-board/10 text-board ring-1 ring-board/15" aria-hidden="true">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg>
                    </div>
                    <span class="font-display text-5xl leading-none font-semibold text-board/25">01</span>
                </div>
                <h3 class="text-2xl font-semibold text-ink mb-3">Cari &amp; pilih guru</h3>
                <p class="text-base leading-7 text-ink-muted max-w-md">Filter berdasarkan mapel, jenjang, harga, dan cara belajar — online atau tatap muka.</p>
            </article>

            <article class="group relative rounded-[1.75rem] border border-line border-t-4 border-t-chalk bg-white p-7 sm:p-8 shadow-sm lg:rounded-none lg:border-x-0 lg:border-l-0 transition-shadow hover:shadow-[0_18px_48px_rgba(9,60,93,0.08)]">
                <div class="flex items-start justify-between gap-4 mb-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-chalk/15 text-board ring-1 ring-chalk/25" aria-hidden="true">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                    </div>
                    <span class="font-display text-5xl leading-none font-semibold text-chalk/50">02</span>
                </div>
                <h3 class="text-2xl font-semibold text-ink mb-3">Booking &amp; bayar</h3>
                <p class="text-base leading-7 text-ink-muted max-w-md">Tentukan jadwal, transfer ke rekening resmi TemanLes, unggah bukti — tim kami verifikasi.</p>
            </article>

            <article class="group relative rounded-[1.75rem] border border-line border-t-4 border-t-mark bg-white p-7 sm:p-8 shadow-sm lg:rounded-l-none transition-shadow hover:shadow-[0_18px_48px_rgba(9,60,93,0.08)]">
                <div class="flex items-start justify-between gap-4 mb-6">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-mark/20 text-board ring-1 ring-mark/30" aria-hidden="true">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7h16"/><path d="M7 7v10"/><path d="M17 7v10"/><path d="M6 17h12"/><path d="M9 21h6"/><path d="m9 3 3 3 3-3"/></svg>
                    </div>
                    <span class="font-display text-5xl leading-none font-semibold text-mark/60">03</span>
                </div>
                <h3 class="text-2xl font-semibold text-ink mb-3">Belajar dengan tenang</h3>
                <p class="text-base leading-7 text-ink-muted max-w-md">Mulai sesi belajar setelah pembayaran aman dan guru siap mengajar sesuai jadwal.</p>
            </article>
        </div>
    </section>

    <section class="py-14">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            <div class="rounded-[2rem] bg-white border border-line border-l-4 border-l-board shadow-[0_18px_48px_rgba(9,60,93,0.06)] p-7 sm:p-8 lg:p-10">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-chalk/10 text-board text-sm font-medium mb-5 border border-chalk/15">
                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 1.5a5.5 5.5 0 00-5.5 5.5v2.5H4a1.5 1.5 0 00-1.5 1.5v5A1.5 1.5 0 004 17.5h12a1.5 1.5 0 001.5-1.5v-5A1.5 1.5 0 0016 9.5h-.5V7A5.5 5.5 0 0010 1.5zm-3.5 8V7a3.5 3.5 0 117 0v2.5h-7z" clip-rule="evenodd"/></svg>
                    Keamanan pembayaran
                </div>
                <h2 class="font-display text-2xl sm:text-3xl font-semibold text-ink max-w-lg">Dana kamu aman, sampai les benar-benar selesai.</h2>
                <p class="mt-4 text-ink-muted leading-7 max-w-lg">Pembayaran masuk ke sistem TemanLes dulu, lalu diverifikasi sebelum diteruskan ke guru. Kamu tetap pegang kendali sampai sesi benar-benar selesai.</p>
            </div>

            <div class="rounded-[2rem] bg-white border border-line p-7 sm:p-8 lg:p-10 shadow-[0_18px_48px_rgba(9,60,93,0.05)]">
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 rounded-2xl bg-mark/10 px-4 py-3">
                        <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-mark/25 text-board" aria-hidden="true">
                            <svg class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                        </span>
                        <span class="text-ink">Bukti transfer diverifikasi manual oleh tim kami</span>
                    </li>
                    <li class="flex items-start gap-3 rounded-2xl bg-board/5 px-4 py-3">
                        <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-mark/25 text-board" aria-hidden="true">
                            <svg class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                        </span>
                        <span class="text-ink">Guru wajib melengkapi profil &amp; ijazah sebelum tampil di marketplace</span>
                    </li>
                    <li class="flex items-start gap-3 rounded-2xl bg-chalk/10 px-4 py-3">
                        <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-mark/25 text-board" aria-hidden="true">
                            <svg class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                        </span>
                        <span class="text-ink">Konfirmasi dua arah sebelum dana cair ke guru</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <?php if($subjects->isNotEmpty()): ?>
        <section class="chalk-divider pt-14 pb-14">
            <div class="text-center max-w-2xl mx-auto mb-8">
                <p class="text-sm font-semibold text-board mb-3 tracking-[0.22em] uppercase">Pilihan mapel</p>
                <h2 class="font-display text-2xl sm:text-3xl font-semibold text-ink">Mapel yang tersedia</h2>
            </div>

            <div class="flex flex-wrap justify-center gap-3 max-w-5xl mx-auto">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <span class="inline-flex items-center gap-2 text-sm bg-chalk/15 text-board px-4 py-2.5 rounded-full font-medium whitespace-nowrap border border-chalk/30 shadow-sm hover:bg-mark/25 hover:border-mark/50 hover:-translate-y-0.5 transition-all">
                        <svg class="w-3.5 h-3.5 shrink-0 text-board" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M10 2a8 8 0 1 0 8 8 8 8 0 0 0-8-8Zm1 12.5H9v-2h2Zm1.6-6.3-.9.9A2.7 2.7 0 0 0 11 11h-2v-.5a3.6 3.6 0 0 1 1.1-2.6l1.2-1.2a1.6 1.6 0 1 0-2.7-1.1H7.5a3.5 3.5 0 1 1 7 0 3.3 3.3 0 0 1-1.9 3z"/></svg>
                        <?php echo e($subject->name); ?>

                    </span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <section class="chalk-divider pt-14 pb-8">
        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-ink to-board text-white px-7 py-12 sm:px-10 sm:py-14 text-center shadow-[0_24px_60px_rgba(9,60,93,0.30)]">
            <div class="absolute -top-10 -right-10 -z-0 h-40 w-40 rounded-full bg-mark/20 blur-2xl" aria-hidden="true"></div>
            <div class="absolute -bottom-12 -left-10 -z-0 h-40 w-40 rounded-full bg-chalk/20 blur-2xl" aria-hidden="true"></div>
            <div class="relative">
                <h2 class="font-display text-2xl sm:text-3xl font-semibold">Siap mulai belajar?</h2>
                <p class="mt-4 text-white/80 max-w-2xl mx-auto leading-7">Daftar gratis, cari guru yang cocok dalam hitungan menit.</p>
                <a href="<?php echo e(route('register')); ?>" class="inline-flex items-center justify-center mt-7 bg-mark text-ink px-7 py-3.5 rounded-xl font-semibold hover:bg-chalk transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 focus-visible:ring-offset-board">
                Daftar sekarang
                <svg class="ml-2 h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M3 10a1 1 0 0 1 1-1h10.586L10.293 4.707a1 1 0 1 1 1.414-1.414l6 6a1 1 0 0 1 0 1.414l-6 6a1 1 0 1 1-1.414-1.414L14.586 11H4a1 1 0 0 1-1-1Z" clip-rule="evenodd"/></svg>
            </a>
            </div>
        </div>
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
<?php endif; ?><?php /**PATH C:\laragon\www\TemanLes\resources\views/landing.blade.php ENDPATH**/ ?>