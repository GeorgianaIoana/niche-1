<?php

namespace App\Livewire\Shop\Favorites;

use App\Actions\Favorites\GetFavoritesAction;
use Livewire\Attributes\On;
use Livewire\Component;

class Counter extends Component
{
    public int $count = 0;

    public function mount(GetFavoritesAction $getFavorites): void
    {
        $this->count = $getFavorites->execute()->count();
    }

    #[On('favorites-updated')]
    public function refresh(GetFavoritesAction $getFavorites): void
    {
        $this->count = $getFavorites->execute()->count();
    }

    public function render()
    {
        return view('livewire.shop.favorites.counter');
    }
}
