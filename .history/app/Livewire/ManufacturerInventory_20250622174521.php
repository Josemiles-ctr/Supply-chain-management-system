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
        $this->category_name=RawMaterial->getCategoryName();
    }
    public function getCategoryName($rwa){
        return $this->category() ? $this->category()->name : 'Unknown Category';
       }
    public function render()
    {
        return view('livewire.manufacturer-inventory');
    }
}