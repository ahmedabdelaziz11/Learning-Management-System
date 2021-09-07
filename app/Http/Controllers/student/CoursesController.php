<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function browseCourses()
    {
        return view('student.courses.browse_courses')
            ->withRecommended(Course::recommended());
    }


    public function subscribe(Request $request)
    {
        Subscription::create([
            'user_id' => auth()->user()->id,
            'course_id' => $request->course_id,
        ]);
        return back();
    }

    public function myCourses()
    { 
        return view('student.courses.mycourses')->withCourses(auth()->user()->mycourses->load('lessons'));
    }

    public function show(Course $course)
    {
        return view('student.courses.show_course')
            ->withCourse($course->load(
                    'lessons',
                    'lessons.attachments',
                    'lessons.quizzes',
            ));
    }

    public function preview(Course $course)
    {
        return view('student.courses.course_preview')->withCourse($course->load('lessons')) ;
    }

    public function rateCourse(Request $request)
    {
        $course = Course::findOrFail($request->course_id);
        $course->subscribers()->updateExistingPivot(auth()->user()->id,['rating' => $request->star]);
        return redirect()->back();
    }
}
