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
        $to_cancel = RawMaterialsPurchaseOrder::find($id);

        if ($to_cancel) {
            $to_cancel->update([
                'status' => 'cancelled',
            ]);

            session()->flash('success', 'Order cancelled successfully.');
        } else {
            session()->flash('error', 'Cancellation Failed.');
        }

        $this->getRawmaterialPurchaseOrders();
    }

    public function render()
    {
        return view('livewire.manufacturer-rawmaterial-order');
    }
}