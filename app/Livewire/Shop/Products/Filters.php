<?php

namespace App\Livewire\Shop\Products;

use App\Models\Category;
use Livewire\Component;

class Filters extends Component
{
    public string $search = '';
    public string $category = '';
    public string $sort = 'newest';
    public string $condition = '';
    public string $priceRange = '';

    public function mount(
        string $search = '',
        string $category = '',
        string $sort = 'newest',
        string $condition = '',
        string $priceRange = ''
    ): void {
        $this->search = $search;
        $this->category = $category;
        $this->sort = $sort;
        $this->condition = $condition;
        $this->priceRange = $priceRange;
    }

    public function updated($property): void
    {
        $this->dispatch('filters-updated', [
            'search' => $this->search,
            'category' => $this->category,
            'sort' => $this->sort,
            'condition' => $this->condition,
            'priceRange' => $this->priceRange,
        ]);
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'category', 'sort', 'condition', 'priceRange']);
        $this->sort = 'newest';
        $this->dispatch('filters-updated', [
            'search' => '',
            'category' => '',
            'sort' => 'newest',
            'condition' => '',
            'priceRange' => '',
        ]);
    }

    public function render()
    {
        return view('livewire.shop.products.filters', [
            'categories' => Category::all(),
        ]);
    }
}
