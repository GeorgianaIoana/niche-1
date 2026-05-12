<?php

namespace App\Livewire\Shop\Products;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.public')]
class Show extends Component
{
    public Product $product;

    public function mount(Product $product): void
    {
        $this->product = $product->load('category');
    }

    public function render()
    {
        $relatedProducts = Product::query()
            ->where('category_id', $this->product->category_id)
            ->where('id', '!=', $this->product->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('livewire.shop.products.show', [
            'relatedProducts' => $relatedProducts,
        ])->title($this->product->title . ' by ' . $this->product->artist . ' - Archive Monument');
    }
}
