<header class="header-nav fixed top-0 left-0 right-0 z-50" style="height: var(--header-height);">
    <div class="container-page h-full flex items-center justify-between">
        <!-- Logo & Navigation -->
        <div class="flex items-center gap-12">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="block">
                <img src="/images/niche-logo.png" alt="Niche Records" class="h-14">
            </a>

            <!-- Navigation -->
            <nav class="hidden lg:flex items-center gap-8">
                <a href="{{ route('collection') }}" class="nav-link {{ request()->routeIs('collection') ? 'active' : '' }}">
                    Shop
                </a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                    Contact
                </a>
            </nav>
        </div>

        <!-- Search -->
        <div class="hidden md:block flex-1 max-w-[400px] px-8" x-data="{ focused: false, query: '' }">
            <div
                class="relative group"
                :class="focused ? 'z-50' : ''"
            >
                <!-- Search Input Container - Oval with 3D Effects -->
                <div
                    class="relative flex items-center gap-3 px-5 py-3 rounded-full transition-all duration-300"
                    :class="focused
                        ? 'bg-surface scale-[1.02]'
                        : 'bg-surface-alt/80 hover:bg-surface'"
                    style="box-shadow: inset 1px 1px 3px rgba(0,0,0,0.05), inset -1px -1px 3px rgba(255,255,255,0.8), 0 2px 8px rgba(0,0,0,0.06);"
                    x-bind:style="focused
                        ? 'box-shadow: inset 1px 1px 2px rgba(0,0,0,0.03), inset -1px -1px 2px rgba(255,255,255,0.9), 0 6px 16px rgba(116, 91, 37, 0.12), 0 0 0 1.5px rgba(228, 194, 130, 0.3);'
                        : 'box-shadow: inset 1px 1px 3px rgba(0,0,0,0.05), inset -1px -1px 3px rgba(255,255,255,0.8), 0 2px 8px rgba(0,0,0,0.06);'"
                >
                    <!-- Search Icon -->
                    <div
                        class="w-6 h-6 rounded-full flex items-center justify-center shrink-0 transition-all duration-300"
                        :class="focused ? 'text-white' : 'text-text-muted'"
                        :style="focused
                            ? 'background: linear-gradient(135deg, #e4c282 0%, #745b25 100%); box-shadow: 0 2px 6px rgba(116, 91, 37, 0.35);'
                            : 'background: transparent;'"
                    >
                        <svg
                            class="w-3 h-3 transition-transform duration-300"
                            :class="focused ? 'scale-110' : ''"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <!-- Input -->
                    <input
                        type="text"
                        x-model="query"
                        @focus="focused = true"
                        @blur="setTimeout(() => focused = false, 200)"
                        placeholder="Search..."
                        class="flex-1 bg-transparent border-0 p-0 text-sm text-text-primary placeholder:text-text-muted focus:outline-none focus:ring-0"
                    >

                    <!-- Keyboard Shortcut Hint -->
                    <div
                        class="hidden lg:flex items-center transition-all duration-300"
                        :class="focused || query ? 'opacity-0 scale-90' : 'opacity-50'"
                    >
                        <kbd class="px-1.5 py-0.5 text-[9px] font-medium text-text-muted rounded" style="background: linear-gradient(180deg, rgba(255,255,255,0.9) 0%, rgba(240,240,240,0.9) 100%); box-shadow: 0 1px 2px rgba(0,0,0,0.1);">⌘K</kbd>
                    </div>

                    <!-- Clear Button -->
                    <button
                        x-show="query.length > 0"
                        x-transition
                        @click="query = ''"
                        class="w-5 h-5 rounded-full flex items-center justify-center text-text-muted hover:text-white transition-all duration-200"
                        style="background: linear-gradient(180deg, #f5f5f5 0%, #e0e0e0 100%); box-shadow: 0 1px 3px rgba(0,0,0,0.1);"
                        @mouseenter="$el.style.background = 'linear-gradient(135deg, #e4c282 0%, #745b25 100%)'"
                        @mouseleave="$el.style.background = 'linear-gradient(180deg, #f5f5f5 0%, #e0e0e0 100%)'"
                    >
                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-4">
            <!-- Theme Toggle -->
            <x-public.theme-toggle />

            <!-- User -->
            @auth
                <div class="relative" x-data="{ open: false }">
                    <div
                        class="w-8 h-8 rounded-full flex items-center justify-center bg-surface-alt/80 hover:bg-surface transition-all duration-300"
                        style="box-shadow: inset 1px 1px 3px rgba(0,0,0,0.05), inset -1px -1px 3px rgba(255,255,255,0.8), 0 2px 8px rgba(0,0,0,0.06);"
                    >
                        <button
                            @click="open = !open"
                            @click.outside="open = false"
                            class="flex items-center gap-1 text-text-secondary hover:text-text-primary transition-colors"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </button>
                    </div>

                    <!-- Dropdown Menu -->
                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        x-cloak
                        class="absolute right-0 mt-2 w-48 bg-surface border border-border rounded-lg shadow-lg py-1 z-50"
                    >
                        <div class="px-4 py-2 border-b border-border">
                            <p class="text-sm font-medium text-text-primary truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-text-muted truncate">{{ Auth::user()->email }}</p>
                        </div>
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm text-text-secondary hover:bg-surface-alt hover:text-text-primary" wire:navigate>
                            Dashboard
                        </a>
                        <a href="{{ route('dashboard.orders') }}" class="block px-4 py-2 text-sm text-text-secondary hover:bg-surface-alt hover:text-text-primary" wire:navigate>
                            Orders
                        </a>
                        <a href="{{ route('dashboard.profile') }}" class="block px-4 py-2 text-sm text-text-secondary hover:bg-surface-alt hover:text-text-primary" wire:navigate>
                            Profile
                        </a>
                        <div class="border-t border-border mt-1 pt-1">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-text-secondary hover:bg-surface-alt hover:text-red-500">
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div
                    class="w-8 h-8 rounded-full flex items-center justify-center bg-surface-alt/80 hover:bg-surface transition-all duration-300"
                    style="box-shadow: inset 1px 1px 3px rgba(0,0,0,0.05), inset -1px -1px 3px rgba(255,255,255,0.8), 0 2px 8px rgba(0,0,0,0.06);"
                >
                    <a href="{{ route('login') }}" class="text-text-secondary hover:text-text-primary transition-colors" wire:navigate>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                </div>
            @endauth

            <!-- Favorites -->
            <livewire:shop.favorites.counter />

            <!-- Cart -->
            <livewire:shop.cart.mini-cart />

            <!-- Mobile Menu Toggle -->
            <button type="button" class="lg:hidden p-2 text-text-secondary hover:text-text-primary" x-data @click="$dispatch('toggle-mobile-menu')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div
        x-data="{ open: false }"
        x-show="open"
        x-cloak
        @toggle-mobile-menu.window="open = !open"
        @keydown.escape.window="open = false"
        class="lg:hidden absolute top-full left-0 right-0 bg-surface border-b border-border shadow-lg"
    >
        <nav class="container-page py-6 flex flex-col gap-4">
            <a href="{{ route('collection') }}" class="nav-link py-2">Shop</a>
            <a href="{{ route('contact') }}" class="nav-link py-2">Contact</a>
            @auth
                <div class="border-t border-border pt-4 mt-2">
                    <a href="{{ route('dashboard') }}" class="nav-link py-2">Dashboard</a>
                    <a href="{{ route('dashboard.orders') }}" class="nav-link py-2">Orders</a>
                    <a href="{{ route('dashboard.favorites') }}" class="nav-link py-2">Favorites</a>
                    <form method="POST" action="{{ route('logout') }}" class="mt-2">
                        @csrf
                        <button type="submit" class="nav-link py-2 text-red-500 hover:text-red-600">Sign Out</button>
                    </form>
                </div>
            @else
                <div class="border-t border-border pt-4 mt-2">
                    <a href="{{ route('login') }}" class="nav-link py-2">Sign In</a>
                    <a href="{{ route('register') }}" class="nav-link py-2">Create Account</a>
                </div>
            @endauth
        </nav>
    </div>
</header>

<!-- Spacer for fixed header -->
<div style="height: calc(var(--header-height) + 32px);"></div>
