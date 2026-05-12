<div>
    <div class="container-page py-12">
        <div class="max-w-md mx-auto">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-semibold text-text-primary">Set New Password</h1>
                <p class="text-text-muted mt-2">Choose a new password for your account</p>
            </div>

            <!-- Form -->
            <div class="bg-surface-alt p-8 rounded-lg">
                <form wire:submit="resetPassword" class="space-y-6">
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

                    <div>
                        <label for="password" class="block text-sm font-medium text-text-primary mb-2">New Password</label>
                        <input
                            type="password"
                            id="password"
                            wire:model="password"
                            class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                            placeholder="At least 8 characters"
                            autofocus
                        >
                        @error('password') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-text-primary mb-2">Confirm New Password</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            wire:model="password_confirmation"
                            class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                            placeholder="Confirm your password"
                        >
                    </div>

                    <button type="submit" class="w-full px-8 py-3 bg-accent text-white font-medium rounded-lg hover:bg-accent-hover transition-colors">
                        <span wire:loading.remove wire:target="resetPassword">Reset Password</span>
                        <span wire:loading wire:target="resetPassword" class="flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Resetting...
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
