<div>
    <!-- Header -->
    <div class="mb-8">
        <a href="{{ route('dashboard.orders') }}" class="inline-flex items-center gap-2 text-text-muted hover:text-text-primary mb-4" wire:navigate>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Orders
        </a>
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-semibold text-text-primary">{{ $order->order_number }}</h1>
                <p class="text-text-muted mt-1">Placed on {{ $order->created_at->format('F d, Y \a\t g:i A') }}</p>
            </div>
            <span class="inline-block px-3 py-1.5 text-sm rounded-full self-start
                @if($order->status === 'delivered') bg-green-100 text-green-800
                @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                @elseif($order->status === 'cancelled') bg-red-100 text-red-800
                @else bg-yellow-100 text-yellow-800
                @endif
            ">
                {{ ucfirst($order->status) }}
            </span>
        </div>
    </div>

    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Order Items -->
        <div class="lg:col-span-2">
            <div class="bg-surface-alt rounded-lg">
                <div class="p-6 border-b border-border">
                    <h2 class="text-lg font-semibold text-text-primary">Order Items</h2>
                </div>
                <div class="divide-y divide-border">
                    @foreach($order->items as $item)
                        <div class="p-6 flex gap-4">
                            @if($item->product_image)
                                <div class="w-20 h-20 rounded bg-surface overflow-hidden shrink-0">
                                    <img src="{{ $item->product_image }}" alt="{{ $item->product_title }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="w-20 h-20 rounded bg-surface flex items-center justify-center shrink-0">
                                    <svg class="w-8 h-8 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                    </svg>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between gap-4">
                                    <div>
                                        @if($item->product_slug && $item->product)
                                            <a href="{{ route('products.show', $item->product_slug) }}" class="font-medium text-text-primary hover:text-accent" wire:navigate>
                                                {{ $item->product_title }}
                                            </a>
                                        @else
                                            <p class="font-medium text-text-primary">{{ $item->product_title }}</p>
                                        @endif
                                        @if($item->product_artist)
                                            <p class="text-sm text-text-muted">{{ $item->product_artist }}</p>
                                        @endif
                                    </div>
                                    <p class="font-medium text-text-primary shrink-0">{{ $item->formatted_line_total }}</p>
                                </div>
                                <p class="text-sm text-text-muted mt-2">
                                    {{ $item->formatted_unit_price }} x {{ $item->quantity }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Order Summary & Addresses -->
        <div class="space-y-6">
            <!-- Order Summary -->
            <div class="bg-surface-alt rounded-lg p-6">
                <h2 class="text-lg font-semibold text-text-primary mb-4">Order Summary</h2>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <span class="text-text-muted">Subtotal</span>
                        <span class="text-text-primary">{{ $order->formatted_subtotal }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-text-muted">Shipping</span>
                        <span class="text-text-primary">{{ $order->formatted_shipping }}</span>
                    </div>
                    @if($order->tax > 0)
                        <div class="flex justify-between">
                            <span class="text-text-muted">Tax</span>
                            <span class="text-text-primary">{{ $order->formatted_tax }}</span>
                        </div>
                    @endif
                    <div class="border-t border-border pt-3 flex justify-between">
                        <span class="font-semibold text-text-primary">Total</span>
                        <span class="font-semibold text-text-primary">{{ $order->formatted_total }}</span>
                    </div>
                </div>
            </div>

            <!-- Shipping Address -->
            <div class="bg-surface-alt rounded-lg p-6">
                <h2 class="text-lg font-semibold text-text-primary mb-4">Shipping Address</h2>
                <div class="text-sm text-text-secondary whitespace-pre-line">{{ $order->shipping_address }}</div>
                @if($order->shipping_phone)
                    <p class="text-sm text-text-muted mt-2">{{ $order->shipping_phone }}</p>
                @endif
            </div>

            <!-- Billing Address -->
            @if($order->billing_address)
                <div class="bg-surface-alt rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-text-primary mb-4">Billing Address</h2>
                    <div class="text-sm text-text-secondary whitespace-pre-line">{{ $order->billing_address }}</div>
                    @if($order->billing_phone)
                        <p class="text-sm text-text-muted mt-2">{{ $order->billing_phone }}</p>
                    @endif
                </div>
            @endif

            <!-- Order Timeline -->
            @if($order->shipped_at || $order->delivered_at)
                <div class="bg-surface-alt rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-text-primary mb-4">Timeline</h2>
                    <div class="space-y-4 text-sm">
                        <div class="flex items-center gap-3">
                            <div class="w-2 h-2 rounded-full bg-green-500"></div>
                            <div>
                                <p class="text-text-primary">Order placed</p>
                                <p class="text-text-muted">{{ $order->created_at->format('M d, Y g:i A') }}</p>
                            </div>
                        </div>
                        @if($order->shipped_at)
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-purple-500"></div>
                                <div>
                                    <p class="text-text-primary">Shipped</p>
                                    <p class="text-text-muted">{{ $order->shipped_at->format('M d, Y g:i A') }}</p>
                                </div>
                            </div>
                        @endif
                        @if($order->delivered_at)
                            <div class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                <div>
                                    <p class="text-text-primary">Delivered</p>
                                    <p class="text-text-muted">{{ $order->delivered_at->format('M d, Y g:i A') }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Order Notes -->
            @if($order->notes)
                <div class="bg-surface-alt rounded-lg p-6">
                    <h2 class="text-lg font-semibold text-text-primary mb-4">Order Notes</h2>
                    <p class="text-sm text-text-secondary">{{ $order->notes }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
