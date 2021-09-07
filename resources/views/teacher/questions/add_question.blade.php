

<div class="modal fade" id="addQuestion" tabindex="-1" role="dialog"
aria-labelledby="addQuestion" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="addQuestion">
                    add question  
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="add_question" action="{!! route('questions.store') !!}">
                    @csrf

                    <div class="form-group mb-32pt">
                        <label class="form-label">Question</label>
                        <textarea hidden id="description" name="description" value="."></textarea> 
                        <div style="height: 150px;" id="quillArea2" class="mb-0" data-toggle="quill" data-quill-placeholder="Course description">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Score</label>
                        <input type="number"  name="score"  class="form-control" min="1" value="1" required>
                    </div>


                    <div class="form-group">
                        <!-- Repeater Html Start -->
                        <div id="repeater">
                            <div class="clearfix"></div>
                            <!-- Repeater Items -->
                            <div class="items" data-group="answers">
                                <!-- Repeater Content -->
                                <br>
                                <div class="item-content row">
                                    <div class="form-group col">
                                        <label class="form-label" for="select01">Answer</label>
                                        <input type="text" id="inputName" data-name="description" class="form-control" required>
                                    </div>
                
                                    <div class="form-group col">
                                        <label class="form-label">correct</label>
                                        <input type="number"  data-name="correct" min="0" max="1" value="0"  class="form-control" required  >
                                    </div>
                                    <!-- Repeater Remove Btn -->
                                    <div class="repeater-remove-btn col">
                                        <button type="button" style="margin-top: 28px; width: 100%" class="btn btn-danger remove-btn">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="items" data-group="answers">
                                <!-- Repeater Content -->
                                <br>
                                <div class="item-content row">
                                    <div class="form-group col">
                                        <label class="form-label" for="select01">Answer</label>
                                        <input type="text" id="inputName" data-name="description" class="form-control">
                                    </div>
                
                                    <div class="form-group col">
                                        <label class="form-label">correct</label>
                                        <input type="number" data-name="correct" min="0" max="1" value="0" class="form-control">
                                    </div>
                                    <!-- Repeater Remove Btn -->
                                    <div class="repeater-remove-btn col">
                                        <button  type="button" style="margin-top: 28px; width: 100%" class="btn btn-danger" disabled>
                                            Remove
                                        </button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- Repeater Heading -->
                            <div>
                                <button type="button"  style="width: 100%" class="btn btn-outline-secondary repeater-add-btn">
                                    Add answer
                                </button>
                            </div>
                        </div>
                        <!-- Repeater End -->
                    </div>
                    <input type="text" hidden name="quizze_id" value="{{$quizze->id}}">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>    
                </form>
            </div>
        </div>
    </div>
</div> 