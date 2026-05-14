@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex flex-col items-center justify-between w-full">
        <div class="flex flex-col items-center justify-between">
            <div>
                <span class="inline-flex rtl:flex-row-reverse">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="inline-flex mr-2 items-center px-4 py-2 minimal:text-xl tablet:text-2xl font-pix text-hipnymph bg-milano cursor-default leading-5" aria-hidden="true">
                                {{ __('Начало') }}
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="inline-flex items-center px-4 py-2 minimal:text-xl tablet:text-2xl font-pix text-coffee bg-oldpaper leading-5 hover:text-milano focus:z-10 focus:outline-none focus:border-milano active:bg-hipnymph active:text-coffee transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                            <h3 id="login" class="minimal:text-xl tablet:text-2xl font-pix text-coffee leading-5 hover:text-milano active:text-coffee">
                                {{ __('Назад') }}
                            </h3>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <p class="inline-flex items-center px-4 py-2 -ml-px minimal:text-xl tablet:text-2xl font-pix text-coffee bg-oldpaper cursor-default leading-5">{{ $element }}</p>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <p class="inline-flex items-center px-4 py-2 minimal:text-xl tablet:text-2xl font-pix text-hipnymph bg-milano cursor-default leading-5">{{ $page }}</p>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="inline-flex items-center px-4 py-2 minimal:text-xl tablet:text-2xl font-pix text-coffee bg-oldpaper leading-5 hover:text-milano focus:z-10 focus:outline-none focus:border-milano active:bg-hipnymph active:text-coffee transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        <h3 id="login" class="minimal:text-xl tablet:text-2xl font-pix text-coffee leading-5 hover:text-milano active:text-coffee">
                                            {{ $page }}
                                        </h3>
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="inline-flex items-center px-4 py-2 minimal:text-xl tablet:text-2xl font-pix text-coffee bg-oldpaper leading-5 hover:text-milano focus:z-10 focus:outline-none focus:border-milano active:bg-hipnymph active:text-coffee transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                            <h3 id="login" class="minimal:text-xl tablet:text-2xl font-pix text-coffee leading-5 hover:text-milano active:text-coffee">
                                {{ __('Вперед') }}
                            </h3>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                        <span class="inline-flex ml-2 items-center px-4 py-2 minimal:text-xl tablet:text-2xl font-pix text-hipnymph bg-milano cursor-default leading-5" aria-hidden="true">
                                {{ __('Конец') }}
                            </span>
                        </span>
                    @endif
                </span>
            </div>
            <div class="flex flex-col justify-center items-center pt-4">
                <h1 class="font-pix minimal:text-xl tablet:text-2xl text-coffee leading-5">
                    {!! __('от') !!}
                    @if ($paginator->firstItem())
                        <span>{{ $paginator->firstItem() }}</span>
                        {!! __('до') !!}
                        <span>{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                </h1>
                <h3 class="font-pix pt-2 minimal:text-xl tablet:text-2xl text-milano leading-5">
                    {!! __('всего на странице') !!}
                    <span>{{ $paginator->total() }}</span>
                </h3>
            </div>
        </div>
    </nav>
@endif
