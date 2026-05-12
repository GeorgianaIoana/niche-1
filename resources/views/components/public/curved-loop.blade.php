@props([
    'text' => 'Curated Vinyl • Trustpilot • Authentic Music • Premium Pressings • Niche Records • ',
    'speed' => 25,
])

<section
    class="curved-loop-container relative overflow-hidden py-6 md:py-10"
    x-data="{ isPaused: false }"
    @mouseenter="isPaused = true"
    @mouseleave="isPaused = false"
    aria-label="Brand tagline"
>
    {{-- Edge fade gradients --}}
    <div class="absolute inset-y-0 left-0 w-16 md:w-32 bg-gradient-to-r from-surface to-transparent z-10 pointer-events-none"></div>
    <div class="absolute inset-y-0 right-0 w-16 md:w-32 bg-gradient-to-l from-surface to-transparent z-10 pointer-events-none"></div>

    {{-- Animated track --}}
    <div
        class="curved-marquee-track"
        :class="{ 'animation-paused': isPaused }"
        style="animation-duration: {{ $speed }}s;"
    >
        @for ($i = 0; $i < 2; $i++)
        <svg
            viewBox="0 0 1200 100"
            class="flex-shrink-0 h-[80px] md:h-[100px] lg:h-[120px]"
            style="width: 1200px;"
            preserveAspectRatio="xMidYMid meet"
            aria-hidden="true"
        >
            <defs>
                <path id="curvedPath{{ $i }}" d="M 0,65 Q 300,30 600,65 T 1200,65" fill="none"/>
            </defs>
            <text class="curved-text">
                <textPath href="#curvedPath{{ $i }}" startOffset="0%">
                    {{ $text }}{{ $text }}{{ $text }}{{ $text }}
                </textPath>
            </text>
        </svg>
        @endfor
    </div>

    <span class="sr-only">{{ $text }}</span>
</section>
