<x-layouts.app title="Upload Bukti Transfer">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 space-y-5">
            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 text-sm text-amber-800">
                Pesanan <strong>{{ $order->order_code }}</strong> dibuat. Silakan transfer <strong>Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong> ke salah satu rekening berikut, lalu upload bukti transfer.
            </div>

            <form method="POST" action="{{ route('payment.store', $order) }}" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-medium mb-1.5">Transfer ke Rekening</label>
                    <div class="space-y-2">
                        @foreach($bankAccounts as $bank)
                            <label class="flex items-center gap-3 border rounded-lg p-3 cursor-pointer has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50">
                                <input type="radio" name="bank_account_id" value="{{ $bank->id }}">
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
                        <input type="date" name="transfer_date" max="{{ now()->format('Y-m-d') }}"
                            class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        @error('transfer_date') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1.5">Nama Pengirim</label>
                        <input type="text" name="sender_name"
                            class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                        @error('sender_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1.5">Upload Bukti Transfer (JPG/PNG/PDF, maks 5MB)</label>
                    <input type="file" name="proof_file" accept=".jpg,.jpeg,.png,.pdf"
                        class="w-full text-sm rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500">
                    @error('proof_file') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white rounded-lg py-3 font-medium hover:bg-indigo-700">
                    Kirim Bukti Transfer
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
