@extends('layouts.master')

@section('css')
    <!-- Quill Theme -->
    <link type="text/css" href="{{asset('assets/css/quill.css')}}" rel="stylesheet">
    <!-- Select2 -->
    <link type="text/css" href="{{asset('assets/css/select2.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/vendor/select2/select2.min.css')}}" rel="stylesheet">
    <!-- notifiit -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection

@section('title')
edit question
@endsection       

@section('modal')

@include('teacher.questions.add_answer')

@endsection

@section('content')

@if (session()->has('addAttachment'))
<script>
    window.onload = function() {
        notif({
            msg: "attachment uploaded successfully",
            type: "success"
        })
    }
</script>
@endif

@if (session()->has('deleteAttachment'))
<script>
    window.onload = function() {
        notif({
            msg: "attachment deleted successfully",
            type: "error"
        })
    }
</script> 
@endif

<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">edit question</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{url('teacher/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        edit question
                    </li>
                </ol>
            </div>
        </div>
        <div class="row" role="tablist">
            <div class="col-auto">
                <a class="btn btn-outline-secondary" href="{{route('quizzes.edit',[$question->quizze->id])}}">back</a>
            </div>
        </div>
    </div>
</div>

<div class="page-section border-bottom-2">
    <div class="container page__container">



        <div class="row">
            <div class="col-md-12">
                <div class="page-separator">
                    <div class="page-separator__text">Question</div>
                </div>
                <form method="post" id="update_question" action="{!! route('questions.update',$question) !!}">
                    @csrf
                    {{method_field('patch')}}
                    <input type="text" name="id" value="{{$question->id}}" hidden>

                    <div class="form-group">
                        <label class="form-label">Question</label>
                        <textarea hidden id="description" name="description" value="."></textarea> 
                        <div style="height: 150px;" id="quillArea2" class="mb-0" data-toggle="quill" data-quill-placeholder="Course description">
                            {!! $question->description !!}
                        </div>
                    </div>
        
                    <div class="form-group">
                        <label class="form-label">Score</label>
                        <input type="number"  name="score"  class="form-control" min="1" value="{{$question->score}}" required>
                    </div>
                    <div class="form-group"> 
                        <button style="width: 100%" type="submit" class="btn btn-primary">update</button>  
                    </div>
                </form>

        
                <div class="page-separator">
                    <div class="page-separator__text">Answer</div>
                </div>
                    <div class="form-group">
                        <div class="row" role="tablist">
                            <div class="col-auto">
                                <button type="button" data-target="#addAnswer" data-toggle="modal" class="btn btn-outline-secondary">Add Answer</button>
                            </div>
                        </div>
                        <br>
                        @foreach ($question->answers as $answer)
                            <form method="post" action="{{ route('answers.update',$answer)}}">
                                @csrf
                                {{method_field('patch')}}
                                <input type="text" name="id" value="{{$answer->id}}" hidden>

                                <div class="item-content row">
                                    <div class="form-group col">
                                        <label class="form-label" for="select01">Answer</label>
                                        <input type="text"  name="description" value="{{$answer->description}}" class="form-control" required>
                                    </div>
                
                                    <div class="form-group col">
                                        <label class="form-label">correct</label>
                                        <input type="number"  name="correct" min="0" max="1"  value="{{$answer->correct}}"  class="form-control" required>
                                    </div>

                                    <div class="form-group col">
                                        <button type="submit" style="margin-top: 28px; width: 100%" class="btn btn-primary">
                                            update
                                        </button>
                                    </div>
                            </form>
                                    <div class="form-group col">
                                        <form action="{{ route('answers.destroy',$answer)}}" method="post">
                                            {{@method_field('delete')}}
                                            @csrf
                                            <button type="submit" style="margin-top: 28px; width: 100%" class="btn btn-danger remove-btn">
                                                delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                        @endforeach
                    </div>
        
            </div>
        </div>

    </div>
</div>

@endsection
@section('js') 

    <!-- Select2 -->
    <script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/select2.js')}}"></script>
    <!--notifiy -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <!-- Quill -->
    <script src="{{asset('assets/vendor/quill.min.js')}}"></script>
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <!--form repeater -->
    <script src="{{asset('assets/js/repeater.js')}}" type="text/javascript"></script>


    <script>
        $("#update_question").on("submit",function(){
            $("#description").val($("#quillArea2 .ql-editor").html());
        })
    </script>
    

    <script>
        /* Create Repeater */
        $("#repeater").createRepeater({
            showFirstItemToDefault: false,
        });
    </script>
@endsection
