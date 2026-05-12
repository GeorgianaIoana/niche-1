<?php

namespace App\Actions\Cart;

use App\Models\CartItem;

class UpdateCartAction
{
    public function execute(CartItem $cartItem, int $quantity): ?CartItem
    {
        if ($quantity <= 0) {
            $cartItem->delete();
            return null;
        }

        $maxQuantity = config('themes.cart.max_quantity', 10);
        $cartItem->update(['quantity' => min($quantity, $maxQuantity)]);

        return $cartItem->fresh('product');
    }
}
