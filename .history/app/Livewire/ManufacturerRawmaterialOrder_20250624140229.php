<?php

namespace App\Livewire;

use Livewire\Component;

class ManufacturerRawmaterialOrder extends Component
{
    public $rawmaterial
    public function render()
    {
        return view('livewire.manufacturer-rawmaterial-order');
    }
}