<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RawMaterialsPurchaseOrder;

class ManufacturerRawmaterialOrder extends Component
{
    public $rawMaterial_orders = [];
    public function mount()
    {
        // Initialize raw materials, this could be fetched from a model or API
        $this->getRawmaterialPurchaseOrders();
    }
    public function getRawmaterialPurchaseOrders(){
        // Fetch raw material purchase orders from the database
        $this->rawMaterial_orders = RawMaterialsPurchaseOrder::with([
            'rawMaterial',
            'supplier'
        ])->get();
    }
    public function cancelOrder($orderId)
    {
        // Logic to cancel a raw material purchase order
        $order = RawMaterialsPurchaseOrder::find($orderId);
        if ($order) {
            $order->status = 'canceled'; // Set status to canceled
            $order->save();
        } else {
            session()->flash('error', 'Order not found.');
        }
    }
    public function render()
    {
        return view('livewire.manufacturer-rawmaterial-order');
    }
}