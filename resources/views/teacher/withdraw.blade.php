<x-layouts.app title="Tarik Saldo">
    <div class="max-w-xl mx-auto">
        <div class="bg-white rounded-2xl border border-slate-100 p-6">
            <div class="flex items-center justify-between mb-6 pb-6 border-b border-slate-100">
                <div>
                    <p class="text-sm text-slate-500">Saldo Tersedia</p>
                    <p class="text-2xl font-bold text-indigo-600">Rp {{ number_format($wallet->balance, 0, ',', '.') }}</p>
                </div>
            </div>

            <form method="POST" action="{{ route('teacher.withdraw.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium mb-1.5">Jumlah Penarikan</label>
                    <input type="number" name="amount" min="50000" value="{{ old('amount') }}" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('amount') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1.5">Nama Bank</label>
                    <input type="text" name="bank_name" value="{{ old('bank_name') }}" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('bank_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1.5">Nomor Rekening</label>
                        <input type="text" name="account_number" value="{{ old('account_number') }}" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        @error('account_number') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1.5">Atas Nama</label>
                        <input type="text" name="account_holder" value="{{ old('account_holder') }}" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        @error('account_holder') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white rounded-lg py-3 font-medium hover:bg-indigo-700">
                    Ajukan Penarikan
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
