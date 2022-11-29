@if ($paginator->hasPages())
<ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="page-item">
        <a href="#" class="page-link page-disable">{!! __('pagination.previous') !!}</a>
    </li>
    @else
    <li class="page-item">
        <a href="{{ $paginator->previousPageUrl() }}" class="page-link">{!! __('pagination.previous') !!}</a>
    </li>
    @endif

    {{--Pages list --}}

    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="page-item">
            <a href="{{ $paginator->url($i) }}" class="page-link {{ ($paginator->currentPage() == $i) ? ' page-active' : '' }}">{{ $i }}</a>
        </li>
        @endfor

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link">{!! __('pagination.next') !!}</a>
        </li>
        @else
        <li class="page-item">
            <a href="#" class="page-link page-disable">{!! __('pagination.next') !!}</a>
        </li>
        @endif
</ul>
@endif