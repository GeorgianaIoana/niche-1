<div x-data="{ open: $wire.entangle('open') }" @keydown.escape.window="open = false">
    <!-- Cart Button -->
    <div
        class="w-8 h-8 rounded-full flex items-center justify-center bg-surface-alt/80 hover:bg-surface transition-all duration-300"
        style="box-shadow: inset 1px 1px 3px rgba(0,0,0,0.05), inset -1px -1px 3px rgba(255,255,255,0.8), 0 2px 8px rgba(0,0,0,0.06);"
    >
        <button
            @click="open = true"
            class="relative text-text-secondary hover:text-text-primary transition-colors"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            @if($cart->item_count > 0)
                <span class="absolute -top-2 -right-2 w-5 h-5 bg-accent text-white text-[10px] font-bold rounded-full flex items-center justify-center shadow-lg">
                    {{ $cart->item_count > 9 ? '9+' : $cart->item_count }}
                </span>
            @endif
        </button>
    </div>

    <!-- Teleport drawer to body for correct z-index -->
    <template x-teleport="body">
        <div
            x-show="open"
            x-cloak
            class="fixed inset-0 z-50"
            x-effect="document.body.classList.toggle('overflow-hidden', open)"
        >
            <!-- Backdrop -->
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="open = false"
                class="absolute inset-0 bg-black/50 backdrop-blur-sm"
            ></div>

            <!-- Drawer Panel -->
            <div
                x-show="open"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="absolute inset-y-0 right-0 w-full max-w-md flex flex-col glass-card-elevated shadow-2xl"
            >
                <!-- Header -->
                <div class="flex items-center justify-between p-6 border-b border-border-glass">
                    <h2 class="font-serif font-bold text-text-primary text-xl">Your Collection</h2>
                    <button
                        @click="open = false"
                        class="w-10 h-10 rounded-full glass-subtle flex items-center justify-center text-text-secondary hover:text-text-primary transition-colors"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                @if($cart->items->count())
                    <!-- Items (scrollable) -->
                    <div class="flex-1 overflow-y-auto p-6 space-y-4">
                        @php
                            $figmaImages = [
                                '/images/figma/cd-laura-pausini.png',
                                '/images/figma/vinyl-bruno-mars.png',
                                '/images/figma/cd-joy-redvelvet.png',
                                '/images/figma/vinyl-gorillaz.png',
                            ];
                        @endphp
                        @foreach($cart->items as $item)
                            @php
                                $fallbackImage = $figmaImages[$item->product->id % count($figmaImages)];
                                $imageUrl = $item->product->image ?: $fallbackImage;
                            @endphp
                            <div class="glass-subtle rounded-2xl p-4 flex gap-4 group">
                                <div class="w-20 h-20 rounded-xl overflow-hidden flex-shrink-0 shadow-sm">
                                    <img src="{{ $imageUrl }}" alt="{{ $item->product->title }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-sm font-semibold truncate text-text-primary">{{ $item->product->title }}</h4>
                                    <p class="text-xs text-text-secondary mt-1">{{ $item->product->artist }}</p>
                                    <div class="flex items-center justify-between mt-3">
                                        <span class="text-base font-bold text-accent">{{ $item->product->formatted_price }}</span>
                                        <span class="text-xs text-text-secondary bg-surface-card/50 px-2.5 py-1 rounded-full">x{{ $item->quantity }}</span>
                                    </div>
                                </div>
                                <button
                                    wire:click="removeItem({{ $item->id }})"
                                    class="opacity-0 group-hover:opacity-100 transition-opacity text-text-muted hover:text-red-500 self-start mt-1"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>

                    <!-- Footer (sticky) -->
                    <div class="p-6 border-t border-border-glass space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm uppercase tracking-wider text-text-secondary">Subtotal</span>
                            <span class="text-2xl font-serif font-bold text-accent">{{ $cart->formatted_subtotal }}</span>
                        </div>
                        <a
                            href="{{ route('cart') }}"
                            class="btn-ios-primary w-full"
                            @click="open = false"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            View Collection
                        </a>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="flex-1 flex flex-col items-center justify-center p-10 text-center">
                        <div class="w-20 h-20 mx-auto mb-6 rounded-2xl glass-subtle flex items-center justify-center">
                            <svg class="w-10 h-10 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <p class="text-text-secondary text-base font-medium mb-2">Your collection is empty</p>
                        <p class="text-text-muted text-sm mb-6">Start building your archive</p>
                        <a href="{{ route('collection') }}" class="btn-ios-primary" @click="open = false">
                            Browse Archives
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </template>
</div>
