@props(['label', 'value', 'tone' => 'blue', 'icon' => 'users'])

@php
    $tones = [
        'blue' => 'bg-board/10 text-board',
        'sky' => 'bg-sky-100 text-sky-600',
        'green' => 'bg-chalk/30 text-success',
        'teal' => 'bg-emerald-100 text-emerald-600',
    ];
@endphp

<div class="rounded-2xl border border-line bg-white p-5 shadow-sm">
    <div class="flex items-center gap-4">
        <span class="grid h-12 w-12 shrink-0 place-items-center rounded-xl {{ $tones[$tone] ?? $tones['blue'] }}" aria-hidden="true">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                @if($icon === 'users')
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                @elseif($icon === 'academic')
                    <path d="m2 10 10-5 10 5-10 5-10-5Z"/><path d="M6 12.5V17c3 2 9 2 12 0v-4.5M22 10v6"/>
                @elseif($icon === 'calendar')
                    <rect x="3" y="5" width="18" height="16" rx="2"/><path d="M16 3v4M8 3v4M3 10h18"/>
                @else
                    <rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 10h18M7 15h3"/>
                @endif
            </svg>
        </span>
        <div class="min-w-0"><p class="text-sm text-ink-muted">{{ $label }}</p><p class="mt-1 truncate text-2xl font-extrabold tracking-tight text-ink">{{ $value }}</p></div>
    </div>
</div>
