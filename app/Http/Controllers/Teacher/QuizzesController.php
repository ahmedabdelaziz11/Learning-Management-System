<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\LessonQuizze;
use App\Models\Quizze;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizzesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.quizzes.index')->withQuizzes(Quizze::where('teacher_id',Auth::id())->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['title' => 'required','teacher_id' => 'required']);
        Quizze::create($request->all());

        session()->flash('Add','Created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quizze  $quizze
     * @return \Illuminate\Http\Response
     */
    public function show(Quizze $quizze)
    {
        return view('teacher.quizzes.edit_quizze',compact('quizze'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quizze  $quizze
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quizze = Quizze::findOrFail($id);
        $courses = Course::all();
        return view('teacher.quizzes.edit_quizze',compact('quizze','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quizze  $quizze
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quizze $quizze)
    {
        Quizze::findOrFail($request->id)->update($request->all());
        session()->flash('update','Created successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quizze  $quizze
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Quizze::findOrFail($request->id)->delete();
        session()->flash('delete','Created successfully');
        return redirect()->back();
    }

    public function addQuizzeToLesson(Request $request)
    {
        if(LessonQuizze::where('quizze_id',$request->id)->where('lesson_id',$request->lesson)->count() == 0)
        {
            LessonQuizze::create([
                'quizze_id' => $request->id ,
                'lesson_id' => $request->lesson
            ]);
        }

        return back();
    } 
}
