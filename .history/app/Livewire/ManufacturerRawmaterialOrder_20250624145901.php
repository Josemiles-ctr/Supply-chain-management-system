<?php

namespace App\Livewire;

use Livewire\Component;

class ManufacturerRawmaterialOrder extends Component
{
    public $rawmaterial_purchase_orders;
    public function mount(){
        
    }
    public function getRawmaterialOrders(){
        
    }
    public function render()
    {
        return view('livewire.manufacturer-rawmaterial-order');
    }
}