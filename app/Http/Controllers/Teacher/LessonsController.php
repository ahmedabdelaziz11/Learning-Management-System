<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Requests\CreateLessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateLessonRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class LessonsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Course $course ,CreateLessonRequest $request)
    {
        $course->lessons()->create($request->all());
        session()->flash('addLesson','Created successfully');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonRequest $request)
    {
        $request->updateLesson();
        session()->flash('updateLesson','updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Course $course)
    {
        Lesson::find($request->id)->delete();
        Storage::disk('public_uploads')->deleteDirectory(Auth::id().'/'.'courses/'.$course->id.'/'.'lessons/'.$request->id);
        session()->flash('deleteLesson','updated successfully');
        return back();
    }

    public function getLessons($course_id)
    {
        $lessons = Lesson::where('course_id',$course_id)->pluck("title","id");
        return json_encode($lessons);
    }

}
