<?php

namespace App\Actions\Auth;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Favorite;
use App\Models\User;

class MergeGuestDataAction
{
    public function execute(User $user): void
    {
        $sessionId = session()->getId();

        $this->mergeCart($user, $sessionId);
        $this->mergeFavorites($user, $sessionId);
    }

    protected function mergeCart(User $user, string $sessionId): void
    {
        $guestCart = Cart::with('items')->where('session_id', $sessionId)->whereNull('user_id')->first();

        if (!$guestCart || $guestCart->items->isEmpty()) {
            return;
        }

        $userCart = Cart::firstOrCreate(
            ['user_id' => $user->id],
            ['session_id' => null]
        );

        foreach ($guestCart->items as $guestItem) {
            $existingItem = CartItem::where('cart_id', $userCart->id)
                ->where('product_id', $guestItem->product_id)
                ->first();

            if ($existingItem) {
                $maxQuantity = config('themes.cart.max_quantity', 10);
                $newQuantity = min($existingItem->quantity + $guestItem->quantity, $maxQuantity);
                $existingItem->update(['quantity' => $newQuantity]);
            } else {
                CartItem::create([
                    'cart_id' => $userCart->id,
                    'product_id' => $guestItem->product_id,
                    'quantity' => $guestItem->quantity,
                ]);
            }
        }

        $guestCart->items()->delete();
        $guestCart->delete();
    }

    protected function mergeFavorites(User $user, string $sessionId): void
    {
        $guestFavorites = Favorite::where('session_id', $sessionId)->whereNull('user_id')->get();

        if ($guestFavorites->isEmpty()) {
            return;
        }

        $existingProductIds = Favorite::where('user_id', $user->id)->pluck('product_id')->toArray();

        foreach ($guestFavorites as $guestFavorite) {
            if (!in_array($guestFavorite->product_id, $existingProductIds)) {
                Favorite::create([
                    'user_id' => $user->id,
                    'session_id' => null,
                    'product_id' => $guestFavorite->product_id,
                ]);
            }
        }

        Favorite::where('session_id', $sessionId)->whereNull('user_id')->delete();
    }
}
