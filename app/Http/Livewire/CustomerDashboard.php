<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;
use App\Models\Customer;

class CustomerDashboard extends Component
{
    public $ordersCount;
    public $inventoryCount;
    public $recentOrders;

    public function mount()
    {
        $customer = Auth::guard('customer')->user(); // Use the correct guard if needed
        $this->ordersCount = $customer ? $customer->orders()->count() : 0;
        $this->inventoryCount = Inventory::count();
    
        //$this->recentOrders = $customer ? $customer->orders()->latest()->take(5)->get() : collect();
    }

    public function render()
    {
        return view('livewire.pages.customer.dashboard');
    }
}


