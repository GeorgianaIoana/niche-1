<div
    class="w-8 h-8 rounded-full flex items-center justify-center bg-surface-alt/80 hover:bg-surface transition-all duration-300"
    style="box-shadow: inset 1px 1px 3px rgba(0,0,0,0.05), inset -1px -1px 3px rgba(255,255,255,0.8), 0 2px 8px rgba(0,0,0,0.06);"
>
    <a href="{{ auth()->check() ? route('dashboard.favorites') : route('login') }}" class="relative text-current" title="Favorites" aria-label="Favorites">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
        @if($count > 0)
            <span class="absolute -top-2 -right-2 w-4 h-4 bg-accent text-white text-[10px] font-bold rounded-full flex items-center justify-center">
                {{ $count > 9 ? '9+' : $count }}
            </span>
        @endif
    </a>
</div>
