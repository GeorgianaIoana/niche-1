{{-- Filters matching nicherecords.ro style. Receives: $categories --}}
<div class="space-y-8">
    {{-- Availability --}}
    <section>
        <h2 class="label-small !tracking-[3px] mb-4">Availability</h2>
        <div class="space-y-2.5">
            <label class="flex items-center gap-3 text-sm text-text-secondary hover:text-text-primary cursor-pointer group">
                <input
                    type="radio"
                    name="availability"
                    wire:model.live="availability"
                    value=""
                    class="w-4 h-4 border-border text-accent focus:ring-1 focus:ring-accent"
                >
                <span class="group-hover:text-text-primary transition-colors">All</span>
            </label>
            <label class="flex items-center gap-3 text-sm text-text-secondary hover:text-text-primary cursor-pointer group">
                <input
                    type="radio"
                    name="availability"
                    wire:model.live="availability"
                    value="in_stock"
                    class="w-4 h-4 border-border text-accent focus:ring-1 focus:ring-accent"
                >
                <span class="group-hover:text-text-primary transition-colors">In Stock</span>
            </label>
            <label class="flex items-center gap-3 text-sm text-text-secondary hover:text-text-primary cursor-pointer group">
                <input
                    type="radio"
                    name="availability"
                    wire:model.live="availability"
                    value="out_of_stock"
                    class="w-4 h-4 border-border text-accent focus:ring-1 focus:ring-accent"
                >
                <span class="group-hover:text-text-primary transition-colors">Out of Stock</span>
            </label>
        </div>
    </section>

    <div class="h-px bg-border"></div>

    {{-- Price --}}
    <section>
        <h2 class="label-small !tracking-[3px] mb-4">Price</h2>
        <div class="space-y-2.5">
            <label class="flex items-center gap-3 text-sm text-text-secondary hover:text-text-primary cursor-pointer group">
                <input
                    type="radio"
                    name="priceRange"
                    wire:model.live="priceRange"
                    value=""
                    class="w-4 h-4 border-border text-accent focus:ring-1 focus:ring-accent"
                >
                <span class="group-hover:text-text-primary transition-colors">Any Price</span>
            </label>
            <label class="flex items-center gap-3 text-sm text-text-secondary hover:text-text-primary cursor-pointer group">
                <input
                    type="radio"
                    name="priceRange"
                    wire:model.live="priceRange"
                    value="0-50"
                    class="w-4 h-4 border-border text-accent focus:ring-1 focus:ring-accent"
                >
                <span class="group-hover:text-text-primary transition-colors">$0 - $50</span>
            </label>
            <label class="flex items-center gap-3 text-sm text-text-secondary hover:text-text-primary cursor-pointer group">
                <input
                    type="radio"
                    name="priceRange"
                    wire:model.live="priceRange"
                    value="50-100"
                    class="w-4 h-4 border-border text-accent focus:ring-1 focus:ring-accent"
                >
                <span class="group-hover:text-text-primary transition-colors">$50 - $100</span>
            </label>
            <label class="flex items-center gap-3 text-sm text-text-secondary hover:text-text-primary cursor-pointer group">
                <input
                    type="radio"
                    name="priceRange"
                    wire:model.live="priceRange"
                    value="100-150"
                    class="w-4 h-4 border-border text-accent focus:ring-1 focus:ring-accent"
                >
                <span class="group-hover:text-text-primary transition-colors">$100 - $150</span>
            </label>
            <label class="flex items-center gap-3 text-sm text-text-secondary hover:text-text-primary cursor-pointer group">
                <input
                    type="radio"
                    name="priceRange"
                    wire:model.live="priceRange"
                    value="150-250"
                    class="w-4 h-4 border-border text-accent focus:ring-1 focus:ring-accent"
                >
                <span class="group-hover:text-text-primary transition-colors">$150 - $250</span>
            </label>
            <label class="flex items-center gap-3 text-sm text-text-secondary hover:text-text-primary cursor-pointer group">
                <input
                    type="radio"
                    name="priceRange"
                    wire:model.live="priceRange"
                    value=">250"
                    class="w-4 h-4 border-border text-accent focus:ring-1 focus:ring-accent"
                >
                <span class="group-hover:text-text-primary transition-colors">$250+</span>
            </label>
        </div>
    </section>

    <div class="h-px bg-border"></div>

    {{-- Categories --}}
    <section x-data="{ focused: false }">
        <div class="flex items-baseline justify-between mb-4">
            <h2 class="label-small !tracking-[3px]">Categories</h2>
            @if(!empty($selectedGenres))
                <span class="text-[10px] text-accent font-medium">{{ count($selectedGenres) }} selected</span>
            @endif
        </div>

        <!-- Oval Search Input with 3D Effects -->
        <div class="relative mb-3">
            <div
                class="flex items-center gap-2 px-3 py-1.5 rounded-full transition-all duration-300"
                :class="focused ? 'bg-surface' : 'bg-surface-alt/60 hover:bg-surface'"
                style="box-shadow: inset 1px 1px 2px rgba(0,0,0,0.05), inset -1px -1px 2px rgba(255,255,255,0.8), 0 2px 6px rgba(0,0,0,0.05);"
                x-bind:style="focused
                    ? 'box-shadow: inset 1px 1px 1px rgba(0,0,0,0.03), inset -1px -1px 1px rgba(255,255,255,0.9), 0 4px 10px rgba(116, 91, 37, 0.1), 0 0 0 1.5px rgba(228, 194, 130, 0.25);'
                    : 'box-shadow: inset 1px 1px 2px rgba(0,0,0,0.05), inset -1px -1px 2px rgba(255,255,255,0.8), 0 2px 6px rgba(0,0,0,0.05);'"
            >
                <!-- Search Icon -->
                <div
                    class="w-5 h-5 rounded-full flex items-center justify-center shrink-0 transition-all duration-300"
                    :class="focused ? 'text-white' : 'text-text-muted'"
                    :style="focused
                        ? 'background: linear-gradient(135deg, #e4c282 0%, #745b25 100%); box-shadow: 0 2px 5px rgba(116, 91, 37, 0.3);'
                        : 'background: transparent;'"
                >
                    <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input
                    type="text"
                    wire:model.live.debounce.300ms="categorySearch"
                    @focus="focused = true"
                    @blur="focused = false"
                    placeholder="Search..."
                    class="flex-1 bg-transparent border-0 p-0 text-xs text-text-primary placeholder:text-text-muted focus:outline-none focus:ring-0"
                >
            </div>
        </div>

        <div class="max-h-64 overflow-y-auto pr-1 space-y-2.5">
            @forelse($categories->filter(fn($c) => empty($categorySearch) || str_contains(strtolower($c->name), strtolower($categorySearch))) as $cat)
                <label class="flex items-center gap-3 text-sm text-text-secondary hover:text-text-primary cursor-pointer group">
                    <input
                        type="checkbox"
                        wire:model.live="selectedGenres"
                        value="{{ $cat->slug }}"
                        class="w-4 h-4 rounded-sm border-border accent-accent focus:ring-1 focus:ring-accent"
                    >
                    <span class="truncate group-hover:text-text-primary transition-colors">{{ $cat->name }}</span>
                </label>
            @empty
                <p class="text-xs text-text-muted italic py-2">No categories match your search.</p>
            @endforelse
        </div>
    </section>

    @if($this->hasActiveFilters())
        <div class="pt-4">
            <button
                type="button"
                wire:click="clearFilters"
                class="w-full py-3 px-4 text-xs font-medium uppercase tracking-wider border border-text-primary text-text-primary hover:bg-text-primary hover:text-surface transition-colors"
            >
                Clear All Filters
            </button>
        </div>
    @endif
</div>
