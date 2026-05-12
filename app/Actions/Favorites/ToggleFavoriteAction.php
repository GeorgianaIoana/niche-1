<?php

namespace App\Actions\Favorites;

use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ToggleFavoriteAction
{
    public function execute(Product $product): bool
    {
        $userId = Auth::id();
        $sessionId = session()->getId();

        $query = Favorite::query()
            ->where('product_id', $product->id)
            ->when($userId, fn ($q) => $q->where('user_id', $userId))
            ->when(!$userId, fn ($q) => $q->where('session_id', $sessionId));

        $favorite = $query->first();

        if ($favorite) {
            $favorite->delete();
            return false;
        }

        Favorite::create([
            'user_id' => $userId,
            'session_id' => $userId ? null : $sessionId,
            'product_id' => $product->id,
        ]);

        return true;
    }
}
