<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\Teacher;
use App\Models\User;
use App\Notifications\MessageReaded;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Livewire\Component;

class Chat extends Component
{
    public $teacher_id;
    public $teacher;
    public $messageText;

    public $search = '' ;


    public function mount($id)
    {
        $this->teacher_id = $id;
        $this->teacher = Teacher::find($id);
    }


    public function render()
    {
        $messages = Message::where('user_id',auth()->user()->id)->where('teacher_id',$this->teacher_id)->get();
        $teachers = Teacher::where('name', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.chat',[
            'teacher' => $this->teacher,
            'messages' => $messages,
            'teachers' => $teachers,
        ]);
    }


    public function sendMessage()
    {
        if($this->messageText != null)
        {
            Message::create([
                'user_id' => auth()->user()->id,
                'teacher_id' => $this->teacher_id,
                'message_text' => $this->messageText,
                'sender_type' => 'user',
            ]);

            $user = Teacher::find($this->teacher_id);
            FacadesNotification::send($user,new MessageReaded(auth()->user()->id));    
        }  


        $this->reset('messageText');
    }
}
