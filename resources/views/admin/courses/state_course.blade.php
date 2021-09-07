<div class="modal fade" id="stateCourse" tabindex="-1" role="dialog"
    aria-labelledby="stateCourse" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="stateCourse">
                    change course state  
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{!! route('admin-courses.update',1) !!}"  method="post">
                    {{ method_field('patch') }}
                    @csrf
                    <input hidden type="text" name="course_id" id="course_id" value="">

                    <div class="form-group mb-32pt">
                        <label class="form-label">state</label>
                        <select name="state" id="state" class="form-control form-control-lg" required>
                            <option value="" selected disabled>course state</option>
                            <option value="1">publish</option>
                            <option value="0">unpublish</option>
                        </select>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                <button type="submit" class="btn btn-danger">submit</button>
            </div>

        </form>
        </div>
    </div>
</div> 