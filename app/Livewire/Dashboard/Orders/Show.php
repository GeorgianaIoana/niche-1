<?php

namespace App\Livewire\Dashboard\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
#[Title('Order Details')]
class Show extends Component
{
    public Order $order;

    public function mount(Order $order): void
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $this->order = $order->load('items');
    }

    public function render()
    {
        return view('livewire.dashboard.orders.show');
    }
}
