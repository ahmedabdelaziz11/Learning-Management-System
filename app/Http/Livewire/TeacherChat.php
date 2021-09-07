<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use App\Notifications\MessageReaded;
use Illuminate\Support\Facades\Notification as FacadesNotification;


class TeacherChat extends Component
{
    public $student_id;
    public $student;
    public $messageText;

    public $search = '' ;

    public function mount($id)
    {
        $this->student_id = $id;
        $this->student = User::find($id);
    }


    public function render()
    {
        $messages = Message::where('user_id',auth()->user()->id)->where('user_id',$this->student_id)->get();
        $students = User::where('name', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.teacher-chat',[
            'student' => $this->student,
            'messages' => $messages,
            'students' => $students
        ]);
    }


    public function sendMessage()
    {
        if($this->messageText != null)
        {
            Message::create([
                'user_id' => $this->student_id,
                'teacher_id' => auth()->user()->id,
                'message_text' => $this->messageText,
                'sender_type' => 'teacher',
            ]);
            $user = User::find($this->student_id);
            FacadesNotification::send($user,new MessageReaded(auth()->user()->id));    
        }  
        $this->reset('messageText');
    }
}
