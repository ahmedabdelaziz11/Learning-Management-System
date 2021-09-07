<?php

namespace App\Http\Controllers\Teacher;

use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttachmentsRequest;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Auth;

class AttachmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        $attachments = Attachment::where('Created_by',auth()->user()->name)->with('lesson','course')->get();
        return view('teacher.attachments.manage_attachment',compact('attachments','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttachmentsRequest $request)
    {
        $request->storeAttachment()->moveAttachment();       
        session()->flash('addAttachment', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $file = Attachment::findOrFail($request->file_id);
        $file->delete();
        Storage::disk('public_uploads')->delete(Auth::id().'/'.'courses/' .$request->course_id. '/' . 'lessons' .'/'. $request->lesson_id .'/'.'attachments'.'/'.$request->file_name);
        session()->flash('deleteAttachment', 'deleted successfully');
        return back();
    }


    public function getFile($course_id,$lesson_id,$file_name)
    {
        
        return Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix(Auth::id().'/'.'courses/' .$course_id. '/' . 'lessons' .'/'. $lesson_id .'/'.'attachments'.'/'.$file_name);
    }

    public function viewFile($course_id,$lesson_id,$file_name)
    {
        return response()->file($this->getFile($course_id,$lesson_id,$file_name));
    }

    public function downloadFile($course_id,$lesson_id,$file_name)
    {
        return response()->download($this->getFile($course_id,$lesson_id,$file_name));
    }
}
