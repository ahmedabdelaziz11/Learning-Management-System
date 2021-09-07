

<div class="modal fade" id="addQuizze" tabindex="-1" role="dialog"
aria-labelledby="addQuizze" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="addQuizze">
                    add quizze  
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post"  action="{!! route('quizzes.store') !!}">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Quizze title:</label>
                        <input type="text" name="title" id="title" class="form-control"  placeholder="Enter Quizze title.." required>
                    </div>

                    <input hidden name="teacher_id" type="text" value="{{Auth::user()->id}}">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div> 