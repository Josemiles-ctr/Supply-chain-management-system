<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RawMaterialsPurchaseOrder;

class ManufacturerRawmaterialOrder extends Component
{
    public $rawmaterial_orders;
    public function mount() {
        $this->getRawmaterialOrders();  
    }
    public function getRawmaterialOrders(){
        $this->rawmaterial_orders=RawMaterialsPurchaseOrder::with('getSupplierNameAttribute');
    }
    public function render()
    {
        return view('livewire.manufacturer-rawmaterial-order');
    }
}