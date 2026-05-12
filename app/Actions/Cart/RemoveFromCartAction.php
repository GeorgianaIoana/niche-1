<?php

namespace App\Actions\Cart;

use App\Models\CartItem;

class RemoveFromCartAction
{
    public function execute(CartItem $cartItem): bool
    {
        return $cartItem->delete();
    }
}
