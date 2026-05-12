<?php

namespace App\Livewire\Dashboard\Favorites;

use App\Actions\Favorites\GetFavoritesAction;
use App\Models\Favorite;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
#[Title('Favorites')]
class Index extends Component
{
    public Collection $favorites;

    public function mount(GetFavoritesAction $getFavorites): void
    {
        $this->favorites = $getFavorites->execute();
    }

    #[On('favorites-updated')]
    public function refresh(GetFavoritesAction $getFavorites): void
    {
        $this->favorites = $getFavorites->execute();
    }

    public function remove(int $favoriteId, GetFavoritesAction $getFavorites): void
    {
        $userId = Auth::id();
        $sessionId = session()->getId();

        Favorite::query()
            ->where('id', $favoriteId)
            ->when($userId, fn ($q) => $q->where('user_id', $userId))
            ->when(!$userId, fn ($q) => $q->where('session_id', $sessionId))
            ->delete();

        $this->favorites = $getFavorites->execute();
        $this->dispatch('favorites-updated');
    }

    public function render()
    {
        return view('livewire.dashboard.favorites.index');
    }
}
