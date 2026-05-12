<?php

namespace App\Livewire\Dashboard;

use App\Models\Order;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
#[Title('Dashboard')]
class Index extends Component
{
    public function render()
    {
        $user = Auth::user();

        $stats = [
            'total_orders' => Order::where('user_id', $user->id)->count(),
            'pending_orders' => Order::where('user_id', $user->id)->where('status', 'pending')->count(),
            'total_spent' => Order::where('user_id', $user->id)->whereIn('status', ['processing', 'shipped', 'delivered'])->sum('total'),
            'favorites_count' => $user->favorites()->count(),
        ];

        $recentOrders = Order::where('user_id', $user->id)
            ->with('items')
            ->latest()
            ->take(5)
            ->get();

        return view('livewire.dashboard.index', [
            'user' => $user,
            'stats' => $stats,
            'recentOrders' => $recentOrders,
        ]);
    }
}
