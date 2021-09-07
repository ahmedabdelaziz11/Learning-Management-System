<div class="modal fade" id="deletevideo" tabindex="-1" role="dialog"
    aria-labelledby="addLesson" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="addLesson">
                    delete video  
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{!! route('delete-lesson-video') !!}"  method="post">
                    @csrf
                    <h4>Are you sure you want to delete?</h4>
                    <input hidden type="text" name="id" id="id" value="">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                <button type="submit" class="btn btn-danger">submit</button>
            </div>

        </form>
        </div>
    </div>
</div> 