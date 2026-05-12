<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    protected function subtotal(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->items->sum(fn ($item) => $item->product->price * $item->quantity),
        );
    }

    protected function formattedSubtotal(): Attribute
    {
        return Attribute::make(
            get: fn () => '$' . number_format($this->subtotal, 2),
        );
    }

    protected function itemCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->items->sum('quantity'),
        );
    }

    protected function shipping(): Attribute
    {
        return Attribute::make(
            get: function () {
                $threshold = config('themes.cart.free_shipping_threshold', 100);
                $shippingCost = config('themes.cart.shipping_cost', 8.99);
                return $this->subtotal >= $threshold ? 0 : $shippingCost;
            },
        );
    }

    protected function total(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->subtotal + $this->shipping,
        );
    }

    protected function formattedTotal(): Attribute
    {
        return Attribute::make(
            get: fn () => '$' . number_format($this->total, 2),
        );
    }

    protected function formattedShipping(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->shipping === 0 ? 'Free' : '$' . number_format($this->shipping, 2),
        );
    }
}
