<?php

namespace App\Livewire;

use Livewire\Component;

class ManufacturerRawmaterialOrder extends Component
{
    public $rawMaterials = [];
    public function mount()
    {
        // Initialize raw materials, this could be fetched from a model or API
        $this->rawMaterials = [
            ['id' => 1, 'name' => 'Steel', 'price' => 100, 'unit_of_measure' => 'kg'],
            ['id' => 2, 'name' => 'Plastic', 'price' => 50, 'unit_of_measure' => 'kg'],
            ['id' => 3, 'name' => 'Glass', 'price' => 30, 'unit_of_measure' => 'kg'],
        ];
    }
    public function render()
    {
        return view('livewire.manufacturer-rawmaterial-order');
    }
}