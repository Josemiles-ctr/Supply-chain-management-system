<?php

namespace App\Livewire;

use Livewire\Component;

class ManufacturerInventory extends Component
{
    public $rawmaterials;
    public function mount(){
        $this->rawmaterials=Rawaterials->all();
        console.log($this->rawmaterials);
    }
    public function render()
    {
        return view('livewire.manufacturer-inventory');
    }
}