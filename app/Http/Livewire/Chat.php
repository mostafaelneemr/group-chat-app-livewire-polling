<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;

class Chat extends Component
{
    public $messageText;

    public function render()
    {
        $messages = Message::with('user')->take(10)->orderBy('id')->get();
        return view('livewire.chat', compact('messages'));
    }

    public function sendMessage()
    {
        Message::create([
            'user_id' => auth()->user()->id,
            'message_text' => $this->messageText,
        ]);

        $this->reset('messageText');
    }


}
