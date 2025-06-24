<?php

namespace App\Livewire;

use Livewire\Component;

class ManufacturerRawmaterialOrder extends Component
{
    public $rawmaterial_orders;
    public function mount() {
        $this->getRawmaterialOrders();  
    }
    public function getRawmaterialOrders(){
        $th
    }
    public function render()
    {
        return view('livewire.manufacturer-rawmaterial-order');
    }
}