<?php

namespace App\Livewire\Dashboard\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard')]
#[Title('Orders')]
class Index extends Component
{
    use WithPagination;

    #[Url]
    public string $status = '';

    public function updatedStatus(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('items')
            ->when($this->status, fn ($query) => $query->where('status', $this->status))
            ->latest()
            ->paginate(10);

        return view('livewire.dashboard.orders.index', [
            'orders' => $orders,
        ]);
    }
}
