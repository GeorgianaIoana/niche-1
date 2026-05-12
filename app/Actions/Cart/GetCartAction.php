<?php

namespace App\Actions\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class GetCartAction
{
    public function execute(): Cart
    {
        $sessionId = session()->getId();
        $userId = Auth::id();

        $cart = Cart::with('items.product')
            ->when($userId, fn ($query) => $query->where('user_id', $userId))
            ->when(!$userId, fn ($query) => $query->where('session_id', $sessionId))
            ->first();

        if (!$cart) {
            $cart = Cart::create([
                'session_id' => $sessionId,
                'user_id' => $userId,
            ]);
            $cart->load('items.product');
        }

        return $cart;
    }
}
