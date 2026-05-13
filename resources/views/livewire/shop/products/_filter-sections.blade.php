{{-- Filters with dark mode support --}}
<style>
    .filter-section {
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    }
    [data-theme="dark"] .filter-section {
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    .filter-search {
        background: rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.06);
    }
    [data-theme="dark"] .filter-search {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .filter-search:focus-within {
        border-color: var(--color-accent);
        box-shadow: 0 0 0 3px rgba(228, 194, 130, 0.15);
    }
    .filter-list {
        scrollbar-width: thin;
        scrollbar-color: rgba(0, 0, 0, 0.15) transparent;
    }
    [data-theme="dark"] .filter-list {
        scrollbar-color: rgba(255, 255, 255, 0.15) transparent;
    }
    .filter-radio,
    .filter-checkbox {
        appearance: none;
        width: 1rem;
        height: 1rem;
        border: 2px solid currentColor;
        opacity: 0.4;
        cursor: pointer;
        transition: all 0.15s ease;
    }
    .filter-radio {
        border-radius: 50%;
    }
    .filter-checkbox {
        border-radius: 3px;
    }
    .filter-radio:checked,
    .filter-checkbox:checked {
        opacity: 1;
        border-color: var(--color-accent);
        background-color: var(--color-accent);
    }
    .filter-radio:checked {
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='8' cy='8' r='3'/%3E%3C/svg%3E");
    }
    .filter-checkbox:checked {
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3E%3C/svg%3E");
    }
</style>

<div class="space-y-1">
    {{-- Availability --}}
    <section x-data="{ open: true }" class="filter-section pb-4">
        <button type="button" @click="open = !open" class="w-full flex items-center justify-between py-3">
            <span class="text-xs font-semibold uppercase tracking-[0.15em]">Availability</span>
            <svg class="w-4 h-4 opacity-40 transition-transform duration-200" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="space-y-2 pb-2">
                @foreach(['' => 'All', 'in_stock' => 'In Stock', 'out_of_stock' => 'Out of Stock'] as $value => $label)
                    <label class="flex items-center gap-3 py-1 cursor-pointer group">
                        <input type="radio" name="availability" wire:model.live="availability" value="{{ $value }}" class="filter-radio">
                        <span class="text-sm opacity-70 group-hover:opacity-100 transition-opacity">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Price Range --}}
    <section x-data="{ open: true }" class="filter-section pb-4">
        <button type="button" @click="open = !open" class="w-full flex items-center justify-between py-3">
            <span class="text-xs font-semibold uppercase tracking-[0.15em]">Price</span>
            <svg class="w-4 h-4 opacity-40 transition-transform duration-200" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            <div class="space-y-2 pb-2">
                @foreach(['' => 'Any Price', '0-50' => 'Under $50', '50-100' => '$50 – $100', '100-150' => '$100 – $150', '150-250' => '$150 – $250', '>250' => '$250+'] as $value => $label)
                    <label class="flex items-center gap-3 py-1 cursor-pointer group">
                        <input type="radio" name="priceRange" wire:model.live="priceRange" value="{{ $value }}" class="filter-radio">
                        <span class="text-sm opacity-70 group-hover:opacity-100 transition-opacity">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Categories --}}
    <section x-data="{ open: true }" class="filter-section pb-4">
        <button type="button" @click="open = !open" class="w-full flex items-center justify-between py-3">
            <span class="text-xs font-semibold uppercase tracking-[0.15em] flex items-center gap-2">
                Categories
                @if(!empty($selectedGenres))
                    <span class="inline-flex items-center justify-center min-w-[1.25rem] h-5 px-1.5 text-[10px] font-bold rounded-full bg-accent text-white">{{ count($selectedGenres) }}</span>
                @endif
            </span>
            <svg class="w-4 h-4 opacity-40 transition-transform duration-200" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            {{-- Search --}}
            <div class="filter-search flex items-center gap-2 px-3 py-2 rounded-lg mb-3 transition-all">
                <svg class="w-4 h-4 opacity-40 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" wire:model.live.debounce.300ms="categorySearch" placeholder="Search..." class="flex-1 bg-transparent border-0 p-0 text-sm placeholder:opacity-50 focus:outline-none focus:ring-0">
            </div>
            <div class="filter-list max-h-48 overflow-y-auto space-y-1 pb-2">
                @forelse($categories->filter(fn($c) => empty($categorySearch) || str_contains(strtolower($c->name), strtolower($categorySearch))) as $cat)
                    <label class="flex items-center gap-3 py-1 cursor-pointer group">
                        <input type="checkbox" wire:model.live="selectedGenres" value="{{ $cat->slug }}" class="filter-checkbox">
                        <span class="text-sm opacity-70 group-hover:opacity-100 transition-opacity truncate">{{ $cat->name }}</span>
                    </label>
                @empty
                    <p class="text-sm opacity-50 py-2 text-center">No categories found</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Artists --}}
    @if($artists->count())
    <section x-data="{ open: false }" class="filter-section pb-4">
        <button type="button" @click="open = !open" class="w-full flex items-center justify-between py-3">
            <span class="text-xs font-semibold uppercase tracking-[0.15em] flex items-center gap-2">
                Artists
                @if(!empty($selectedArtists))
                    <span class="inline-flex items-center justify-center min-w-[1.25rem] h-5 px-1.5 text-[10px] font-bold rounded-full bg-accent text-white">{{ count($selectedArtists) }}</span>
                @endif
            </span>
            <svg class="w-4 h-4 opacity-40 transition-transform duration-200" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            {{-- Search --}}
            <div class="filter-search flex items-center gap-2 px-3 py-2 rounded-lg mb-3 transition-all">
                <svg class="w-4 h-4 opacity-40 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" wire:model.live.debounce.300ms="artistSearch" placeholder="Search..." class="flex-1 bg-transparent border-0 p-0 text-sm placeholder:opacity-50 focus:outline-none focus:ring-0">
            </div>
            <div class="filter-list max-h-48 overflow-y-auto space-y-1 pb-2">
                @forelse($artists->filter(fn($a) => empty($artistSearch) || str_contains(strtolower($a), strtolower($artistSearch))) as $artist)
                    <label class="flex items-center gap-3 py-1 cursor-pointer group">
                        <input type="checkbox" wire:model.live="selectedArtists" value="{{ $artist }}" class="filter-checkbox">
                        <span class="text-sm opacity-70 group-hover:opacity-100 transition-opacity truncate">{{ $artist }}</span>
                    </label>
                @empty
                    <p class="text-sm opacity-50 py-2 text-center">No artists found</p>
                @endforelse
            </div>
        </div>
    </section>
    @endif

    {{-- Labels --}}
    @if($labels->count())
    <section x-data="{ open: false }" class="filter-section pb-4">
        <button type="button" @click="open = !open" class="w-full flex items-center justify-between py-3">
            <span class="text-xs font-semibold uppercase tracking-[0.15em] flex items-center gap-2">
                Labels
                @if(!empty($selectedLabels))
                    <span class="inline-flex items-center justify-center min-w-[1.25rem] h-5 px-1.5 text-[10px] font-bold rounded-full bg-accent text-white">{{ count($selectedLabels) }}</span>
                @endif
            </span>
            <svg class="w-4 h-4 opacity-40 transition-transform duration-200" :class="open && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
            {{-- Search --}}
            <div class="filter-search flex items-center gap-2 px-3 py-2 rounded-lg mb-3 transition-all">
                <svg class="w-4 h-4 opacity-40 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <input type="text" wire:model.live.debounce.300ms="labelSearch" placeholder="Search..." class="flex-1 bg-transparent border-0 p-0 text-sm placeholder:opacity-50 focus:outline-none focus:ring-0">
            </div>
            <div class="filter-list max-h-48 overflow-y-auto space-y-1 pb-2">
                @forelse($labels->filter(fn($l) => empty($labelSearch) || str_contains(strtolower($l), strtolower($labelSearch))) as $label)
                    <label class="flex items-center gap-3 py-1 cursor-pointer group">
                        <input type="checkbox" wire:model.live="selectedLabels" value="{{ $label }}" class="filter-checkbox">
                        <span class="text-sm opacity-70 group-hover:opacity-100 transition-opacity truncate">{{ $label }}</span>
                    </label>
                @empty
                    <p class="text-sm opacity-50 py-2 text-center">No labels found</p>
                @endforelse
            </div>
        </div>
    </section>
    @endif

    {{-- Clear Filters --}}
    @if($this->hasActiveFilters())
        <div class="pt-4">
            <button type="button" wire:click="clearFilters" class="w-full flex items-center justify-center gap-2 py-3 text-sm font-medium text-accent hover:text-accent-hover transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Clear All Filters
            </button>
        </div>
    @endif
</div>
