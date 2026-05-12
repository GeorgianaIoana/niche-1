<?php

namespace App\Livewire\Shop\Favorites;

use App\Actions\Favorites\IsFavoritedAction;
use App\Actions\Favorites\ToggleFavoriteAction;
use App\Models\Product;
use Livewire\Component;

class Toggle extends Component
{
    public Product $product;
    public bool $isFavorited = false;
    public string $variant = 'icon';

    public function mount(Product $product, string $variant = 'icon'): void
    {
        $this->product = $product;
        $this->variant = $variant;
        $this->isFavorited = app(IsFavoritedAction::class)->execute($product);
    }

    public function toggle(): void
    {
        $this->isFavorited = app(ToggleFavoriteAction::class)->execute($this->product);
        $this->dispatch('favorites-updated');
    }

    public function render()
    {
        return view('livewire.shop.favorites.toggle');
    }
}
