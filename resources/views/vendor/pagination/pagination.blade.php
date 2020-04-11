@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pageItem pageDisabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="pageLink" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="pageItem">
                    <a class="pageLink" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pageItem pageDisabled" aria-disabled="true"><span class="pageLink">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pageItem pageActive" aria-current="page"><span class="pageLink">{{ $page }}</span></li>
                        @else
                            <li class="pageItem"><a class="pageLink" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pageItem">
                    <a class="pageLink" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="pageItem pageDisabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="pageLink" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif