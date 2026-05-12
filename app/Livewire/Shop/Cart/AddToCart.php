<?php

namespace App\Livewire\Shop\Cart;

use App\Actions\Cart\AddToCartAction;
use App\Models\Product;
use Livewire\Component;

class AddToCart extends Component
{
    public Product $product;
    public int $quantity = 1;
    public bool $showQuantity = true;
    public string $buttonClass = 'btn-primary w-full';
    public string $buttonStyle = '';
    public string $buttonText = 'Add to Cart';
    public bool $added = false;

    public function mount(Product $product, bool $showQuantity = true, string $buttonClass = 'btn-primary w-full', string $buttonStyle = '', string $buttonText = 'Add to Cart'): void
    {
        $this->product = $product;
        $this->showQuantity = $showQuantity;
        $this->buttonClass = $buttonClass;
        $this->buttonStyle = $buttonStyle;
        $this->buttonText = $buttonText;
    }

    public function increment(): void
    {
        $maxQuantity = config('themes.cart.max_quantity', 10);
        if ($this->quantity < $maxQuantity) {
            $this->quantity++;
        }
    }

    public function decrement(): void
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart(AddToCartAction $addToCart): void
    {
        $addToCart->execute($this->product, $this->quantity);
        $this->added = true;
        $this->dispatch('cart-updated');

        // Reset after 2 seconds
        $this->js('setTimeout(() => $wire.resetAdded(), 2000)');
    }

    public function resetAdded(): void
    {
        $this->added = false;
    }

    public function render()
    {
        return view('livewire.shop.cart.add-to-cart');
    }
}
