<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Laravel\Reverb\Events\MessageSent;

class Chat extends Component
{
    public $vendors;
    public $selectedVendor;
    public $newMessage;
    public $messages;
    public $loginId;
    public function mount() 
    {
        $this->vendors = User::whereNot('id', Auth::id())
            ->get();
        $this->selectedVendor = $this->vendors->first();
        $this->loadMessages();
        $this->loginId = Auth::id();

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
        broadcast(new MessageSent($message));
    }
    public function getListeners()
    {
        return [
            "echo-private:chat.{$this->loginId},MessageSent" => 'newChatMessageNotification',
        ];
    }
    public function newChatMessageNotification($message)
    {
        if($message['sender_id'] == $this->selectedVendor->id) {
            $messageObj= ChatMessage::find($message['id']);
            $this->messages->push($messageObj);
        }
    }
    public function selectVendor($id){
        $this->selectedVendor = User::find($id);
        $this->loadMessages();
    }
    public function loadMessages()
    {
        $this->messages=ChatMessage::query()->where(function($q){
            $q->where('sender_id', Auth::id())->where('receiver_id', $this->selectedVendor->id);
           
        })->orWhere(function($q){
            $q->where('sender_id', $this->selectedVendor->id)->where('receiver_id', Auth::id());
        })->get();
    }
    public function render()
    {
        return view('livewire.chat');
    }
}