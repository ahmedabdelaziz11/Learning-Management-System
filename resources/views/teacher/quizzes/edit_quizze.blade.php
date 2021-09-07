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
edit quizze
@endsection       

@section('modal')


@include('teacher.questions.add_question')
@include('teacher.questions.delete_question')
@include('teacher.quizzes.addToCuorseForm')

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
                <h2 class="mb-0">Edit Quizze</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{url('teacher/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        Edit Quizze
                    </li>
                </ol>
            </div>
        </div>
        <div class="row" role="tablist">
            <div class="col-auto">
                <a class="btn btn-outline-secondary" href="{{url('teacher/quizzes')}}">back</a>
            </div>
        </div>
    </div>
</div>

<div class="page-section border-bottom-2">
    <div class="container-fluid page__container">
        <div class="row align-items-start">
            <div class="col-md-8">

                <div class="page-separator">
                    <div class="page-separator__text">Questions</div>
                </div>
                <div class="text-center">
                    <a style="width: 100%" data-target="#addQuestion" data-toggle="modal" class="btn btn-outline-secondary">add question</a>
                </div>
                <br>
                @php
                    $questions_count = $quizze->questions->count();
                    $x = 0 ;
                @endphp
                @foreach ($quizze->questions as $q)
                    @php
                    $x++ ;
                    @endphp
                    <ul class="list-group stack mb-40pt">
                        <li class="list-group-item d-flex">
                            <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                            <div class="flex d-flex flex-column">
                                <div class="card-title mb-4pt">Question {{$x}} of {{$questions_count}}</div>
                                <div class="card-subtitle text-70 paragraph-max mb-16pt">{!! $q->description !!}</div>
                                <div>
                                    <div>
                                        <select class="chip chip-light d-inline-flex align-items-center" required>
                                            <option value="" selected disabled>answers</option>
                                            @foreach ($q->answers as $s)
                                                <option value="{{ $s->id }}" disabled>{{ $s->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_horiz</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('questions.edit',$q)}}" class="dropdown-item">Edit Question</a>
                                    <div class="dropdown-divider"></div>
                                    <a data-toggle="modal" data-target="#deleteQuestion" data-id="{{$q->id}}" class="dropdown-item text-danger">Delete Question</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                @endforeach
            </div>
            <div class="col-md-4">


                <br>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-0">
                            <label class="form-label">Add to lesson</label>
                            <div style="width: 100%">
                            <button style="width: 100%" type="button" data-toggle="modal" data-target="#addToCourse" class="btn btn-primary">add to lesson</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>






@endsection
@section('js') 
    <!-- Quill -->
    <script src="{{asset('assets/vendor/quill.min.js')}}"></script>
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/select2.js')}}"></script>
    <!--notifiy -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <!--form repeater -->
    <script src="{{asset('assets/js/repeater.js')}}" type="text/javascript"></script>


    <script>
        $("#add_question").on("submit",function(){
            $("#description").val($("#quillArea2 .ql-editor").html());
        })
    </script>

    <script>
        /* Create Repeater */
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });
    </script>

    <script>
        $('#deleteQuestion').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script> 

    <script>
        $(document).ready(function() {
            $('select[name="course"]').on('change', function() {
                var CourseId = $(this).val();
                if (CourseId) {
                    $.ajax({
                        url: "{{ URL::to('teacher/get_lessons') }}/" + CourseId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="lesson"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="lesson"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

@endsection
