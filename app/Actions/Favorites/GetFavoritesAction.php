<?php

namespace App\Actions\Favorites;

use App\Models\Favorite;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class GetFavoritesAction
{
    public function execute(): Collection
    {
        $userId = Auth::id();
        $sessionId = session()->getId();

        return Favorite::with('product.category')
            ->when($userId, fn ($query) => $query->where('user_id', $userId))
            ->when(!$userId, fn ($query) => $query->where('session_id', $sessionId))
            ->latest()
            ->get();
    }
}
