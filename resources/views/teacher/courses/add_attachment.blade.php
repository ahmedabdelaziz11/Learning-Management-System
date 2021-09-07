

<div class="modal fade" id="addAttachment" tabindex="-1" role="dialog"
    aria-labelledby="addAttachment" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="addAttachment">
                    add attachment for lesson   
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="add_lesson_attachment" action="{!! route('attachments.store') !!}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" hidden id="course"  name="course" value="{{$course->id}}">
                    
                    <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Lesson :</label>
                        <select class="form-control select2" name="lesson" id="lesson"  required>
                            <option disabled selected>select lesson</option>
                            @foreach ($course->lessons as $lesson)
                                <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label">attachment</label>
                        <div class="media align-items-center">
                            <div class="media-body">
                                <div class="custom-file">
                                    <input type="file" name="attachment" class="custom-file-input" accept=".pdf,.jpg, .png, image/jpeg, image/png" required>
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <small class="form-text text-danger ">accepted only (pdf, jpeg ,.jpg , png )</a></small>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                        <button type="submit" class="btn btn-primary">finsh</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div> 