@props(['item', 'editable' => true, 'index' => null])

@php
    $product = $item->product;
    $metaSegments = array_filter([
        $product->label ? 'Cat. No. ' . $product->label : null,
        $product->condition,
        $product->year,
    ]);
    $lineTotal = '$' . number_format($product->price * $item->quantity, 2);
@endphp

<div class="glass-card p-5 md:p-6 mb-4 group hover:scale-[1.01] transition-all duration-300">
    <div class="grid grid-cols-12 gap-x-4 md:gap-x-6 gap-y-4">
        {{-- Counter --}}
        @if($index !== null)
            <div class="col-span-12 md:col-span-1 ledger-number pt-1 hidden md:block">
                {{ str_pad($index, 2, '0', STR_PAD_LEFT) }}.
            </div>
        @endif

        {{-- Image --}}
        <a
            href="{{ route('products.show', $product) }}"
            class="col-span-3 md:col-span-2 flex-shrink-0"
        >
            <div class="aspect-square overflow-hidden rounded-xl shadow-md">
                @if($product->image)
                    <img
                        src="{{ $product->image }}"
                        alt="{{ $product->title }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                    >
                @else
                    <div class="w-full h-full bg-surface-card flex items-center justify-center">
                        <div class="w-14 h-14 rounded-full bg-surface-dark flex items-center justify-center">
                            <div class="w-5 h-5 rounded-full bg-accent"></div>
                        </div>
                    </div>
                @endif
            </div>
        </a>

        {{-- Meta --}}
        <div class="col-span-9 md:col-span-5 min-w-0 flex flex-col justify-center">
            <a href="{{ route('products.show', $product) }}" class="block group/link">
                <h4 class="heading-3 group-hover/link:text-accent transition-colors truncate">
                    {{ $product->title }}
                </h4>
                <p class="text-body mt-1">{{ $product->artist }}</p>
            </a>

            @if(count($metaSegments))
                <p class="mt-3 text-text-muted italic" style="font-size: 12px; letter-spacing: 0.4px;">
                    {{ implode(' · ', $metaSegments) }}
                </p>
            @endif

            <p class="text-body mt-3 hidden md:block" style="font-size: 12px; letter-spacing: 0.4px;">
                <span class="text-text-muted uppercase tracking-widest" style="font-size: 10px;">Unit</span>
                <span class="ml-2 text-text-secondary">{{ $product->formatted_price }}</span>
            </p>
        </div>

        {{-- Actions / Total --}}
        @if($editable)
            <div class="col-span-12 md:col-span-4 flex flex-row md:flex-col items-start md:items-end justify-between md:justify-center gap-3 md:gap-4">
                {{-- iOS Quantity Stepper --}}
                <div class="qty-stepper-ios">
                    <button
                        type="button"
                        wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})"
                        aria-label="Decrease quantity"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                    </button>
                    <span class="value">{{ $item->quantity }}</span>
                    <button
                        type="button"
                        wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})"
                        aria-label="Increase quantity"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </button>
                </div>

                <div class="flex flex-col items-end gap-3">
                    <span class="text-xl font-bold text-accent">{{ $lineTotal }}</span>
                    <button
                        type="button"
                        wire:click="removeItem({{ $item->id }})"
                        class="inline-flex items-center gap-2 text-xs uppercase tracking-wider text-text-muted hover:text-red-500 transition-colors"
                        aria-label="Remove {{ $product->title }}"
                    >
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Remove
                    </button>
                </div>
            </div>
        @else
            <div class="col-span-12 md:col-span-4 flex flex-col items-end justify-center">
                <span class="text-body">Qty {{ $item->quantity }}</span>
                <span class="text-xl font-bold text-accent mt-1">{{ $lineTotal }}</span>
            </div>
        @endif
    </div>
</div>
