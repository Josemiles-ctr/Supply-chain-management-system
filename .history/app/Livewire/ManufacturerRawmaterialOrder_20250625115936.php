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
        $this->rawMaterials = RawMaterialsPurchaseOrder::with([
            'rawmaterial',
            'supplier'
        ])->get();
    }
    
    public function render()
    {
        return view('livewire.manufacturer-rawmaterial-order');
    }
}