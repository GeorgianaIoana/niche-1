<?php

namespace App\Actions\Favorites;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class IsFavoritedAction
{
    public function execute(Product $product): bool
    {
        $userId = Auth::id();
        $sessionId = session()->getId();

        return Favorite::query()
            ->where('product_id', $product->id)
            ->when($userId, fn ($q) => $q->where('user_id', $userId))
            ->when(!$userId, fn ($q) => $q->where('session_id', $sessionId))
            ->exists();
    }
}
