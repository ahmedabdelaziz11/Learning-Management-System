<?php

namespace App\Http\Middleware;

use App\Models\QuizzesResults;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TakeQuizze
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $quizze_id = $request->route()->parameter('quizze_id');
        if( QuizzesResults::where('quizze_id',$quizze_id)->exists())
        {
            return view('student.quizzes.quizze_result')
                ->withQuizze(QuizzesResults::where('quizze_id',$quizze_id)
                ->where('user_id',Auth::id())
                ->first());
        } 
        return $next($request);
    }
}
