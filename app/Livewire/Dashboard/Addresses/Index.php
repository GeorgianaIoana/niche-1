<?php

namespace App\Livewire\Dashboard\Addresses;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
#[Title('Addresses')]
class Index extends Component
{
    public function setDefault(int $addressId): void
    {
        $address = Address::where('user_id', Auth::id())->findOrFail($addressId);

        // Remove default from other addresses of same type
        Address::where('user_id', Auth::id())
            ->where('id', '!=', $addressId)
            ->whereIn('type', [$address->type, 'both'])
            ->update(['is_default' => false]);

        $address->update(['is_default' => true]);
    }

    public function delete(int $addressId): void
    {
        Address::where('user_id', Auth::id())->where('id', $addressId)->delete();
    }

    public function render()
    {
        $addresses = Address::where('user_id', Auth::id())
            ->orderByDesc('is_default')
            ->orderBy('created_at')
            ->get();

        return view('livewire.dashboard.addresses.index', [
            'addresses' => $addresses,
        ]);
    }
}
