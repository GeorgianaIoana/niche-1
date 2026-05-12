<div class="relative" x-data="{ open: $wire.entangle('open') }">
    <!-- Cart Button -->
    <div
        class="w-9 h-9 rounded-full flex items-center justify-center glass-subtle hover:glass-card transition-all duration-300"
    >
        <button
            @click="open = !open"
            class="relative text-current"
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

    <!-- Dropdown -->
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95 translate-y-2"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-2"
        @click.outside="open = false"
        class="glass-dropdown absolute right-0 mt-4 w-80 z-50"
    >
        <div class="p-5 border-b border-border-glass">
            <div class="flex items-center justify-between">
                <h3 class="font-serif font-bold text-text-primary text-lg">Your Collection</h3>
                <button @click="open = false" class="w-8 h-8 rounded-full glass-subtle flex items-center justify-center text-text-secondary hover:text-text-primary transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        @if($cart->items->count())
            <div class="max-h-72 overflow-y-auto p-4 space-y-3">
                @foreach($cart->items as $item)
                    <div class="glass-subtle rounded-2xl p-3 flex gap-3 group">
                        <div class="w-14 h-14 rounded-xl overflow-hidden flex-shrink-0 shadow-sm">
                            @if($item->product->image)
                                <img src="{{ $item->product->image }}" alt="{{ $item->product->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-surface-card flex items-center justify-center">
                                    <div class="w-8 h-8 rounded-full bg-surface-dark"></div>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-semibold truncate text-text-primary">{{ $item->product->title }}</h4>
                            <p class="text-xs text-text-secondary mt-0.5">{{ $item->product->artist }}</p>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-sm font-bold text-accent">{{ $item->product->formatted_price }}</span>
                                <span class="text-xs text-text-secondary bg-surface-card/50 px-2 py-0.5 rounded-full">x{{ $item->quantity }}</span>
                            </div>
                        </div>
                        <button
                            wire:click="removeItem({{ $item->id }})"
                            class="opacity-0 group-hover:opacity-100 transition-opacity text-text-muted hover:text-red-500 self-start mt-1"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>

            <div class="p-5 border-t border-border-glass space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-xs uppercase tracking-wider text-text-secondary">Subtotal</span>
                    <span class="text-xl font-serif font-bold text-accent">{{ $cart->formatted_subtotal }}</span>
                </div>
                <a
                    href="{{ route('cart') }}"
                    class="btn-ios-primary w-full"
                    @click="open = false"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    View Collection
                </a>
            </div>
        @else
            <div class="p-10 text-center">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl glass-subtle flex items-center justify-center">
                    <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <p class="text-text-secondary text-sm font-medium mb-1">Your collection is empty</p>
                <p class="text-text-muted text-xs mb-4">Start building your archive</p>
                <a href="{{ route('collection') }}" class="btn-ios-primary !py-2.5 !px-5 !text-[10px]" @click="open = false">
                    Browse Archives
                </a>
            </div>
        @endif
    </div>
</div>
