<div class="min-h-screen lg:grid lg:grid-cols-2">
    <!-- Left Panel - Editorial Hero Image -->
    <div class="hidden lg:flex relative bg-surface-dark overflow-hidden">
        <!-- Background Image -->
        <img
            src="{{ asset('images/figma/musician-portrait.png') }}"
            alt=""
            class="absolute inset-0 w-full h-full object-cover opacity-80"
        >
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

        <!-- Content Overlay -->
        <div class="relative z-10 flex flex-col justify-between p-12 h-full w-full">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="inline-block" wire:navigate>
                <span class="text-white/90 font-bold text-xl tracking-[0.2em]">GROOVES BLACK</span>
            </a>

            <!-- Editorial Quote -->
            <div class="max-w-md">
                <div class="gradient-hairline w-16 mb-8"></div>
                <h2 class="font-serif italic text-4xl text-white leading-tight mb-6">
                    Where Music<br>Becomes Art
                </h2>
                <p class="text-white/70 text-sm leading-relaxed">
                    Curating the world's finest vinyl records and CDs for discerning collectors since 1987.
                </p>
            </div>
        </div>
    </div>

    <!-- Right Panel - Login Form -->
    <div class="flex items-center justify-center bg-surface py-12 px-6 min-h-screen lg:min-h-0">
        <div class="w-full max-w-[380px]">
            <!-- Mobile Logo -->
            <div class="text-center mb-10 lg:hidden">
                <a href="{{ route('home') }}" class="inline-block" wire:navigate>
                    <span class="text-text-primary font-bold text-xl tracking-[0.2em]">GROOVES BLACK</span>
                </a>
            </div>

            <!-- Header -->
            <div class="mb-10">
                <p class="label-small mb-3">Welcome Back</p>
                <h1 class="font-serif italic text-4xl text-text-primary leading-tight">
                    Sign In
                </h1>
            </div>

            <!-- Status Messages -->
            @if (session('status'))
                <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded text-green-800 dark:text-green-200 text-sm flex items-center gap-3">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded text-red-800 dark:text-red-200 text-sm flex items-center gap-3">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('error') }}
                </div>
            @endif

            <!-- Email Login Form -->
            <form wire:submit="login" class="space-y-6">
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-xs font-medium text-text-secondary uppercase tracking-wider mb-2">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        wire:model="email"
                        class="input"
                        placeholder="your@email.com"
                        autofocus
                    >
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-xs font-medium text-text-secondary uppercase tracking-wider mb-2">Password</label>
                    <div class="relative" x-data="{ show: false }">
                        <input
                            :type="show ? 'text' : 'password'"
                            id="password"
                            wire:model="password"
                            class="input pr-12"
                            placeholder="Enter your password"
                        >
                        <button type="button" @click="show = !show" class="absolute inset-y-0 right-0 pr-4 flex items-center text-text-muted hover:text-text-primary transition-colors">
                            <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Forgot Password Link -->
                <div class="flex justify-end">
                    <a href="{{ route('password.request') }}" class="text-sm text-accent hover:text-accent-hover transition-colors" wire:navigate>
                        Forgot password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-gradient w-full py-4 text-sm tracking-widest">
                    <span wire:loading.remove wire:target="login">Sign In</span>
                    <span wire:loading wire:target="login" class="flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Signing in...
                    </span>
                </button>
            </form>

            <!-- Divider -->
            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-border"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="px-4 bg-surface text-text-muted uppercase tracking-widest text-xs">Or continue with</span>
                </div>
            </div>

            <!-- Social Login Buttons -->
            <div class="grid grid-cols-2 gap-3">
                <!-- Google Button -->
                <a href="{{ route('socialite.redirect', 'google') }}" class="flex items-center justify-center gap-2 px-4 py-3 bg-surface border border-border rounded hover:bg-surface-alt transition-colors group">
                    <svg class="w-5 h-5" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    <span class="text-xs font-medium text-text-secondary group-hover:text-text-primary transition-colors">Google</span>
                </a>

                <!-- Facebook Button -->
                <a href="{{ route('socialite.redirect', 'facebook') }}" class="flex items-center justify-center gap-2 px-4 py-3 bg-surface border border-border rounded hover:bg-surface-alt transition-colors group">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#1877F2">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                    <span class="text-xs font-medium text-text-secondary group-hover:text-text-primary transition-colors">Facebook</span>
                </a>
            </div>

            <!-- Sign Up Link -->
            <p class="mt-8 text-center text-text-secondary text-sm">
                New to Grooves Black?
                <a href="{{ route('register') }}" class="text-accent hover:text-accent-hover font-medium transition-colors" wire:navigate>
                    Create an account
                </a>
            </p>

            <!-- Terms -->
            <p class="mt-6 text-center text-xs text-text-muted">
                By signing in, you agree to our
                <a href="{{ route('terms') }}" class="underline hover:text-text-secondary transition-colors">Terms</a>
                and
                <a href="{{ route('privacy') }}" class="underline hover:text-text-secondary transition-colors">Privacy Policy</a>
            </p>
        </div>
    </div>
</div>
