<x-layouts.public>
    <x-slot:title>About Us - {{ config('themes.site.name', 'Grooves Black') }}</x-slot:title>

    <!-- Header -->
    <section class="bg-surface-alt py-16">
        <div class="container-page">
            <p class="label-small mb-4">The Journal</p>
            <h1 class="heading-1">About Grooves Black</h1>
            <p class="text-body mt-3 max-w-2xl">Preserving the art of analog sound, one record at a time.</p>
        </div>
    </section>

    <!-- Story Section -->
    <section class="section">
        <div class="container-page">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <p class="label-small mb-4">Our Story</p>
                    <h2 class="heading-2 mb-6">Born From a Love of Vinyl</h2>
                    <div class="space-y-6 text-body leading-relaxed">
                        <p>
                            Grooves Black began in a small Brooklyn apartment in 2015, surrounded by towers of vinyl inherited from a grandfather who believed that music should be felt, not just heard.
                        </p>
                        <p>
                            What started as a personal collection quickly became a mission: to share the irreplaceable experience of analog sound with a new generation of listeners. We scour estate sales, collaborate with collectors worldwide, and carefully vet every record that enters our archive.
                        </p>
                        <p>
                            Today, our collection spans over 2,500 titles across jazz, rock, soul, electronic, and classical genres - each one selected for its sonic quality, historical significance, and ability to transport listeners to another time and place.
                        </p>
                    </div>
                </div>
                <div class="relative">
                    <div class="aspect-[4/5] overflow-hidden bg-surface-card">
                        <div class="w-full h-full flex items-center justify-center">
                            <div class="w-2/3 aspect-square rounded-full bg-surface-dark shadow-2xl flex items-center justify-center relative">
                                <div class="w-1/3 h-1/3 rounded-full bg-accent flex items-center justify-center">
                                    <div class="w-1/4 h-1/4 rounded-full bg-surface-dark"></div>
                                </div>
                                <div class="absolute inset-0 rounded-full" style="background: repeating-radial-gradient(circle at center, transparent 0, transparent 3px, rgba(255,255,255,0.02) 3px, rgba(255,255,255,0.02) 6px);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="section section-alt">
        <div class="container-page">
            <div class="text-center mb-16">
                <p class="label-small mb-4">Our Philosophy</p>
                <h2 class="heading-2 mb-4">What We Stand For</h2>
                <div class="gradient-divider mx-auto mt-6"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-surface p-10">
                    <div class="w-14 h-14 rounded-full bg-surface-card flex items-center justify-center mb-8">
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="heading-3 mb-4">Authenticity</h3>
                    <p class="text-body">
                        Every record is verified for authenticity. We never sell bootlegs or unauthorized pressings - only the real thing.
                    </p>
                </div>

                <div class="bg-surface p-10">
                    <div class="w-14 h-14 rounded-full bg-surface-card flex items-center justify-center mb-8">
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <h3 class="heading-3 mb-4">Quality</h3>
                    <p class="text-body">
                        We use industry-standard grading and personally inspect every record before it enters our collection.
                    </p>
                </div>

                <div class="bg-surface p-10">
                    <div class="w-14 h-14 rounded-full bg-surface-card flex items-center justify-center mb-8">
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="heading-3 mb-4">Passion</h3>
                    <p class="text-body">
                        We're collectors first. Every recommendation comes from genuine enthusiasm for the music we sell.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Grading Section -->
    <section class="section">
        <div class="container-page">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-12">
                    <p class="label-small mb-4">Standards</p>
                    <h2 class="heading-2 mb-4">Our Grading Standards</h2>
                    <p class="text-body max-w-xl mx-auto">
                        We use the Goldmine grading standard to ensure transparency and consistency in how we describe our records.
                    </p>
                </div>

                <div class="space-y-6">
                    <div class="flex gap-6 p-8 bg-surface-alt">
                        <span class="flex-shrink-0 w-14 h-14 rounded-full bg-accent text-white flex items-center justify-center font-bold font-display text-lg">M</span>
                        <div>
                            <h3 class="heading-3 mb-2">Mint</h3>
                            <p class="text-body">A perfect, unplayed record. No marks, defects, or imperfections. Often still sealed.</p>
                        </div>
                    </div>

                    <div class="flex gap-6 p-8 bg-surface-alt">
                        <span class="flex-shrink-0 w-14 h-14 rounded-full bg-[#8b7035] text-white flex items-center justify-center font-bold font-display text-sm">NM</span>
                        <div>
                            <h3 class="heading-3 mb-2">Near Mint</h3>
                            <p class="text-body">Nearly perfect. May show slight signs of handling but plays flawlessly with no surface noise.</p>
                        </div>
                    </div>

                    <div class="flex gap-6 p-8 bg-surface-alt">
                        <span class="flex-shrink-0 w-14 h-14 rounded-full bg-[#a38545] text-white flex items-center justify-center font-bold font-display text-sm">VG+</span>
                        <div>
                            <h3 class="heading-3 mb-2">Very Good Plus</h3>
                            <p class="text-body">Shows some signs of play but no skips. Light surface noise may be present between tracks.</p>
                        </div>
                    </div>

                    <div class="flex gap-6 p-8 bg-surface-alt">
                        <span class="flex-shrink-0 w-14 h-14 rounded-full bg-accent-light text-text-primary flex items-center justify-center font-bold font-display text-sm">VG</span>
                        <div>
                            <h3 class="heading-3 mb-2">Very Good</h3>
                            <p class="text-body">Visible groove wear and light scratches. Plays through without skipping but with audible surface noise.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-24 border-t border-border">
        <div class="container-page">
            <div class="max-w-[576px] mx-auto text-center">
                <h2 class="heading-2 mb-6">Join the Registry.</h2>
                <p class="text-body text-center mb-8">
                    Get early access to exclusive archival releases and weekly curations<br>
                    directly from our head collectors.
                </p>
                <livewire:newsletter.subscribe />
            </div>
        </div>
    </section>
</x-layouts.public>
