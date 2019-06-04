@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-long-arrow-alt-left"></i></a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{  $paginator->previousPageUrl() }}"><i class="fas fa-long-arrow-alt-left"></i></a>
                </li>
            @endif

            @foreach ($elements as $element)
                    {{--"Three Dots" Separator--}}
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                        <li class="page-item disabled">
                        <a class="page-link" href="#">{{ $element  }}</a>
                        </li>
                    @endif

                 {{-- Array of links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="#">{{ $page }}<span class="sr-only">(current)</span></a>
                                </li>

                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
            @endforeach
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-long-arrow-alt-right"></i></a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-long-arrow-alt-right "></i></a>
                    </li>
                @endif
        </ul>
    </nav>
@endif
