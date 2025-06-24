<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RawMaterial;

class ManufacturerInventory extends Component
{
    public $rawmaterials;
    public function mount(){
        $this->rawmaterials=RawMaterial::all();
        echo "{$this->rawmaterials}}";
    }
    public function render()
    {
        return view('livewire.manufacturer-inventory');
    }
}