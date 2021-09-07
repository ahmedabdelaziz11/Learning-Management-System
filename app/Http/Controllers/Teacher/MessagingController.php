<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class MessagingController extends Controller
{
    public function getchat($id=null,$notifi_id=null)
    {
        if($notifi_id != null)
        {
            $notification = DB::table('notifications')->where('id',$notifi_id)->update(['read_at'=>Carbon::now()]);
        }
        $students = User::all();
        return view('teacher.messaging.chat',compact('id','students'));
    }

    public function deleteChat(Request $request)
    {
        $chat_ids = Message::where('teacher_id',$request->teacher_id)->where('user_id',$request->student_id)->get(['id']);
        Message::destroy($chat_ids->toArray());
        return back();
    }
}
