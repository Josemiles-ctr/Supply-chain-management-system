<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public $vendors;
    public $selectedVendor;
    public $newMessage;
    public $messages;
    public function mount() 
    {
        $this->vendors = User::where('role', 'vendor')
            ->get();
        $this->selectedVendor = $this->vendors->first();
        
        $this->messages=ChatMessage::query()->wh

    }
    public function submit(){
        if(!$this->newMessage) {
            return;
        }
        ChatMessage::create([
            'user_id' => Auth::id(),
            'vendor_id' => $this->selectedVendor->id,
            'message' => $this->newMessage,
        ]);
        $this->newMessage = '';
    }
    public function selectVendor($id){
        $this->selectedVendor = User::find($id);
    }
    public function render()
    {
        return view('livewire.chat');
    }
}