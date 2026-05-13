<div x-data="{ filtersOpen: false }" class="container-page py-10 lg:py-14">
    <style>
        .filter-sidebar {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 0, 0, 0.06);
        }
        [data-theme="dark"] .filter-sidebar {
            background: rgba(40, 40, 45, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
    {{-- Breadcrumb --}}
    <x-public.breadcrumbs :items="[['label' => 'Collection']]" />

    {{-- Page Header --}}
    <header class="glass-panel -mx-6 px-6 md:-mx-12 md:px-12 py-8 mb-8 rounded-2xl">
        <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <div class="animate-fade-in-up">
                <p class="label-small">Catalogue</p>
                <h1 class="heading-2 mt-3">The Collection</h1>
                <p class="text-body mt-2">
                    {{ $products->total() }}
                    {{ Str::plural('record', $products->total()) }} available
                    @if($this->hasActiveFilters())
                        <span class="text-text-muted">— filtered</span>
                    @endif
                </p>
            </div>

            <div class="flex items-center gap-3 animate-fade-in-up" style="animation-delay: 0.1s;">
                {{-- Mobile filter button --}}
                <button
                    type="button"
                    @click="filtersOpen = true"
                    class="lg:hidden btn-ios-secondary !py-2.5 !px-4"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 4h18M6 12h12M10 20h4"/>
                    </svg>
                    Filters
                </button>

                {{-- Sort --}}
                <div class="relative">
                    <label for="sort" class="sr-only">Sort by</label>
                    <select
                        id="sort"
                        wire:model.live="sort"
                        class="glass-card appearance-none pl-4 pr-10 py-2.5 text-xs font-medium uppercase tracking-wider text-text-primary cursor-pointer focus:outline-none transition-all"
                    >
                        <option value="newest">Newest</option>
                        <option value="price-low">Price — Low to High</option>
                        <option value="price-high">Price — High to Low</option>
                        <option value="name">Title A–Z</option>
                    </select>
                    <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Active filter chips --}}
        @if($this->hasActiveFilters())
            <div class="flex flex-wrap items-center gap-2 mt-6 pt-6 border-t border-border-glass">
                <span class="text-[11px] uppercase tracking-[2px] text-text-secondary mr-1">Active</span>

                @if($search !== '')
                    <button
                        type="button"
                        wire:click="removeSearch"
                        class="glass-subtle inline-flex items-center gap-2 px-3 py-1.5 text-xs rounded-full text-text-primary hover:bg-surface-card/80 transition-colors"
                    >
                        <span>Search: <span class="font-medium">{{ $search }}</span></span>
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Remove search filter</span>
                    </button>
                @endif

                @if($availability !== '')
                    <button
                        type="button"
                        wire:click="$set('availability', '')"
                        class="glass-subtle inline-flex items-center gap-2 px-3 py-1.5 text-xs rounded-full text-text-primary hover:bg-surface-card/80 transition-colors"
                    >
                        <span>Availability: <span class="font-medium">{{ $availability === 'in_stock' ? 'In Stock' : 'Out of Stock' }}</span></span>
                        <span aria-hidden="true">×</span>
                    </button>
                @endif

                @if($priceRange !== '')
                    <button
                        type="button"
                        wire:click="$set('priceRange', '')"
                        class="glass-subtle inline-flex items-center gap-2 px-3 py-1.5 text-xs rounded-full text-text-primary hover:bg-surface-card/80 transition-colors"
                    >
                        <span>Price: <span class="font-medium">{{ str_starts_with($priceRange, '>') ? '$' . substr($priceRange, 1) . '+' : '$' . str_replace('-', ' - $', $priceRange) }}</span></span>
                        <span aria-hidden="true">×</span>
                    </button>
                @endif

                @foreach($selectedGenres as $genreSlug)
                    @php($genreName = optional($categories->firstWhere('slug', $genreSlug))->name ?? $genreSlug)
                    <button
                        type="button"
                        wire:click="removeGenre('{{ $genreSlug }}')"
                        class="glass-subtle inline-flex items-center gap-2 px-3 py-1.5 text-xs rounded-full text-text-primary hover:bg-surface-card/80 transition-colors"
                    >
                        <span>Category: <span class="font-medium">{{ $genreName }}</span></span>
                        <span aria-hidden="true">×</span>
                    </button>
                @endforeach

                @foreach($selectedArtists as $artist)
                    <button
                        type="button"
                        wire:click="removeArtist('{{ $artist }}')"
                        class="glass-subtle inline-flex items-center gap-2 px-3 py-1.5 text-xs rounded-full text-text-primary hover:bg-surface-card/80 transition-colors"
                    >
                        <span>Artist: <span class="font-medium">{{ $artist }}</span></span>
                        <span aria-hidden="true">×</span>
                    </button>
                @endforeach

                @foreach($selectedLabels as $label)
                    <button
                        type="button"
                        wire:click="removeLabel('{{ $label }}')"
                        class="glass-subtle inline-flex items-center gap-2 px-3 py-1.5 text-xs rounded-full text-text-primary hover:bg-surface-card/80 transition-colors"
                    >
                        <span>Label: <span class="font-medium">{{ $label }}</span></span>
                        <span aria-hidden="true">×</span>
                    </button>
                @endforeach

                <button
                    type="button"
                    wire:click="clearFilters"
                    class="ml-1 text-xs uppercase tracking-wider text-accent hover:text-accent-hover underline-offset-4 hover:underline transition-colors"
                >
                    Clear all
                </button>
            </div>
        @endif
    </header>

    {{-- Main layout --}}
    <div class="flex gap-10">
        {{-- Sidebar — desktop --}}
        <aside class="w-64 flex-shrink-0 hidden lg:block">
            <div class="filter-sidebar p-6 rounded-2xl sticky top-24">
                @include('livewire.shop.products._filter-sections', [
                    'categories' => $categories,
                    'artists' => $artists,
                    'labels' => $labels,
                ])
            </div>
        </aside>

        {{-- Product grid --}}
        <div class="flex-1 min-w-0">
            @if($products->count())
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6 stagger-children">
                    @foreach($products as $product)
                        <x-public.product-card :product="$product" />
                    @endforeach
                </div>

                <div class="mt-16">
                    {{ $products->links() }}
                </div>
            @else
                <div class="glass-card-elevated py-20 px-6 text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-2xl glass-subtle flex items-center justify-center">
                        <svg class="w-8 h-8 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <h3 class="heading-3 mb-2">No records found</h3>
                    <p class="text-body mb-6 max-w-sm mx-auto">
                        We couldn't find anything matching your filters. Try loosening your selection or browse the full collection.
                    </p>
                    <button
                        type="button"
                        wire:click="clearFilters"
                        class="btn-ios-primary"
                    >
                        Clear filters
                    </button>
                </div>
            @endif
        </div>
    </div>

    {{-- Mobile filter drawer --}}
    <div
        x-show="filtersOpen"
        x-cloak
        class="fixed inset-0 z-50 lg:hidden"
        x-transition.opacity
    >
        {{-- Backdrop with blur --}}
        <div
            @click="filtersOpen = false"
            class="absolute inset-0 bg-text-primary/40 backdrop-blur-sm"
        ></div>

        {{-- Panel --}}
        <aside
            x-show="filtersOpen"
            x-transition:enter="transition transform ease-out duration-300"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition transform ease-in duration-200"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="relative w-[85%] max-w-sm h-full glass-dropdown rounded-none rounded-r-3xl flex flex-col"
        >
            <div class="flex items-center justify-between px-6 py-5 border-b border-border-glass">
                <p class="label-small !tracking-[3px]">Filters</p>
                <button
                    type="button"
                    @click="filtersOpen = false"
                    class="w-10 h-10 -mr-2 rounded-full glass-subtle flex items-center justify-center text-text-secondary hover:text-text-primary"
                    aria-label="Close filters"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto px-6 py-6">
                @include('livewire.shop.products._filter-sections', [
                    'categories' => $categories,
                    'artists' => $artists,
                    'labels' => $labels,
                ])
            </div>
        </aside>
    </div>
</div>
