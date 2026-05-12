<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected function lineTotal(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->product->price * $this->quantity,
        );
    }

    protected function formattedLineTotal(): Attribute
    {
        return Attribute::make(
            get: fn () => '$' . number_format($this->line_total, 2),
        );
    }
}
