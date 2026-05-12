<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Explicitly register Livewire components to ensure class-based components take priority
        Livewire::component('shop.favorites.toggle', \App\Livewire\Shop\Favorites\Toggle::class);
        Livewire::component('shop.favorites.counter', \App\Livewire\Shop\Favorites\Counter::class);
    }
}
