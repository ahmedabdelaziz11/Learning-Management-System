

<div class="modal fade" id="addAnswer" tabindex="-1" role="dialog"
aria-labelledby="addAnswer" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="addAnswer">
                    add answer  
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="add_question" action="{!! route('answers.store') !!}">
                    @csrf

                    <div class="form-group mb-32pt">
                        <label class="form-label">answer</label>
                        <input type="text" class="form-control" name="description" required >
                    </div>

                    <div class="form-group">
                        <label class="form-label">Correct</label>
                        <input type="number"  name="correct"  class="form-control" min="0" max="1" value="1" required >
                    </div> 

                    <input type="text" hidden name="question_id" value="{{$question->id}}">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>    
                </form>
            </div>
        </div>
    </div>
</div> 