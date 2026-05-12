<div>
    <section class="container-page py-20 md:py-28">
        <div class="max-w-2xl mx-auto text-center">
            <!-- Success Icon -->
            <div class="w-24 h-24 mx-auto mb-10 rounded-full bg-[#e4f5e4] flex items-center justify-center">
                <svg class="w-12 h-12 text-[#2d7a2d]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <h1 class="heading-1 mb-4">Order Confirmed!</h1>
            <p class="text-xl text-body mb-10">
                Thank you for your purchase. Your vinyl is on its way.
            </p>

            <!-- Order Details -->
            <div class="bg-surface-alt p-10 mb-10 text-left">
                <h2 class="heading-3 mb-8 text-center pb-4 border-b border-border">Order Details</h2>

                <dl class="space-y-4">
                    <div class="flex justify-between py-3 border-b border-border">
                        <dt class="text-body">Order Number</dt>
                        <dd class="font-semibold font-mono text-text-primary">{{ $orderNumber }}</dd>
                    </div>
                    <div class="flex justify-between py-3 border-b border-border">
                        <dt class="text-body">Order Date</dt>
                        <dd class="font-medium text-text-primary">{{ now()->format('F j, Y') }}</dd>
                    </div>
                    <div class="flex justify-between py-3 border-b border-border">
                        <dt class="text-body">Estimated Delivery</dt>
                        <dd class="font-medium text-text-primary">{{ now()->addDays(5)->format('F j, Y') }} - {{ now()->addDays(7)->format('F j, Y') }}</dd>
                    </div>
                </dl>
            </div>

            <!-- What's Next -->
            <div class="bg-surface border border-border p-10 mb-10">
                <h3 class="heading-3 mb-6">What happens next?</h3>
                <ol class="text-left space-y-6">
                    <li class="flex gap-5">
                        <span class="flex-shrink-0 w-10 h-10 rounded-full bg-surface-card text-accent flex items-center justify-center font-semibold font-display">1</span>
                        <div>
                            <p class="heading-3 mb-1">Order Processing</p>
                            <p class="text-body">We're carefully packing your vinyl with protective materials.</p>
                        </div>
                    </li>
                    <li class="flex gap-5">
                        <span class="flex-shrink-0 w-10 h-10 rounded-full bg-surface-card text-accent flex items-center justify-center font-semibold font-display">2</span>
                        <div>
                            <p class="heading-3 mb-1">Shipping Confirmation</p>
                            <p class="text-body">You'll receive an email with tracking information once shipped.</p>
                        </div>
                    </li>
                    <li class="flex gap-5">
                        <span class="flex-shrink-0 w-10 h-10 rounded-full bg-surface-card text-accent flex items-center justify-center font-semibold font-display">3</span>
                        <div>
                            <p class="heading-3 mb-1">Delivery</p>
                            <p class="text-body">Your vinyl arrives safely at your doorstep, ready to spin.</p>
                        </div>
                    </li>
                </ol>
            </div>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('collection') }}" class="btn-gradient">
                    Continue Shopping
                </a>
                <a href="{{ route('home') }}" class="btn-outline">
                    Back to Home
                </a>
            </div>

            <!-- Support -->
            <p class="text-body mt-10">
                Questions about your order?
                <a href="{{ route('contact') }}" class="text-accent hover:text-accent-hover font-medium border-b border-border-accent">Contact us</a>
            </p>
        </div>
    </section>
</div>
