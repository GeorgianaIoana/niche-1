<div>
    <div class="container-page py-12">
        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-3xl font-semibold text-text-primary">Contact</h1>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Contact Info Cards -->
            <div class="lg:col-span-1 space-y-4">
                <!-- Phone -->
                <div class="bg-surface-alt p-6 rounded-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-accent/10 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-text-muted">Phone</p>
                            <p class="font-medium text-text-primary">0374.340.160</p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="bg-surface-alt p-6 rounded-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-accent/10 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-text-muted">Email</p>
                            <a href="mailto:contact@nicherecords.ro" class="font-medium text-text-primary hover:text-accent">contact@nicherecords.ro</a>
                        </div>
                    </div>
                </div>

                <!-- Address -->
                <div class="bg-surface-alt p-6 rounded-lg">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-accent/10 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-text-muted">Address</p>
                            <p class="font-medium text-text-primary">Str. Arcusului, nr. 6A, Sector 3, Bucuresti</p>
                        </div>
                    </div>
                </div>

                <!-- Hours -->
                <div class="bg-surface-alt p-6 rounded-lg">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-accent/10 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-text-muted mb-2">Store Hours</p>
                            <div class="text-sm text-text-primary space-y-1">
                                <p>Mon - Fri: 10:00 - 20:00</p>
                                <p>Saturday: 11:00 - 16:00</p>
                                <p>Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-surface-alt p-8 rounded-lg">
                    <h2 class="text-xl font-semibold text-text-primary mb-6">Send us a message</h2>

                    @if($success)
                        <div class="flex items-center gap-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <div>
                                <p class="font-medium text-green-800">Message sent successfully!</p>
                                <p class="text-sm text-green-600">We'll get back to you within 24-48 hours.</p>
                            </div>
                        </div>
                    @else
                        <form wire:submit="submit" class="space-y-6">
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-text-primary mb-2">Name</label>
                                    <input
                                        type="text"
                                        id="name"
                                        wire:model="name"
                                        class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                                        placeholder="Your name"
                                    >
                                    @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-text-primary mb-2">Email</label>
                                    <input
                                        type="email"
                                        id="email"
                                        wire:model="email"
                                        class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                                        placeholder="your@email.com"
                                    >
                                    @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-medium text-text-primary mb-2">Subject</label>
                                <input
                                    type="text"
                                    id="subject"
                                    wire:model="subject"
                                    class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                                    placeholder="How can we help?"
                                >
                                @error('subject') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-medium text-text-primary mb-2">Message</label>
                                <textarea
                                    id="message"
                                    wire:model="message"
                                    rows="5"
                                    class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent resize-none"
                                    placeholder="Your message..."
                                ></textarea>
                                @error('message') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                            </div>

                            <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-accent text-white font-medium rounded-lg hover:bg-accent-hover transition-colors">
                                <span wire:loading.remove wire:target="submit">Send Message</span>
                                <span wire:loading wire:target="submit" class="flex items-center gap-2">
                                    <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Sending...
                                </span>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
