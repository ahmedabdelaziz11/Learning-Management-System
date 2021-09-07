<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Course;

class TeachersController extends Controller
{
    
    use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function register()
    {
        return view('teacher.teacher.register');
    }

    
    public function login()
    {
        return auth('teacher')->check() ? redirect()->intended('teacher/dashboard') : view('teacher.teacher.login');
    }

    public function checkLogin(LoginRequest $request)
    {
        if(Auth::guard('teacher')->attempt(['email' => $request->email , 'password' => $request->password]))
        {
            return redirect()->intended('teacher/dashboard');
        }
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function index()
    {
        $courses = Course::where('teacher_id',Auth::user()->id)->with('subscribers','lessons')->get();
        $courses_count = $courses->count();
        $lessons_count = 0;
        $courses_subscribers = [] ;
        $courses_name = $courses->pluck('title')->toArray();

        foreach($courses as $course)
        {
            $s = $course->subscribers->count();
            $courses_subscribers[] = $s;
            $lessons_count += $course->lessons->count();
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
                'data' => $courses_subscribers,
            ],
        ])
        ->options([]);

        return view('teacher.teacher.dashboard',compact('courses_count','lessons_count','chartjs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('teacher.teacher.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate(['name' => 'required']);

        if($request->hasFile('image'))
        {
            $teacher->image_url = $this->uploadPhoto($request,$teacher->id);  
        }

        $teacher->name = $request->name;
        $teacher->about_you = $request->about_you;
        $teacher->save();  
        
        return back();
    }

    public function uploadPhoto($request,$teacher_id)
    {
        $uploadedImage = $request->image;
        $fileName = $request->name . '.' . $uploadedImage->getClientOriginalExtension();
        $image = $uploadedImage->move(public_path('teachers/'.$teacher_id.'/'.'photo/'), $fileName);
        
        return $image_url = 'teachers/'.$teacher_id.'/'.'photo/'. $fileName ;
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
