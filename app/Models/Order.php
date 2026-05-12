<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

#[Fillable([
    'user_id', 'order_number', 'status',
    'subtotal', 'shipping', 'tax', 'total',
    'shipping_name', 'shipping_address_line_1', 'shipping_address_line_2',
    'shipping_city', 'shipping_state', 'shipping_postal_code', 'shipping_country', 'shipping_phone',
    'billing_name', 'billing_address_line_1', 'billing_address_line_2',
    'billing_city', 'billing_state', 'billing_postal_code', 'billing_country', 'billing_phone',
    'notes', 'shipped_at', 'delivered_at',
])]
class Order extends Model
{
    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:2',
            'shipping' => 'decimal:2',
            'tax' => 'decimal:2',
            'total' => 'decimal:2',
            'shipped_at' => 'datetime',
            'delivered_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function generateOrderNumber(): string
    {
        do {
            $number = 'ORD-' . strtoupper(Str::random(8));
        } while (self::where('order_number', $number)->exists());

        return $number;
    }

    public function getFormattedTotalAttribute(): string
    {
        return '$' . number_format($this->total, 2);
    }

    public function getFormattedSubtotalAttribute(): string
    {
        return '$' . number_format($this->subtotal, 2);
    }

    public function getFormattedShippingAttribute(): string
    {
        return $this->shipping > 0 ? '$' . number_format($this->shipping, 2) : 'Free';
    }

    public function getFormattedTaxAttribute(): string
    {
        return '$' . number_format($this->tax, 2);
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'yellow',
            'processing' => 'blue',
            'shipped' => 'purple',
            'delivered' => 'green',
            'cancelled' => 'red',
            default => 'gray',
        };
    }

    public function getShippingAddressAttribute(): string
    {
        $parts = array_filter([
            $this->shipping_name,
            $this->shipping_address_line_1,
            $this->shipping_address_line_2,
            $this->shipping_city . ', ' . $this->shipping_state . ' ' . $this->shipping_postal_code,
            $this->shipping_country,
        ]);

        return implode("\n", $parts);
    }

    public function getBillingAddressAttribute(): ?string
    {
        if (!$this->billing_name) {
            return null;
        }

        $parts = array_filter([
            $this->billing_name,
            $this->billing_address_line_1,
            $this->billing_address_line_2,
            $this->billing_city . ', ' . $this->billing_state . ' ' . $this->billing_postal_code,
            $this->billing_country,
        ]);

        return implode("\n", $parts);
    }
}
