<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public $vendors;
    public $selectedVendor;
    public function mount() 
    {
        $this->vendors = \App\Models\User::whereNot('id', Auth::id())->get();

    }
    pu
    public function render()
    {
        return view('livewire.chat');
    }
}