<x-layouts.public>
    <x-slot:title>Page Not Found - {{ config('themes.site.name', 'Grooves Black') }}</x-slot:title>

    <section class="container-page py-24 md:py-32">
        <div class="max-w-2xl mx-auto text-center">
            <!-- 404 Illustration - Broken record -->
            <div class="relative mb-12">
                <div class="w-48 h-48 mx-auto">
                    <div class="relative w-full h-full">
                        <div class="absolute inset-0 rounded-full bg-[#292a2e] flex items-center justify-center overflow-hidden">
                            <div class="w-1/3 h-1/3 rounded-full bg-[#745b25] flex items-center justify-center">
                                <div class="w-1/4 h-1/4 rounded-full bg-[#292a2e]"></div>
                            </div>
                            <div class="absolute inset-0 rounded-full" style="background: repeating-radial-gradient(circle at center, transparent 0, transparent 2px, rgba(255,255,255,0.03) 2px, rgba(255,255,255,0.03) 4px);"></div>
                            <!-- Crack -->
                            <div class="absolute top-0 left-1/2 w-1 h-1/2 bg-[#fbf9f4] transform -translate-x-1/2 rotate-12"></div>
                        </div>
                    </div>
                </div>
            </div>

            <h1 class="text-[120px] md:text-[180px] font-serif font-bold text-[#e4e2dd] leading-none mb-4">404</h1>
            <h2 class="heading-2 mb-4">Record Not Found</h2>
            <p class="text-body text-lg mb-10 max-w-md mx-auto">
                Looks like this record got lost in the stacks. The page you're looking for doesn't exist or has been moved.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('home') }}" class="btn-gradient">
                    Back to Home
                </a>
                <a href="{{ route('collection') }}" class="btn-outline">
                    Browse Collection
                </a>
            </div>

            <!-- Helpful Links -->
            <div class="mt-20 pt-8 border-t border-[rgba(208,197,181,0.15)]">
                <p class="text-body mb-6">Looking for something specific?</p>
                <div class="flex flex-wrap justify-center gap-8">
                    <a href="{{ route('collection', ['category' => 'jazz']) }}" class="nav-link">Jazz</a>
                    <a href="{{ route('collection', ['category' => 'rock']) }}" class="nav-link">Rock</a>
                    <a href="{{ route('collection', ['category' => 'soul']) }}" class="nav-link">Soul</a>
                    <a href="{{ route('collection', ['filter' => 'new']) }}" class="nav-link">New Arrivals</a>
                    <a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>
