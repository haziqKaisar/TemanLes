<?php

use App\Models\Payout;
use App\Models\TeacherWallet;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Tarik Saldo')]
new class extends Component {
    public $amount;
    public $bank_name;
    public $account_number;
    public $account_holder;

    #[Computed]
    public function wallet(): TeacherWallet
    {
        return TeacherWallet::firstOrCreate(['tutor_id' => Auth::user()->tutor->id]);
    }

    public function submit(): void
    {
        $this->validate([
            'amount' => 'required|numeric|min:50000|max:' . $this->wallet->balance,
            'bank_name' => 'required|string|max:255',
            'account_number' => 'required|string|max:50',
            'account_holder' => 'required|string|max:255',
        ]);

        Payout::create([
            'tutor_id' => Auth::user()->tutor->id,
            'teacher_wallet_id' => $this->wallet->id,
            'amount' => $this->amount,
            'bank_name' => $this->bank_name,
            'account_number' => $this->account_number,
            'account_holder' => $this->account_holder,
            'status' => 'pending',
        ]);

        $this->reset(['amount', 'bank_name', 'account_number', 'account_holder']);
        session()->flash('success', 'Pengajuan penarikan saldo berhasil dikirim, menunggu ACC Admin.');
    }
};

?>

<div class="max-w-xl mx-auto">
    <div class="bg-white rounded-2xl border border-slate-100 p-6">
        <div class="flex items-center justify-between mb-6 pb-6 border-b border-slate-100">
            <div>
                <p class="text-sm text-slate-500">Saldo Tersedia</p>
                <p class="text-2xl font-bold text-indigo-600">Rp {{ number_format($this->wallet->balance, 0, ',', '.') }}</p>
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1.5">Jumlah Penarikan</label>
                <input type="number" wire:model="amount" min="50000" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                @error('amount') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium mb-1.5">Nama Bank</label>
                <input type="text" wire:model="bank_name" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                @error('bank_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1.5">Nomor Rekening</label>
                    <input type="text" wire:model="account_number" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('account_number') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1.5">Atas Nama</label>
                    <input type="text" wire:model="account_holder" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('account_holder') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <button wire:click="submit" wire:loading.attr="disabled" class="w-full bg-indigo-600 text-white rounded-lg py-3 font-medium hover:bg-indigo-700 disabled:opacity-50">
                Ajukan Penarikan
            </button>
        </div>
    </div>
</div>
