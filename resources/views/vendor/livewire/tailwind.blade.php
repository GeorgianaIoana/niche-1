@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex flex-col items-center gap-6">
            {{-- Results info --}}
            <p class="text-sm text-text-secondary">
                <span>{!! __('Showing') !!}</span>
                <span class="font-semibold text-text-primary">{{ $paginator->firstItem() }}</span>
                <span>{!! __('to') !!}</span>
                <span class="font-semibold text-text-primary">{{ $paginator->lastItem() }}</span>
                <span>{!! __('of') !!}</span>
                <span class="font-semibold text-text-primary">{{ $paginator->total() }}</span>
                <span>{!! __('results') !!}</span>
            </p>

            {{-- Pagination controls --}}
            <div class="flex items-center gap-2">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}"
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-surface-alt/50 text-text-muted cursor-not-allowed">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </span>
                @else
                    <button type="button"
                        wire:click="previousPage('{{ $paginator->getPageName() }}')"
                        x-on:click="{{ $scrollIntoViewJsSnippet }}"
                        dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-surface-alt/80 hover:bg-surface text-text-secondary hover:text-text-primary transition-all duration-300"
                        style="box-shadow: inset 1px 1px 3px rgba(0,0,0,0.05), inset -1px -1px 3px rgba(255,255,255,0.8), 0 2px 8px rgba(0,0,0,0.06);"
                        aria-label="{{ __('pagination.previous') }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                @endif

                {{-- Pagination Elements --}}
                <div class="flex items-center gap-1.5 px-2">
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span class="w-10 h-10 flex items-center justify-center text-text-muted text-sm">
                                {{ $element }}
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                    @if ($page == $paginator->currentPage())
                                        <span aria-current="page"
                                            class="w-10 h-10 flex items-center justify-center rounded-full text-sm font-semibold text-white"
                                            style="background: linear-gradient(135deg, var(--color-accent-light) 0%, var(--color-accent) 100%); box-shadow: 0 2px 8px rgba(116, 91, 37, 0.3);">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <button type="button"
                                            wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                            x-on:click="{{ $scrollIntoViewJsSnippet }}"
                                            class="w-10 h-10 flex items-center justify-center rounded-full text-sm font-medium text-text-secondary hover:text-text-primary bg-surface-alt/50 hover:bg-surface-alt transition-all duration-300"
                                            aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                            {{ $page }}
                                        </button>
                                    @endif
                                </span>
                            @endforeach
                        @endif
                    @endforeach
                </div>

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button type="button"
                        wire:click="nextPage('{{ $paginator->getPageName() }}')"
                        x-on:click="{{ $scrollIntoViewJsSnippet }}"
                        dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-surface-alt/80 hover:bg-surface text-text-secondary hover:text-text-primary transition-all duration-300"
                        style="box-shadow: inset 1px 1px 3px rgba(0,0,0,0.05), inset -1px -1px 3px rgba(255,255,255,0.8), 0 2px 8px rgba(0,0,0,0.06);"
                        aria-label="{{ __('pagination.next') }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                @else
                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}"
                        class="w-10 h-10 flex items-center justify-center rounded-full bg-surface-alt/50 text-text-muted cursor-not-allowed">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                @endif
            </div>
        </nav>
    @endif
</div>
