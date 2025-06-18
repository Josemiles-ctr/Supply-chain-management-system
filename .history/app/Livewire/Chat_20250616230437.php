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
        $this
        
        $this->messages=ChatMessage::query()->where(function($q){
            $q->where('sender_id', Auth::id())->where('receiver_id', $this->selectedVendor->id);
           
        })->orWhere(function($q){
            $q->where('sender_id', $this->selectedVendor->id)->where('receiver_id', Auth::id());
        })->latest()->get();

    }
    public function submit(){
        if(!$this->newMessage) {
            return;
        }
       $message= ChatMessage::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $this->selectedVendor->id,
            'message' => $this->newMessage,
        ]);
        $this->messages->push($message);
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