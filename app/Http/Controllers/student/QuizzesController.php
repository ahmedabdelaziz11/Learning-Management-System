<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Quizze;
use App\Models\QuizzesResults;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizzesController extends Controller
{
    public function takeQuizze($quizze_id)
    {
        return view('student.quizzes.take_quizze')->withQuizze(Quizze::find($quizze_id));
    }

    public function quizzeResult(Request $request)
    {
        $answers = [];
        $quizze_score = 0;
        foreach($request->get('questions') as $question_id => $answer_id){
            $question = Question::find($question_id);
            $correct = Answer::where('id',$answer_id)->where('correct',1)->count() > 0;
            $answers[] = [
                'question_id' =>$question_id,
                'answer_id'   => $answer_id,
                'correct'     => $correct,
            ];
            if($correct)
            {
                $quizze_score += $question->score;
            }
        }

        $quizze_result = QuizzesResults::create([
            'quizze_id' => $request->quizze_id,
            'user_id'   => Auth::id(),
            'quizze_result' => $quizze_score,
        ]);

        $quizze_result->answers()->createMany($answers);

        return view('student.quizzes.quizze_result')
            ->withQuizze(QuizzesResults::where('quizze_id',$request->quizze_id)
            ->where('user_id',Auth::id())
            ->first());
    }

    public function quizzeReset(Request $request)
    {
        QuizzesResults::where('quizze_id',$request->quizze_id)->where('user_id',$request->user_id)->first()->delete();
        return back(); 
    }
}
