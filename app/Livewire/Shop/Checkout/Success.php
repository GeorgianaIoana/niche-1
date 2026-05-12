<?php

namespace App\Livewire\Shop\Checkout;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.public')]
#[Title('Order Confirmed - Archive Monument')]
class Success extends Component
{
    public string $orderNumber = '';

    public function mount(): void
    {
        // Generate a fake order number for demo purposes
        $this->orderNumber = 'AM-' . strtoupper(substr(md5(time()), 0, 8));
    }

    public function render()
    {
        return view('livewire.shop.checkout.success');
    }
}
