<?php

use App\Models\BankAccount;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Tutor;
use App\Models\TutorSubject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('components.layouts.app')]
#[Title('Booking Les Private')]
new class extends Component {
    use WithFileUploads;

    public Tutor $tutor;
    public int $step = 1;

    // Step 1
    public $tutor_subject_id;
    public $scheduled_date;
    public $scheduled_time;
    public $duration_minutes = 60;

    // Step 2
    public $teaching_mode;
    public $location_lat;
    public $location_lng;
    public $location_address = '';
    public $location_note = '';

    // Step 4
    public $bank_account_id;
    public $proof_file;
    public $transfer_date;
    public $sender_name;

    public ?int $orderId = null;

    /** Route model binding otomatis mengisi $tutor dari {tutor} di URL. */
    public function mount(Tutor $tutor): void
    {
        abort_unless($tutor->verification_status === 'verified', 404);
        $this->tutor = $tutor;

        if ($tutor->teaching_mode !== 'both') {
            $this->teaching_mode = $tutor->teaching_mode;
        }
    }

    #[Computed]
    public function subjects()
    {
        return $this->tutor->tutorSubjects()->where('is_active', true)->with('subject')->get();
    }

    #[Computed]
    public function selectedSubject(): ?TutorSubject
    {
        return $this->subjects->firstWhere('id', (int) $this->tutor_subject_id);
    }

    #[Computed]
    public function estimatedTotal(): float
    {
        if (! $this->selectedSubject) {
            return 0;
        }

        return round($this->selectedSubject->price_per_hour * ($this->duration_minutes / 60), 2);
    }

    #[Computed]
    public function bankAccounts()
    {
        return BankAccount::where('is_active', true)->get();
    }

    #[Computed]
    public function order(): ?Order
    {
        return $this->orderId ? Order::find($this->orderId) : null;
    }

    public function goToStep(int $step): void
    {
        if ($step < $this->step) {
            $this->step = $step;
        }
    }

    public function nextFromStep1(): void
    {
        $this->validate([
            'tutor_subject_id' => 'required|exists:tutor_subjects,id',
            'scheduled_date' => 'required|date|after_or_equal:today',
            'scheduled_time' => 'required',
            'duration_minutes' => 'required|integer|in:60,90,120',
        ]);

        $dayOfWeek = (int) date('w', strtotime($this->scheduled_date));
        $available = $this->tutor->availabilities()
            ->where('day_of_week', $dayOfWeek)
            ->where('is_active', true)
            ->where('start_time', '<=', $this->scheduled_time)
            ->where('end_time', '>=', $this->scheduled_time)
            ->exists();

        if (! $available) {
            $this->addError('scheduled_time', 'Guru tidak tersedia pada hari/jam tersebut. Silakan pilih jadwal lain.');
            return;
        }

        $this->step = 2;
    }

    public function nextFromStep2(): void
    {
        $rules = ['teaching_mode' => 'required|in:online,offline'];

        if ($this->teaching_mode === 'offline') {
            $rules = array_merge($rules, [
                'location_lat' => 'required|numeric|between:-90,90',
                'location_lng' => 'required|numeric|between:-180,180',
                'location_address' => 'required|string|max:500',
            ]);
        }

        $this->validate($rules);
        $this->step = 3;
    }

    public function submitBooking(): void
    {
        $this->validate([
            'tutor_subject_id' => 'required|exists:tutor_subjects,id',
            'teaching_mode' => 'required|in:online,offline',
        ]);

        $order = DB::transaction(function () {
            $order = new Order([
                'student_id' => Auth::id(),
                'tutor_id' => $this->tutor->id,
                'tutor_subject_id' => $this->tutor_subject_id,
                'teaching_mode' => $this->teaching_mode,
                'scheduled_date' => $this->scheduled_date,
                'scheduled_time' => $this->scheduled_time,
                'duration_minutes' => $this->duration_minutes,
                'location_lat' => $this->teaching_mode === 'offline' ? $this->location_lat : null,
                'location_lng' => $this->teaching_mode === 'offline' ? $this->location_lng : null,
                'location_address' => $this->teaching_mode === 'offline' ? $this->location_address : null,
                'location_note' => $this->teaching_mode === 'offline' ? $this->location_note : null,
                'status' => 'pending_payment',
            ]);

            $order->calculatePricing($this->selectedSubject->price_per_hour, $this->duration_minutes, 10);
            $order->save();

            return $order;
        });

        $this->orderId = $order->id;
        $this->step = 4;
    }

    public function uploadPayment(): void
    {
        $this->validate([
            'bank_account_id' => 'required|exists:bank_accounts,id',
            'proof_file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'transfer_date' => 'required|date|before_or_equal:today',
            'sender_name' => 'required|string|max:255',
        ]);

        DB::transaction(function () {
            $path = $this->proof_file->store('payment-proofs', 'public');

            Payment::create([
                'order_id' => $this->order->id,
                'bank_account_id' => $this->bank_account_id,
                'amount' => $this->order->total_price,
                'proof_file' => $path,
                'transfer_date' => $this->transfer_date,
                'sender_name' => $this->sender_name,
                'status' => 'pending',
            ]);

            $this->order->update(['status' => 'waiting_verification']);
        });

        $this->step = 5;
    }
};

