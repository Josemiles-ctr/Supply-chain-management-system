<?php

namespace App\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public $vendors;
    public function mount() 
    {
        $this->vendors = \App\Models\User::where('role', 'vendor')->get();
        
    }
    public function render()
    {
        return view('livewire.chat');
    }
}