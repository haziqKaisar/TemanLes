📂 File: resources/views/pages/student/⚡tutor-marketplace.blade.php
<?php

use App\Models\Subject;
use App\Models\Tutor;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

return new
    #[Layout('layouts::app')]
    #[Title('Cari Guru Les Private')]
    class extends Component {
    use WithPagination;

    public $subject_id = '';
    public $level = '';
    public $mode = '';
    public $min_price = '';
    public $max_price = '';

    public function resetFilters(): void
    {
        $this->reset(['subject_id', 'level', 'mode', 'min_price', 'max_price']);
        $this->resetPage();
    }

    public function updated(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function tutors()
    {
        return Tutor::verified()
            ->with(['user', 'tutorSubjects.subject'])
            ->when($this->subject_id || $this->level || $this->min_price || $this->max_price, function ($q) {
                $q->whereHas('tutorSubjects', function ($q) {
                    $q->when($this->subject_id, fn ($q) => $q->where('subject_id', $this->subject_id))
                        ->when($this->level, fn ($q) => $q->where('level', $this->level))
                        ->when($this->min_price, fn ($q) => $q->where('price_per_hour', '>=', $this->min_price))
                        ->when($this->max_price, fn ($q) => $q->where('price_per_hour', '<=', $this->max_price));
                });
            })
            ->when($this->mode, fn ($q) => $q->where(fn ($q) => $q->where('teaching_mode', $this->mode)->orWhere('teaching_mode', 'both')))
            ->orderByDesc('rating_avg')
            ->paginate(9);
    }

    #[Computed]
    public function subjects()
    {
        return Subject::orderBy('name')->get();
    }
};
?>
<div>
    <div class="mb-8">
        <h1 class="text-2xl font-bold mb-1">Cari Guru Les Private</h1>
        <p class="text-slate-500 text-sm">Temukan guru terbaik sesuai kebutuhan belajarmu</p>
    </div>
    <div class="bg-white rounded-2xl border border-slate-100 p-4 mb-6 grid grid-cols-1 md:grid-cols-5 gap-3">
        <select wire:model.live="subject_id" class="rounded-lg border-slate-300 text-sm">
            <option value="">Semua Mapel</option>
            @foreach($this->subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
        <select wire:model.live="level" class="rounded-lg border-slate-300 text-sm">
            <option value="">Semua Jenjang</option>
            @foreach(['SD', 'SMP', 'SMA', 'Umum'] as $lvl)
                <option value="{{ $lvl }}">{{ $lvl }}</option>
            @endforeach
        </select>
        <select wire:model.live="mode" class="rounded-lg border-slate-300 text-sm">
            <option value="">Semua Mode</option>
            <option value="online">Online</option>
            <option value="offline">Tatap Muka</option>
        </select>
        <input type="number" wire:model.live.debounce.500ms="min_price" placeholder="Harga min" class="rounded-lg border-slate-300 text-sm">
        <input type="number" wire:model.live.debounce.500ms="max_price" placeholder="Harga max" class="rounded-lg border-slate-300 text-sm">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        @forelse($this->tutors as $tutor)
            <div wire:key="tutor-{{ $tutor->id }}" class="bg-white rounded-2xl border border-slate-100 p-5 hover:shadow-md transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center font-bold text-indigo-600">
                        {{ substr($tutor->user->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="font-semibold">{{ $tutor->user->name }}</p>
                        <p class="text-xs text-slate-500">{{ $tutor->headline }}</p>
                    </div>
                </div>
                <div class="flex items-center gap-1 text-amber-500 text-sm mb-3">
                    ⭐ {{ number_format($tutor->rating_avg, 1) }}
                    <span class="text-slate-400">({{ $tutor->rating_count }} ulasan)</span>
                </div>
                <div class="flex flex-wrap gap-1.5 mb-4">
                    @foreach($tutor->tutorSubjects->take(3) as $ts)
                        <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded-full">{{ $ts->subject->name }} · {{ $ts->level }}</span>
                    @endforeach
                </div>
                <a href="{{ route('booking.wizard', $tutor) }}" class="block text-center bg-indigo-600 text-white rounded-lg py-2.5 text-sm font-medium hover:bg-indigo-700">
                    Lihat & Booking
                </a>
            </div>
        @empty
            <div class="col-span-3 text-center py-16 text-slate-400">Belum ada guru yang cocok dengan filter kamu.</div>
        @endforelse
    </div>
    <div class="mt-6">{{ $this->tutors->links() }}</div>
</div>
