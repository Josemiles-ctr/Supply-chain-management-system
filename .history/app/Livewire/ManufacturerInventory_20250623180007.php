<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RawMaterial;

class ManufacturerInventory extends Component
{
    public $rawmaterials;
    public $showModal = false;
    public $selected_rawmaterial;
    public $rawmaterial_name;
    public $rawmaterial_price;
    public $rawmaterial_category;
    public $rawmaterial_quantity;
    public $unit_of_measure;
    public $rawmaterial_message;
    public $total;
    
    public function mount()
    {
        $this->rawmaterials = RawMaterial::with('category')->get();
    }
    
    public function select_rawmaterial($id)
    {
        $raw = RawMaterial::with('category')->find($id);
    
        if ($raw) {
            $this->selected_rawmaterial = $raw;
            $this->rawmaterial_name = $raw->name;
            $this->rawmaterial_price = $raw->price;
            $this->rawmaterial_category = $raw->category->name;
            $this->unit_of_measure=$raw->unit_of_measure;
            $this->showModal = true;
        }
    }
    public function calculateTotal(){
        $this->total= $this->rawmaterial_quantity * $this->rawmaterial->price;
        echo "{{$this->total}}";
    }
    
    public function closeModal()
    {
        $this->showModal = false;
    }
    
    public function placeOrder()
    {
        $this->validate([
            
        ]);
    
        $this->reset(['rawmaterial_quantity', 'rawmaterial_message', 'showModal']);
        session()->flash('success', 'Order placed successfully.');
    }
    
    public function render()
    {
        return view('livewire.manufacturer-inventory');
    }
}