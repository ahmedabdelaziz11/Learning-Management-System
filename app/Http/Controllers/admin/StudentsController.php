<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class StudentsController extends Controller
{
    public function index()
    {
        return view('admin.students.index')->withStudents(User::all());
    }

    public function destroy(Request $request)
    {
        User::findOrFail($request->student_id)->delete();
        session()->flash('delete','success');
        return redirect()->back();
    }
}
