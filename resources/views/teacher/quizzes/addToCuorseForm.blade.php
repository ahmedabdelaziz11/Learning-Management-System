

<div class="modal fade" id="addToCourse" tabindex="-1" role="dialog"
aria-labelledby="addToCourse" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                    id="addToCourse">
                    add quizze to lesson    
                </h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="add_lesson_attachment" action="{!! route('addQuizzeToLesson') !!}" enctype="multipart/form-data">
                    @csrf

                     <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">course :</label>
                        <select class="form-control select2" name="course" id="course"  required>
                            <option disabled selected>select course</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Lesson :</label>
                        <select class="form-control select2" name="lesson" id="lesson"  required>
                            <option disabled selected>select lesson</option>
                        </select>
                    </div>

                    <input hidden type="text" name="id" id="id" value="{{$quizze->id}}">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div> 
                    
                </form>
            </div>
        </div>
    </div>
</div> 