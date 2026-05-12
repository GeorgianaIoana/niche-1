<div>
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-text-primary">Orders</h1>
            <p class="text-text-muted mt-1">View and track your order history</p>
        </div>

        <!-- Status Filter -->
        <select
            wire:model.live="status"
            class="px-4 py-2 rounded-lg border border-border bg-surface text-text-primary focus:outline-none focus:border-accent"
        >
            <option value="">All Orders</option>
            <option value="pending">Pending</option>
            <option value="processing">Processing</option>
            <option value="shipped">Shipped</option>
            <option value="delivered">Delivered</option>
            <option value="cancelled">Cancelled</option>
        </select>
    </div>

    <!-- Orders List -->
    <div class="bg-surface-alt rounded-lg">
        @if($orders->isEmpty())
            <div class="p-12 text-center">
                <svg class="w-12 h-12 text-text-muted mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <p class="text-text-muted mb-4">
                    @if($status)
                        No {{ $status }} orders found
                    @else
                        You haven't placed any orders yet
                    @endif
                </p>
                <a href="{{ route('collection') }}" class="inline-block px-6 py-2 bg-accent text-white rounded-lg hover:bg-accent-hover transition-colors" wire:navigate>
                    Start Shopping
                </a>
            </div>
        @else
            <div class="divide-y divide-border">
                @foreach($orders as $order)
                    <a href="{{ route('dashboard.orders.show', $order) }}" class="block p-6 hover:bg-surface transition-colors" wire:navigate>
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <p class="font-semibold text-text-primary">{{ $order->order_number }}</p>
                                    <span class="inline-block px-2 py-1 text-xs rounded-full
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
                                <p class="text-sm text-text-muted">
                                    {{ $order->created_at->format('F d, Y') }} &middot;
                                    {{ $order->items->count() }} {{ Str::plural('item', $order->items->count()) }}
                                </p>
                            </div>

                            <div class="flex items-center gap-4">
                                <p class="text-lg font-semibold text-text-primary">{{ $order->formatted_total }}</p>
                                <svg class="w-5 h-5 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>

                        <!-- Order Items Preview -->
                        <div class="mt-4 flex gap-2">
                            @foreach($order->items->take(4) as $item)
                                @if($item->product_image)
                                    <div class="w-12 h-12 rounded bg-surface overflow-hidden">
                                        <img src="{{ $item->product_image }}" alt="{{ $item->product_title }}" class="w-full h-full object-cover">
                                    </div>
                                @else
                                    <div class="w-12 h-12 rounded bg-surface flex items-center justify-center">
                                        <svg class="w-6 h-6 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                        </svg>
                                    </div>
                                @endif
                            @endforeach
                            @if($order->items->count() > 4)
                                <div class="w-12 h-12 rounded bg-surface flex items-center justify-center">
                                    <span class="text-xs text-text-muted">+{{ $order->items->count() - 4 }}</span>
                                </div>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($orders->hasPages())
                <div class="p-6 border-t border-border">
                    {{ $orders->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
