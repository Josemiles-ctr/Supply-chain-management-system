<?php

namespace App\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public $vendors;
    public function () : Returntype {
        
    }
    public function render()
    {
        return view('livewire.chat');
    }
}