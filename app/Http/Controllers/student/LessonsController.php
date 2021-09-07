<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Quizze;
use App\Models\QuizzesResults;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonsController extends Controller
{
    public function show_lesson(Lesson $lesson)
    {
        return view('student.lessons.show')->withLesson($lesson);
    }
}
