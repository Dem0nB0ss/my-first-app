@if ($paginator->hasPages())
<nav class="flex items-center justify-between mt-8">
    <div class="text-sm text-gray-600">
        Hiển thị
        <span class="font-semibold">{{ $paginator->firstItem() }}</span>
        -
        <span class="font-semibold">{{ $paginator->lastItem() }}</span>
        /
        <span class="font-semibold">{{ $paginator->total() }}</span>
        sản phẩm
    </div>

    <ul class="inline-flex items-center gap-2">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <li>
                <span class="px-4 py-2 rounded-lg border bg-gray-100 text-gray-400 cursor-not-allowed">
                    ←
                </span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="px-4 py-2 rounded-lg border hover:bg-indigo-500 hover:text-white transition">
                    ←
                </a>
            </li>
        @endif

        {{-- Page Number --}}
        @foreach ($elements as $element)

            @if(is_string($element))
                <li>
                    <span class="px-4 py-2 text-gray-500">
                        {{ $element }}
                    </span>
                </li>
            @endif

            @if(is_array($element))
                @foreach($element as $page => $url)

                    @if($page == $paginator->currentPage())
                        <li>
                            <span
                                class="px-4 py-2 rounded-lg bg-indigo-600 text-white font-semibold shadow">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}"
                               class="px-4 py-2 rounded-lg border hover:bg-indigo-500 hover:text-white transition">
                                {{ $page }}
                            </a>
                        </li>
                    @endif

                @endforeach
            @endif

        @endforeach

        {{-- Next --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="px-4 py-2 rounded-lg border hover:bg-indigo-500 hover:text-white transition">
                    →
                </a>
            </li>
        @else
            <li>
                <span class="px-4 py-2 rounded-lg border bg-gray-100 text-gray-400 cursor-not-allowed">
                    →
                </span>
            </li>
        @endif

    </ul>
</nav>
@endif