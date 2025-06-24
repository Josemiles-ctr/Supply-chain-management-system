<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RawMaterialsPurchaseOrder;

class ManufacturerRawmaterialOrder extends Component
{
    public $rawmaterial_purchase_orders;
    
    
    public function mount(){
        $this->getRawmaterialPurchaseOrders();
        
    }
    public function getRawmaterialPurchaseOrders(){
        $this->rawmaterial_purchase_orders=RawMaterialsPurchaseOrder::with(['supplier','rawmaterial'])->latest()->get();
    }
    public function cancelOrder($id)
{
    $to_cancel = RawMaterialsPurchaseOrder::findOrFail($id);
    
    // Add validation to only cancel pending orders
    if ($to_cancel->status !== 'pending') {
        session()->flash('error', 'Only pending orders can be cancelled.');
        return;
    }

    $to_cancel->update([
        'status' => 'cancelled',
    ]);

    session()->flash('success', 'Order cancelled successfully.');
    $this->getRawmaterialPurchaseOrders(); // Refresh the data
}

    public function render()
    {
        return view('livewire.manufacturer-rawmaterial-order');
    }
}