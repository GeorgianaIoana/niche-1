<div>
    <!-- Product Detail -->
    <section class="container-page py-16">
        <div class="grid lg:grid-cols-2 gap-16">
            <!-- Left: Image & Archivist's Note -->
            <div class="space-y-12">
                <!-- Main Image - Glass elevated card -->
                <div class="relative animate-fade-in-up">
                    <div class="glass-card-elevated p-4 md:p-6">
                        <div class="aspect-square rounded-2xl overflow-hidden">
                            @if($product->image)
                                <img
                                    src="{{ $product->image }}"
                                    alt="{{ $product->title }}"
                                    class="w-full h-full object-cover"
                                >
                            @else
                                <img
                                    src="/images/figma/vinyl-product-main.png"
                                    alt="{{ $product->title }}"
                                    class="w-full h-full object-cover"
                                >
                            @endif
                        </div>
                    </div>

                    <!-- Overlapping Detail Image -->
                    <div class="absolute bottom-[-24px] right-[-24px] w-56 h-56 glass-card p-3 hidden lg:block animate-fade-in-up" style="animation-delay: 0.2s;">
                        @php
                            $detailImages = [
                                '/images/figma/vinyl-bruno-mars.png',
                                '/images/figma/vinyl-gorillaz.png',
                                '/images/figma/vinyl-jazz-closeup.png',
                            ];
                            $detailImage = $detailImages[$product->id % count($detailImages)];
                        @endphp
                        <img src="{{ $detailImage }}" alt="Vinyl detail" class="w-full h-full object-cover rounded-xl">
                    </div>
                </div>

                <!-- Archivist's Note -->
                @if($product->archivist_note)
                <div class="glass-card p-10 relative mt-16 lg:mt-24 animate-fade-in-up" style="animation-delay: 0.3s;">
                    <!-- Quote Icon -->
                    <div class="absolute top-0 right-0 w-28 h-24 flex items-center justify-center">
                        <svg class="w-20 h-16 text-text-muted/30" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                        </svg>
                    </div>

                    <h3 class="text-text-primary font-medium mb-4">The Archivist's Note</h3>
                    <p class="text-text-secondary leading-relaxed mb-6">
                        "{{ $product->archivist_note }}"
                    </p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full glass-subtle flex items-center justify-center">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <span class="text-sm text-text-secondary">Verified by The Curated Archive Team</span>
                    </div>
                </div>
                @endif
            </div>

            <!-- Right: Product Info -->
            <div class="lg:pl-8">
                <!-- Badges - Glass style -->
                <div class="flex items-center gap-4 mb-4 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <span class="glass-subtle px-4 py-2 rounded-full text-xs font-medium uppercase tracking-wider text-badge-text">Original Press</span>
                    @if($product->condition)
                        <span class="text-text-secondary text-sm">{{ $product->condition }} / {{ $product->year ?? 'N/A' }}</span>
                    @endif
                </div>

                <!-- Title -->
                <h1 class="font-serif font-bold text-[40px] leading-tight text-text-primary mb-4 animate-fade-in-up" style="animation-delay: 0.15s;">
                    {{ $product->title }}
                </h1>

                <!-- Artist -->
                <p class="text-text-secondary text-[28px] mb-8 animate-fade-in-up" style="animation-delay: 0.2s;">{{ $product->artist }}</p>

                <!-- Price Card -->
                <div class="glass-card p-6 mb-8 animate-fade-in-up" style="animation-delay: 0.25s;">
                    <p class="text-[40px] font-light text-accent mb-2">
                        {{ $product->formatted_price }}
                    </p>
                    <p class="text-sm text-text-secondary">Includes Archival Grading + Insured Shipping</p>
                </div>

                <!-- Buttons -->
                <div class="space-y-4 mb-12 animate-fade-in-up" style="animation-delay: 0.3s;">
                    @if($product->stock > 0)
                        <livewire:shop.cart.add-to-cart
                            :product="$product"
                            :show-quantity="true"
                            button-class="btn-ios-primary w-full !py-4 !text-sm"
                            button-text="Add to Collection"
                        />
                        @livewire('shop.favorites.toggle', ['product' => $product, 'variant' => 'button'], key('fav-toggle-show-'.$product->id))
                    @else
                        <button disabled class="w-full py-4 text-sm font-medium uppercase tracking-[0.2em] glass-card text-text-muted cursor-not-allowed flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>
                            Currently Unavailable
                        </button>
                        @livewire('shop.favorites.toggle', ['product' => $product, 'variant' => 'button'], key('fav-toggle-show-oos-'.$product->id))
                    @endif
                </div>

                <!-- Tracklist -->
                @if($product->tracklist)
                <div class="border-t border-border pt-8 animate-fade-in-up" style="animation-delay: 0.35s;">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-text-primary font-medium">THE COMPOSITION</h3>
                        <span class="text-sm text-text-secondary">LP - {{ $product->label ?? 'Archive Press' }}</span>
                    </div>

                    <div class="space-y-4">
                        @php $trackNumber = 1; @endphp
                        @if(isset($product->tracklist['a']))
                            @foreach($product->tracklist['a'] as $track)
                            <div class="flex items-center justify-between text-text-secondary glass-subtle p-3 rounded-xl">
                                <div class="flex items-center gap-6">
                                    <span class="text-sm w-4 text-accent font-medium">{{ $trackNumber++ }}.</span>
                                    <span>{{ is_array($track) ? $track['title'] : $track }}</span>
                                </div>
                                <span class="text-sm text-text-muted">{{ is_array($track) && isset($track['duration']) ? $track['duration'] : '4:32' }}</span>
                            </div>
                            @endforeach
                        @endif
                        @if(isset($product->tracklist['b']))
                            @foreach($product->tracklist['b'] as $track)
                            <div class="flex items-center justify-between text-text-secondary glass-subtle p-3 rounded-xl">
                                <div class="flex items-center gap-6">
                                    <span class="text-sm w-4 text-accent font-medium">{{ $trackNumber++ }}.</span>
                                    <span>{{ is_array($track) ? $track['title'] : $track }}</span>
                                </div>
                                <span class="text-sm text-text-muted">{{ is_array($track) && isset($track['duration']) ? $track['duration'] : '5:17' }}</span>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Related Products -->
    @if($relatedProducts->count())
    <section class="glass-panel py-20">
        <div class="container-page">
            <div class="flex items-center justify-between mb-12">
                <div>
                    <h2 class="heading-2 mb-2">Expand Your Collection</h2>
                    <p class="text-body">Records that share the same acoustic and technical philosophy.</p>
                </div>
                <a href="{{ route('collection') }}" class="btn-ios-secondary hidden sm:inline-flex">
                    View Full Archive
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 stagger-children">
                @foreach($relatedProducts as $related)
                    <x-public.product-card :product="$related" />
                @endforeach
            </div>
        </div>
    </section>
    @endif
</div>
