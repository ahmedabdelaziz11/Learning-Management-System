<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    protected $guarded = [];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }


    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class,'subscriptions','course_id','user_id')->withPivot(['rating']);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getOrderedLessons()
    {
        return $this->lessons()->orderBy('episode_number','asc')->get();
    }

    public function getRatingAttribute()
    {
        return DB::table('subscriptions')->where('course_id',$this->attributes['id'])->sum('rating');
    }


    public function getRatingCountAttribute()
    {
        return DB::table('subscriptions')->where('course_id',$this->attributes['id'])->count();
    }

    public function scopePublished($q)
    {
        return $q->where('displayed',1);
    }

    public function scopeRecommended()
    {
        $ids = DB::table('subscriptions')
            ->Join('courses', 'subscriptions.course_id', '=', 'courses.id')
            ->select([DB::raw('avg(subscriptions.rating) as rating,course_id')])
            ->groupBy('course_id')
            ->orderBy('rating', 'desc')
            ->limit(5)
            ->pluck('course_id')
            ->toArray();
        return Course::whereIn('id',(array) $ids)->get();

    }
    
}
