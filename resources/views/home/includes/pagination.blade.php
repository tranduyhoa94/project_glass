<div class="container">
    <nav class="woocommerce-pagination">
        <ul class="page-numbers nav-pagination links text-center">
            @if ($paginator->hasPages())
                @if (!$paginator->onFirstPage())
                    <li>
                        <a class="prev page-number" href="{{ $paginator->previousPageUrl() }}" data-wpel-link="internal">
                            <i class="icon-angle-left"></i>
                        </a>
                    </li>
                @endif
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li>
                                    <a class="page-number current" href="{{ $url }}" data-wpel-link="internal">1</a>
                                </li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if ($paginator->hasMorePages())
                    <li>
                        <a class="next page-number" href="{{ $paginator->nextPageUrl() }}" data-wpel-link="internal"><i class="icon-angle-right"></i></a>
                    </li>
                 @endif
            @endif
        </ul>
    </nav>
</div>