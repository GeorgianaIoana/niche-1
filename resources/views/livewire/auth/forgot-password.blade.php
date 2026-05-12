<div>
    <div class="container-page py-12">
        <div class="max-w-md mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-semibold text-text-primary">Reset Password</h1>
                <p class="text-text-muted mt-2">We'll send you a link to reset your password</p>
            </div>

            <!-- Form -->
            <div class="bg-surface-alt p-8 rounded-lg">
                @if($emailSent)
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-text-primary mb-2">Check your email</h2>
                        <p class="text-text-muted text-sm mb-6">
                            We've sent a password reset link to <strong class="text-text-primary">{{ $email }}</strong>
                        </p>
                        <a href="{{ route('login') }}" class="text-accent hover:text-accent-hover font-medium text-sm" wire:navigate>
                            Back to sign in
                        </a>
                    </div>
                @else
                    <form wire:submit="sendResetLink" class="space-y-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-text-primary mb-2">Email</label>
                            <input
                                type="email"
                                id="email"
                                wire:model="email"
                                class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                                placeholder="your@email.com"
                                autofocus
                            >
                            @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="w-full px-8 py-3 bg-accent text-white font-medium rounded-lg hover:bg-accent-hover transition-colors">
                            <span wire:loading.remove wire:target="sendResetLink">Send Reset Link</span>
                            <span wire:loading wire:target="sendResetLink" class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Sending...
                            </span>
                        </button>
                    </form>

                    <div class="mt-6 text-center">
                        <a href="{{ route('login') }}" class="text-text-muted hover:text-text-primary text-sm" wire:navigate>
                            Back to sign in
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
