<?php

namespace App\Livewire;

use Livewire\Component;

class ManufacturerRawmaterialOrder extends Component
{
    public $rawMaterials = [];
    public function mount()
    {
        // Initialize raw materials, this could be fetched from a model or API
        $this->rawMaterials = 
    }
    public function render()
    {
        return view('livewire.manufacturer-rawmaterial-order');
    }
}