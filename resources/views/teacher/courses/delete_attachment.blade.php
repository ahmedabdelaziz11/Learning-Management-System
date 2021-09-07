<div class="modal fade" id="deleteAttachment" tabindex="-1" role="dialog"
    aria-labelledby="deleteAttachment" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="deleteAttachment">
                    delete attachment  
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{!! route('delete_file',[1,1,1]) !!}"  method="post">
                    @csrf
                    <h4>Are you sure you want to delete?</h4>
                    <input hidden type="text" name="file_name" id="file_name" value="">
                    <input hidden type="text" name="file_id" id="file_id" value="">
                    <input hidden type="text" name="lesson_id" id="lesson_id" value="">
                    <input hidden type="text" name="course_id" id="course_id"  value="{{$course->id}}">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                <button type="submit" class="btn btn-danger">submit</button>
            </div>

        </form>
        </div>
    </div>
</div> 