<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $guarded = [];

    public function lesson()
    {
        return $this->hasOne(Lesson::class,'id','lesson_id');
    }

    public function course()
    {
        return $this->hasOneThrough(Course::class,Lesson::class,'id','id','lesson_id','course_id');
    }
}


