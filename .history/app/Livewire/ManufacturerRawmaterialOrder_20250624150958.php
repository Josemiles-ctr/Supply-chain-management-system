<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RawMaterialsPurchaseOrder;

class ManufacturerRawmaterialOrder extends Component
{
    public $rawmaterial_purchase_orders;
    
    
    public function mount(){$this->getRawmaterialPurchaseOrders();
        
    }
    public function getRawmaterialPurchaseOrders(){
        $this->rawmaterial_purchase_orders=RawMaterialsPurchaseOrder::with('getSupplierNameAttribute')->get();
    }
    public function render()
    {
        return view('livewire.manufacturer-rawmaterial-order');
    }
}