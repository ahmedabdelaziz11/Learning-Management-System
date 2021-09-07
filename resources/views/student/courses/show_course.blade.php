@extends('layouts.student_master')
@section('css')
<style>

    div.stars {
        width: 360px;
        display: inline-block;
        text-align: center;
           
    }
    
    .mt-200 {
        margin-top: 100px
    }
    
    input.star {
        display: none
    }
    
    label.star {
        float: right;
        padding: 12px;
        font-size: 35px;
        color: #4A148C;
        transition: all .2s
    }
    
    input.star:checked~label.star:before {
        content: '★';
        color: #FD4;
        transition: all .25s
    }
    
    input.star-5:checked~label.star:before {
        color: #FE7;
        text-shadow: 0 0 20px #952
    }
    
    input.star-1:checked~label.star:before {
        color: #F62
    }
    
    label.star:hover {
        transform: rotate(-15deg) scale(1.3)
    }
    
    label.star:before {
        content: '★';
        font-family: FontAwesome
    }
    
    </style>
@endsection
@section('title')
show courses
@endsection   

@section('modal')
    @include('student.courses.rate_course_form')
@endsection

@section('content')

 {{-- course info  --}}
<div class="mdk-box bg-primary mdk-box--bg-gradient-primary2 js-mdk-box mb-0" data-effects="blend-background">
    <div class="mdk-box__content">
        <div class="hero py-64pt text-center text-sm-left">
            <div class="container-fluid page__container">
                <h1 class="text-white">{{$course->title}}</h1>
                <p class="lead text-white-50 measure-hero-lead mb-24pt">{!! $course->description !!}</p>
                <button type="button"  data-toggle="modal" data-target="#rateCourse" class="btn btn-white">Rate course</button>
                <a href="{{url('student/mycourses/')}}" class="btn btn-white">back</a>
            </div>
        </div>

        @php
            $rating_count = $course->rating_count ;
            $rating_precentage = ($rating_count / ($course->rating_count * 5) ) * 100 ;
        @endphp

        <div class="navbar navbar-expand-sm navbar-light bg-white border-bottom-2 navbar-list p-0 m-0 align-items-center">
            <div class="container-fluid page__container">
                <ul class="nav navbar-nav flex align-items-sm-center">
                    <li class="nav-item navbar-list__item">
                        <div class="media align-items-center">
                            <span class="media-left mr-16pt">
                                @if($course->teacher->image_url == null)
                                <span class="avatar avatar-sm mr-8pt2">
                                    <span class="avatar-title rounded-circle bg-primary"><i class="material-icons">account_box</i></span>
                                </span>   
                                @else
                                    <img src="{{asset($course->teacher->image_url)}}" width="104" class="rounded-circle" alt="instructor" />
                                @endif
                            </span>
                            <div class="media-body">
                                <a class="card-title m-0" href="{{url('student/teacher/profile',$course->teacher->id)}}">{{$course->teacher->name}}</a>
                                <p class="text-50 lh-1 mb-0">Instructor</p>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item navbar-list__item">
                        <i class="material-icons text-muted icon--left">schedule</i>
                        {{$course->lessons->count()}} lessons
                    </li>
                    <li class="nav-item navbar-list__item">
                        <i class="material-icons text-muted icon--left">assessment</i>
                        Beginner
                    </li>
                    <li class="nav-item ml-sm-auto text-sm-center flex-column navbar-list__item">
                        <div class="rating rating-24">
                            @if ($rating_precentage == 0 )
                                <div class="rating__item"><i class="material-icons">star_border</i></div>
                                <div class="rating__item"><i class="material-icons">star_border</i></div>
                                <div class="rating__item"><i class="material-icons">star_border</i></div>
                                <div class="rating__item"><i class="material-icons">star_border</i></div>
                                <div class="rating__item"><i class="material-icons">star_border</i></div>
                            @endif
                            @if ($rating_precentage <= 20 && $rating_precentage > 0 )
                                <div class="rating__item"><i class="material-icons">star</i></div>
                                <div class="rating__item"><i class="material-icons">star_border</i></div>
                                <div class="rating__item"><i class="material-icons">star_border</i></div>
                                <div class="rating__item"><i class="material-icons">star_border</i></div>
                                <div class="rating__item"><i class="material-icons">star_border</i></div>
                            @endif
                            @if ($rating_precentage > 20 && $rating_precentage <= 40)
                            <div class="rating__item"><i class="material-icons">star</i></div>
                            <div class="rating__item"><i class="material-icons">star</i></div>
                            <div class="rating__item"><i class="material-icons">star_border</i></div>
                            <div class="rating__item"><i class="material-icons">star_border</i></div>
                            <div class="rating__item"><i class="material-icons">star_border</i></div>
                            @endif
                            @if ($rating_precentage > 40 && $rating_precentage <= 60)
                            <div class="rating__item"><i class="material-icons">star</i></div>
                            <div class="rating__item"><i class="material-icons">star</i></div>
                            <div class="rating__item"><i class="material-icons">star</i></div>
                            <div class="rating__item"><i class="material-icons">star_border</i></div>
                            <div class="rating__item"><i class="material-icons">star_border</i></div>
                            @endif
                            @if ($rating_precentage > 60 && $rating_precentage <= 80)
                            <div class="rating__item"><i class="material-icons">star</i></div>
                            <div class="rating__item"><i class="material-icons">star</i></div>
                            <div class="rating__item"><i class="material-icons">star</i></div>
                            <div class="rating__item"><i class="material-icons">star</i></div>
                            <div class="rating__item"><i class="material-icons">star_border</i></div>
                            @endif
                            @if ($rating_precentage > 80 && $rating_precentage >= 81)
                            <div class="rating__item"><i class="material-icons">star</i></div>
                            <div class="rating__item"><i class="material-icons">star</i></div>
                            <div class="rating__item"><i class="material-icons">star</i></div>
                            <div class="rating__item"><i class="material-icons">star</i></div>
                            <div class="rating__item"><i class="material-icons">star</i></div>
                            @endif
                        </div>
                        <p class="lh-1 mb-0"><small class="text-muted">{{$rating_count}} ratings</small></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="row">
        <div class="col-lg-7">
            <div class="border-left-2 page-section pl-32pt">
                @forelse ($course->lessons as $l)
                    <div class="d-flex align-items-center page-num-container">
                        <div class="page-num">{{$loop->iteration}}</div>
                        <h4>{{$l->title}}</h4>
                    </div>
                    <p class="text-70 mb-24pt">{!! $l->description !!}</p>

                    <div class="card mb-0">
                        <ul class="accordion accordion--boxed js-accordion mb-0" id="toc-{{$loop->iteration}}">
                            <li class="accordion__item">
                                <a class="accordion__toggle" data-toggle="collapse" data-parent="#toc-{{$loop->iteration}}" href="#toc-content-{{$loop->iteration}}">
                                    <span class="flex">content</span>
                                    <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                </a>
                                <div class="accordion__menu">
                                    <ul class="list-unstyled collapse" id="toc-content-{{$loop->iteration}}">
                                        <li class="accordion__menu-link">
                                            <span class="material-icons icon-16pt icon--left text-body">play_circle_outline</span>
                                            <div class="flex">{{$l->video_name}}</div>
                                        </li>
                                        @foreach ($l->attachments as $a)
                                            <li class="accordion__menu-link">
                                                    <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                                                    <div class="flex">{{Str::substr($a->file_name,0,10)}}</div>
                                                <div class="d-flex">
                
                                                    <a class="btn btn-outline-success btn-sm"
                                                    href="{{ url('student/view_file') }}/{{$course->id}}/{{ $l->id }}/{{ $a->file_name }}"
                                                    role="button"><i class="fas fa-eye"></i>&nbsp;
                                                    show</a>
                
                                                    <a class="btn btn-outline-info btn-sm"
                                                    href="{{ url('student/download_file') }}/{{$course->id}}/{{ $l->id }}/{{ $a->file_name }}"
                                                    role="button"><i
                                                        class="fas fa-download"></i>&nbsp;
                                                    download</a>
                                                </div>            
                                            </li>
                                        @endforeach

                                        @forelse ($l->quizzes as $q)
                                            <li class="accordion__menu-link">
                                                <span class="material-icons icon-16pt icon--left text-50">hourglass_empty</span>
                                                <a class="flex" href="{{route('take-quizze',$q->id)}}">Quiz: {{$q->title}}</a>
                                            </li>
                                        @empty
                                            <li class="accordion__menu-link">
                                                <span class="material-icons icon-16pt icon--left text-50">hourglass_empty</span>
                                                <div class="flex">Quiz: no quizzes</div>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                @empty
                    <p>no lessons </p>
                @endforelse
            </div>
        </div>
        <div class="col-lg-5 page-nav">
            <div class="page-section">
                <div class="page-nav__content">
                    <div class="page-separator">
                        <div class="page-separator__text">Table of contents</div>
                    </div>
                    <!-- <h4 class="mb-16pt">Table of contents</h4> -->
                </div>
                <nav class="nav page-nav__menu">
                    @forelse ($course->lessons as $l)
                        <a class="nav-link active" href="{{route('show-lesson',$l->id)}}">{{$l->title}}</a>
                    @empty
                        <p class="nav-link active"> no lessons yet</p>
                    @endforelse

                </nav>
            </div>
        </div>
    </div>
