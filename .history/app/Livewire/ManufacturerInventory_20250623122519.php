<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RawMaterial;


class ManufacturerInventory extends Component
{
    public $rawmaterials;
    public $selected_rawmaterial;
    public $rawmaterial_name;
    public $rawmaterial_category;
    public $rawmaterial_price;
    public $rawmaterial_message;
    public function mount(){
        $this->rawmaterials = RawMaterial::with('category')->get();
       
    }
    public function select_rawmaterial(){
        $this->selected_rawmaterial=Rawmat
    }
    public function render()
    {
        return view('livewire.manufacturer-inventory');
    }
    
}