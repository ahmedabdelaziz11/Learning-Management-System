

<div class="modal fade" id="rateCourse" tabindex="-1" role="dialog"
aria-labelledby="rateCourse" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                id="rateCourse">
                rate the course   
            </h5>
            <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="rateCourse" action="{!! route('rate_course') !!}" method="post" >
                @csrf
                <div class="row">
                    <div  style="margin: auto;">
                    <input type="text" hidden id="course_id"  name="course_id" value="{{$course->id}}">
                    <input class="star star-5" id="star-5" type="radio" value="5" name="star" /> 
                    <label class="star star-5" for="star-5"></label> 
                    <input class="star star-4" id="star-4" type="radio" value="4" name="star" /> 
                    <label class="star star-4" for="star-4"></label> 
                    <input class="star star-3" id="star-3" type="radio" value="3" name="star" /> 
                    <label class="star star-3" for="star-3"></label> 
                    <input class="star star-2" id="star-2" type="radio" value="2" name="star" />
                    <label class="star star-2" for="star-2"></label> 
                    <input class="star star-1" id="star-1" type="radio" value="1" name="star" /> 
                    <label class="star star-1" for="star-1"></label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                    <button type="submit" class="btn btn-primary">finsh</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
</div> 