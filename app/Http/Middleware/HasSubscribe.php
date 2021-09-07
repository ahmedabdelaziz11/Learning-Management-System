<?php

namespace App\Http\Middleware;

use App\Models\Course;
use App\Models\Lesson;
use Closure;
use Illuminate\Http\Request;

class HasSubscribe
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
        $course = $request->route()->parameter('course');
        if(auth()->user()->hasSubscribe($course->id))
        {
            return $next($request);
        }
        return redirect()->route('course-preview', [$course->slug]);
    }
}
