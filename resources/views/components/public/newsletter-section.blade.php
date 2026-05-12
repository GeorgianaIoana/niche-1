<section class="section">
    <div class="container-page">
        <div class="max-w-2xl mx-auto">
            <div class="relative bg-surface-alt rounded-2xl p-8 md:p-12 text-center border border-border">
                <!-- Light glow decoration -->
                <img
                    src="{{ asset('images/light-glow.png') }}"
                    alt=""
                    class="absolute top-0 right-0 w-80 h-80 -translate-y-1/4 translate-x-1/4 pointer-events-none"
                >
                <div class="relative z-10">
                    <h2 class="text-h2 mb-4">Join the Archive</h2>
                    <p class="text-text-secondary mb-8">
                        Subscribe to receive updates on new arrivals, rare finds, and exclusive offers for collectors.
                    </p>
                    <livewire:newsletter.subscribe />
                </div>
            </div>
        </div>
    </div>
</section>
