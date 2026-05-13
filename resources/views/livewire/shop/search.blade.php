<div class="relative" x-data="{ focused: false }" @click.outside="focused = false; $wire.close()">
    <!-- Search Input - Oval with 3D Effects -->
    <div class="relative group">
        <div
            class="relative flex items-center gap-2 px-3 py-1 rounded-full transition-all duration-300"
            :class="focused ? 'bg-surface scale-[1.02] w-48' : 'bg-surface-alt/80 hover:bg-surface w-36'"
            style="box-shadow: inset 1px 1px 3px rgba(0,0,0,0.05), inset -1px -1px 3px rgba(255,255,255,0.8), 0 2px 8px rgba(0,0,0,0.06);"
            x-bind:style="focused
                ? 'box-shadow: inset 1px 1px 2px rgba(0,0,0,0.03), inset -1px -1px 2px rgba(255,255,255,0.9), 0 6px 16px rgba(116, 91, 37, 0.12), 0 0 0 1.5px rgba(228, 194, 130, 0.3);'
                : 'box-shadow: inset 1px 1px 3px rgba(0,0,0,0.05), inset -1px -1px 3px rgba(255,255,255,0.8), 0 2px 8px rgba(0,0,0,0.06);'"
        >
            <!-- Search Icon with 3D Button -->
            <div
                class="w-5 h-5 rounded-full flex items-center justify-center shrink-0 transition-all duration-300"
                :class="focused ? 'text-white' : 'text-text-muted'"
                :style="focused
                    ? 'background: linear-gradient(135deg, #e4c282 0%, #745b25 100%); box-shadow: 0 2px 6px rgba(116, 91, 37, 0.35);'
                    : 'background: transparent;'"
            >
                <svg
                    class="w-2.5 h-2.5 transition-transform duration-300"
                    :class="focused ? 'scale-110' : ''"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <!-- Input -->
            <input
                type="text"
                wire:model.live.debounce.300ms="query"
                @focus="focused = true"
                placeholder="Search..."
                class="flex-1 bg-transparent border-0 p-0 text-xs text-text-primary placeholder:text-text-muted focus:outline-none focus:ring-0"
            >

            <!-- Loading Spinner -->
            <div wire:loading wire:target="query" class="shrink-0">
                <div
                    class="w-4 h-4 rounded-full flex items-center justify-center"
                    style="background: linear-gradient(135deg, #e4c282 0%, #745b25 100%);"
                >
                    <svg class="w-2.5 h-2.5 text-white animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </div>

            <!-- Clear Button -->
            @if(strlen($query) > 0)
                <button
                    wire:click="$set('query', '')"
                    class="shrink-0 w-4 h-4 rounded-full flex items-center justify-center text-text-muted hover:text-white transition-all duration-200"
                    style="background: linear-gradient(180deg, #f5f5f5 0%, #e0e0e0 100%); box-shadow: 0 1px 3px rgba(0,0,0,0.1);"
                    onmouseenter="this.style.background = 'linear-gradient(135deg, #e4c282 0%, #745b25 100%)'"
                    onmouseleave="this.style.background = 'linear-gradient(180deg, #f5f5f5 0%, #e0e0e0 100%)'"
                >
                    <svg class="w-2 h-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            @endif
        </div>
    </div>

    <!-- Results Dropdown with 3D Card Effect -->
    @if($showResults && count($results))
        <div
            class="absolute right-0 mt-4 w-96 bg-surface rounded-2xl overflow-hidden z-50"
            style="box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.5);"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        >
            <!-- Results Header -->
            <div class="px-5 py-3 border-b border-border" style="background: linear-gradient(180deg, rgba(255,255,255,0.8) 0%, rgba(245,243,238,0.8) 100%);">
                <p class="text-[10px] font-medium uppercase tracking-wider text-text-muted">
                    {{ count($results) }} {{ Str::plural('result', count($results)) }} found
                </p>
            </div>

            <!-- Results List -->
            @php
                $figmaImages = [
                    '/images/figma/cd-laura-pausini.png',
                    '/images/figma/vinyl-bruno-mars.png',
                    '/images/figma/cd-joy-redvelvet.png',
                    '/images/figma/vinyl-gorillaz.png',
                ];
            @endphp
            <div class="max-h-80 overflow-y-auto">
                @foreach($results as $product)
                    @php
                        $fallbackImage = $figmaImages[$product->id % count($figmaImages)];
                        $imageUrl = $product->image ?: $fallbackImage;
                    @endphp
                    <button
                        wire:click="selectProduct('{{ $product->slug }}')"
                        class="w-full flex items-center gap-4 p-4 hover:bg-surface-alt/50 transition-all text-left group border-b border-border/50 last:border-b-0"
                    >
                        <!-- Product Image with 3D Frame -->
                        <div
                            class="w-14 h-14 rounded-xl flex-shrink-0 overflow-hidden"
                            style="box-shadow: 0 4px 12px rgba(0,0,0,0.15), inset 0 1px 0 rgba(255,255,255,0.3);"
                        >
                            <img src="{{ $imageUrl }}" alt="{{ $product->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>

                        <!-- Product Info -->
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-text-primary truncate group-hover:text-accent transition-colors">
                                {{ $product->title }}
                            </p>
                            <p class="text-xs text-text-secondary truncate mt-0.5">{{ $product->artist }}</p>
                            @if($product->category)
                                <span
                                    class="inline-block mt-1.5 px-2 py-0.5 text-[9px] uppercase tracking-wider text-text-muted rounded-full"
                                    style="background: linear-gradient(180deg, #f5f3ee 0%, #e4e2dd 100%); box-shadow: inset 0 1px 0 rgba(255,255,255,0.5);"
                                >
                                    {{ $product->category->name }}
                                </span>
                            @endif
                        </div>

                        <!-- Price Badge -->
                        <div
                            class="shrink-0 px-3 py-1.5 rounded-full"
                            style="background: linear-gradient(135deg, #e4c282 0%, #745b25 100%); box-shadow: 0 2px 8px rgba(116, 91, 37, 0.3);"
                        >
                            <span class="text-xs font-bold text-white">{{ $product->formatted_price }}</span>
                        </div>
                    </button>
                @endforeach
            </div>

            <!-- View All Link -->
            <div class="border-t border-border" style="background: linear-gradient(180deg, rgba(255,255,255,0.8) 0%, rgba(245,243,238,0.8) 100%);">
                <a
                    href="{{ route('collection', ['search' => $query]) }}"
                    class="flex items-center justify-center gap-2 py-4 text-xs font-medium uppercase tracking-wider transition-all group"
                    style="color: #745b25;"
                    onmouseenter="this.style.color = '#5a4720'"
                    onmouseleave="this.style.color = '#745b25'"
                >
                    <span>View all results</span>
                    <svg class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    @elseif($showResults && strlen($query) >= 2)
        <!-- No Results with 3D Card -->
        <div
            class="absolute right-0 mt-4 w-80 bg-surface rounded-2xl overflow-hidden z-50"
            style="box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.5);"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        >
            <div class="p-8 text-center">
                <div
                    class="w-14 h-14 mx-auto mb-4 rounded-full flex items-center justify-center"
                    style="background: linear-gradient(180deg, #f5f3ee 0%, #e4e2dd 100%); box-shadow: inset 2px 2px 4px rgba(0,0,0,0.05), inset -2px -2px 4px rgba(255,255,255,0.8), 0 4px 12px rgba(0,0,0,0.1);"
                >
                    <svg class="w-6 h-6 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <p class="text-sm text-text-primary font-medium mb-1">No records found</p>
                <p class="text-xs text-text-muted">Try a different search term</p>
            </div>
        </div>
    @endif
</div>
