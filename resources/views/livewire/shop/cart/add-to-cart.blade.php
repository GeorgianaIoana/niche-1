<div>
    @if($showQuantity)
    <div class="flex items-center gap-4 mb-5">
        <label class="text-xs uppercase tracking-wider text-text-secondary">Quantity</label>
        <div class="qty-stepper-minimal">
            <button
                wire:click="decrement"
                class="w-9 h-9 flex items-center justify-center border border-border text-text-secondary hover:text-text-primary hover:border-text-primary transition-all"
                :disabled="$wire.quantity <= 1"
            >
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                </svg>
            </button>
            <span class="w-12 text-center font-medium text-text-primary text-sm">{{ $quantity }}</span>
            <button
                wire:click="increment"
                class="w-9 h-9 flex items-center justify-center border border-border text-text-secondary hover:text-text-primary hover:border-text-primary transition-all"
            >
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    <button
        wire:click="addToCart"
        class="{{ $buttonClass }} group relative overflow-hidden
               [transform-style:preserve-3d] [perspective:500px]
               transition-all duration-300 ease-out
               hover:[transform:translateY(-2px)_rotateX(5deg)]
               hover:shadow-lg active:[transform:translateY(0)_rotateX(0deg)]"
        @if($buttonStyle) style="{{ $buttonStyle }}" @endif
        wire:loading.attr="disabled"
    >
        {{-- Loading State --}}
        <span wire:loading wire:target="addToCart" class="flex items-center justify-center gap-2.5">
            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="[text-shadow:0_1px_0_rgba(0,0,0,0.2)]">Adding...</span>
        </span>

        {{-- Default & Added States --}}
        <span wire:loading.remove wire:target="addToCart">
            @if($added)
                <span class="flex items-center justify-center gap-2.5 animate-pulse">
                    <svg class="w-4 h-4 drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="[text-shadow:0_1px_0_rgba(0,0,0,0.2)]">Added to Cart</span>
                </span>
            @else
                <span class="flex items-center justify-center gap-2.5
                            transition-transform duration-300
                            group-hover:[transform:translateZ(8px)]">
                    <svg class="w-4 h-4 transition-all duration-300 group-hover:scale-110 drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="font-semibold tracking-wide
                                [text-shadow:0_2px_0_rgba(0,0,0,0.15),0_1px_2px_rgba(0,0,0,0.1)]
                                transition-all duration-300
                                group-hover:[text-shadow:0_3px_0_rgba(0,0,0,0.2),0_2px_4px_rgba(0,0,0,0.15)]">{{ $buttonText }}</span>
                </span>
            @endif
        </span>
    </button>
</div>
