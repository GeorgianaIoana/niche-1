<?php

namespace App\Livewire\Shop\Cart;

use App\Actions\Cart\GetCartAction;
use App\Actions\Cart\RemoveFromCartAction;
use App\Actions\Cart\UpdateCartAction;
use App\Actions\Favorites\ToggleFavoriteAction;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.public')]
#[Title('Shopping Cart - Archive Monument')]
class Index extends Component
{
    public Cart $cart;

    public Collection $recommendations;

    public function mount(GetCartAction $getCart): void
    {
        $this->cart = $getCart->execute();
        $this->recommendations = $this->loadRecommendations();
    }

    public function updateQuantity(int $itemId, int $quantity, UpdateCartAction $updateCart): void
    {
        $cartItem = CartItem::find($itemId);
        if ($cartItem && $cartItem->cart_id === $this->cart->id) {
            $updateCart->execute($cartItem, $quantity);
            $this->cart = $this->cart->fresh('items.product');
            $this->recommendations = $this->loadRecommendations();
            $this->dispatch('cart-updated');
        }
    }

    public function removeItem(int $itemId, RemoveFromCartAction $removeFromCart): void
    {
        $cartItem = CartItem::find($itemId);
        if ($cartItem && $cartItem->cart_id === $this->cart->id) {
            $removeFromCart->execute($cartItem);
            $this->cart = $this->cart->fresh('items.product');
            $this->recommendations = $this->loadRecommendations();
            $this->dispatch('cart-updated');
        }
    }

    public function moveToFavorites(int $itemId, ToggleFavoriteAction $toggleFavorite, RemoveFromCartAction $removeFromCart): void
    {
        $cartItem = CartItem::find($itemId);
        if ($cartItem && $cartItem->cart_id === $this->cart->id) {
            $toggleFavorite->execute($cartItem->product);
            $removeFromCart->execute($cartItem);
            $this->cart = $this->cart->fresh('items.product');
            $this->recommendations = $this->loadRecommendations();
            $this->dispatch('cart-updated');
            $this->dispatch('favorites-updated');
        }
    }

    protected function loadRecommendations(): Collection
    {
        // Exclude products already in cart
        $excludeIds = $this->cart->items->pluck('product_id')->toArray();

        $picks = Product::inStock()
            ->whereNotIn('id', $excludeIds)
            ->newArrivals()
            ->latest()
            ->take(4)
            ->get();

        if ($picks->count() < 4) {
            $picks = Product::inStock()
                ->whereNotIn('id', $excludeIds)
                ->featured()
                ->take(4)
                ->get();
        }

        if ($picks->count() < 4) {
            $picks = Product::inStock()
                ->whereNotIn('id', $excludeIds)
                ->latest()
                ->take(4)
                ->get();
        }

        return $picks;
    }

    public function render()
    {
        return view('livewire.shop.cart.index');
    }
}
