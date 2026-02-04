@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center mt-3">
        <div class="flex flex-wrap gap-2">
            
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 text-xs font-mono text-gray-600 border border-gray-800 cursor-not-allowed uppercase tracking-widest">
                    &laquo; Prev
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-4 py-2 text-xs font-mono text-gray-400 border border-gray-600 hover:border-yellow-500 hover:text-yellow-500 transition-all uppercase tracking-widest">
                    &laquo; Prev
                </a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-4 py-2 text-xs font-mono text-gray-600 border border-gray-800 uppercase">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="px-4 py-2 text-xs font-mono font-bold text-yellow-500 border border-yellow-500 bg-yellow-500/10 uppercase">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="px-4 py-2 text-xs font-mono text-gray-400 border border-gray-600 hover:border-yellow-500 hover:text-yellow-500 transition-all uppercase">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-4 py-2 text-xs font-mono text-gray-400 border border-gray-600 hover:border-yellow-500 hover:text-yellow-500 transition-all uppercase tracking-widest">
                    Next &raquo;
                </a>
            @else
                <span class="px-4 py-2 text-xs font-mono text-gray-600 border border-gray-800 cursor-not-allowed uppercase tracking-widest">
                    Next &raquo;
                </span>
            @endif
        </div>
    </nav>
@endif