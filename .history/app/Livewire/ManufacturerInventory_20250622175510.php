<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RawMaterial;


class ManufacturerInventory extends Component
{
    public $rawmaterials;
    public $category_name;
    public function mount(){
        $this->rawmaterials=RawMaterial::all();
       
    }
   
    public function render()
    {
        return view('livewire.manufacturer-inventory');
    }
}