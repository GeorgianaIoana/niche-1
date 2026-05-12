<?php

namespace App\Actions\Cart;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

class AddToCartAction
{
    public function __construct(
        private GetCartAction $getCart
    ) {}

    public function execute(Product $product, int $quantity = 1): CartItem
    {
        $cart = $this->getCart->execute();
        $maxQuantity = config('themes.cart.max_quantity', 10);

        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $newQuantity = min($cartItem->quantity + $quantity, $maxQuantity);
            $cartItem->update(['quantity' => $newQuantity]);
        } else {
            $cartItem = $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => min($quantity, $maxQuantity),
            ]);
        }

        return $cartItem->fresh('product');
    }
}
