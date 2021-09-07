<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonVideoRequest;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;

class LessonVideoController extends Controller
{
    public function store(StoreLessonVideoRequest $request)
    {
        $request->storeVideo()->updateLesson();
        session()->flash('add_video','Update successfully');
        return true;
    }


    public function getFile($lesson_id)
    {
        $lesson = Lesson::findOrFail($lesson_id);
        return Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($lesson->video_url);
    }


    public function show($lesson_id)
    {
        return response()->file($this->getFile($lesson_id));
    }


    public function download($lesson_id)
    {
        return response()->download($this->getFile($lesson_id));
    }


    public function destroy(Request $request)
    {
        $lesson = Lesson::findOrFail($request->id);
        Storage::disk('public_uploads')->delete($lesson->video_url);

        $lesson->update(['video_name' => "" , 'video_url' => ""]);

        session()->flash('delete_video','Update successfully');
        return back();
    }
}
