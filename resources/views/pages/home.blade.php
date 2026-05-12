<x-layouts.public>
    <x-slot:title>Grooves Black - Curating the Extraordinary</x-slot:title>

    <!-- Hero Section Carousel -->
    <section
        class="bg-surface relative m-10"
        x-data="{
            activeSlide: 0,
            totalSlides: 3,
            next() { this.activeSlide = (this.activeSlide + 1) % this.totalSlides },
            prev() { this.activeSlide = (this.activeSlide - 1 + this.totalSlides) % this.totalSlides },
            slides: [
                {
                    artist: 'Jane Remover',
                    title: 'Census Designated & Frailty',
                    description: 'Pre-order Rough Trade Exclusive versions of both <em>Census Designated</em> and <em>Frailty</em> to get a 10% off, discount applied at checkout. Limited edition pressing on 180g colored vinyl with exclusive artwork and bonus tracks.',
                    image: '/images/figma/hero-jane-remover.webp',
                    cta: 'Pre-Order Now'
                },
                {
                    artist: 'Sade',
                    title: 'Diamond Life Collection',
                    description: 'Experience the timeless elegance of <em>Diamond Life</em> remastered on premium vinyl. Limited edition with exclusive artwork and liner notes. Featuring the iconic hits that defined a generation of smooth jazz and soul.',
                    image: '/images/Sade_50_R9294-7531.webp',
                    cta: 'Shop Now'
                },
                {
                    artist: 'Paul McCartney',
                    title: 'McCartney III Imagined',
                    description: 'Discover the reimagined classics from <em>McCartney III</em> featuring collaborations with today\'s most innovative artists. A fresh take on Paul\'s pandemic album with contributions from Beck, St. Vincent, and Phoebe Bridgers.',
                    image: '/images/figma/hero-paul-mccartney.png',
                    cta: 'Explore',
                    imageScale: 'scale-100'
                }
            ]
        }"
        x-init="setInterval(() => next(), 6000)"
    >
        <div class="container-page">
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">

                <!-- Left: Text Content -->
                <div class="relative z-10 order-2 lg:order-1 min-h-[400px] lg:min-h-[500px]">
                    <template x-for="(slide, index) in slides" :key="'text-' + index">
                        <div
                            class="transition-all duration-500"
                            :class="activeSlide === index ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4 absolute inset-0 pointer-events-none'"
                        >
                            <!-- Artist Badge -->
                            <span class="inline-block font-sans text-accent text-xs md:text-sm font-medium tracking-widest uppercase mt-6 mb-4" x-text="slide.artist"></span>

                            <!-- Title -->
                            <h1 class="font-sans text-2xl md:text-3xl lg:text-4xl font-semibold text-text-primary mb-5 leading-tight" x-text="slide.title"></h1>

                            <!-- Description -->
                            <p class="font-sans text-text-secondary text-sm md:text-base lg:text-lg mb-8 leading-relaxed max-w-md" x-html="slide.description"></p>

                            <!-- CTA Buttons -->
                            <div class="flex flex-wrap items-center gap-4">
                                <a
                                    href="{{ route('collection') }}"
                                    class="group inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-gradient-to-b from-accent-light to-accent text-white text-xs md:text-sm font-medium tracking-wide hover:scale-105 transition-all duration-300"
                                    style="box-shadow: inset 0 1px 1px rgba(255,255,255,0.3), inset 0 -1px 1px rgba(0,0,0,0.1), 0 2px 4px rgba(116,91,37,0.2), 0 4px 8px rgba(116,91,37,0.1);"
                                >
                                    <span x-text="slide.cta"></span>
                                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                                <a
                                    href="{{ route('collection') }}"
                                    class="group inline-flex items-center gap-2 px-7 py-3.5 rounded-full border-2 border-text-primary/20 text-text-primary text-xs md:text-sm font-medium tracking-wide hover:border-accent hover:text-accent hover:bg-accent/5 transition-all duration-300"
                                >
                                    Shop All
                                    <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Right: Image -->
                <div class="relative order-1 lg:order-2 flex items-center justify-center h-[400px] sm:h-[500px] lg:h-[600px] pt-6 md:pt-8 lg:pt-10 pb-20 md:pb-24 lg:pb-32">
                    <template x-for="(slide, index) in slides" :key="'img-' + index">
                        <div
                            class="absolute inset-0 flex items-center justify-center transition-all duration-500"
                            :class="activeSlide === index ? 'opacity-100 scale-100' : 'opacity-0 scale-95 pointer-events-none'"
                        >
                            <img
                                :src="slide.image"
                                :alt="slide.artist + ' - ' + slide.title"
                                class="max-w-full max-h-full object-contain drop-shadow-2xl"
                                :class="slide.imageScale || ''"
                            >
                        </div>
                    </template>
                </div>
            </div>

            <!-- Navigation Controls -->
            <div class="flex items-center justify-between mt-12 lg:mt-16">
                <!-- Dots -->
                <div class="flex items-center gap-2">
                    <template x-for="(slide, index) in slides" :key="'dot-' + index">
                        <button
                            @click="activeSlide = index"
                            class="h-1 rounded-full transition-all duration-300"
                            :class="activeSlide === index ? 'bg-accent w-8' : 'bg-border hover:bg-text-muted w-4'"
                            :aria-label="'Go to slide ' + (index + 1)"
                        ></button>
                    </template>
                </div>

                <!-- Arrows -->
                <div class="flex items-center gap-2">
                    <button
                        @click="prev()"
                        class="w-10 h-10 rounded-full border border-border flex items-center justify-center text-text-secondary hover:border-text-primary hover:text-text-primary transition-all duration-300"
                        aria-label="Previous slide"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button
                        @click="next()"
                        class="w-10 h-10 rounded-full border border-border flex items-center justify-center text-text-secondary hover:border-text-primary hover:text-text-primary transition-all duration-300"
                        aria-label="Next slide"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Curved Loop Brand Tagline -->
    <x-public.curved-loop />

    <!-- New Arrivals Section -->
    @if($featuredProducts->count())
    <section class="py-20 md:py-28 bg-gradient-to-b from-surface to-surface-alt">
        <div class="container-page">
            <!-- Section Header -->
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-12">
                <div>
                    <span class="text-accent text-xs font-medium tracking-widest uppercase mb-2 block">Fresh Drops</span>
                    <h2 class="text-3xl md:text-4xl font-semibold text-text-primary">New Arrivals</h2>
                </div>
                <a href="{{ route('collection') }}" class="group inline-flex items-center gap-2 px-5 py-2.5 rounded-full border-2 border-text-primary/20 text-text-primary text-xs font-medium tracking-wide hover:border-accent hover:text-accent transition-all duration-300">
                    View All
                    <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Products Grid -->
            @php
                $figmaProductImages = [
                    '/images/figma/category-1-jazz.png',
                    '/images/figma/category-2-laura.png',
                    '/images/figma/category-3-xray.png',
                    '/images/figma/category-4-snoop.png',
                ];
            @endphp
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($featuredProducts as $index => $product)
                <div class="group relative bg-white rounded-2xl overflow-hidden transition-all duration-500 hover:-translate-y-2"
                     style="box-shadow: 0 4px 20px rgba(0,0,0,0.06); hover:box-shadow: 0 20px 40px rgba(0,0,0,0.12);">
                    <!-- Image -->
                    <div class="relative overflow-hidden bg-surface-alt">
                        <a href="{{ route('products.show', $product) }}" class="block">
                            @if($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->title }}" class="w-full aspect-square object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <img src="{{ $figmaProductImages[$index % count($figmaProductImages)] }}" alt="{{ $product->title }}" class="w-full aspect-square object-cover transition-transform duration-700 group-hover:scale-110">
                            @endif
                        </a>
                        <!-- Favorite Toggle -->
                        @livewire('shop.favorites.toggle', ['product' => $product, 'variant' => 'icon'], key('fav-home-new-'.$product->id))
                        @if($product->is_new_arrival)
                            <span class="absolute top-4 left-4 px-3 py-1.5 text-[10px] font-semibold uppercase tracking-wider bg-gradient-to-r from-accent to-accent-light text-white rounded-full shadow-sm">New</span>
                        @endif
                        <!-- Quick View Overlay -->
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>
                    </div>

                    <!-- Info -->
                    <div class="p-5">
                        <p class="text-[11px] text-accent font-medium uppercase tracking-wider mb-1">{{ $product->artist }}</p>
                        <h3 class="text-base font-semibold text-text-primary mb-3 line-clamp-1">
                            <a href="{{ route('products.show', $product) }}" class="hover:text-accent transition-colors">
                                {{ $product->title }}
                            </a>
                        </h3>
                        <div class="mb-4">
                            <span class="text-lg font-bold text-text-primary">{{ $product->formatted_price }}</span>
                        </div>
                        <livewire:shop.cart.add-to-cart :product="$product" :show-quantity="false" button-class="btn-gradient w-full" button-text="Add to Cart" />
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Categories Section - Bento Grid -->
    <section class="py-16 bg-[#fafaf8] dark:bg-surface">
        <div class="container-page">
            <!-- Section Header -->
            <div class="mb-10">
                <h2 class="text-2xl font-semibold text-text-primary">Browse Categories</h2>
            </div>

            <!-- Bento Grid Layout with 3D Perspective - 5 Categories -->
            <div class="grid grid-cols-2 grid-rows-[5fr_2fr_3fr] gap-4 h-[1100px] [perspective:1200px]">
                <!-- CD - Top Left (Large) -->
                <a href="{{ route('collection', ['category' => 'cd']) }}"
                   class="group relative overflow-hidden rounded-2xl
                          transition-all duration-500 ease-out
                          [transform-style:preserve-3d]
                          hover:[transform:translateY(-8px)_rotateX(2deg)_rotateY(-1deg)]
                          shadow-lg hover:shadow-2xl hover:shadow-black/30">
                    <img src="/images/cd-gorillaz.webp" alt="CD Collection" class="absolute inset-0 w-full h-full object-contain bg-white transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <!-- Shine effect -->
                    <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute bottom-0 left-0 right-0 px-4 py-2 backdrop-blur-md bg-gradient-to-b from-white/10 to-white/5 border-t border-white/30
                                shadow-[0_-4px_20px_rgba(255,255,255,0.1),inset_0_1px_0_rgba(255,255,255,0.2)]
                                transition-transform duration-500 [transform:translateZ(20px)]">
                        <h3 class="text-white text-lg font-semibold drop-shadow-md">CD Collection</h3>
                        <p class="text-white/70 text-[10px]">200+ titles</p>
                    </div>
                </a>

                <!-- DVD - Top Right (Large) -->
                <a href="{{ route('collection', ['category' => 'dvd']) }}"
                   class="group relative overflow-hidden rounded-2xl
                          transition-all duration-500 ease-out
                          [transform-style:preserve-3d]
                          hover:[transform:translateY(-8px)_rotateX(2deg)_rotateY(1deg)]
                          shadow-lg hover:shadow-2xl hover:shadow-black/30">
                    <img src="/images/Sade_50_R9294-7531.webp" alt="Vinyl Records" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <!-- Shine effect -->
                    <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute bottom-0 left-0 right-0 px-4 py-2 backdrop-blur-md bg-gradient-to-b from-white/10 to-white/5 border-t border-white/30
                                shadow-[0_-4px_20px_rgba(255,255,255,0.1),inset_0_1px_0_rgba(255,255,255,0.2)]
                                transition-transform duration-500 [transform:translateZ(20px)]">
                        <h3 class="text-white text-lg font-semibold drop-shadow-md">Vinyl Records</h3>
                        <p class="text-white/70 text-[10px]">150+ records</p>
                    </div>
                </a>

                <!-- Accessories - Middle (Full Width, Split in 2) -->
                <a href="{{ route('collection', ['category' => 'accessories']) }}"
                   class="col-span-2 group relative overflow-hidden rounded-2xl
                          transition-all duration-500 ease-out
                          [transform-style:preserve-3d]
                          hover:[transform:translateY(-6px)_rotateX(2deg)]
                          shadow-lg hover:shadow-xl hover:shadow-black/25">
                    <!-- Split images container -->
                    <div class="absolute inset-0 flex">
                        <div class="w-1/2 h-full overflow-hidden">
                            <img src="/images/accessories-1.avif" alt="Accessories" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </div>
                        <div class="w-1/2 h-full overflow-hidden">
                            <img src="/images/accessories-2.avif" alt="Accessories" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        </div>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <!-- Shine effect -->
                    <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute bottom-0 left-0 right-0 px-4 py-2 backdrop-blur-md bg-gradient-to-b from-white/10 to-white/5 border-t border-white/30
                                shadow-[0_-4px_20px_rgba(255,255,255,0.1),inset_0_1px_0_rgba(255,255,255,0.2)]
                                transition-transform duration-500 [transform:translateZ(15px)]">
                        <h3 class="text-white text-lg font-semibold drop-shadow-md">Accessories</h3>
                        <p class="text-white/70 text-[10px]">Gear & more</p>
                    </div>
                </a>

                <!-- Vinyl - Bottom Left (Large) -->
                <a href="{{ route('collection', ['category' => 'vinyl']) }}"
                   class="group relative overflow-hidden rounded-2xl
                          transition-all duration-500 ease-out
                          [transform-style:preserve-3d]
                          hover:[transform:translateY(-8px)_rotateX(2deg)_rotateY(-1deg)]
                          shadow-lg hover:shadow-2xl hover:shadow-black/30">
                    <img src="/images/dvd-the-cure.webp" alt="DVD Collection" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <!-- Shine effect -->
                    <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute bottom-0 left-0 right-0 px-4 py-2 backdrop-blur-md bg-gradient-to-b from-white/10 to-white/5 border-t border-white/30
                                shadow-[0_-4px_20px_rgba(255,255,255,0.1),inset_0_1px_0_rgba(255,255,255,0.2)]
                                transition-transform duration-500 [transform:translateZ(20px)]">
                        <h3 class="text-white text-lg font-semibold drop-shadow-md">DVD Collection</h3>
                        <p class="text-white/70 text-[10px]">Music films</p>
                    </div>
                </a>

                <!-- Blue Ray - Bottom Right (Large) -->
                <a href="{{ route('collection', ['category' => 'bluray']) }}"
                   class="group relative overflow-hidden rounded-2xl
                          transition-all duration-500 ease-out
                          [transform-style:preserve-3d]
                          hover:[transform:translateY(-8px)_rotateX(2deg)_rotateY(1deg)]
                          shadow-lg hover:shadow-2xl hover:shadow-black/30">
                    <img src="/images/bluray-seal.jpg" alt="Blue Ray" class="absolute inset-0 w-full h-full object-contain bg-white transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <!-- Shine effect -->
                    <div class="absolute inset-0 bg-gradient-to-br from-white/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="absolute bottom-0 left-0 right-0 px-4 py-2 backdrop-blur-md bg-gradient-to-b from-white/10 to-white/5 border-t border-white/30
                                shadow-[0_-4px_20px_rgba(255,255,255,0.1),inset_0_1px_0_rgba(255,255,255,0.2)]
                                transition-transform duration-500 [transform:translateZ(20px)]">
                        <h3 class="text-white text-lg font-semibold drop-shadow-md">Blue Ray</h3>
                        <p class="text-white/70 text-[10px]">HD concerts</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Bestsellers Section -->
    @if($newArrivals->count())
    <section class="py-20 md:py-28 bg-gradient-to-b from-surface to-surface-alt">
        <div class="container-page">
            <!-- Section Header -->
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-12">
                <div>
                    <span class="text-accent text-xs font-medium tracking-widest uppercase mb-2 block">Top Picks</span>
                    <h2 class="text-3xl md:text-4xl font-semibold text-text-primary">Bestsellers</h2>
                </div>
                <a href="{{ route('collection') }}" class="group inline-flex items-center gap-2 px-5 py-2.5 rounded-full border-2 border-text-primary/20 text-text-primary text-xs font-medium tracking-wide hover:border-accent hover:text-accent transition-all duration-300">
                    View All
                    <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Products Grid -->
            @php
                $figmaImages2 = [
                    '/images/figma/cd-laura-pausini.png',
                    '/images/figma/cd-lorde.png',
                    '/images/figma/cd-snoop-dogg.png',
                    '/images/figma/cd-joy-redvelvet.png',
                ];
            @endphp
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($newArrivals as $index => $product)
                <div class="group relative bg-white rounded-2xl overflow-hidden transition-all duration-500 hover:-translate-y-2"
                     style="box-shadow: 0 4px 20px rgba(0,0,0,0.06);">
                    <!-- Image -->
                    <div class="relative overflow-hidden bg-surface-alt">
                        <a href="{{ route('products.show', $product) }}" class="block">
                            @if($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->title }}" class="w-full aspect-square object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <img src="{{ $figmaImages2[$index % count($figmaImages2)] }}" alt="{{ $product->title }}" class="w-full aspect-square object-cover transition-transform duration-700 group-hover:scale-110">
                            @endif
                        </a>
                        <!-- Favorite Toggle -->
                        @livewire('shop.favorites.toggle', ['product' => $product, 'variant' => 'icon'], key('fav-home-best-'.$product->id))
                        <!-- Quick View Overlay -->
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors duration-300"></div>
                    </div>

                    <!-- Info -->
                    <div class="p-5">
                        <p class="text-[11px] text-accent font-medium uppercase tracking-wider mb-1">{{ $product->artist }}</p>
                        <h3 class="text-base font-semibold text-text-primary mb-3 line-clamp-1">
                            <a href="{{ route('products.show', $product) }}" class="hover:text-accent transition-colors">
                                {{ $product->title }}
                            </a>
                        </h3>
                        <div class="mb-4">
                            <span class="text-lg font-bold text-text-primary">{{ $product->formatted_price }}</span>
                        </div>
                        <livewire:shop.cart.add-to-cart :product="$product" :show-quantity="false" button-class="btn-gradient w-full" button-text="Add to Cart" />
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Newsletter Section -->
    <section class="py-16 md:py-24 bg-surface-alt">
        <div class="container-page">
            <div class="max-w-3xl mx-auto text-center">
                <!-- Hero Image Area -->
                <div class="relative mb-8 mx-auto max-w-2xl">
                    <div class="relative overflow-hidden rounded-t-3xl">
                        <!-- Placeholder image - replace with actual photo of happy customers/music fans -->
                        <img
                            src="{{ asset('images/newsletter-hero.png') }}"
                            alt="Happy music fans"
                            class="w-full h-96 object-cover object-top"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        >
                        <!-- Fallback gradient if image not found -->
                        <div class="hidden w-full h-96 bg-gradient-to-br from-accent/20 via-accent-light/20 to-accent/30 items-center justify-center">
                            <svg class="w-20 h-20 text-accent/40" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                            </svg>
                        </div>
                    </div>
                    <!-- Bottom fade effect -->
                    <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-surface-alt to-transparent"></div>
                </div>

                <!-- Headline -->
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-text-primary mb-4">
                    Subscribe to Our Newsletter
                </h2>

                <!-- Subtext -->
                <p class="text-text-secondary mb-8 max-w-lg mx-auto leading-relaxed">
                    Stay in the groove with the latest new releases, exclusive vinyl editions, and special offers delivered straight to your inbox.
                </p>

                <!-- Email Form - Inline pill design -->
                <form class="relative flex items-center bg-surface rounded-full shadow-lg border border-border max-w-xl mx-auto mb-4">
                    <input
                        type="email"
                        placeholder="name@email.com"
                        class="flex-1 px-6 py-4 bg-transparent rounded-full text-text-primary placeholder:text-text-muted focus:outline-none"
                        required
                    >
                    <button
                        type="submit"
                        class="px-6 py-3 m-1.5 bg-accent text-surface rounded-full font-medium hover:bg-accent-hover transition-colors whitespace-nowrap"
                    >
                        Subscribe Now &rarr;
                    </button>
                </form>

                <!-- Privacy Disclaimer -->
                <p class="text-sm text-text-secondary italic">
                    Your information will never be shared with third parties, and you can unsubscribe at any time.
                </p>
            </div>
        </div>
    </section>
</x-layouts.public>
