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

        <!-- Estimated Delivery Date -->
        <div class="flex items-center gap-2 text-xs text-text-muted mt-2">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span>Livrare estimată: {{ now()->addDays(3)->format('d M') }} - {{ now()->addDays(5)->format('d M') }}</span>
        </div>
    </div>

    <!-- Promo Code -->
    <div class="mb-6">
        <div class="flex gap-2">
            <input
                type="text"
                placeholder="Cod promoțional"
                class="flex-1 px-4 py-3 rounded-xl bg-surface-glass border border-border-glass text-sm text-text-primary placeholder:text-text-muted focus:outline-none focus:ring-2 focus:ring-accent/30"
            >
            <button class="px-4 py-3 rounded-xl glass-subtle text-sm font-medium text-text-secondary hover:text-accent transition-colors">
                Aplică
            </button>
        </div>
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

        <!-- Trust Info -->
        <div class="mt-8 pt-6 border-t border-border-glass">
            <ul class="space-y-3 text-xs text-text-secondary">
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    Plată securizată 256-bit SSL
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Livrare asigurată & tracked
                </li>
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Retur gratuit în 14 zile
                </li>
            </ul>
        </div>
    @endif
</div>
