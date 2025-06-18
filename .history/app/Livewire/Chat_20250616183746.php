<?php

namespace App\Livewire;

use Livewire\Component;

class Chat extends Component
{
    public $vendors;
    public function mount() 
    {
        $this->vendors = \App\Models\User::whereNot('id', Auth::0->get();

    }
    public function render()
    {
        return view('livewire.chat');
    }
}