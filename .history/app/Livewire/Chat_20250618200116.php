<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    public $users;
    public $selectedUser;
    public $newMessage;
    public $messages;
    public function mount() 
    {   if(Auth::User()->role =='customer' || Auth::User()->role =='vendor' || Auth::User()->role =='supplier'){
        
        $this->users = User::where('role', 'manufacturer')->whereNot('id',Auth::id())->get();
    } elsei
        $this->selectedUser = $this->users->first();
        $this->loadMessages();
       

    }
    
    public function submit(){
        if(!$this->newMessage) {
            return;
        }
       $message= ChatMessage::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $this->selectedUser->id,
            'message' => $this->newMessage,
        ]);
        $this->messages->push($message);
        $this->newMessage = '';
    }
    public function selectUser($id){
        $this->selectedUser = User::find($id);
        $this->loadMessages();
    }
    public function loadMessages()
    {
        $this->messages=ChatMessage::query()->where(function($q){
            $q->where('sender_id', Auth::id())->where('receiver_id', $this->selectedUser->id);
           
        })->orWhere(function($q){
            $q->where('sender_id', $this->selectedUser->id)->where('receiver_id', Auth::id());
        })->get();
    }
    public function render()
    {
        return view('livewire.chat');
    }
}
   