?>

<div class="max-w-3xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        @foreach(['Mapel & Jadwal', 'Mode & Lokasi', 'Ringkasan', 'Pembayaran', 'Selesai'] as $i => $label)
            <div class="flex-1 flex flex-col items-center text-center">
                <button
                    wire:click="goToStep({{ $i + 1 }})"
                    class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-semibold
                        {{ $step > $i + 1 ? 'bg-emerald-500 text-white' : ($step == $i + 1 ? 'bg-indigo-600 text-white' : 'bg-slate-200 text-slate-500') }}">
                    {{ $step > $i + 1 ? '✓' : $i + 1 }}
                </button>
                <span class="text-[11px] mt-1 text-slate-500">{{ $label }}</span>
            </div>
            @if($i < 4)
                <div class="flex-1 h-0.5 {{ $step > $i + 1 ? 'bg-emerald-500' : 'bg-slate-200' }} mb-4"></div>
            @endif
        @endforeach
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <div class="flex items-center gap-3 mb-6 pb-6 border-b border-slate-100">
            <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center font-bold text-indigo-600">
                {{ substr($tutor->user->name, 0, 1) }}
            </div>
            <div>
                <p class="font-semibold">{{ $tutor->user->name }}</p>
                <p class="text-xs text-slate-500">{{ $tutor->headline }}</p>
            </div>
        </div>

        @if($step === 1)
            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium mb-1.5">Pilih Mata Pelajaran & Jenjang</label>
                    <select wire:model="tutor_subject_id" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">-- Pilih --</option>
                        @foreach($this->subjects as $ts)
                            <option value="{{ $ts->id }}">
                                {{ $ts->subject->name }} - Jenjang {{ $ts->level }} (Rp {{ number_format($ts->price_per_hour, 0, ',', '.') }}/jam)
                            </option>
                        @endforeach
                    </select>
                    @error('tutor_subject_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1.5">Tanggal</label>
                        <input type="date" wire:model="scheduled_date" min="{{ now()->format('Y-m-d') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        @error('scheduled_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1.5">Jam Mulai</label>
                        <input type="time" wire:model="scheduled_time"
                            class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        @error('scheduled_time') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1.5">Durasi</label>
                    <div class="flex gap-3">
                        @foreach([60 => '1 Jam', 90 => '1.5 Jam', 120 => '2 Jam'] as $val => $lbl)
                            <label class="flex-1">
                                <input type="radio" wire:model="duration_minutes" value="{{ $val }}" class="sr-only peer">
                                <div class="text-center py-2 rounded-lg border border-slate-300 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 cursor-pointer text-sm">
                                    {{ $lbl }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <button wire:click="nextFromStep1" class="w-full bg-indigo-600 text-white rounded-lg py-3 font-medium hover:bg-indigo-700">
                    Lanjutkan
                </button>
            </div>
        @endif

        @if($step === 2)
            <div class="space-y-5" x-data="gpsPicker(@entangle('location_lat'), @entangle('location_lng'), @entangle('location_address'))" x-init="init()">
                <div>
                    <label class="block text-sm font-medium mb-1.5">Mode Belajar</label>
                    <div class="grid grid-cols-2 gap-3">
                        @if(in_array($tutor->teaching_mode, ['online', 'both']))
                            <label>
                                <input type="radio" wire:model.live="teaching_mode" value="online" class="sr-only peer">
                                <div class="text-center py-3 rounded-lg border border-slate-300 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 cursor-pointer text-sm font-medium">
                                    💻 Online
                                </div>
                            </label>
                        @endif
                        @if(in_array($tutor->teaching_mode, ['offline', 'both']))
                            <label>
                                <input type="radio" wire:model.live="teaching_mode" value="offline" class="sr-only peer">
                                <div class="text-center py-3 rounded-lg border border-slate-300 peer-checked:border-indigo-600 peer-checked:bg-indigo-50 cursor-pointer text-sm font-medium">
                                    📍 Tatap Muka (Offline)
                                </div>
                            </label>
                        @endif
                    </div>
                    @error('teaching_mode') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                @if($teaching_mode === 'offline')
                    <div>
                        <label class="block text-sm font-medium mb-1.5">Tentukan Titik Lokasi di Peta</label>
                        <p class="text-xs text-slate-500 mb-2">Klik pada peta atau geser marker untuk menandai lokasi pertemuan.</p>

                        <div wire:ignore>
                            <div id="map-picker" class="w-full h-72 rounded-lg border border-slate-300"></div>
                        </div>

                        <button type="button" @click="locateMe()" class="mt-2 text-xs text-indigo-600 hover:underline">
                            📍 Gunakan lokasi saya saat ini
                        </button>

                        <div class="mt-3">
                            <label class="block text-sm font-medium mb-1.5">Alamat Lengkap</label>
                            <textarea wire:model="location_address" rows="2"
                                class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Alamat akan terisi otomatis, silakan sesuaikan jika perlu"></textarea>
                            @error('location_address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mt-3">
                            <label class="block text-sm font-medium mb-1.5">Patokan / Catatan Lokasi (opsional)</label>
                            <input type="text" wire:model="location_note"
                                class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Contoh: Rumah cat hijau sebelah minimarket">
                        </div>

                        @error('location_lat') <p class="text-red-500 text-xs mt-1">Silakan tandai titik lokasi pada peta.</p> @enderror
                    </div>
                @endif

                <div class="flex gap-3">
                    <button wire:click="$set('step', 1)" class="flex-1 border border-slate-300 rounded-lg py-3 font-medium hover:bg-slate-50">
                        Kembali
                    </button>
                    <button wire:click="nextFromStep2" class="flex-1 bg-indigo-600 text-white rounded-lg py-3 font-medium hover:bg-indigo-700">
                        Lanjutkan
                    </button>
                </div>
            </div>
        @endif

        @if($step === 3)
            <div class="space-y-4">
                <h3 class="font-semibold text-lg">Ringkasan Pesanan</h3>
                <dl class="text-sm divide-y divide-slate-100">
                    <div class="flex justify-between py-2">
                        <dt class="text-slate-500">Mapel & Jenjang</dt>
                        <dd class="font-medium">{{ $this->selectedSubject?->subject->name }} - {{ $this->selectedSubject?->level }}</dd>
                    </div>
                    <div class="flex justify-between py-2">
                        <dt class="text-slate-500">Jadwal</dt>
                        <dd class="font-medium">{{ \Carbon\Carbon::parse($scheduled_date)->translatedFormat('d M Y') }}, {{ $scheduled_time }}</dd>
                    </div>
                    <div class="flex justify-between py-2">
                        <dt class="text-slate-500">Durasi</dt>
                        <dd class="font-medium">{{ $duration_minutes }} menit</dd>
                    </div>
                    <div class="flex justify-between py-2">
                        <dt class="text-slate-500">Mode</dt>
                        <dd class="font-medium">{{ $teaching_mode === 'online' ? 'Online' : 'Tatap Muka' }}</dd>
                    </div>
                    @if($teaching_mode === 'offline')
                        <div class="flex justify-between py-2">
                            <dt class="text-slate-500">Lokasi</dt>
                            <dd class="font-medium text-right max-w-[60%]">{{ $location_address }}</dd>
                        </div>
                    @endif
                    <div class="flex justify-between py-3 text-base">
                        <dt class="font-semibold">Total Biaya</dt>
                        <dd class="font-bold text-indigo-600">Rp {{ number_format($this->estimatedTotal, 0, ',', '.') }}</dd>
                    </div>
                </dl>

                <div class="flex gap-3">
                    <button wire:click="$set('step', 2)" class="flex-1 border border-slate-300 rounded-lg py-3 font-medium hover:bg-slate-50">
                        Kembali
                    </button>
                    <button wire:click="submitBooking" wire:loading.attr="disabled"
                        class="flex-1 bg-indigo-600 text-white rounded-lg py-3 font-medium hover:bg-indigo-700 disabled:opacity-50">
                        <span wire:loading.remove>Konfirmasi & Lanjut Bayar</span>
                        <span wire:loading>Memproses...</span>
                    </button>
                </div>
            </div>
        @endif

        @if($step === 4 && $this->order)
            <div class="space-y-5">
                <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 text-sm text-amber-800">
                    Pesanan <strong>{{ $this->order->order_code }}</strong> dibuat. Silakan transfer <strong>Rp {{ number_format($this->order->total_price, 0, ',', '.') }}</strong> ke salah satu rekening berikut, lalu upload bukti transfer.
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1.5">Transfer ke Rekening</label>
                    <div class="space-y-2">
                        @foreach($this->bankAccounts as $bank)
                            <label class="flex items-center gap-3 border rounded-lg p-3 cursor-pointer has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50">
                                <input type="radio" wire:model="bank_account_id" value="{{ $bank->id }}">
                                <div class="text-sm">
                                    <p class="font-medium">{{ $bank->bank_name }} - {{ $bank->account_number }}</p>
                                    <p class="text-slate-500">a.n {{ $bank->account_holder }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                    @error('bank_account_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1.5">Tanggal Transfer</label>
                        <input type="date" wire:model="transfer_date" max="{{ now()->format('Y-m-d') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        @error('transfer_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1.5">Nama Pengirim</label>
                        <input type="text" wire:model="sender_name"
                            class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        @error('sender_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1.5">Upload Bukti Transfer (JPG/PNG/PDF, maks 5MB)</label>
                    <input type="file" wire:model="proof_file" accept=".jpg,.jpeg,.png,.pdf"
                        class="w-full text-sm rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                    <div wire:loading wire:target="proof_file" class="text-xs text-slate-500 mt-1">Mengunggah file...</div>
                    @if($proof_file) <p class="text-xs text-emerald-600 mt-1">✓ {{ $proof_file->getClientOriginalName() }}</p> @endif
                    @error('proof_file') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <button wire:click="uploadPayment" wire:loading.attr="disabled"
                    class="w-full bg-indigo-600 text-white rounded-lg py-3 font-medium hover:bg-indigo-700 disabled:opacity-50">
                    <span wire:loading.remove wire:target="uploadPayment">Kirim Bukti Transfer</span>
                    <span wire:loading wire:target="uploadPayment">Mengirim...</span>
                </button>
            </div>
        @endif

        @if($step === 5)
            <div class="text-center py-8">
                <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto text-2xl mb-4">✓</div>
                <h3 class="font-semibold text-lg mb-2">Bukti Transfer Terkirim!</h3>
                <p class="text-sm text-slate-500 mb-6">Admin akan memverifikasi pembayaran Anda dalam 1x24 jam. Anda dapat memantau status pesanan di Dashboard.</p>
                <a href="{{ route('student.dashboard') }}" class="inline-block bg-indigo-600 text-white rounded-lg px-6 py-3 font-medium hover:bg-indigo-700">
                    Ke Dashboard Saya
                </a>
            </div>
        @endif
    </div>
</div>

@script
<script>
    Alpine.data('gpsPicker', (lat, lng, address) => ({
        map: null,
        marker: null,

        init() {
            this.$nextTick(() => {
                const startLat = lat ?? -6.5971;
                const startLng = lng ?? 106.8060;

                this.map = L.map('map-picker').setView([startLat, startLng], 14);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; OpenStreetMap contributors'
                }).addTo(this.map);

                this.marker = L.marker([startLat, startLng], { draggable: true }).addTo(this.map);

                this.marker.on('dragend', (e) => this.setLocation(e.target.getLatLng()));
                this.map.on('click', (e) => {
                    this.marker.setLatLng(e.latlng);
                    this.setLocation(e.latlng);
                });

                if (lat && lng) this.setLocation({ lat, lng }, false);
            });
        },

        locateMe() {
            if (!navigator.geolocation) return;
            navigator.geolocation.getCurrentPosition((pos) => {
                const latlng = { lat: pos.coords.latitude, lng: pos.coords.longitude };
                this.map.setView(latlng, 16);
                this.marker.setLatLng(latlng);
                this.setLocation(latlng);
            });
        },

        async setLocation(latlng, reverseGeocode = true) {
            $wire.set('location_lat', latlng.lat);
            $wire.set('location_lng', latlng.lng);

            if (!reverseGeocode) return;

            try {
                const res = await fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latlng.lat}&lon=${latlng.lng}`);
                const data = await res.json();
                if (data?.display_name) {
                    $wire.set('location_address', data.display_name);
                }
            } catch (e) {}
        }
    }));
</script>
@endscript
