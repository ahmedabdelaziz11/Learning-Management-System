<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthorizedToViewLesson
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
        $lesson = $request->route()->parameter('lesson');
        if(auth()->user()->hasSubscribe($lesson->course->id))
        {
            auth()->user()->completeLesson($lesson);
            return $next($request);
        }
        return abort(404);
    }
}
