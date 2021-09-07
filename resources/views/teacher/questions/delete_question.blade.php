<div class="modal fade" id="deleteQuestion" tabindex="-1" role="dialog"
    aria-labelledby="deleteQuestion" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="deleteQuestion">
                    delete question  
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{!! route('questions.destroy',1) !!}"  method="post">
                    @csrf
                    {{method_field('delete')}}
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