<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        return view('admin.teachers.index')->withTeachers(Teacher::all());
    }

    public function destroy(Request $request)
    {
        Teacher::findOrFail($request->teacher_id)->delete();
        session()->flash('delete','success');
        return redirect()->back();
    }
}
