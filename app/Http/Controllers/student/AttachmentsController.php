<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentsController extends Controller
{
    public function getFile($teacher_id,$course_id,$lesson_id,$file_name)
    {
        
        return Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($teacher_id.'/'.'courses/' .$course_id. '/' . 'lessons' .'/'. $lesson_id .'/'.'attachments'.'/'.$file_name);
    }

    public function viewFile(Course $course,$lesson_id,$file_name)
    {
        $teacher_id = $course->teacher->id;
        return response()->file($this->getFile($teacher_id,$course->id,$lesson_id,$file_name));
    }

    public function downloadFile(Course $course,$lesson_id,$file_name)
    {
        $teacher_id = $course->teacher->id;
        return response()->download($this->getFile($teacher_id,$course->id,$lesson_id,$file_name));
    }
}
