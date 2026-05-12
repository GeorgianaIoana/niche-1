<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist',
        'slug',
        'description',
        'archivist_note',
        'price',
        'image',
        'category_id',
        'year',
        'label',
        'condition',
        'tracklist',
        'is_featured',
        'is_new_arrival',
        'stock',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'tracklist' => 'array',
        'is_featured' => 'boolean',
        'is_new_arrival' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => '€' . number_format($this->price, 2),
        );
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeNewArrivals($query)
    {
        return $query->where('is_new_arrival', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function scopeByCategory($query, $categorySlug)
    {
        return $query->whereHas('category', function ($q) use ($categorySlug) {
            $q->where('slug', $categorySlug);
        });
    }
}
