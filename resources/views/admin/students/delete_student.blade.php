<div class="modal fade" id="deleteStudent" tabindex="-1" role="dialog"
    aria-labelledby="deleteStudent" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="deleteStudent">
                    delete student  
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{!! route('admin-students.destroy',1) !!}"  method="post">
                    {{ method_field('delete') }}
                    @csrf
                    <h4>Are you sure you want to delete?</h4>
                    <input hidden type="text" name="student_id" id="student_id" value="">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                <button type="submit" class="btn btn-danger">submit</button>
            </div>

        </form>
        </div>
    </div>
</div> 