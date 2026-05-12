<div class="space-y-6">
    <!-- Availability -->
    <div>
        <label class="block text-sm font-medium text-text-primary mb-2">Availability</label>
        <select wire:model.live="availability" class="input">
            <option value="">All</option>
            <option value="in_stock">In Stock</option>
            <option value="out_of_stock">Out of Stock</option>
        </select>
    </div>

    <!-- Price Range -->
    <div>
        <label class="block text-sm font-medium text-text-primary mb-2">Price</label>
        <select wire:model.live="priceRange" class="input">
            <option value="">Any Price</option>
            <option value="0-50">$0 - $50</option>
            <option value="50-100">$50 - $100</option>
            <option value="100-150">$100 - $150</option>
            <option value="150-250">$150 - $250</option>
            <option value=">250">$250+</option>
        </select>
    </div>

    <!-- Categories -->
    <div>
        <label class="block text-sm font-medium text-text-primary mb-2">Category</label>
        <select wire:model.live="category" class="input">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->slug }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Sort -->
    <div>
        <label class="block text-sm font-medium text-text-primary mb-2">Sort By</label>
        <select wire:model.live="sort" class="input">
            <option value="newest">Newest First</option>
            <option value="price-low">Price: Low to High</option>
            <option value="price-high">Price: High to Low</option>
            <option value="name">Name: A-Z</option>
        </select>
    </div>

    <!-- Clear Filters -->
    @if($this->hasActiveFilters())
        <button
            wire:click="clearFilters"
            class="text-accent hover:text-accent-hover text-sm font-medium"
        >
            Clear all filters
        </button>
    @endif
</div>
