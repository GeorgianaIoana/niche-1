<div>
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-text-primary">Welcome back, {{ $user->name }}</h1>
        <p class="text-text-muted mt-1">Here's an overview of your account</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-surface-alt p-6 rounded-lg">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-accent/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-text-primary">{{ $stats['total_orders'] }}</p>
                    <p class="text-sm text-text-muted">Total Orders</p>
                </div>
            </div>
        </div>

        <div class="bg-surface-alt p-6 rounded-lg">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-yellow-500/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-text-primary">{{ $stats['pending_orders'] }}</p>
                    <p class="text-sm text-text-muted">Pending</p>
                </div>
            </div>
        </div>

        <div class="bg-surface-alt p-6 rounded-lg">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-500/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-text-primary">${{ number_format($stats['total_spent'], 2) }}</p>
                    <p class="text-sm text-text-muted">Total Spent</p>
                </div>
            </div>
        </div>

        <div class="bg-surface-alt p-6 rounded-lg">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-red-500/10 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-semibold text-text-primary">{{ $stats['favorites_count'] }}</p>
                    <p class="text-sm text-text-muted">Favorites</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="bg-surface-alt rounded-lg">
        <div class="p-6 border-b border-border flex items-center justify-between">
            <h2 class="text-lg font-semibold text-text-primary">Recent Orders</h2>
            <a href="{{ route('dashboard.orders') }}" class="text-sm text-accent hover:text-accent-hover" wire:navigate>View all</a>
        </div>

        @if($recentOrders->isEmpty())
            <div class="p-12 text-center">
                <svg class="w-12 h-12 text-text-muted mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <p class="text-text-muted mb-4">No orders yet</p>
                <a href="{{ route('collection') }}" class="inline-block px-6 py-2 bg-accent text-white rounded-lg hover:bg-accent-hover transition-colors" wire:navigate>
                    Start Shopping
                </a>
            </div>
        @else
            <div class="divide-y divide-border">
                @foreach($recentOrders as $order)
                    <a href="{{ route('dashboard.orders.show', $order) }}" class="block p-6 hover:bg-surface transition-colors" wire:navigate>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-text-primary">{{ $order->order_number }}</p>
                                <p class="text-sm text-text-muted">{{ $order->created_at->format('M d, Y') }} &middot; {{ $order->items->count() }} {{ Str::plural('item', $order->items->count()) }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-text-primary">{{ $order->formatted_total }}</p>
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
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</div>
