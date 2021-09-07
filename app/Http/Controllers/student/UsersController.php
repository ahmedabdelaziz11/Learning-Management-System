<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UsersController extends Controller
{
    public function index()
    {
        $courses =  auth()->user()->mycourses->load('lessons');
        $Completed_courses_count = 0;
        $Completed_lessons_count = 0;

        $courses_name = $courses->pluck('title')->toArray();
        $completed_lessons_for_each_course = [];

        foreach($courses as $course)
        {
            $completeLessonsNumber = auth()->user()->completeLessonsNumber($course);
            $completed_lessons_for_each_course[] = $completeLessonsNumber;

            $Completed_lessons_count += $completeLessonsNumber;

            if(auth()->user()->percentageCompletedForCourse($course) == 100 )
            {
                $Completed_courses_count += 1;
            }
        }

        $chartjs = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 500, 'height' => 150])
        ->labels($courses_name)
        ->datasets([
            [
                "label" => "courses-subscribers",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $completed_lessons_for_each_course,
            ],
        ])
        ->options([]);
        return view('student.student.dashboard',compact('courses','Completed_courses_count','Completed_lessons_count','chartjs'));
    }

    public function show()
    {
        return view('student.student.profile');
    }

    public function update(Request $request,User $user)
    {
        $request->validate(['name' => 'required']);

        if($request->hasFile('image'))
        {
            $user->image_url = $this->uploadPhoto($request,$user->id);  
        }

        $user->name = $request->name;
        $user->about_you = $request->about_you;
        $user->save();  
        
        return back();
    }

    public function uploadPhoto($request,$teacher_id)
    {
        $uploadedImage = $request->image;
        $fileName = $request->name . '.' . $uploadedImage->getClientOriginalExtension();
        $image = $uploadedImage->move(public_path('students/'.auth()->user()->id), $fileName);
        
        return $image_url = 'students/' . auth()->user()->id .'/'. $fileName ;
    }

    public function showTeacherProfile(Teacher $teacher)
    {
        return view('student.teacher.profile')->withTeacher($teacher);
    }

    public function markAsReadAll()
    {
        $userUnreadNotification= auth()->user()->unreadNotifications;
        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }
    }

}
