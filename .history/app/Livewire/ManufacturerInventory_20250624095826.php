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
    public $rawmaterial_unit_of_measure
    public $rawmaterial_quantity=1;
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
            $this->rawmaterial_quantity= $raw->reorder_level;
            $this->showModal = true;
            $this->calculateTotal();
        }
        $this->calculateTotal();

    }
    public function updatedRawmaterialQuantity($value)
    {
        // Convert to number in case it comes as string
        $this->rawmaterial_quantity = (int)$value;
        $this->calculateTotal();
    }
    public function calculateTotal()
{
    $quantity = $this->rawmaterial_quantity ?? 1;
    $price = $this->rawmaterial_price ?? 0;
    $this->total = $quantity * $price;
}
    
    public function closeModal()
    {
        $this->showModal = false;
    }
    
    public function placeOrder()
    {
        $this->validate([
            
        ]);
    
        $this->reset(['rawmaterial_quantity', 'rawmaterial_message','rawmaterial_quantity', 'showModal']);
        session()->flash('success', 'Order placed successfully.');
    }
    
    public function render()
    {
        return view('livewire.manufacturer-inventory');
    }
}