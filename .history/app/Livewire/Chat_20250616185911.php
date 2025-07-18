<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public $vendors;
    public $selectedVendor;
    public function mount() 
    {
        $this->vendors = User::where('');
        $this->selectedVendor = $this->vendors->first();

    }
    public function selectUser($id){
        $this->selectedVendor = User::find($id);
    }
    public function render()
    {
        return view('livewire.chat');
    }
}