

<div class="modal fade" id="addVideo" tabindex="-1" role="dialog"
    aria-labelledby="addLesson" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="addLesson">
                    add video  
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="add_lesson_video" action="{!! route('add-lesson-video') !!}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">lesson video</label>
                        <div class="media align-items-center">
                            <div class="media-body">
                                <div class="custom-file">
                                    <input data-url="{!! route('add-lesson-video') !!}" type="file" name="video" class="custom-file-input" accept="video/mp4,video/x-m4v,video/*"  id="lesson_video" required>
                                    <input hidden type="text" id="lessons_id" name="lesson_id">
                                    <input type="text" hidden id="course_id"  name="course_id" value="{{$course->id}}">


                                    <label class="custom-file-label" id="video_name" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>                        
                        <small class="form-text text-danger text-muted">accepted only (mp4,x-m4v,video/*)</a></small>
                        

                    </div>

                    <div class="form-group">
                        <label class="form-label" id="uploading">uploading</label>
                        <div class="progress">
                            <div class="progress-bar" id="video_progress" role="progressbar"></div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                        <button style="display: none" type="button" class="btn btn-primary" data-dismiss="modal" >finsh</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div> 