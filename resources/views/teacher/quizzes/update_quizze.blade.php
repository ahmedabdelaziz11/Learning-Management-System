<div class="modal fade" id="editQuizze" tabindex="-1" role="dialog"
    aria-labelledby="editQuizze" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="editQuizze">
                    update quizze  
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{!! route('quizzes.update',1) !!}"  method="post">
                    @csrf
                    {{method_field('patch')}}
                    <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Quizze title:</label>
                        <input type="text" name="title" id="title" class="form-control"  placeholder="Enter Quizze title.." required>
                    </div>
                    <input type="text" id="id" name="id" hidden>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                <button type="submit" class="btn btn-danger">submit</button>
            </div>

        </form>
        </div>
    </div>
</div> 