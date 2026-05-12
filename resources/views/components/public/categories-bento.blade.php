@props(['categories'])

<section class="section">
    <div class="container-page">
        <div class="text-center mb-12">
            <h2 class="text-h2 mb-4">Browse by Genre</h2>
            <p class="text-text-secondary max-w-xl mx-auto">
                Explore our curated collection organized by genre. Find your perfect sound.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 md:gap-6" style="grid-auto-rows: 200px;">
            @foreach($categories->take(5) as $index => $category)
                @php
                    $size = match($index) {
                        0 => 'large',
                        2 => 'wide',
                        default => 'default',
                    };
                @endphp
                <x-public.category-card :category="$category" :size="$size" class="min-h-[200px]" />
            @endforeach
        </div>
    </div>
</section>
