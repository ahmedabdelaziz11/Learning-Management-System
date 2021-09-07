<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        return view('admin.courses.index')->withCourses(Course::all());
    }

    public function update(Request $request)
    {
        $course = Course::findOrFail($request->course_id);
        $course->displayed = $request->state;
        $course->update();

        $this->returnSuccess("update");

    }

    public function destroy(Request $request)
    {
        Course::findOrFail($request->course_id)->delete();
        $this->returnSuccess("delete");
    }

    public function returnSuccess($type)
    {
        session()->flash($type,'success');
        return redirect()->back();
    }
}
