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
    public function select_rawmaterial($id){
        foreach($this->rawmaterials as $rwma)
        $this->selected_rawmaterial=Rawmaterials::find($id)->with('category');
        $this->rawmaterial_name=$this->selected_raw_material->name;
        $this->rawmaterial_price=$this->
    }
    public function render()
    {
        return view('livewire.manufacturer-inventory');
    }
    
}