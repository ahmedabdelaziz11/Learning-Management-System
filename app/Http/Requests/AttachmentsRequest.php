<?php

namespace App\Http\Requests;

use App\Models\Attachment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AttachmentsRequest extends FormRequest
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
            'file_name' => 'mimes:pdf,jpeg,png,jpg',
            'lesson' => 'required',
            'course' => 'required',
        ];
    }

    public function storeAttachment()
    {
        $file = $this->file('attachment');
        $this->file_name = $file->getClientOriginalName();

        $attachments =  new Attachment();
        $attachments->file_name = $this->file_name;
        $attachments->Created_by = Auth::user()->name;
        $attachments->lesson_id = $this->lesson;
        $attachments->save();

        return $this;
    }

    public function moveAttachment()
    {
        $this->attachment->move(public_path('teachers/'.Auth::id().'/'.'courses/'.$this->course. '/' . 'lessons' .'/'. $this->lesson .'/'.'attachments'), $this->file_name);
    }
}
