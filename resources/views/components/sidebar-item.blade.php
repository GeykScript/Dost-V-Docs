<li class="relative group">

    <!-- ACTIVE INDICATOR BAR -->
    <div 
        x-show="activeItem === '{{ $id }}'"
        class="absolute left-0 top-1/2 -translate-y-1/2 h-6 w-1 bg-brand-blue rounded-r-md">
    </div>

    <a href="{{ route($route) }}"
        @click="setActive('{{ $id }}'); if (window.innerWidth < 1280) $store.sidebar.close()"
        class="flex items-center w-full py-3 pl-4 pr-3 transition-all duration-200 rounded-r-lg"
        :class="{
            'bg-brand-blue/10 text-brand-blue font-semibold': activeItem === '{{ $id }}',
            'text-gray-400 hover:bg-white/5 hover:text-white': activeItem !== '{{ $id }}'
        }">

        <!-- ICON -->
        <x-dynamic-component 
            :component="'heroicon-'.$icon"
            class="w-5 h-5 text-current transition-colors" />

        <!-- LABEL -->
        <span class="ml-3 text-sm text-current">
            {{ $label }}
        </span>

    </a>
</li>