<div>
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-text-primary">Settings</h1>
        <p class="text-text-muted mt-1">Manage your notification preferences and account</p>
    </div>

    <div class="space-y-8">
        <!-- Notification Preferences -->
        <div class="bg-surface-alt rounded-lg p-6">
            <h2 class="text-lg font-semibold text-text-primary mb-6">Email Notifications</h2>

            @if($settingsUpdated)
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-800 text-sm">
                    Settings saved successfully.
                </div>
            @endif

            <form wire:submit="updateSettings" class="space-y-6">
                <div class="space-y-4">
                    <label class="flex items-center gap-4 cursor-pointer">
                        <input
                            type="checkbox"
                            wire:model="emailNotifications"
                            class="w-5 h-5 rounded border-border text-accent focus:ring-accent"
                        >
                        <div>
                            <p class="font-medium text-text-primary">Email Notifications</p>
                            <p class="text-sm text-text-muted">Receive email notifications about your account</p>
                        </div>
                    </label>

                    <label class="flex items-center gap-4 cursor-pointer">
                        <input
                            type="checkbox"
                            wire:model="orderUpdates"
                            class="w-5 h-5 rounded border-border text-accent focus:ring-accent"
                        >
                        <div>
                            <p class="font-medium text-text-primary">Order Updates</p>
                            <p class="text-sm text-text-muted">Get notified when your order ships or is delivered</p>
                        </div>
                    </label>

                    <label class="flex items-center gap-4 cursor-pointer">
                        <input
                            type="checkbox"
                            wire:model="promotionalEmails"
                            class="w-5 h-5 rounded border-border text-accent focus:ring-accent"
                        >
                        <div>
                            <p class="font-medium text-text-primary">Promotional Emails</p>
                            <p class="text-sm text-text-muted">Receive emails about new arrivals and special offers</p>
                        </div>
                    </label>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-2 bg-accent text-white rounded-lg hover:bg-accent-hover transition-colors">
                        <span wire:loading.remove wire:target="updateSettings">Save Preferences</span>
                        <span wire:loading wire:target="updateSettings">Saving...</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Danger Zone -->
        <div class="bg-surface-alt rounded-lg p-6 border border-red-200">
            <h2 class="text-lg font-semibold text-red-600 mb-2">Danger Zone</h2>
            <p class="text-text-muted mb-6">Once you delete your account, there is no going back. Please be certain.</p>

            @if($confirmingDeletion)
                <div class="bg-red-50 border border-red-200 rounded-lg p-6">
                    <p class="text-red-800 font-medium mb-4">Are you sure you want to delete your account?</p>
                    <p class="text-sm text-red-600 mb-4">This will permanently delete your account and all associated data. Type <strong>DELETE</strong> to confirm.</p>

                    <form wire:submit="deleteAccount" class="space-y-4">
                        <input
                            type="text"
                            wire:model="deleteConfirmation"
                            placeholder="Type DELETE to confirm"
                            class="w-full px-4 py-3 rounded-lg border border-red-300 bg-white text-text-primary placeholder-text-muted focus:outline-none focus:border-red-500"
                        >
                        @error('deleteConfirmation') <p class="text-sm text-red-500">{{ $message }}</p> @enderror

                        <div class="flex gap-4">
                            <button type="button" wire:click="cancelDeletion" class="px-6 py-2 border border-border rounded-lg text-text-secondary hover:bg-surface transition-colors">
                                Cancel
                            </button>
                            <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                <span wire:loading.remove wire:target="deleteAccount">Delete Account</span>
                                <span wire:loading wire:target="deleteAccount">Deleting...</span>
                            </button>
                        </div>
                    </form>
                </div>
            @else
                <button wire:click="confirmAccountDeletion" class="px-6 py-2 border border-red-300 text-red-600 rounded-lg hover:bg-red-50 transition-colors">
                    Delete Account
                </button>
            @endif
        </div>
    </div>
</div>
