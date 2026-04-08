@if ($paginator->hasPages())
<nav class="flex items-center justify-center">

    <ul class="flex items-center gap-2">

        {{-- Previous --}}
        @if ($paginator->onFirstPage())
            <li>
                <span class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-200 bg-gray-100 text-gray-400 cursor-not-allowed">
                    <svg width="10" height="16" fill="none">
                        <path d="M9 1L2 8L9 15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-200 bg-white hover:bg-indigo-50 hover:border-indigo-400 transition">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.499 12.85a.9.9 0 0 1 .57.205l.067.06a.9.9 0 0 1 .06 1.206l-.06.066-5.585 5.586-.028.027.028.027 5.585 5.587a.9.9 0 0 1 .06 1.207l-.06.066a.9.9 0 0 1-1.207.06l-.066-.06-6.25-6.25a1 1 0 0 1-.158-.212l-.038-.08a.9.9 0 0 1-.03-.606l.03-.083a1 1 0 0 1 .137-.226l.06-.066 6.25-6.25a.9.9 0 0 1 .635-.263Z" fill="#475569" stroke="#475569" stroke-width=".078"/>
                    </svg>
                </a>
            </li>
        @endif


        {{-- Pages --}}
        @foreach ($elements as $element)

            @if (is_string($element))
                <li>
                    <span class="px-2 text-gray-400">
                        {{ $element }}
                    </span>
                </li>
            @endif


            @if (is_array($element))
                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())

                        <li>
                            <span class="flex items-center justify-center w-10 h-10 rounded-full bg-indigo-600 text-white font-semibold shadow-sm">
                                {{ $page }}
                            </span>
                        </li>

                    @else

                        <li>
                            <a href="{{ $url }}"
                               class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-200 bg-white hover:bg-indigo-50 hover:border-indigo-400 hover:text-indigo-600 transition">
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
                <a href="{{ $paginator->nextPageUrl() }}" class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-200 bg-white hover:bg-indigo-50 hover:border-indigo-400 transition">
                    <svg class="rotate-180" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.499 12.85a.9.9 0 0 1 .57.205l.067.06a.9.9 0 0 1 .06 1.206l-.06.066-5.585 5.586-.028.027.028.027 5.585 5.587a.9.9 0 0 1 .06 1.207l-.06.066a.9.9 0 0 1-1.207.06l-.066-.06-6.25-6.25a1 1 0 0 1-.158-.212l-.038-.08a.9.9 0 0 1-.03-.606l.03-.083a1 1 0 0 1 .137-.226l.06-.066 6.25-6.25a.9.9 0 0 1 .635-.263Z" fill="#475569" stroke="#475569" stroke-width=".078"/>
                    </svg>
                </a>
            </li>
        @else
            <li>
                <span class="flex items-center justify-center w-10 h-10 rounded-full border border-gray-200 bg-gray-100 text-gray-400 cursor-not-allowed">
                    <svg width="10" height="16" fill="none">
                        <path d="M1 1L8 8L1 15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </span>
            </li>
        @endif


    </ul>

</nav>
@endif