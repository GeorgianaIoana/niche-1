@props([
    'title' => 'Extraordinary',
    'subtitle' => 'Vinyl for the',
    'description' => 'Discover rare and extraordinary vinyl records from our carefully curated collection of timeless music.',
    'ctaText' => 'Explore Collection',
    'ctaLink' => '/collection',
    'image' => null,
])

<section class="relative overflow-hidden bg-brand-100">
    <div class="container-page">
        <div class="grid lg:grid-cols-2 gap-12 items-center min-h-[600px] py-16 lg:py-0">
            <!-- Content -->
            <div class="relative z-10">
                <p class="text-brand-500 font-medium mb-4 tracking-wide uppercase text-sm">{{ $subtitle }}</p>
                <h1 class="text-hero text-text-primary mb-6 leading-[1.1]">
                    {{ $title }}
                </h1>
                <p class="text-lg text-text-secondary max-w-lg mb-8 leading-relaxed">
                    {{ $description }}
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ $ctaLink }}" class="btn-primary btn-lg">
                        {{ $ctaText }}
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                    <a href="{{ route('collection') }}" class="btn-secondary btn-lg">
                        Browse Archives
                    </a>
                </div>

                <!-- Stats -->
                <div class="flex gap-12 mt-12 pt-8 border-t border-brand-200">
                    <div>
                        <p class="text-3xl font-semibold text-text-primary">2,500+</p>
                        <p class="text-sm text-text-muted">Records Curated</p>
                    </div>
                    <div>
                        <p class="text-3xl font-semibold text-text-primary">50+</p>
                        <p class="text-sm text-text-muted">Years of Music</p>
                    </div>
                    <div>
                        <p class="text-3xl font-semibold text-text-primary">100%</p>
                        <p class="text-sm text-text-muted">Authentic Vinyl</p>
                    </div>
                </div>
            </div>

            <!-- Image -->
            <div class="relative hidden lg:block">
                <div class="relative aspect-square max-w-lg ml-auto">
                    <!-- Decorative circles -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-full h-full rounded-full bg-brand-200 opacity-50"></div>
                    </div>
                    <div class="absolute inset-8 flex items-center justify-center">
                        <div class="w-full h-full rounded-full bg-brand-300 opacity-50"></div>
                    </div>
                    <!-- Vinyl record illustration -->
                    <div class="absolute inset-16 flex items-center justify-center">
                        <div class="w-full h-full rounded-full bg-surface-dark flex items-center justify-center shadow-2xl">
                            <div class="w-1/3 h-1/3 rounded-full bg-brand-500 flex items-center justify-center">
                                <div class="w-1/4 h-1/4 rounded-full bg-surface-dark"></div>
                            </div>
                            <!-- Grooves -->
                            <div class="absolute inset-0 rounded-full" style="background: repeating-radial-gradient(circle at center, transparent 0, transparent 2px, rgba(255,255,255,0.03) 2px, rgba(255,255,255,0.03) 4px);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Background pattern -->
    <div class="absolute inset-0 opacity-5 pointer-events-none" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23000000' fill-opacity='1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);"></div>
</section>
