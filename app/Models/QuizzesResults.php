<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizzesResults extends Model
{
    protected $guarded = [];
    protected $with = ['quizze']; 
    

    public function answers()
    {
        return $this->hasMany(QuizzesResultsAnswers::class);
    }

    public function quizze()
    {
        return $this->belongsTo(Quizze::class);
    }
}
