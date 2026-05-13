<div class="min-h-screen">
    <style>
        .contact-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 0, 0, 0.08);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }
        [data-theme="dark"] .contact-card {
            background: rgba(40, 40, 45, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
        }
        .contact-bar {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        [data-theme="dark"] .contact-bar {
            background: rgba(40, 40, 45, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .contact-divider {
            background: rgba(0, 0, 0, 0.15);
        }
        [data-theme="dark"] .contact-divider {
            background: rgba(255, 255, 255, 0.15);
        }
    </style>

    <div class="container-page py-16 md:py-24">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-serif font-medium mb-4">
                Get in Touch
            </h1>
            <p class="opacity-70 max-w-md mx-auto">
                We'd love to hear from you. Send us a message and we'll respond as soon as possible.
            </p>
        </div>

        <!-- Contact Info Bar -->
        <div class="contact-bar rounded-2xl p-6 mb-12 max-w-3xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-center gap-6 md:gap-12">
                <a href="tel:0374340160" class="flex items-center gap-3 hover:text-accent transition-colors">
                    <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <span class="font-medium">0374.340.160</span>
                </a>
                <div class="hidden md:block w-px h-6 contact-divider"></div>
                <a href="mailto:contact@nicherecords.ro" class="flex items-center gap-3 hover:text-accent transition-colors">
                    <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="font-medium">contact@nicherecords.ro</span>
                </a>
                <div class="hidden md:block w-px h-6 contact-divider"></div>
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="font-medium">Str. Arcusului 6A, Sector 3, Bucuresti</span>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="contact-card p-8 md:p-10 max-w-xl mx-auto rounded-2xl">
            @if($success)
                <div class="text-center py-8">
                    <div class="w-16 h-16 rounded-full bg-green-500/20 flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-serif font-medium mb-2">Message Sent!</h3>
                    <p class="opacity-70">Thank you for reaching out. We'll get back to you within 24-48 hours.</p>
                </div>
            @else
                <form wire:submit="submit" class="space-y-6">
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label for="name" class="block text-sm font-medium mb-2">Name</label>
                            <input type="text" id="name" wire:model="name"
                                class="w-full px-4 py-3.5 rounded-xl bg-white dark:bg-white/10 border border-gray-300 dark:border-white/20 placeholder-gray-400 focus:outline-none focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all"
                                placeholder="Your name">
                            @error('name') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mb-2">Email</label>
                            <input type="email" id="email" wire:model="email"
                                class="w-full px-4 py-3.5 rounded-xl bg-white dark:bg-white/10 border border-gray-300 dark:border-white/20 placeholder-gray-400 focus:outline-none focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all"
                                placeholder="your@email.com">
                            @error('email') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-medium mb-2">Subject</label>
                        <input type="text" id="subject" wire:model="subject"
                            class="w-full px-4 py-3.5 rounded-xl bg-white dark:bg-white/10 border border-gray-300 dark:border-white/20 placeholder-gray-400 focus:outline-none focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all"
                            placeholder="How can we help?">
                        @error('subject') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium mb-2">Message</label>
                        <textarea id="message" wire:model="message" rows="5"
                            class="w-full px-4 py-3.5 rounded-xl bg-white dark:bg-white/10 border border-gray-300 dark:border-white/20 placeholder-gray-400 focus:outline-none focus:border-accent focus:ring-2 focus:ring-accent/20 transition-all resize-none"
                            placeholder="Your message..."></textarea>
                        @error('message') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                    <div class="text-center pt-2">
                        <button type="submit" class="btn-gradient px-8 py-3 rounded-xl font-medium">
                            <span wire:loading.remove wire:target="submit" class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                                Send Message
                            </span>
                            <span wire:loading wire:target="submit" class="flex items-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Sending...
                            </span>
                        </button>
                    </div>
                </form>
            @endif
        </div>

        <!-- Store Hours -->
        <div class="text-center mt-16 max-w-md mx-auto">
            <h2 class="text-lg font-serif font-medium mb-4">Store Hours</h2>
            <div class="space-y-2 opacity-70">
                <div class="flex justify-between">
                    <span>Monday - Friday</span>
                    <span class="font-medium opacity-100">10:00 - 20:00</span>
                </div>
                <div class="flex justify-between">
                    <span>Saturday</span>
                    <span class="font-medium opacity-100">11:00 - 16:00</span>
                </div>
                <div class="flex justify-between">
                    <span>Sunday</span>
                    <span class="opacity-50">Closed</span>
                </div>
            </div>
        </div>
    </div>
</div>
