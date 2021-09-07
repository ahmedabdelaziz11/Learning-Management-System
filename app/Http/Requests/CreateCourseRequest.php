<?php

namespace App\Http\Requests;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CreateCourseRequest extends CoursesRequest
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
            'image' => 'required|image',
            'category_id' => 'required',
        ];
    }

    public function storeCourse()
    {
        $this->course = Course::create([
            'title'       => $this->title,
            'slug'        => Str::slug($this->title),
            'description' => $this->description,
            'displayed'   => 0,
            'category_id' => $this->category_id,
            'teacher_id'  => Auth::user()->id,
        ]);

        return $this;
    }

    public function updateImageUrl()
    {
        $this->course->image_url = 'teachers/'.Auth::id().'/'.'courses/'.$this->course->id .'/'.$this->fileName;
        $this->course->save();

        session()->flash('Add','Created successfully');
        return redirect()->route('courses.show',$this->course->slug);
    }
}
