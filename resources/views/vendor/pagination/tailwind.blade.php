@if ($paginator->hasPages())
    <nav aria-label="{{ __('Pagination Navigation') }}">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item mt-3 disabled" aria-disabled="true">
                    <span class="page-link" aria-hidden="true">{{ __('Atras') }}</span>
                </li>
            @else
                <li class="page-item mt-3">
                    <a class="page-link text-success-emphasis" href="{{ $paginator->previousPageUrl() }}" rel="prev">{{ __('Atras') }}</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item mt-3 disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item mt-3 active" aria-current="page"><span class="page-link bg-success btn btn-dark">{{ $page }}</span></li>
                        @else
                            <li class="page-item mt-3"><a class="page-link text-success-emphasis" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item mt-3">
                    <a class="page-link text-success-emphasis" href="{{ $paginator->nextPageUrl() }}" rel="next">{{ __('Siguiente') }}</a>
                </li>
            @else
                <li class="page-item mt-3 disabled" aria-disabled="true">
                    <span class="page-link" aria-hidden="true">{{ __('Siguiente') }}</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
