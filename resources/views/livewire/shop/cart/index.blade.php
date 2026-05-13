<div>
    @if($cart->items->count())
        <!-- Breadcrumbs -->
        <nav class="container-page pt-6 pb-2">
            <ol class="flex items-center gap-2 text-sm">
                <li>
                    <a href="{{ route('home') }}" class="text-text-secondary hover:text-accent transition-colors">Home</a>
                </li>
                <li class="text-text-muted">/</li>
                <li class="text-text-primary font-medium">Cart</li>
            </ol>
        </nav>
        @php
            $threshold = (float) config('themes.cart.free_shipping_threshold', 150);
            $subtotal = (float) $cart->subtotal;
            $progress = $threshold > 0 ? min(100, ($subtotal / $threshold) * 100) : 100;
            $remaining = max(0, $threshold - $subtotal);
        @endphp

        {{-- ─────────────────────────── HERO ─────────────────────────── --}}
        <section class="glass-panel pt-24 pb-16">
            <div class="container-page">
                <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8 mb-12 animate-fade-in-up">
                    <div>
                        <p class="label-small mb-5">
                            Pending Acquisition · {{ $cart->item_count }} {{ Str::plural('Item', $cart->item_count) }} Reserved
                        </p>
                        <h1 class="heading-display-italic">
                            Your Collection<br>
                            <span class="text-accent">in Progress.</span>
                        </h1>
                    </div>

                    <div class="lg:text-right lg:max-w-xs">
                        <p class="text-text-muted italic leading-relaxed" style="font-size: 12px; letter-spacing: 0.4px;">
                            Hand-inspected before dispatch.<br>
                            Reserved for 60 minutes from last activity.
                        </p>
                    </div>
                </div>

                {{-- Free-shipping progress meter - iOS style --}}
                <div class="glass-card p-6 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <div class="flex items-end justify-between mb-4">
                        <span class="label-small" style="letter-spacing: 2.8px;">Dispatch Status</span>
                        @if($cart->shipping === 0)
                            <span class="badge-success-glass">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                                Complimentary shipping unlocked
                            </span>
                        @else
                            <span class="text-text-secondary" style="font-size: 13px;">
                                <span class="text-accent font-semibold">${{ number_format($remaining, 2) }}</span>
                                away from free shipping
                            </span>
                        @endif
                    </div>
                    <div class="progress-ios">
                        <span style="width: {{ $progress }}%;"></span>
                    </div>
                </div>
            </div>
        </section>

        {{-- ─────────────────────────── LEDGER ─────────────────────────── --}}
        <div class="container-page py-20">
            <div class="lg:grid lg:grid-cols-12 lg:gap-16">
                {{-- Items column --}}
                <div class="lg:col-span-8 mb-12 lg:mb-0">
                    {{-- Section header --}}
                    <div class="flex items-baseline justify-between mb-6">
                        <div>
                            <p class="label-small mb-2">The Ledger</p>
                            <h2 class="heading-4">Reserved Records</h2>
                        </div>
                        <span class="text-text-muted italic hidden md:inline" style="font-size: 12px; letter-spacing: 0.4px;">
                            {{ $cart->items->count() }} {{ Str::plural('entry', $cart->items->count()) }}
                        </span>
                    </div>

                    <div class="gradient-hairline mb-2"></div>

                    {{-- Item rows with staggered animation --}}
                    <div class="stagger-children">
                        @foreach($cart->items as $index => $item)
                            <x-public.cart-item
                                :item="$item"
                                :index="$index + 1"
                                :wire:key="'cart-item-'.$item->id"
                            />
                        @endforeach
                    </div>

                    {{-- Footer row --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mt-10 pt-8 border-t border-border">
                        <a href="{{ route('collection') }}" class="btn-ios-secondary !py-3 !px-6 inline-flex items-center gap-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                            </svg>
                            Continue Browsing
                        </a>
                        <p class="text-text-muted italic hidden md:block" style="font-size: 12px; letter-spacing: 0.4px;">
                            Items held for 60 minutes from last activity.
                        </p>
                    </div>
                </div>

                {{-- Summary column --}}
                <aside class="lg:col-span-4">
                    <div class="sticky top-28">
                        <x-public.order-summary :cart="$cart" />
                    </div>
                </aside>
            </div>
        </div>
    @else
        {{-- ─────────────────────────── EMPTY STATE ─────────────────────────── --}}
        <section class="container-page pt-32 pb-24">
            <div class="glass-card-elevated text-center max-w-2xl mx-auto p-12 lg:p-16 animate-scale-in">
                <div class="w-20 h-20 mx-auto mb-6 rounded-3xl glass-subtle flex items-center justify-center">
                    <svg class="w-10 h-10 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>

                <p class="label-small mb-6">The Archive Awaits</p>
                <h1 class="heading-display-italic mb-8">
                    An empty crate.<br>
                    <span class="text-accent">Yours to fill.</span>
                </h1>

                <div class="gradient-hairline mx-auto mb-8" style="width: 120px;"></div>

                <p class="text-body italic leading-relaxed max-w-md mx-auto mb-10">
                    Every collection begins with a single record.
                    Begin yours with something worth keeping.
                </p>

                <a href="{{ route('collection') }}" class="btn-ios-primary group">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Browse the Archive
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
        </section>

        @if($recommendations->isNotEmpty())
            <section class="glass-panel py-24">
                <div class="container-page">
                    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-12">
                        <div>
                            <p class="label-small mb-3">Recent Acquisitions</p>
                            <h2 class="heading-4">New to the archive</h2>
                        </div>
                        <a href="{{ route('collection') }}" class="btn-ios-secondary !py-2.5 !px-5 inline-flex items-center gap-2 self-start md:self-end">
                            View All
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>

                    <div class="gradient-hairline mb-12"></div>

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 lg:gap-8 stagger-children">
                        @foreach($recommendations as $product)
                            <x-public.product-card
                                :product="$product"
                                :wire:key="'rec-'.$product->id"
                            />
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    @endif
</div>
