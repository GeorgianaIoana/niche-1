@props([
    'category',
    'size' => 'default', // 'default', 'large', 'wide'
])

@php
    $sizeClasses = match($size) {
        'large' => 'row-span-2 col-span-1',
        'wide' => 'col-span-2 row-span-1',
        default => '',
    };
@endphp

<a
    href="{{ route('collection', ['category' => $category->slug]) }}"
    {{ $attributes->merge(['class' => "group relative overflow-hidden rounded-xl bg-brand-200 {$sizeClasses}"]) }}
>
    <!-- Image -->
    @if($category->image)
        <img
            src="{{ $category->image }}"
            alt="{{ $category->name }}"
            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
        >
    @else
        <!-- Gradient placeholder -->
        <div class="absolute inset-0 bg-gradient-to-br from-brand-300 to-brand-500"></div>
    @endif

    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-surface-dark/80 via-surface-dark/20 to-transparent"></div>

    <!-- Content -->
    <div class="absolute inset-0 p-6 flex flex-col justify-end">
        <h3 class="text-h3 text-text-inverse mb-2 group-hover:text-brand-200 transition-colors">
            {{ $category->name }}
        </h3>
        @if($category->description)
            <p class="text-brand-200 text-sm line-clamp-2">
                {{ $category->description }}
            </p>
        @endif
        <span class="inline-flex items-center gap-2 text-brand-300 text-sm mt-4 group-hover:text-text-inverse transition-colors">
            Explore
            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </span>
    </div>
</a>
