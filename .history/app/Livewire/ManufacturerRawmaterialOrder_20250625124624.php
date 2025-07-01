<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RawMaterialsPurchaseOrder;

class ManufacturerRawmaterialOrder extends Component
{
    public $rawmaterial_orders;
    public function mount()
    {
        // Initialize raw materials, this could be fetched from a model or API
        $this->getRawmaterialPurchaseOrders();
    }
    public function getRawmaterialPurchaseOrders(){
        // Fetch raw material purchase orders from the database
        $this->rawmaterial_orders = RawMaterialsPurchaseOrder::with([
            'rawMaterial',
            'supplier'
        ])->latest()->get();
    }
    public function cancelOrder($orderId)
    {
        $order = RawMaterialsPurchaseOrder::find($orderId);
        if ($order) {
            $order->status = 'cancelled'; // Set status to cancelled
            $order->save();
            $th
        } else {
            session()->flash('error', 'Order not found.');
        }
    }
    public function render()
    {
        return view('livewire.manufacturer-rawmaterial-order');
    }
}