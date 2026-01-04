@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="d-flex justify-content-center mt-5">
        <div class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="filter-btn disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    &lsaquo;
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="filter-btn text-decoration-none"
                    aria-label="@lang('pagination.previous')">
                    &lsaquo;
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="filter-btn disabled" aria-disabled="true">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="filter-btn active" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}#products"
                                class="filter-btn text-decoration-none">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}#products" rel="next"
                    class="filter-btn text-decoration-none" aria-label="@lang('pagination.next')">
                    &rsaquo;
                </a>
            @else
                <span class="filter-btn disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    &rsaquo;
                </span>
            @endif
        </div>
    </nav>
@endif
