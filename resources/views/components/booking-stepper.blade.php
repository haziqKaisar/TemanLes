@props(['current'])

@php
    $steps = ['Jadwal', 'Lokasi', 'Ringkasan', 'Bayar'];
@endphp

<ol class="flex items-center gap-2 sm:gap-4 mb-8" aria-label="Langkah booking">
    @foreach($steps as $i => $label)
        @php $n = $i + 1; @endphp
        <li class="flex items-center gap-2 {{ $n < count($steps) ? 'flex-1' : '' }}">
            <div class="flex items-center gap-2">
                <span @class([
                    'w-8 h-8 rounded-full flex items-center justify-center text-xs font-semibold shrink-0',
                    'bg-board text-white' => $n < $current,
                    'bg-board text-white ring-2 ring-offset-2 ring-offset-paper ring-board' => $n === $current,
                    'bg-white border border-line text-ink-muted' => $n > $current,
                ])
                @if($n === $current) aria-current="step" @endif>
                    @if($n < $current)
                        <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.5 7.5a1 1 0 01-1.4 0l-3.5-3.5a1 1 0 111.4-1.4L8.5 12l6.8-6.8a1 1 0 011.4 0z" clip-rule="evenodd"/></svg>
                    @else
                        {{ $n }}
                    @endif
                </span>
                <span @class(['text-sm font-medium hidden sm:inline', 'text-ink' => $n <= $current, 'text-ink-muted' => $n > $current])>{{ $label }}</span>
            </div>
            @if($n < count($steps))
                <span class="flex-1 h-px {{ $n < $current ? 'bg-board' : 'bg-line' }}" aria-hidden="true"></span>
            @endif
        </li>
    @endforeach
</ol>
