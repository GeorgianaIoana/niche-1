<div>
    @if($success)
        <div class="flex items-center justify-center gap-3 text-accent">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span class="font-medium">Welcome to the Registry.</span>
        </div>
    @else
        <form wire:submit="subscribe" class="max-w-[512px] mx-auto">
            <div class="flex items-center border-b border-border">
                <input
                    type="email"
                    wire:model="email"
                    placeholder="YOUR EMAIL ADDRESS"
                    class="input-newsletter flex-1"
                    required
                >
                <button
                    type="submit"
                    class="px-8 py-4 font-serif font-bold text-accent text-sm tracking-[1.4px] hover:text-accent-hover transition-colors"
                >
                    <span wire:loading.remove wire:target="subscribe">SUBSCRIBE</span>
                    <span wire:loading wire:target="subscribe">
                        <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </button>
            </div>
            @error('email')
                <p class="mt-3 text-sm text-red-600 text-center">{{ $message }}</p>
            @enderror
        </form>
    @endif
</div>
