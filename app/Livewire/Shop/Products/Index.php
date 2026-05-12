<?php

namespace App\Livewire\Shop\Products;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.public')]
#[Title('Collection - Archive Monument')]
class Index extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public string $category = '';

    #[Url]
    public string $sort = 'newest';

    #[Url]
    public string $condition = '';

    #[Url]
    public string $priceRange = '';

    #[Url]
    public string $availability = '';

    // Checkbox filter arrays
    #[Url]
    public array $selectedArtists = [];

    #[Url]
    public array $selectedLabels = [];

    #[Url]
    public array $selectedGenres = [];

    // Search inputs for filter sections
    public string $artistSearch = '';
    public string $labelSearch = '';
    public string $genreSearch = '';
    public string $categorySearch = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedCategory(): void
    {
        $this->resetPage();
    }

    public function updatedSort(): void
    {
        $this->resetPage();
    }

    public function updatedCondition(): void
    {
        $this->resetPage();
    }

    public function updatedPriceRange(): void
    {
        $this->resetPage();
    }

    public function updatedAvailability(): void
    {
        $this->resetPage();
    }

    public function updatedSelectedArtists(): void
    {
        $this->resetPage();
    }

    public function updatedSelectedLabels(): void
    {
        $this->resetPage();
    }

    public function updatedSelectedGenres(): void
    {
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'category', 'sort', 'condition', 'priceRange', 'availability', 'selectedArtists', 'selectedLabels', 'selectedGenres', 'artistSearch', 'labelSearch', 'genreSearch', 'categorySearch']);
        $this->resetPage();
    }

    public function removeArtist(string $artist): void
    {
        $this->selectedArtists = array_values(array_diff($this->selectedArtists, [$artist]));
        $this->resetPage();
    }

    public function removeLabel(string $label): void
    {
        $this->selectedLabels = array_values(array_diff($this->selectedLabels, [$label]));
        $this->resetPage();
    }

    public function removeGenre(string $genre): void
    {
        $this->selectedGenres = array_values(array_diff($this->selectedGenres, [$genre]));
        $this->resetPage();
    }

    public function removeSearch(): void
    {
        $this->search = '';
        $this->resetPage();
    }

    public function hasActiveFilters(): bool
    {
        return $this->search !== ''
            || $this->category !== ''
            || $this->condition !== ''
            || $this->priceRange !== ''
            || $this->availability !== ''
            || $this->sort !== 'newest'
            || !empty($this->selectedArtists)
            || !empty($this->selectedLabels)
            || !empty($this->selectedGenres);
    }

    public function render()
    {
        $products = Product::query()
            ->with('category')
            ->when($this->search, fn ($query) => $query->where(function ($q) {
                $q->where('title', 'like', "%{$this->search}%")
                  ->orWhere('artist', 'like', "%{$this->search}%");
            }))
            ->when($this->category, fn ($query) => $query->whereHas('category', fn ($q) => $q->where('slug', $this->category)))
            ->when($this->condition, fn ($query) => $query->where('condition', $this->condition))
            ->when($this->priceRange, function ($query) {
                if (str_starts_with($this->priceRange, '>')) {
                    $min = (float) substr($this->priceRange, 1);
                    $query->where('price', '>', $min);
                } else {
                    [$min, $max] = explode('-', $this->priceRange);
                    $query->whereBetween('price', [(float) $min, (float) $max]);
                }
            })
            ->when($this->availability === 'in_stock', fn ($query) => $query->where('stock', '>', 0))
            ->when($this->availability === 'out_of_stock', fn ($query) => $query->where('stock', '<=', 0))
            ->when(!empty($this->selectedArtists), fn ($query) => $query->whereIn('artist', $this->selectedArtists))
            ->when(!empty($this->selectedLabels), fn ($query) => $query->whereIn('label', $this->selectedLabels))
            ->when(!empty($this->selectedGenres), fn ($query) => $query->whereHas('category', fn ($q) => $q->whereIn('slug', $this->selectedGenres)))
            ->when($this->sort === 'newest', fn ($query) => $query->latest())
            ->when($this->sort === 'price-low', fn ($query) => $query->orderBy('price', 'asc'))
            ->when($this->sort === 'price-high', fn ($query) => $query->orderBy('price', 'desc'))
            ->when($this->sort === 'name', fn ($query) => $query->orderBy('title', 'asc'))
            ->paginate(16);

        $categories = Category::all();

        // Get unique artists and labels for filter options
        $artists = Product::select('artist')
            ->distinct()
            ->whereNotNull('artist')
            ->orderBy('artist')
            ->pluck('artist');

        $labels = Product::select('label')
            ->distinct()
            ->whereNotNull('label')
            ->where('label', '!=', '')
            ->orderBy('label')
            ->pluck('label');

        return view('livewire.shop.products.index', [
            'products' => $products,
            'categories' => $categories,
            'artists' => $artists,
            'labels' => $labels,
        ]);
    }
}
