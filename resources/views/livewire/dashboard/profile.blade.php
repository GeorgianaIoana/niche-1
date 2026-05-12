<div>
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-text-primary">Profile</h1>
        <p class="text-text-muted mt-1">Manage your account information</p>
    </div>

    <div class="space-y-8">
        <!-- Profile Information -->
        <div class="bg-surface-alt rounded-lg p-6">
            <h2 class="text-lg font-semibold text-text-primary mb-6">Profile Information</h2>

            @if($profileUpdated)
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-800 text-sm">
                    Profile updated successfully.
                </div>
            @endif

            <form wire:submit="updateProfile" class="space-y-6">
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-text-primary mb-2">Name</label>
                        <input
                            type="text"
                            id="name"
                            wire:model="name"
                            class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
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
                        >
                        @error('email') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-accent text-white rounded-lg hover:bg-accent-hover transition-colors">
                        <span wire:loading.remove wire:target="updateProfile">Save Changes</span>
                        <span wire:loading wire:target="updateProfile">Saving...</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Change Password -->
        <div class="bg-surface-alt rounded-lg p-6">
            <h2 class="text-lg font-semibold text-text-primary mb-6">Change Password</h2>

            @if($passwordUpdated)
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-800 text-sm">
                    Password changed successfully.
                </div>
            @endif

            <form wire:submit="updatePassword" class="space-y-6">
                <div>
                    <label for="current_password" class="block text-sm font-medium text-text-primary mb-2">Current Password</label>
                    <input
                        type="password"
                        id="current_password"
                        wire:model="current_password"
                        class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                    >
                    @error('current_password') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label for="password" class="block text-sm font-medium text-text-primary mb-2">New Password</label>
                        <input
                            type="password"
                            id="password"
                            wire:model="password"
                            class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
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
                        >
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-accent text-white rounded-lg hover:bg-accent-hover transition-colors">
                        <span wire:loading.remove wire:target="updatePassword">Change Password</span>
                        <span wire:loading wire:target="updatePassword">Changing...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
