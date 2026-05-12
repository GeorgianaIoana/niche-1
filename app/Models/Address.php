<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id', 'label', 'type', 'is_default',
    'name', 'address_line_1', 'address_line_2',
    'city', 'state', 'postal_code', 'country', 'phone',
])]
class Address extends Model
{
    protected function casts(): array
    {
        return [
            'is_default' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedAddressAttribute(): string
    {
        $parts = array_filter([
            $this->name,
            $this->address_line_1,
            $this->address_line_2,
            $this->city . ', ' . $this->state . ' ' . $this->postal_code,
            $this->country,
        ]);

        return implode("\n", $parts);
    }

    public function getSingleLineAddressAttribute(): string
    {
        $parts = array_filter([
            $this->address_line_1,
            $this->address_line_2,
            $this->city,
            $this->state,
            $this->postal_code,
        ]);

        return implode(', ', $parts);
    }
}
