<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($title ?? 'TemanLes'); ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-paper-alt antialiased">

    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6">
        <div class="w-full max-w-5xl bg-white rounded-3xl shadow-sm overflow-hidden grid grid-cols-1 lg:grid-cols-2">

            <!-- Panel Form -->
            <div class="p-8 sm:p-12 flex flex-col justify-center">
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2 font-display font-semibold text-lg text-ink mb-10 w-fit focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2 rounded">
                    <span class="inline-block w-2 h-2 rounded-full bg-mark" aria-hidden="true"></span>
                    Teman<span class="text-board">Les</span>
                </a>

                <?php echo e($slot); ?>

            </div>

             <!-- Panel Kanan -->
            <div class="hidden lg:flex relative bg-board items-center justify-center p-10 overflow-hidden">

                <!-- Titik kapur dekoratif -->
                <div class="absolute inset-0" aria-hidden="true">
                    <span class="absolute top-14 left-16 w-1.5 h-1.5 rounded-full bg-chalk/40"></span>
                    <span class="absolute top-24 right-20 w-2 h-2 rounded-full bg-chalk/30"></span>
                    <span class="absolute bottom-28 left-24 w-1.5 h-1.5 rounded-full bg-chalk/40"></span>
                    <span class="absolute bottom-16 right-16 w-2.5 h-2.5 rounded-full bg-chalk/25"></span>
                </div>

                <!-- Garis kapur putus-putus melengkung dekoratif -->
                <svg class="absolute inset-0 w-full h-full opacity-[0.08]" viewBox="0 0 400 500" aria-hidden="true">
                    <path d="M-20 100 Q 200 60 420 120" stroke="#F5F5F0" stroke-width="2" stroke-dasharray="6 8" fill="none"/>
                    <path d="M-20 420 Q 200 460 420 400" stroke="#F5F5F0" stroke-width="2" stroke-dasharray="6 8" fill="none"/>
                </svg>

                <div class="relative w-full max-w-xs flex flex-col items-center">

                    <!-- Badge escrow -->
                    <div class="relative z-20 self-end mr-6 -mb-5 bg-white border border-line rounded-xl px-3.5 py-2.5 shadow-lg rotate-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-success shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M10 1a5 5 0 00-5 5v2H4a1 1 0 00-1 1v8a1 1 0 001 1h12a1 1 0 001-1V9a1 1 0 00-1-1h-1V6a5 5 0 00-5-5zm3 7V6a3 3 0 10-6 0v2h6z" clip-rule="evenodd"/></svg>
                        <span class="text-xs font-medium text-ink whitespace-nowrap">Dana aman &amp; ditahan</span>
                    </div>

                    <!-- Kartu profil guru -->
                    <div class="relative z-10 w-full bg-white border border-line rounded-2xl p-5 shadow-xl">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-11 h-11 rounded-full bg-board flex items-center justify-center font-display font-semibold text-white" aria-hidden="true">B</div>
                            <div>
                                <p class="font-semibold text-ink text-sm">Budi Santoso</p>
                                <p class="text-xs text-ink-muted">Guru Matematika &amp; Fisika</p>
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
                            <span class="text-ink-muted">Online &amp; tatap muka</span>
                            <span class="font-semibold text-ink">mulai Rp80rb</span>
                        </div>
                    </div>

                    <!-- Badge konfirmasi 2 arah -->
                    <div class="relative z-20 self-start -ml-6 -mt-5 bg-white border border-line margin-mark rounded-r-lg px-3.5 py-2.5 shadow-lg -rotate-2 flex items-center gap-2">
                        <svg class="w-4 h-4 text-board shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                        <span class="text-xs font-medium text-ink whitespace-nowrap">Konfirmasi 2 arah</span>
                    </div>

                    <p class="text-center text-xs text-white/70 mt-10">Contoh tampilan profil guru di TemanLes</p>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
<?php /**PATH C:\laragon\www\TemanLes\resources\views/layouts/guest.blade.php ENDPATH**/ ?>