<?php

namespace App\Livewire;

use Livewire\Component;

class ManufacturerInventory extends Component
{
    public $rawmaterial;
    public function mount(){
        $this->rawmaterials=Rawmaterials->all();
        
    }
    public function render()
    {
        return view('livewire.manufacturer-inventory');
    }
}