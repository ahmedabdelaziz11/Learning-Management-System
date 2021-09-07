<?php

namespace App\Http\Requests;

use App\Models\Lesson;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StoreLessonVideoRequest extends FormRequest
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
            'course_id' => 'required',
            'lesson_id' => 'required',
            'video' => 'required|mimes:mp4,mov,ogg,qt',
        ];
    }

    public function storeVideo()
    {
        $this->lesson = Lesson::findOrFail($this->lesson_id);
        $uploadedVideo = $this->video;

        $fileName = str::slug($this->lesson->title) . '.' . $uploadedVideo->getClientOriginalExtension();
        $uploadedVideo->move(public_path('teachers/'.Auth::id().'/'.'courses/' .$this->course_id. '/' . 'lessons' .'/'. $this->lesson->id .'/'.'video'), $fileName);
        $this->video_url = Auth::id().'/'.'courses/' .$this->course_id.'/'.'lessons/'.$this->lesson->id.'/'. 'video' .'/'. $fileName ;

        return $this;
    }

    public function updateLesson()
    {
        $this->lesson->update([
            'video_name' => $this->videoName,
            'video_url' => $this->video_url,
        ]);
    }
}
