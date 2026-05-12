<div>
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-text-primary">Favorites</h1>
            <p class="text-text-muted mt-1">Records you've saved to your wishlist</p>
        </div>

        @if($favorites->count())
            <a href="{{ route('collection') }}" class="link-accent hidden sm:inline-block" wire:navigate>
                Continue Browsing
            </a>
        @endif
    </div>

    @if($favorites->count())
        <p class="text-sm text-text-muted mb-6">
            {{ $favorites->count() }} {{ Str::plural('record', $favorites->count()) }} saved.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($favorites as $favorite)
                @if($favorite->product)
                    <div wire:key="favorite-{{ $favorite->id }}">
                        <x-public.product-card :product="$favorite->product" />
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-surface-alt rounded-lg p-12 text-center">
            <div class="w-16 h-16 mx-auto mb-6 rounded-full bg-surface flex items-center justify-center">
                <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </div>
            <h2 class="text-lg font-semibold text-text-primary mb-2">No favorites yet</h2>
            <p class="text-text-muted mb-6 max-w-md mx-auto">
                Tap the heart on any record to save it here.
            </p>
            <a href="{{ route('collection') }}" class="inline-block px-6 py-2 bg-accent text-white rounded-lg hover:bg-accent-hover transition-colors" wire:navigate>
                Browse Collection
            </a>
        </div>
    @endif
</div>
