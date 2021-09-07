@extends('layouts.student_master')

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
take quizze
@endsection       


@section('content')



<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Take Quizze</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{url('student/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        Take Quizze
                    </li>
                    <li class="breadcrumb-item active">
                        {{$quizze->title}} 
                    </li>
                </ol>
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
                <br>
                @php
                    $questions_count = $quizze->questions->count();
                    $x = 0 ;
                @endphp
                <form action="{{route('quizze_result')}}" method="post">
                    @csrf
                    <input hidden type="text" name="quizze_id" value="{{$quizze->id}}">
                    @foreach ($quizze->questions as $q)
                        @php
                        $x++ ;
                        @endphp
                        <ul class="list-group stack mb-40pt">
                            <li class="list-group-item d-flex">
                                <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                                <div class="flex d-flex flex-column">
                                    <div class="card-title mb-4pt">Question {{$x}} of {{$questions_count}}</div>
                                    <div style="margin-top: 20px" class="card-subtitle text-70 paragraph-max mb-16pt"><h4>{!! $q->description !!}</h4></div>
                                    <div class="container page__container">
                                        <div class="page-section">
                                            <div class="page-separator">
                                                <div class="page-separator__text">Your Answer</div>
                                            </div>
                                            @foreach ($q->answers as $s)
                                                <div class="form-group">
                                                        <input name="questions[{{$q->id}}]" value="{{$s->id}}" type="radio">{{ $s->description }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </li>
                        </ul>
                    @endforeach
                    <button style="width: 100%" type="submit" class="btn btn-primary">submit results</button>
                </form>
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


    <script>
        $("#add_question").on("submit",function(){
            $("#description").val($("#quillArea2 .ql-editor").html());
        })
    </script>

@endsection
