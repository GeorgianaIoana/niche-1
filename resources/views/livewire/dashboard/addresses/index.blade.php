<div>
    <!-- Header -->
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-semibold text-text-primary">Addresses</h1>
            <p class="text-text-muted mt-1">Manage your shipping and billing addresses</p>
        </div>
        <a href="{{ route('dashboard.addresses.create') }}" class="inline-flex items-center gap-2 px-6 py-2 bg-accent text-white rounded-lg hover:bg-accent-hover transition-colors" wire:navigate>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Address
        </a>
    </div>

    <!-- Addresses Grid -->
    @if($addresses->isEmpty())
        <div class="bg-surface-alt rounded-lg p-12 text-center">
            <svg class="w-12 h-12 text-text-muted mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <p class="text-text-muted mb-4">You haven't added any addresses yet</p>
            <a href="{{ route('dashboard.addresses.create') }}" class="inline-block px-6 py-2 bg-accent text-white rounded-lg hover:bg-accent-hover transition-colors" wire:navigate>
                Add Your First Address
            </a>
        </div>
    @else
        <div class="grid sm:grid-cols-2 gap-6">
            @foreach($addresses as $address)
                <div class="bg-surface-alt rounded-lg p-6 relative">
                    @if($address->is_default)
                        <span class="absolute top-4 right-4 px-2 py-1 text-xs bg-accent/10 text-accent rounded-full">
                            Default
                        </span>
                    @endif

                    <div class="mb-4">
                        @if($address->label)
                            <p class="font-semibold text-text-primary">{{ $address->label }}</p>
                        @endif
                        <span class="inline-block px-2 py-0.5 text-xs bg-surface rounded text-text-muted capitalize">
                            {{ $address->type }}
                        </span>
                    </div>

                    <div class="text-sm text-text-secondary whitespace-pre-line mb-4">{{ $address->formatted_address }}</div>

                    @if($address->phone)
                        <p class="text-sm text-text-muted mb-4">{{ $address->phone }}</p>
                    @endif

                    <div class="flex items-center gap-4 pt-4 border-t border-border">
                        <a href="{{ route('dashboard.addresses.edit', $address) }}" class="text-sm text-accent hover:text-accent-hover" wire:navigate>
                            Edit
                        </a>
                        @if(!$address->is_default)
                            <button wire:click="setDefault({{ $address->id }})" class="text-sm text-text-muted hover:text-text-primary">
                                Set as Default
                            </button>
                        @endif
                        <button
                            wire:click="delete({{ $address->id }})"
                            wire:confirm="Are you sure you want to delete this address?"
                            class="text-sm text-red-500 hover:text-red-600"
                        >
                            Delete
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
