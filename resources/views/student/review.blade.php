<x-layouts.app title="Beri Ulasan — TemanLes">
    <div class="max-w-lg mx-auto">
        <div class="bg-white border border-line rounded-2xl p-6 sm:p-8">
            <h1 class="font-display text-xl font-semibold text-ink mb-1">Bagaimana kelasnya?</h1>
            <p class="text-sm text-ink-muted mb-6">
                Beri ulasan untuk <strong class="text-ink">{{ $order->tutor->user->name }}</strong> — {{ $order->tutorSubject->subject->name }} ({{ $order->tutorSubject->level }}). Ulasan ini bersifat opsional, boleh dilewati.
            </p>

            <form method="POST" action="{{ route('student.orders.review.store', $order) }}" x-data="{ rating: {{ old('rating', 0) }}, hover: 0 }">
                @csrf

                <fieldset class="mb-5">
                    <legend class="block text-sm font-medium text-ink mb-2">Rating</legend>
                    <input type="hidden" name="rating" :value="rating">
                    <div class="flex gap-1" role="radiogroup" aria-label="Beri rating 1 sampai 5 bintang">
                        <template x-for="i in [1,2,3,4,5]" :key="i">
                            <button type="button"
                                @click="rating = i"
                                @mouseenter="hover = i" @mouseleave="hover = 0"
                                :aria-pressed="rating === i"
                                :aria-label="'Beri rating ' + i + ' bintang'"
                                class="p-1 rounded focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                                <svg class="w-9 h-9" :class="(hover || rating) >= i ? 'text-chalk' : 'text-line'" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10 1.5l2.6 5.6 6.1.6-4.6 4.1 1.3 6-5.4-3.1-5.4 3.1 1.3-6-4.6-4.1 6.1-.6z"/>
                                </svg>
                            </button>
                        </template>
                    </div>
                    @error('rating') <p class="text-mark text-xs mt-2">{{ $message }}</p> @enderror
                </fieldset>

                <div class="mb-6">
                    <label for="comment" class="block text-sm font-medium text-ink mb-1.5">Ulasan <span class="text-ink-muted font-normal">(opsional)</span></label>
                    <textarea id="comment" name="comment" rows="4"
                        class="w-full rounded-lg border border-line px-3.5 py-2.5 text-sm text-ink focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board"
                        placeholder="Ceritakan pengalaman belajarmu...">{{ old('comment') }}</textarea>
                    @error('comment') <p class="text-mark text-xs mt-1.5">{{ $message }}</p> @enderror
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('student.dashboard') }}" class="flex-1 text-center border border-line rounded-lg py-3 font-medium text-ink hover:bg-paper-alt transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-board">
                        Lewati, nanti saja
                    </a>
                    <button type="submit" class="flex-1 bg-board text-white rounded-lg py-3 font-medium hover:bg-board-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mark focus-visible:ring-offset-2">
                        Kirim Ulasan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
