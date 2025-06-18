<?php

namespace App\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public $vendors;
    public function mount() 
    {
        $this->vendors = User::where('role', 'vendor')->get();
        
    }
    public function render()
    {
        return view('livewire.chat');
    }
}