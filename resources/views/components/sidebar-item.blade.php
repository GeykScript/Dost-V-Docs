@props([
    'label',
    'icon',
    'route',
    'count' => 5, // default
])

@php
$active = request()->routeIs($route) || request()->routeIs($route.'.*');
@endphp

<li class="relative group">
    {{-- Active indicator --}}
    @if($active)
        <div class="absolute left-0 top-1/2 -translate-y-1/2 h-6 w-1 bg-brand-blue rounded-r-md"></div>
    @endif

    <a href="{{ route($route) }}"
        class="flex items-center w-full py-3 pl-4 pr-3 transition-all duration-200 rounded-r-lg
        {{ $active
            ? 'bg-brand-blue/10 text-brand-blue font-semibold'
            : 'text-gray-400 hover:bg-white/5 hover:text-white'
        }}">

        <x-dynamic-component 
            :component="'heroicon-'.$icon"
            class="w-5 h-5 text-current transition-colors" />

        <div class="ml-3 text-sm flex gap-1 items-center">
            <p>{{ $label }}</p>

            {{-- Show badge only for "Need Responses" --}}
            @if($route === 'need-response' && $count > 0)
                <span class="text-white bg-sky-500 rounded-full px-2 py-[2px] text-[10px] font-semibold">
                    {{ $count }}
                </span>
            @endif
        </div>
    </a>
</li>