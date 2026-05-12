@props(['product'])

@php
    $figmaImages = [
        '/images/figma/cd-laura-pausini.png',
        '/images/figma/cd-lorde.png',
        '/images/figma/cd-snoop-dogg.png',
        '/images/figma/cd-joy-redvelvet.png',
        '/images/figma/vinyl-bruno-mars.png',
        '/images/figma/vinyl-gorillaz.png',
        '/images/figma/cd-soulfly.png',
        '/images/figma/cd-olivia-dean.png',
        '/images/figma/vinyl-jazz-closeup.png',
        '/images/figma/vinyl-minimalist.png',
        '/images/figma/cd-mariah-carey.png',
        '/images/figma/vinyl-ethereal.png',
        '/images/figma/cd-ateez.png',
        '/images/figma/vinyl-miles-davis.png',
        '/images/figma/vinyl-sabaton.png',
        '/images/figma/musician-portrait.png',
    ];
    $fallbackImage = $figmaImages[$product->id % count($figmaImages)];
    $imageUrl = $product->image ?: $fallbackImage;

    $isOutOfStock = $product->stock <= 0;
@endphp

<article class="product-card-3d border-glow group">
    <!-- Image Container - glass with rounded corners -->
    <a href="{{ route('products.show', $product) }}" class="product-image block">
        <img
            src="{{ $imageUrl }}"
            alt="{{ $product->title }} by {{ $product->artist }}"
            class="w-full aspect-square object-cover"
        >
    </a>

    <!-- Info - clean typography, good spacing -->
    <div class="pt-4 pb-2 px-1 space-y-2">
        <p class="text-xs text-text-secondary uppercase tracking-wide truncate">
            {{ $product->artist }}
        </p>
        <h3 class="text-sm font-semibold text-text-primary line-clamp-1">
            <a href="{{ route('products.show', $product) }}" class="hover:text-accent transition-colors">
                {{ $product->title }}
            </a>
        </h3>
        <div class="flex items-center justify-between pt-1">
            <span class="text-xs text-text-muted">LP</span>
            <span class="text-base font-bold text-accent">{{ $product->formatted_price }}</span>
        </div>
    </div>

    <!-- Add to Cart - iOS pill button -->
    <div class="mt-2 pb-1">
        @if($isOutOfStock)
            <button
                type="button"
                class="w-full py-3 text-xs font-medium uppercase tracking-wider
                       rounded-full bg-surface-card/60 text-text-muted cursor-not-allowed"
            >
                Out of Stock
            </button>
        @else
            <livewire:shop.cart.add-to-cart
                :product="$product"
                :show-quantity="false"
                button-class="btn-ios-primary w-full !py-3 !text-[11px]"
                button-text="Add to Cart"
                :wire:key="'cart-add-'.$product->id"
            />
        @endif
    </div>
</article>
