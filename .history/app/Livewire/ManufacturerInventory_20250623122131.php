<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RawMaterial;


class ManufacturerInventory extends Component
{
    public $rawmaterials;
    public 
    public function mount(){
        $this->rawmaterials = RawMaterial::with('category')->get();
       
    }
    public function render()
    {
        return view('livewire.manufacturer-inventory');
    }
}