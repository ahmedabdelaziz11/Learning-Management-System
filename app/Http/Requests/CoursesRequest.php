<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CoursesRequest extends FormRequest
{

    public function uploadCourseImage()
    {
        $uploadedImage = $this->image;

        $this->fileName = str::slug($this->title) . '.' . $uploadedImage->getClientOriginalExtension();

        $image = $uploadedImage->move(public_path('teachers/'.Auth::id().'/'.'courses/'.$this->course->id), $this->fileName);

        return $this;
    }
    

}
