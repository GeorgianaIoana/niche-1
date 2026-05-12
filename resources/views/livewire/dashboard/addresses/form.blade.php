<div>
    <!-- Header -->
    <div class="mb-8">
        <a href="{{ route('dashboard.addresses') }}" class="inline-flex items-center gap-2 text-text-muted hover:text-text-primary mb-4" wire:navigate>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Addresses
        </a>
        <h1 class="text-2xl font-semibold text-text-primary">
            {{ $address ? 'Edit Address' : 'Add Address' }}
        </h1>
    </div>

    <!-- Form -->
    <div class="bg-surface-alt rounded-lg p-6">
        <form wire:submit="save" class="space-y-6">
            <!-- Label & Type -->
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label for="label" class="block text-sm font-medium text-text-primary mb-2">Label (optional)</label>
                    <input
                        type="text"
                        id="label"
                        wire:model="label"
                        placeholder="e.g., Home, Work"
                        class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                    >
                    @error('label') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-text-primary mb-2">Address Type</label>
                    <select
                        id="type"
                        wire:model="type"
                        class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary focus:outline-none focus:border-accent"
                    >
                        <option value="both">Shipping & Billing</option>
                        <option value="shipping">Shipping Only</option>
                        <option value="billing">Billing Only</option>
                    </select>
                    @error('type') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-text-primary mb-2">Full Name</label>
                <input
                    type="text"
                    id="name"
                    wire:model="name"
                    class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                >
                @error('name') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- Address Lines -->
            <div>
                <label for="address_line_1" class="block text-sm font-medium text-text-primary mb-2">Address Line 1</label>
                <input
                    type="text"
                    id="address_line_1"
                    wire:model="address_line_1"
                    placeholder="Street address"
                    class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                >
                @error('address_line_1') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="address_line_2" class="block text-sm font-medium text-text-primary mb-2">Address Line 2 (optional)</label>
                <input
                    type="text"
                    id="address_line_2"
                    wire:model="address_line_2"
                    placeholder="Apartment, suite, unit, etc."
                    class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                >
                @error('address_line_2') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <!-- City, State, Postal Code -->
            <div class="grid sm:grid-cols-3 gap-6">
                <div>
                    <label for="city" class="block text-sm font-medium text-text-primary mb-2">City</label>
                    <input
                        type="text"
                        id="city"
                        wire:model="city"
                        class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                    >
                    @error('city') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="state" class="block text-sm font-medium text-text-primary mb-2">State / Province</label>
                    <input
                        type="text"
                        id="state"
                        wire:model="state"
                        class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                    >
                    @error('state') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="postal_code" class="block text-sm font-medium text-text-primary mb-2">Postal Code</label>
                    <input
                        type="text"
                        id="postal_code"
                        wire:model="postal_code"
                        class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                    >
                    @error('postal_code') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Country & Phone -->
            <div class="grid sm:grid-cols-2 gap-6">
                <div>
                    <label for="country" class="block text-sm font-medium text-text-primary mb-2">Country</label>
                    <select
                        id="country"
                        wire:model="country"
                        class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary focus:outline-none focus:border-accent"
                    >
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="GB">United Kingdom</option>
                        <option value="AU">Australia</option>
                        <option value="DE">Germany</option>
                        <option value="FR">France</option>
                        <option value="RO">Romania</option>
                    </select>
                    @error('country') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-text-primary mb-2">Phone (optional)</label>
                    <input
                        type="tel"
                        id="phone"
                        wire:model="phone"
                        class="w-full px-4 py-3 rounded-lg border border-border bg-surface text-text-primary placeholder-text-muted focus:outline-none focus:border-accent"
                    >
                    @error('phone') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Default Address -->
            <label class="flex items-center gap-3 cursor-pointer">
                <input
                    type="checkbox"
                    wire:model="is_default"
                    class="w-5 h-5 rounded border-border text-accent focus:ring-accent"
                >
                <span class="text-text-primary">Set as default address</span>
            </label>

            <!-- Actions -->
            <div class="flex justify-end gap-4 pt-4 border-t border-border">
                <a href="{{ route('dashboard.addresses') }}" class="px-6 py-2 border border-border rounded-lg text-text-secondary hover:bg-surface transition-colors" wire:navigate>
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-accent text-white rounded-lg hover:bg-accent-hover transition-colors">
                    <span wire:loading.remove wire:target="save">{{ $address ? 'Update Address' : 'Save Address' }}</span>
                    <span wire:loading wire:target="save">Saving...</span>
                </button>
            </div>
        </form>
    </div>
</div>
