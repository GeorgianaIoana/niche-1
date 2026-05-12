<div>
    @if($variant === 'icon')
        <button
            type="button"
            wire:click="toggle"
            wire:loading.attr="disabled"
            title="{{ $isFavorited ? 'Remove from favorites' : 'Add to favorites' }}"
            aria-label="{{ $isFavorited ? 'Remove from favorites' : 'Add to favorites' }}"
            aria-pressed="{{ $isFavorited ? 'true' : 'false' }}"
            class="absolute top-2 left-2 z-10 w-8 h-8 flex items-center justify-center rounded-full bg-white/90 backdrop-blur-sm hover:bg-white transition-all duration-300 {{ $isFavorited ? 'text-accent' : 'text-text-secondary hover:text-accent' }}"
            style="box-shadow: 0 2px 8px rgba(0,0,0,0.15), 0 4px 12px rgba(0,0,0,0.1), inset 0 1px 0 rgba(255,255,255,0.9);"
        >
            <svg class="w-4 h-4 transition-transform" fill="{{ $isFavorited ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
        </button>
    @else
        <button
            type="button"
            wire:click="toggle"
            wire:loading.attr="disabled"
            aria-pressed="{{ $isFavorited ? 'true' : 'false' }}"
            class="btn-outline w-full flex items-center justify-center gap-2 {{ $isFavorited ? 'text-accent border-accent' : '' }}"
        >
            <svg class="w-4 h-4" fill="{{ $isFavorited ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            <span>{{ $isFavorited ? 'Saved to Favorites' : 'Save to Favorites' }}</span>
        </button>
    @endif
</div>
