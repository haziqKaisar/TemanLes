<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Edit Profil — TemanLes']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Edit Profil — TemanLes']); ?>
    <?php if (isset($component)) { $__componentOriginale498924ff5b74ca89381c496bdb04986 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale498924ff5b74ca89381c496bdb04986 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.teacher-subnav','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('teacher-subnav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale498924ff5b74ca89381c496bdb04986)): ?>
<?php $attributes = $__attributesOriginale498924ff5b74ca89381c496bdb04986; ?>
<?php unset($__attributesOriginale498924ff5b74ca89381c496bdb04986); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale498924ff5b74ca89381c496bdb04986)): ?>
<?php $component = $__componentOriginale498924ff5b74ca89381c496bdb04986; ?>
<?php unset($__componentOriginale498924ff5b74ca89381c496bdb04986); ?>
<?php endif; ?>

    <!-- Header Section -->
    <div class="mb-8">
        <span class="inline-block text-xs font-semibold text-[#3B7597] bg-[#6FD1D7]/20 px-3 py-1 rounded-md mb-2">
            Pengaturan Akun
        </span>
        <h1 class="font-display text-2xl sm:text-3xl font-bold text-[#093C5D]">Edit Profil</h1>
        <p class="text-[#3B7597] text-sm mt-0.5">Perbarui informasi yang tampil ke murid di marketplace</p>
    </div>

    <!-- Form Container -->
    <div class="max-w-3xl bg-white border border-gray-200 rounded-2xl p-6 sm:p-8 shadow-sm">
        <form method="POST" action="<?php echo e(route('teacher.profile.update')); ?>" class="space-y-8" x-data="gpsProfilePicker(<?php echo \Illuminate\Support\Js::from($tutor->default_latitude)->toHtml() ?>, <?php echo \Illuminate\Support\Js::from($tutor->default_longitude)->toHtml() ?>)" x-init="init()">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Section 1: Data Diri -->
            <div class="bg-[#6FD1D7]/5 p-5 rounded-xl border border-[#6FD1D7]/30">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-2 h-5 bg-[#3B7597] rounded-full"></div>
                    <h2 class="font-bold text-[#093C5D] text-base">Data Diri</h2>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-[#093C5D] mb-1.5">Nama lengkap</label>
                        <input id="name" type="text" name="name" value="<?php echo e(old('name', auth()->user()->name)); ?>"
                            class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-[#093C5D] mb-1.5">Nomor HP <span class="text-[#3B7597] font-normal">(opsional)</span></label>
                        <input id="phone" type="text" name="phone" value="<?php echo e(old('phone', auth()->user()->phone)); ?>"
                            class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <!-- Section 2: Profil Mengajar -->
            <div class="bg-gray-50/80 p-5 rounded-xl border border-gray-200">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-2 h-5 bg-[#6FD1D7] rounded-full"></div>
                    <h2 class="font-bold text-[#093C5D] text-base">Profil Mengajar</h2>
                </div>

                <div class="mb-4">
                    <label for="headline" class="block text-sm font-semibold text-[#093C5D] mb-1.5">Judul singkat</label>
                    <input id="headline" type="text" name="headline" value="<?php echo e(old('headline', $tutor->headline)); ?>" placeholder="Contoh: Guru Matematika & Fisika Berpengalaman 5 Tahun"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                    <?php $__errorArgs = ['headline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="mb-4">
                    <label for="bio" class="block text-sm font-semibold text-[#093C5D] mb-1.5">Tentang saya</label>
                    <textarea id="bio" name="bio" rows="4"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all"
                        placeholder="Ceritakan pengalaman dan gaya mengajarmu"><?php echo e(old('bio', $tutor->bio)); ?></textarea>
                    <?php $__errorArgs = ['bio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="education" class="block text-sm font-semibold text-[#093C5D] mb-1.5">Pendidikan</label>
                        <input id="education" type="text" name="education" value="<?php echo e(old('education', $tutor->education)); ?>" placeholder="Contoh: S1 Pendidikan Matematika - UI"
                            class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                        <?php $__errorArgs = ['education'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div>
                        <label for="experience_years" class="block text-sm font-semibold text-[#093C5D] mb-1.5">Lama pengalaman (tahun)</label>
                        <input id="experience_years" type="number" min="0" max="60" name="experience_years" value="<?php echo e(old('experience_years', $tutor->experience_years)); ?>"
                            class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                        <?php $__errorArgs = ['experience_years'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <!-- Section 3: Cara Mengajar & Lokasi -->
            <div class="bg-[#5DF8D8]/10 p-5 rounded-xl border border-[#5DF8D8]/40">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-2 h-5 bg-[#093C5D] rounded-full"></div>
                    <h2 class="font-bold text-[#093C5D] text-base">Cara &amp; Lokasi Mengajar</h2>
                </div>

                <fieldset class="mb-5">
                    <legend class="sr-only">Cara mengajar</legend>
                    <div class="grid grid-cols-3 gap-3">
                        <?php $__currentLoopData = ['online' => 'Online', 'offline' => 'Tatap muka', 'both' => 'Keduanya']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $lbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="relative block cursor-pointer">
                                <input type="radio" name="teaching_mode" value="<?php echo e($val); ?>" class="sr-only peer" x-on:change="toggleMap('<?php echo e($val); ?>')" <?php if(old('teaching_mode', $tutor->teaching_mode) == $val): echo 'checked'; endif; ?>>
                                <div class="text-center py-3 px-2 rounded-xl border border-gray-300 bg-white text-sm font-bold text-[#093C5D] transition-all peer-checked:border-[#093C5D] peer-checked:bg-[#093C5D] peer-checked:text-[#5DF8D8] peer-checked:shadow-sm hover:border-[#3B7597]">
                                    <?php echo e($lbl); ?>

                                </div>
                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php $__errorArgs = ['teaching_mode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </fieldset>

                <!-- Map Picker Block -->
                <div x-show="showMap" x-cloak class="space-y-4 pt-2">
                    <p class="text-sm font-semibold text-[#093C5D]">Pilih Lokasi Mengajar Default pada Peta</p>
                    <div id="map-picker-profile" class="w-full h-64 rounded-xl border-2 border-[#3B7597]/30 shadow-inner overflow-hidden"></div>

                    <input type="hidden" name="default_latitude" id="default_latitude" value="<?php echo e(old('default_latitude', $tutor->default_latitude)); ?>">
                    <input type="hidden" name="default_longitude" id="default_longitude" value="<?php echo e(old('default_longitude', $tutor->default_longitude)); ?>">

                    <div>
                        <label for="default_address" class="block text-sm font-semibold text-[#093C5D] mb-1.5">Alamat Lengkap</label>
                        <textarea id="default_address" name="default_address" rows="2"
                            class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all"
                            placeholder="Tuliskan detail jalan, nomor rumah, atau patokan lokasi"><?php echo e(old('default_address', $tutor->default_address)); ?></textarea>
                        <?php $__errorArgs = ['default_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-rose-600 text-xs mt-1.5 font-medium"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button type="submit" 
                        class="w-full sm:w-auto bg-[#093C5D] text-[#5DF8D8] rounded-xl px-8 py-3.5 font-bold hover:bg-[#3B7597] hover:text-white transition-all shadow-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#093C5D]">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <script>
        function gpsProfilePicker(initLat, initLng) {
            return {
                map: null,
                marker: null,
                showMap: <?php echo e(in_array(old('teaching_mode', $tutor->teaching_mode), ['offline', 'both']) ? 'true' : 'false'); ?>,

                init() {
                    if (this.showMap) this.$nextTick(() => this.initMap(initLat, initLng));
                },

                toggleMap(mode) {
                    this.showMap = mode === 'offline' || mode === 'both';
                    if (this.showMap && !this.map) {
                        this.$nextTick(() => this.initMap(initLat, initLng));
                    }
                },

                initMap(lat, lng) {
                    const startLat = lat || -6.5971, startLng = lng || 106.8060;
                    this.map = L.map('map-picker-profile').setView([startLat, startLng], 13);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; OpenStreetMap contributors'
                    }).addTo(this.map);
                    this.marker = L.marker([startLat, startLng], { draggable: true }).addTo(this.map);
                    this.marker.on('dragend', (e) => this.setLocation(e.target.getLatLng()));
                    this.map.on('click', (e) => { this.marker.setLatLng(e.latlng); this.setLocation(e.latlng); });
                },

                setLocation(latlng) {
                    document.getElementById('default_latitude').value = latlng.lat;
                    document.getElementById('default_longitude').value = latlng.lng;
                }
            }
        }
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\TemanLes\resources\views/teacher/profile.blade.php ENDPATH**/ ?>