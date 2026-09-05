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

    <!-- Hero Section -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-8 lg:py-16">
        <div>
            <span class="inline-flex items-center gap-2 text-xs font-bold text-[#093C5D] bg-gradient-to-r from-[#5DF8D8] to-[#6FD1D7] px-4 py-1.5 rounded-full mb-4 shadow-sm border border-[#5DF8D8]/50">
                <span class="w-2 h-2 rounded-full bg-[#093C5D]"></span>
                Marketplace Guru Les Privat
            </span>
            <h1 class="font-display text-4xl sm:text-5xl font-extrabold text-[#093C5D] leading-[1.15] mb-5">
                Cari guru privat,<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-[#3B7597] to-[#093C5D]">bukan tebak-tebakan.</span>
            </h1>
            <p class="text-[#3B7597] text-lg mb-8 max-w-md leading-relaxed font-medium">
                Bandingkan guru berdasarkan mapel, jenjang, dan harga. Booking, bayar aman, belajar — semua di satu tempat.
            </p>

            <div class="flex flex-wrap gap-3.5 mb-8">
                <a href="<?php echo e(route('register')); ?>" class="bg-[#093C5D] text-[#5DF8D8] px-7 py-3.5 rounded-xl font-bold hover:bg-[#3B7597] hover:text-white transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 focus-visible:outline-none">
                    Daftar sebagai murid
                </a>
                <a href="<?php echo e(route('login')); ?>" class="border-2 border-[#3B7597]/30 bg-white px-7 py-3.5 rounded-xl font-bold text-[#093C5D] hover:bg-[#6FD1D7]/10 hover:border-[#3B7597] transition-all focus-visible:outline-none">
                    Saya sudah punya akun
                </a>
            </div>

            <?php if($tutorCount > 0): ?>
                <div class="inline-flex items-center gap-2 bg-[#5DF8D8]/20 border border-[#5DF8D8]/60 px-3.5 py-1.5 rounded-xl">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#3B7597] animate-pulse"></span>
                    <p class="text-xs sm:text-sm text-[#093C5D] font-medium">
                        <span class="font-bold text-[#093C5D]"><?php echo e($tutorCount); ?> guru</span> sudah terverifikasi &amp; siap mengajar.
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Preview Card Profil Guru -->
        <div class="relative">
            <!-- Decorative Glow Background -->
            <div class="absolute -inset-2 bg-gradient-to-r from-[#5DF8D8] to-[#6FD1D7] rounded-3xl blur-xl opacity-40"></div>

            <div class="relative bg-white border-2 border-[#6FD1D7]/50 rounded-2xl p-6 shadow-2xl -rotate-2 max-w-sm mx-auto transition-transform hover:rotate-0 transition-all duration-300">
                <div class="flex items-center gap-3.5 mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#093C5D] to-[#3B7597] flex items-center justify-center font-display font-extrabold text-[#5DF8D8] text-xl shadow-md" aria-hidden="true">B</div>
                    <div>
                        <p class="font-bold text-[#093C5D] text-base">Budi Santoso</p>
                        <p class="text-xs text-[#3B7597] font-semibold">Guru Matematika &amp; Fisika</p>
                    </div>
                </div>
                
                <div class="flex items-center gap-1.5 text-sm mb-4 bg-gradient-to-r from-[#5DF8D8]/20 to-[#6FD1D7]/20 border border-[#5DF8D8]/40 p-2.5 rounded-xl">
                    <svg class="w-4 h-4 text-[#093C5D]" viewBox="0 0 20 20" fill="#5DF8D8" stroke="#093C5D" stroke-width="1.2" aria-hidden="true"><path d="M10 1.5l2.6 5.6 6.1.6-4.6 4.1 1.3 6-5.4-3.1-5.4 3.1 1.3-6-4.6-4.1 6.1-.6z"/></svg>
                    <span class="font-extrabold text-[#093C5D]">4.8</span>
                    <span class="text-xs text-[#3B7597] font-medium">(12 ulasan)</span>
                </div>

                <div class="flex flex-wrap gap-1.5 mb-5">
                    <span class="text-xs bg-[#5DF8D8] text-[#093C5D] px-3 py-1 rounded-full font-bold shadow-xs">Matematika · SMA</span>
                    <span class="text-xs bg-[#6FD1D7] text-[#093C5D] px-3 py-1 rounded-full font-bold shadow-xs">Fisika · SMA</span>
                </div>

                <div class="border-t border-gray-100 pt-3 flex items-center justify-between text-xs sm:text-sm">
                    <span class="text-[#3B7597] font-semibold">Online &amp; tatap muka</span>
                    <span class="font-extrabold text-[#093C5D] text-base bg-[#6FD1D7]/20 px-2.5 py-0.5 rounded-lg">mulai Rp80rb</span>
                </div>
            </div>
            <p class="text-center text-xs text-[#3B7597] mt-4 font-semibold">Contoh tampilan profil guru di marketplace</p>
        </div>
    </section>

    <!-- Section: Cara Kerja -->
    <section class="border-t border-gray-200/80 pt-16 pb-16">
        <div class="text-center mb-12">
            <span class="text-xs font-bold text-[#093C5D] bg-[#5DF8D8] px-3.5 py-1 rounded-full">Langkah Mudah</span>
            <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-[#093C5D] mt-2">Cara kerjanya</h2>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
            <div class="bg-gradient-to-b from-white to-[#6FD1D7]/10 p-6 rounded-2xl border-2 border-[#6FD1D7]/30 shadow-sm relative overflow-hidden">
                <span class="font-display text-4xl font-extrabold text-[#3B7597]/20 absolute top-2 right-4">01</span>
                <div class="w-10 h-10 rounded-xl bg-[#093C5D] text-[#5DF8D8] flex items-center justify-center font-bold mb-4">1</div>
                <h3 class="font-bold text-[#093C5D] text-lg mb-2 relative z-10">Cari &amp; pilih guru</h3>
                <p class="text-sm text-[#3B7597] relative z-10 leading-relaxed font-medium">Filter berdasarkan mapel, jenjang, harga, dan cara belajar — online atau tatap muka.</p>
            </div>

            <div class="bg-gradient-to-b from-white to-[#5DF8D8]/10 p-6 rounded-2xl border-2 border-[#5DF8D8]/40 shadow-sm relative overflow-hidden">
                <span class="font-display text-4xl font-extrabold text-[#3B7597]/20 absolute top-2 right-4">02</span>
                <div class="w-10 h-10 rounded-xl bg-[#3B7597] text-[#5DF8D8] flex items-center justify-center font-bold mb-4">2</div>
                <h3 class="font-bold text-[#093C5D] text-lg mb-2 relative z-10">Booking &amp; bayar</h3>
                <p class="text-sm text-[#3B7597] relative z-10 leading-relaxed font-medium">Tentukan jadwal, transfer ke rekening resmi TemanLes, unggah bukti — tim kami verifikasi.</p>
            </div>

            <div class="bg-gradient-to-b from-white to-[#6FD1D7]/10 p-6 rounded-2xl border-2 border-[#6FD1D7]/30 shadow-sm relative overflow-hidden">
                <span class="font-display text-4xl font-extrabold text-[#3B7597]/20 absolute top-2 right-4">03</span>
                <div class="w-10 h-10 rounded-xl bg-[#093C5D] text-[#5DF8D8] flex items-center justify-center font-bold mb-4">3</div>
                <h3 class="font-bold text-[#093C5D] text-lg mb-2 relative z-10">Belajar dengan tenang</h3>
                <p class="text-sm text-[#3B7597] relative z-10 leading-relaxed font-medium">Dana kamu ditahan sampai les selesai dan dikonfirmasi kedua pihak — bukan langsung ke guru.</p>
            </div>
        </div>
    </section>

    <!-- Section: Keamanan Transaksi -->
    <section class="pb-16">
        <div class="bg-gradient-to-br from-[#093C5D] via-[#3B7597] to-[#093C5D] rounded-3xl p-8 sm:p-12 text-white shadow-xl relative overflow-hidden">
            <!-- Decorative Accent Circle -->
            <div class="absolute -bottom-10 -right-10 w-60 h-60 bg-[#5DF8D8]/20 rounded-full blur-2xl"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center relative z-10">
                <div>
                    <span class="inline-block text-xs font-extrabold text-[#093C5D] bg-[#5DF8D8] px-3 py-1 rounded-md mb-3">Garansi Aman</span>
                    <h2 class="font-display text-2xl sm:text-3xl font-extrabold text-white mb-4 leading-snug">
                        Dana kamu aman, sampai les benar-benar selesai.
                    </h2>
                    <p class="text-sm text-[#6FD1D7] leading-relaxed font-medium">
                        Pembayaran tidak langsung ke guru. Uangmu ditahan sistem sampai admin memverifikasi transfer, dan hanya dicairkan setelah <strong class="text-[#5DF8D8] font-bold">kamu dan guru sama-sama mengonfirmasi</strong> bahwa les sudah dilaksanakan.
                    </p>
                </div>

                <ul class="space-y-4 text-sm bg-white/10 backdrop-blur-md p-6 rounded-2xl border border-white/20">
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-[#5DF8D8] flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                            <svg class="w-4 h-4 text-[#093C5D]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                        </div>
                        <span class="text-white font-semibold">Bukti transfer diverifikasi manual oleh tim kami</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-[#5DF8D8] flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                            <svg class="w-4 h-4 text-[#093C5D]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                        </div>
                        <span class="text-white font-semibold">Guru wajib melengkapi profil &amp; ijazah sebelum tampil di marketplace</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="w-6 h-6 rounded-full bg-[#5DF8D8] flex items-center justify-center shrink-0 mt-0.5 shadow-sm">
                            <svg class="w-4 h-4 text-[#093C5D]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                        </div>
                        <span class="text-white font-semibold">Konfirmasi dua arah sebelum dana cair ke guru</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Section: List Mapel -->
    <?php if($subjects->isNotEmpty()): ?>
        <section class="border-t border-gray-200/80 pt-16 pb-16">
            <h2 class="font-display text-2xl font-extrabold text-[#093C5D] mb-6 text-center">Mata Pelajaran Populer</h2>
            <div class="flex flex-wrap justify-center gap-3">
                <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="text-sm bg-gradient-to-r from-[#6FD1D7]/30 to-[#5DF8D8]/30 text-[#093C5D] border-2 border-[#6FD1D7]/50 px-4 py-2 rounded-xl font-bold hover:from-[#5DF8D8] hover:to-[#6FD1D7] transition-all cursor-default shadow-2xs">
                        <?php echo e($subject->name); ?>

                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- Call to Action (CTA) -->
    <section class="border-t border-gray-200/80 pt-16 pb-12 text-center bg-gradient-to-b from-transparent to-[#6FD1D7]/10 rounded-b-3xl">
        <h2 class="font-display text-3xl font-extrabold text-[#093C5D] mb-3">Siap mulai belajar?</h2>
        <p class="text-[#3B7597] mb-8 max-w-sm mx-auto font-medium">Daftar gratis, cari guru yang cocok dalam hitungan menit.</p>
        <a href="<?php echo e(route('register')); ?>" class="inline-block bg-[#093C5D] text-[#5DF8D8] px-8 py-4 rounded-xl font-extrabold hover:bg-[#3B7597] hover:text-white transition-all shadow-xl hover:shadow-2xl transform hover:-translate-y-1 focus-visible:outline-none">
            Daftar Sekarang
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
<?php endif; ?><?php /**PATH C:\laragon\www\TemanLes\resources\views/landing.blade.php ENDPATH**/ ?>