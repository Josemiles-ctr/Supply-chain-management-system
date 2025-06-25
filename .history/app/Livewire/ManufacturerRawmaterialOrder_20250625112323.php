<?php

namespace App\Livewire;

use Livewire\Component;

class ManufacturerRawmaterialOrder extends Component
{
    public $rawMaterials = [];
    public function render()
    {
        return view('livewire.manufacturer-rawmaterial-order');
    }
}