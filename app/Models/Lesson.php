<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function course()
    {
        return $this->hasOne(course::class,'id','course_id');
    }

    public function quizzes()
    {
        return $this->belongsToMany(Quizze::class,'lesson_quizzes','lesson_id','quizze_id');
    }

    public function getNextLesson()
    {
        return $this->course->lessons()
            ->where('episode_number','>',$this->episode_number)
            ->orderBy('episode_number','asc')
            ->first();
    }

    public function getPrevLesson()
    {
        return $this->course->lessons()
            ->where('episode_number','<',$this->episode_number)
            ->orderBy('episode_number','desc')
            ->first();
    }
}
