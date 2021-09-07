<?php

namespace App\Models;

use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use HasFactory,
        Notifiable,
        CanResetPassword;
    
    protected $guard = 'teacher';

    protected $fillable = ['name','email','password','image_url','about_you'];

    protected $hidden = ['password','remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
     