<x-layouts.app title="Pembayaran — TemanLes">
    <div class="max-w-2xl mx-auto">
        <x-booking-stepper :current="4" />

        <div class="bg-white border border-line rounded-2xl p-6">
            <div class="bg-chalk/12 border border-chalk/30 rounded-lg p-4 text-sm text-ink mb-6">
                Pesanan <strong>{{ $order->order_code }}</strong> dibuat. Transfer <strong>Rp{{ number_format($order->total_price, 0, ',', '.') }}</strong> ke salah satu rekening di bawah, lalu unggah bukti transfernya.
            </div>

            <form method="POST" action="{{ route('payment.store', $order) }}" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <fieldset>
                    <legend class="block text-sm font-medium text-ink mb-1.5">Transfer ke rekening</legend>
                    <div class="space-y-2">
                        @foreach($bankAccounts as $bank)
                            <label class="flex items-center gap-3 border border-line rounded-lg p-3 cursor-pointer has-[:checked]:border-board has-[:checked]:bg-board/8 has-[:focus-visible]:ring-2 has-[:focus-visible]:ring-board transition-colors">
                                <input type="radio" name="bank_account_id" value="{{ $bank->id }}" class="w-4 h-4 accent-board">
                                <div class="text-sm">
                                    <p class="font-medium text-ink">{{ $bank->bank_name }} — {{ $bank->account_number }}</p>
                                    <p class="text-ink-muted">a.n {{ $bank->account_holder }}</p>
                                </div>
                            </label>
                        @endforeach
                    </div>
                    @error('bank_account_id') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                </fieldset>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="transfer_date" class="block text-sm font-medium text-ink mb-1.5">Tanggal transfer</label>
                        <input id="transfer_date" type="date" name="transfer_date" max="{{ now()->format('Y-m-d') }}"
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        @error('transfer_date') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="sender_name" class="block text-sm font-medium text-ink mb-1.5">Nama pengirim</label>
                        <input id="sender_name" type="text" name="sender_name"
                            class="w-full rounded-lg border border-line px-3 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        @error('sender_name') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label for="proof_file" class="block text-sm font-medium text-ink mb-1.5">Bukti transfer</label>
                    <div class="border border-dashed border-line rounded-lg p-4">
                        <input id="proof_file" type="file" name="proof_file" accept=".jpg,.jpeg,.png,.pdf"
                            class="w-full text-sm text-ink-muted file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-board file:text-white file:text-sm file:font-medium hover:file:bg-board-light file:cursor-pointer focus-visible:outline-none">
                        <p class="text-xs text-ink-muted mt-2">JPG, PNG, atau PDF — maksimal 5MB</p>
                    </div>
                    @error('proof_file') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full bg-board text-white rounded-lg py-3.5 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
                    Kirim bukti transfer
                </button>
            </form>
        </div>
    </div>
</x-layouts.app>
