<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagingController extends Controller
{
    public function index()
    {
        return view('student.messaging.index')->withTeachers(Teacher::all());
    }

    public function getchat($id=null,$notifi_id=null)
    {
        if($notifi_id != null)
        {
            $notification = DB::table('notifications')->where('id',$notifi_id)->update(['read_at'=>Carbon::now()]);
        }
        $teachers = Teacher::all();
        return view('student.messaging.chat',compact('id','teachers'));
    }
}
