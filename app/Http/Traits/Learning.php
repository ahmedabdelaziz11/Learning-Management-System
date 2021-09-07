<?php


namespace App\Http\Traits;

use App\Models\Lesson;
use App\Models\Subscription;
use Illuminate\Support\Facades\Redis;

trait Learning {


    public function hasSubscribe($course_id)
    {
        return Subscription::where('user_id',auth()->user()->id)->where('course_id',$course_id)->exists() ;
    }


    public function completeLesson($lesson)
    {
        Redis::sadd("user:{$this->id}:course:{$lesson->course->id}",$lesson->id);
    }

    public function percentageCompletedForCourse($course)
    {
        $numberOfLessonsInCourse = $course->lessons->count();
        $numberOfCompletedLesson = $this->completeLessonsNumber($course);

        if($numberOfLessonsInCourse == 0 ) 
            return 100;

        return ($numberOfCompletedLesson / $numberOfLessonsInCourse ) * 100;
    }


    public function getCompletedLessons($course)
    {
        return Redis::smembers("user:{$this->id}:course:{$course->id}");
    } 


    public function completeLessonsNumber($course)
    {
        return count($this->getCompletedLessons($course));
    }


    public function hasStartedCourse($course)
    {
        return $this->completeLessonsNumber($course) > 0 ;
    }


    public function completedLessons($course)
    {
        $completedLessonsIds = $this->getCompletedLessons($course);

        return collect($completedLessonsIds)->map(function($lessonId){
            return Lesson::find($lessonId);
        });
    }

}
