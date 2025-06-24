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

    public function mount()
    {
        $this->rawmaterials = RawMaterial::with('category')->get();
    }

    public function select_rawmaterial($id)
    {
        $this->selected_rawmaterial = RawMaterial::with('category')->find($id);

        if ($this->selected_rawmaterial) {
            $this->rawmaterial_name = $this->selected_rawmaterial->name;
            $this->rawmaterial_price = $this->selected_rawmaterial->price;
            $this->rawmaterial_category = $this->selected_rawmaterial->category?->name;
        }
        $this->showModal = "";
    }

    public function render()
    {
        return view('livewire.manufacturer-inventory');
    }
}