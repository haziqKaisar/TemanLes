<x-layouts.app title="Tarik Saldo — TemanLes">
    <x-teacher-subnav />

    <!-- Header Section -->
    <div class="mb-8 max-w-xl mx-auto">
        <span class="inline-block text-xs font-semibold text-[#3B7597] bg-[#6FD1D7]/20 px-3 py-1 rounded-md mb-2">
            Pencairan Dana
        </span>
        <h1 class="font-display text-2xl sm:text-3xl font-bold text-[#093C5D]">Tarik Saldo</h1>
        <p class="text-[#3B7597] text-sm mt-0.5">Tarik penghasilan mengajar kamu langsung ke rekening bank</p>
    </div>

    <div class="max-w-xl mx-auto">
        <div class="bg-white border border-gray-200 rounded-2xl p-6 sm:p-8 shadow-sm">
            
            <!-- Informasi Saldo -->
            <div class="bg-gradient-to-r from-[#093C5D] to-[#3B7597] rounded-2xl p-6 text-white mb-6 shadow-xs">
                <p class="text-xs font-semibold text-[#6FD1D7] uppercase tracking-wider mb-1">Saldo Tersedia</p>
                <div class="flex items-baseline gap-1">
                    <span class="text-3xl sm:text-4xl font-extrabold text-[#5DF8D8]">
                        Rp {{ number_format($wallet->balance, 0, ',', '.') }}
                    </span>
                </div>
            </div>

            <!-- Form Penarikan -->
            <form method="POST" action="{{ route('teacher.withdraw.store') }}" class="space-y-5">
                @csrf
                
                <div>
                    <label for="amount" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Jumlah Penarikan (Rp)</label>
                    <input id="amount" type="number" name="amount" min="50000" value="{{ old('amount') }}" placeholder="Minimal Rp 50.000"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] font-semibold focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                    @error('amount') <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="bank_name" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Nama Bank</label>
                    <input id="bank_name" type="text" name="bank_name" value="{{ old('bank_name') }}" placeholder="Contoh: BCA, Mandiri, BRI"
                        class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                    @error('bank_name') <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="account_number" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Nomor Rekening</label>
                        <input id="account_number" type="text" name="account_number" value="{{ old('account_number') }}" placeholder="1234567890"
                            class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                        @error('account_number') <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="account_holder" class="block text-xs font-semibold text-[#093C5D] mb-1.5">Atas Nama</label>
                        <input id="account_holder" type="text" name="account_holder" value="{{ old('account_holder') }}" placeholder="Nama Sesuai Rekening"
                            class="w-full rounded-xl border border-gray-300 bg-white px-3.5 py-2.5 text-sm text-[#093C5D] focus:border-[#3B7597] focus:ring-2 focus:ring-[#6FD1D7]/50 focus:outline-none transition-all">
                        @error('account_holder') <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="pt-3">
                    <button type="submit" class="w-full bg-[#093C5D] text-[#5DF8D8] rounded-xl py-3 px-4 text-sm font-bold hover:bg-[#3B7597] hover:text-white transition-all shadow-md focus-visible:outline-none">
                        Ajukan Penarikan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>