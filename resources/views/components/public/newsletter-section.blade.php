@props(['variant' => 'light'])

<section class="{{ $variant === 'dark' ? 'section-dark' : 'section bg-brand-100' }}">
    <div class="container-page">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-h2 mb-4">Join the Archive</h2>
            <p class="{{ $variant === 'dark' ? 'text-brand-200' : 'text-text-secondary' }} mb-8">
                Subscribe to receive updates on new arrivals, rare finds, and exclusive offers for collectors.
            </p>
            <livewire:newsletter.subscribe :variant="$variant" />
        </div>
    </div>
</section>
