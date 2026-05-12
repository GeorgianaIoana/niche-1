@props(['cart', 'showCheckout' => true])

<div class="glass-card-elevated p-8 md:p-10">
    {{-- Heading --}}
    <p class="label-small">Dispatch Manifest</p>
    <h3 class="heading-4 mt-3 mb-8">Order Summary</h3>

    {{-- Line items --}}
    <div class="space-y-5 mb-8">
        <div class="dotted-leader text-body">
            <span>Subtotal <span class="text-text-muted">({{ $cart->item_count }} {{ Str::plural('item', $cart->item_count) }})</span></span>
            <span class="leader"></span>
            <span class="text-text-primary font-medium">{{ $cart->formatted_subtotal }}</span>
        </div>

        <div class="dotted-leader text-body">
            <span>Shipping &amp; handling</span>
            <span class="leader"></span>
            <span class="text-text-primary font-medium">{{ $cart->formatted_shipping }}</span>
        </div>

        @if($cart->shipping === 0)
            <div class="badge-success-glass">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
                Complimentary shipping unlocked
            </div>
        @else
            <p class="text-text-muted italic" style="font-size: 12px; letter-spacing: 0.4px;">
                Complimentary shipping on orders over ${{ number_format(config('themes.cart.free_shipping_threshold', 150), 0) }}.
            </p>
        @endif
    </div>

    {{-- Total --}}
    <div class="border-t border-border-glass pt-6 mb-8">
        <div class="flex items-baseline justify-between">
            <span class="label-small" style="color: var(--color-text-primary); letter-spacing: 2.8px;">Total Due</span>
            <span class="text-3xl font-serif font-bold text-accent">{{ $cart->formatted_total }}</span>
        </div>
    </div>

    {{-- CTA --}}
    @if($showCheckout)
        <a
            href="{{ route('checkout.success') }}"
            class="btn-ios-primary w-full group"
        >
            <svg class="w-5 h-5 transition-transform group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
            </svg>
            Proceed to Checkout
            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
        </a>

        {{-- Payment row --}}
        <div class="flex items-center justify-center gap-3 mt-6" style="opacity: 0.55;">
            <span class="text-text-muted uppercase" style="font-size: 9px; letter-spacing: 1.5px;">Accepted</span>
            <span class="inline-flex items-center gap-2 text-text-secondary" style="font-size: 10px; font-weight: 600; letter-spacing: 1px;">
                <span>VISA</span>
                <span class="text-text-muted">·</span>
                <span>MC</span>
                <span class="text-text-muted">·</span>
                <span>AMEX</span>
                <span class="text-text-muted">·</span>
                <span>STRIPE</span>
            </span>
        </div>

        <p class="text-center text-text-muted italic mt-6 leading-relaxed" style="font-size: 11px; letter-spacing: 0.3px;">
            Hand-packed by The Curated Archive.<br>
            Insured &amp; tracked dispatch worldwide.
        </p>
    @endif
</div>
