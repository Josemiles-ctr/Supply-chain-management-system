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
        $this->vendors = User::whereNot('id', Auth::id())->get();

    }
    public function selectVendor($id){
        $this->selectedVendor = \App\Models\User::find($id);
    }
    public function render()
    {
        return view('livewire.chat');
    }
}