@if ($paginator->hasPages())
    <ul class="flex items-center gap-x-3 child:flex child:items-center child:justify-center child:w-8 child:h-8 child:cursor-pointer child:shadow child:rounded-lg child:transition-all child:duration-300">
        @if ($paginator->onFirstPage())
            <li class="bg-white dark:bg-zinc-700 " disabled>
                <a href="javascript:void()">
                    <svg class="w-5 h-5 ltr:hidden">
                        <use href="#chevron-right"></use>
                    </svg>
                    <svg class="w-5 h-5 hidden ltr:block">
                        <use href="#chevron-left"></use>
                    </svg>
                </a>
            </li>
        @else
            <li class="bg-white dark:bg-zinc-700 hover:bg-blue-600 hover:text-white">
                <a href="{{ $paginator->previousPageUrl() }}" wire:navigate>
                    <svg class="w-5 h-5 ltr:hidden">
                        <use href="#chevron-right"></use>
                    </svg>
                    <svg class="w-5 h-5 hidden ltr:block">
                        <use href="#chevron-left"></use>
                    </svg>
                </a>
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="text-white bg-blue-500 " disabled>
                    <a href="javascript:void(0)">{{ $element }}</a>
                </li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url )
                    @if ($page == $paginator->currentPage())
                        <li class="text-white bg-blue-500 active">
                            <a href="javascript:void(0)">{{ $page }}</a>
                        </li>
                    @else
                        <li class="bg-white dark:bg-zinc-700 hover:bg-blue-600 hover:text-white">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif

        @endforeach

        @if ($paginator->hasMorePages())
            <li class="bg-white dark:bg-zinc-700 hover:bg-blue-600 hover:text-white">
                <a href="{{ $paginator->nextPageUrl() }}" wire:navigate>
                    <svg class="w-5 h-5 ltr:hidden">
                        <use href="#chevron-left"></use>
                    </svg>
                    <svg class="w-5 h-5 hidden ltr:block">
                        <use href="#chevron-right"></use>
                    </svg>
                </a>
            </li>
        @else
            <li class="bg-white dark:bg-zinc-700 " disabled>
                <a href="javascript:void(0)">
                    <svg class="w-5 h-5 ltr:hidden">
                        <use href="#chevron-left"></use>
                    </svg>
                    <svg class="w-5 h-5 hidden ltr:block">
                        <use href="#chevron-right"></use>
                    </svg>
                </a>
            </li>
        @endif

    </ul>
@endif
