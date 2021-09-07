

<div class="modal fade" id="updateLesson" tabindex="-1" role="dialog"
    aria-labelledby="addLesson" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="addLesson">
                    update lesson  
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="update_lesson" action="{{ route('lessons.update',[$course->id,1]) }}">
                    @csrf
                    {{method_field('patch')}}

                    <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Lesson title:</label>
                        <input type="text" name="title" id="title" class="form-control"  placeholder="Enter lesson title.." required>
                    </div>
                    <input hidden type="text" name="id" id="id" value="">
                    <div class="form-group mb-32pt">
                        <label class="form-label">Description</label>
                        <textarea hidden id="description3" name="description"></textarea> 
                        <div style="height: 150px;" id="quillArea3" class="mb-0" data-toggle="quill" data-quill-placeholder="Course description">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">episode number :</label>
                        <input type="number" name="episode_number" id="episode_number" class="form-control"  placeholder="Enter episode number.." required>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div> 