</div>


<div class="page-section bg-white border-bottom-2">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-24pt mb-md-0">
                <h4>About the author</h4>
                <p class="text-70 mb-24pt">{{$course->teacher->about_you}}</p>

                <div class="page-separator">
                    <div class="page-separator__text bg-white">More from the author</div>
                </div>

                @php
                    $x = 0;
                @endphp
                @foreach ($course->teacher->courses as $tc)
                    @php
                        $x ++ ;
                    @endphp
                    @if($tc->id != $course->id)
                        <div class="card card-sm mb-8pt">
                            <div class="card-body d-flex align-items-center">
                                <a href="#" class="avatar avatar-4by3 mr-12pt">
                                    <img src="{{asset($tc->image_url)}}" alt="{{$tc->title}}" class="avatar-img rounded">
                                </a>
                                <div class="flex">
                                    <a class="card-title mb-4pt" href="boxed-course.html">{{$tc->title}}</a>
                                    <div class="d-flex align-items-center">
                                        <div class="rating mr-8pt">

                                            <span class="rating__item"><span class="material-icons">star</span></span>

                                            <span class="rating__item"><span class="material-icons">star</span></span>

                                            <span class="rating__item"><span class="material-icons">star</span></span>


                                            <span class="rating__item"><span class="material-icons">star_border</span></span>

                                            <span class="rating__item"><span class="material-icons">star_border</span></span>

                                        </div>
                                        <small class="text-muted">3/5</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                @if($x <= 1)
                    <p class="text-muted" style="text-align: center; ">no more courses from the author</p>
                @endif
            </div>
            <div class="col-md-5 pt-sm-32pt pt-md-0 d-flex flex-column align-items-center justify-content-start">
                <div class="text-center">
                    <p class="mb-16pt">
                        <img src="{{asset($course->teacher->image_url)}}" alt="guy-6" class="rounded-circle" width="64">
                    </p>
                    <h4 class="m-0">{{$course->teacher->name}}</h4>
                    <p class="lh-1">
                        <small class="text-muted">{{$course->teacher->about_you}}</small>
                    </p>
                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-start">
                        <a href="{{url('student/getchat')}}/{{$course->teacher->id}}" class="btn btn-outline-primary mb-16pt mb-sm-0 mr-sm-16pt">message</a>
                        <a href="{{url('student/teacher/profile',$course->teacher->name)}}" class="btn btn-outline-secondary">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js') 

<script>
    var logID = 'log',
    log = $('<div id="'+logID+'"></div>');
    $('body').append(log);
    $('[type*="radio"]').change(function () {
        var me = $(this);
        log.html(me.attr('value'));
    });
</script>
@endsection
