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
quizze result
@endsection       


@section('content')



<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Quizze result</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{url('student/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        Quizze result
                    </li>
                    <li class="breadcrumb-item active">
                        {{$quizze->quizze->title}} 
                    </li>
                </ol>
            </div>
        </div>
        <div class="row" role="tablist">
            <div class="col-auto">
                <a class="btn btn-outline-secondary" href="{{url('student/dashboard')}}">dashboard</a>
            </div>
        </div>
    </div>
</div>
<br>

<div class="row card-group-row mb-lg-8pt" style="padding: 20px">
    <div class="col-lg-12 col-md-12 card-group-row__col">
        <div class="card card-group-row__card">
            <div  class="card-body d-flex align-items-center">
                <div class="flex d-flex align-items-center">
                    <div class="h2 mb-0 mr-3">{{$quizze->quizze_result}} / {{$quizze_score = \App\Models\Question::where('quizze_id',$quizze->quizze_id)->sum('score')}}</div>
                    <div class="align-items-center">
                        <div class="card-title">your score</div>
                        <p class="card-subtitle text-50 d-flex align-items-center">
                            {{($quizze->quizze_result / $quizze_score ) * 100}} %
                        </p>
                    </div>
                </div>
                <i class="material-icons icon-32pt text-20 ml-8pt">assessment</i>
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
                    $questions_count = $quizze->quizze->questions->count();
                    $x = 0 ;
                @endphp
                @foreach ($quizze->answers as $a)
                    @php
                    $x++ ;
                    @endphp
                    <ul class="list-group stack mb-40pt">
                        <li class="list-group-item d-flex">
                            <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                            <div class="flex d-flex flex-column">
                                <div class="card-title mb-4pt">Question {{$x}} of {{$questions_count}}</div>
                                <div style="margin-top: 20px" class="card-subtitle text-70 paragraph-max mb-16pt"><h4>{!! $a->question->description !!}</h4></div>
                                <div class="container page__container">
                                    <div class="page-section">
                                        <div class="page-separator">
                                            <div class="page-separator__text">Your Answer</div>
                                        </div>
                                        <div class="form-group">
                                                @if($a->correct)
                                                    <h5 class="text-success">{{$a->answer->description}}</h5>                                                        
                                                @else
                                                    <h5 class="text-danger">{{$a->answer->description}}</h5>                                                        
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                @endforeach
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
