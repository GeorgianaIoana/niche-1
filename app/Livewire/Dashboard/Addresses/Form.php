<?php

namespace App\Livewire\Dashboard\Addresses;

use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
#[Title('Address')]
class Form extends Component
{
    public ?Address $address = null;

    public string $label = '';
    public string $type = 'both';
    public bool $is_default = false;
    public string $name = '';
    public string $address_line_1 = '';
    public string $address_line_2 = '';
    public string $city = '';
    public string $state = '';
    public string $postal_code = '';
    public string $country = 'US';
    public string $phone = '';

    protected $rules = [
        'label' => 'nullable|max:50',
        'type' => 'required|in:shipping,billing,both',
        'is_default' => 'boolean',
        'name' => 'required|max:255',
        'address_line_1' => 'required|max:255',
        'address_line_2' => 'nullable|max:255',
        'city' => 'required|max:100',
        'state' => 'required|max:100',
        'postal_code' => 'required|max:20',
        'country' => 'required|max:2',
        'phone' => 'nullable|max:20',
    ];

    public function mount(?Address $address = null): void
    {
        if ($address && $address->exists) {
            if ($address->user_id !== Auth::id()) {
                abort(403);
            }

            $this->address = $address;
            $this->label = $address->label ?? '';
            $this->type = $address->type;
            $this->is_default = $address->is_default;
            $this->name = $address->name;
            $this->address_line_1 = $address->address_line_1;
            $this->address_line_2 = $address->address_line_2 ?? '';
            $this->city = $address->city;
            $this->state = $address->state;
            $this->postal_code = $address->postal_code;
            $this->country = $address->country;
            $this->phone = $address->phone ?? '';
        }
    }

    public function save(): void
    {
        $this->validate();

        $data = [
            'user_id' => Auth::id(),
            'label' => $this->label ?: null,
            'type' => $this->type,
            'is_default' => $this->is_default,
            'name' => $this->name,
            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2 ?: null,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'country' => $this->country,
            'phone' => $this->phone ?: null,
        ];

        if ($this->is_default) {
            Address::where('user_id', Auth::id())
                ->whereIn('type', [$this->type, 'both'])
                ->update(['is_default' => false]);
        }

        if ($this->address) {
            $this->address->update($data);
        } else {
            Address::create($data);
        }

        $this->redirect(route('dashboard.addresses'), navigate: true);
    }

    public function render()
    {
        return view('livewire.dashboard.addresses.form');
    }
}
