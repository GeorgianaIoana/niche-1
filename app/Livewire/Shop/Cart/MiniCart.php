<?php

namespace App\Livewire\Shop\Cart;

use App\Actions\Cart\GetCartAction;
use App\Actions\Cart\RemoveFromCartAction;
use App\Models\Cart;
use App\Models\CartItem;
use Livewire\Attributes\On;
use Livewire\Component;

class MiniCart extends Component
{
    public Cart $cart;
    public bool $open = false;

    public function mount(GetCartAction $getCart): void
    {
        $this->cart = $getCart->execute();
    }

    #[On('cart-updated')]
    public function refreshCart(GetCartAction $getCart): void
    {
        $this->cart = $getCart->execute();
    }

    public function toggle(): void
    {
        $this->open = !$this->open;
    }

    public function close(): void
    {
        $this->open = false;
    }

    public function removeItem(int $itemId, RemoveFromCartAction $removeFromCart): void
    {
        $cartItem = CartItem::find($itemId);
        if ($cartItem && $cartItem->cart_id === $this->cart->id) {
            $removeFromCart->execute($cartItem);
            $this->cart = $this->cart->fresh('items.product');
        }
    }

    public function render()
    {
        return view('livewire.shop.cart.mini-cart');
    }
}
