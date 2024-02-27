@if ($paginator->hasPages())
    <nav>
        <ul class="pagination" style="list-style: none; display: flex; align-items: center; justify-content: center; padding: 0;">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li style="margin-right: 10px; opacity: 0.5;" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span style="cursor: not-allowed;">&lsaquo;</span>
                </li>
            @else
                <li style="margin-right: 10px;">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" style="text-decoration: none; color: black;">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li style="margin-right: 10px;" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li style="margin-right: 10px;" aria-current="page"><span style="display: inline-block; width: 30px; height: 30px; line-height: 30px; text-align: center; background-color: #007bff; color: white; border-radius: 50%;">{{ $page }}</span></li>
                        @else
                            <li style="margin-right: 10px;"><a href="{{ $url }}" style="display: inline-block; width: 30px; height: 30px; line-height: 30px; text-align: center; background-color: #f8f9fa; color: black; border-radius: 50%; text-decoration: none;">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li style="margin-right: 10px;">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" style="text-decoration: none; color: black;">&rsaquo;</a>
                </li>
            @else
                <li style="opacity: 0.5;" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span style="cursor: not-allowed;">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
