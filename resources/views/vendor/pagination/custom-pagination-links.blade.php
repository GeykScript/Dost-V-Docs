@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">

    <div class="flex gap-2 items-center justify-between sm:hidden">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 cursor-not-allowed rounded-md">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <button wire:click="previousPage" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-sky-100transition">
                {!! __('pagination.previous') !!}
            </button>
        @endif

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-sky-100transition">
                {!! __('pagination.next') !!}
            </button>
        @else
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 cursor-not-allowed rounded-md">
                {!! __('pagination.next') !!}
            </span>
        @endif

    </div>

    <div class="hidden sm:flex sm:items-center sm:justify-between">

        {{-- Result count --}}
        <div>
            <p class="text-sm text-gray-600">
                Showing
                @if ($paginator->firstItem())
                    <span class="font-semibold">{{ $paginator->firstItem() }}</span>
                    to
                    <span class="font-semibold">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                of
                <span class="font-semibold">{{ $paginator->total() }}</span>
                results
            </p>
        </div>

        {{-- Pagination --}}
        <div>
            <span class="inline-flex shadow-sm rounded-md">

                {{-- Previous --}}
                @if ($paginator->onFirstPage())
                    <span class="px-2 py-2 text-gray-400 bg-gray-100 border border-gray-200 rounded-l-md cursor-not-allowed">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </span>
                @else
                    <button wire:click="previousPage" class="px-2 py-2 text-gray-600 bg-white border border-gray-300 rounded-l-md hover:bg-sky-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                @endif

                {{-- Page Numbers --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="px-4 py-2 text-sm text-gray-500 bg-white border border-gray-300">{{ $element }}</span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="px-4 py-2 text-sm font-semibold text-white bg-sky-500 border border-sky-500">{{ $page }}</span>
                            @else
                                <button wire:click="gotoPage({{ $page }})" class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 hover:bg-sky-100">{{ $page }}</button>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" class="px-2 py-2 text-gray-600 bg-white border border-gray-300 rounded-r-md hover:bg-sky-100">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                @else
                    <span class="px-2 py-2 text-gray-400 bg-gray-100 border border-gray-200 rounded-r-md cursor-not-allowed">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </span>
                @endif

            </span>
        </div>
    </div>
</nav>
@endif