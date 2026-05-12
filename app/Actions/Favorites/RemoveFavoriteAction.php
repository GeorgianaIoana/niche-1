<?php

namespace App\Actions\Favorites;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class RemoveFavoriteAction
{
    public function execute(Product $product): void
    {
        $userId = Auth::id();
        $sessionId = session()->getId();

        Favorite::query()
            ->where('product_id', $product->id)
            ->when($userId, fn ($q) => $q->where('user_id', $userId))
            ->when(!$userId, fn ($q) => $q->where('session_id', $sessionId))
            ->delete();
    }
}
