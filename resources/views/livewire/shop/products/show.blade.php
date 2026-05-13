<div>
    <!-- Breadcrumbs -->
    <nav class="container-page pt-6 pb-2">
        <ol class="flex items-center gap-2 text-sm">
            <li>
                <a href="{{ route('home') }}" class="text-text-secondary hover:text-accent transition-colors">
                    Home
                </a>
            </li>
            <li class="text-text-muted">/</li>
            <li>
                <a href="{{ route('collection') }}" class="text-text-secondary hover:text-accent transition-colors">
                    Collection
                </a>
            </li>
            @if($product->category)
            <li class="text-text-muted">/</li>
            <li>
                <a href="{{ route('collection', ['category' => $product->category->slug]) }}" class="text-text-secondary hover:text-accent transition-colors">
                    {{ $product->category->name }}
                </a>
            </li>
            @endif
            <li class="text-text-muted">/</li>
            <li class="text-text-primary font-medium truncate max-w-[200px]">{{ $product->title }}</li>
        </ol>
    </nav>

    <!-- Product Detail -->
    <section class="container-page py-16">
        <div class="grid lg:grid-cols-2 gap-16">
            <!-- Left: Image & Archivist's Note -->
            <div class="space-y-12">
                <!-- Main Image - Glass elevated card -->
                <div class="relative animate-fade-in-up">
                    <div class="glass-card-elevated p-4 md:p-6">
                        @php
                            $figmaImages = [
                                '/images/figma/cd-laura-pausini.png',
                                '/images/figma/cd-lorde.png',
                                '/images/figma/vinyl-bruno-mars.png',
                                '/images/figma/vinyl-gorillaz.png',
                                '/images/figma/cd-joy-redvelvet.png',
                                '/images/figma/vinyl-jazz-closeup.png',
                            ];
                            $fallbackImage = $figmaImages[$product->id % count($figmaImages)];
                            $imageUrl = $product->image ?: $fallbackImage;
                        @endphp
                        <div class="aspect-square rounded-2xl overflow-hidden">
                            <img
                                src="{{ $imageUrl }}"
                                alt="{{ $product->title }}"
                                class="w-full h-full object-cover"
                            >
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

                <!-- Stock Indicator -->
                <div class="flex items-center gap-2 mb-6 animate-fade-in-up" style="animation-delay: 0.27s;">
                    @if($product->stock > 5)
                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                        <span class="text-sm text-green-600 dark:text-green-400">În stoc</span>
                    @elseif($product->stock > 0)
                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                        <span class="text-sm text-amber-600 dark:text-amber-400">Ultimele {{ $product->stock }} bucăți</span>
                    @else
                        <span class="w-2 h-2 rounded-full bg-red-500"></span>
                        <span class="text-sm text-red-600 dark:text-red-400">Stoc epuizat</span>
                    @endif
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

                <!-- Shipping Info -->
                <div class="glass-subtle p-4 rounded-xl mb-8 animate-fade-in-up" style="animation-delay: 0.32s;">
                    <div class="flex items-center gap-3 mb-3">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        <span class="text-sm font-medium text-text-primary">Livrare & Retururi</span>
                    </div>
                    <ul class="space-y-2 text-sm text-text-secondary">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Livrare gratuită peste €100
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Expediere în 1-2 zile lucrătoare
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Retur gratuit în 14 zile
                        </li>
                    </ul>
                </div>

                <!-- Social Share -->
                <div class="flex items-center gap-4 mb-8 animate-fade-in-up" style="animation-delay: 0.35s;">
                    <span class="text-sm text-text-secondary">Share:</span>
                    <div class="flex items-center gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                           target="_blank" rel="noopener"
                           class="w-9 h-9 rounded-full glass-subtle flex items-center justify-center text-text-secondary hover:text-accent hover:scale-110 transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($product->title . ' - ' . $product->artist) }}"
                           target="_blank" rel="noopener"
                           class="w-9 h-9 rounded-full glass-subtle flex items-center justify-center text-text-secondary hover:text-accent hover:scale-110 transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                        </a>
                        <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(request()->url()) }}&media={{ urlencode($product->image ?? '') }}&description={{ urlencode($product->title) }}"
                           target="_blank" rel="noopener"
                           class="w-9 h-9 rounded-full glass-subtle flex items-center justify-center text-text-secondary hover:text-accent hover:scale-110 transition-all">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.373 0 0 5.372 0 12c0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738.098.119.112.224.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12 24c6.627 0 12-5.373 12-12 0-6.628-5.373-12-12-12z"/>
                            </svg>
                        </a>
                        <button onclick="navigator.clipboard.writeText('{{ request()->url() }}'); alert('Link copiat!')"
                                class="w-9 h-9 rounded-full glass-subtle flex items-center justify-center text-text-secondary hover:text-accent hover:scale-110 transition-all">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </button>
                    </div>
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
