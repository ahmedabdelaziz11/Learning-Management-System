<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;





class UpdateCourseRequest extends CoursesRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:courses',
            'description' => 'required',
            'category_id' => 'required',
        ];
    }

    public function updateCourse($course)
    {
        
        if($this->hasFile('image')){
            $this->$course;
            Storage::disk('public_uploads')->delete($course->image_url);
            $course->image_url = 'teachers/'.Auth::id().'/'.'courses/'.$this->course->id . '/' . $this->uploadCourseImage()->fileName;
        }
        $course->title       = $this->title;
        $course->slug        = Str::slug($this->title);
        $course->description = $this->description;
        $course->category_id = $this->category_id;
        $course->save();
    }




}
