<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public string $query = '';
    public bool $showResults = false;

    public function updatedQuery(): void
    {
        $this->showResults = strlen($this->query) >= 2;
    }

    public function selectProduct(string $slug): void
    {
        $this->redirect(route('products.show', $slug));
    }

    public function close(): void
    {
        $this->showResults = false;
    }

    public function render()
    {
        $results = [];

        if (strlen($this->query) >= 2) {
            $results = Product::query()
                ->where('title', 'like', "%{$this->query}%")
                ->orWhere('artist', 'like', "%{$this->query}%")
                ->limit(5)
                ->get();
        }

        return view('livewire.shop.search', [
            'results' => $results,
        ]);
    }
}
