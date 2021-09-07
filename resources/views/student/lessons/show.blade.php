@extends('layouts.student_master')

@section('title')
browse courses
@endsection   

@section('content')


<div class="navbar navbar-light border-0 navbar-expand-sm" style="white-space: nowrap;">
    <div class="container page__container flex-column flex-sm-row">
        <nav class="nav navbar-nav">
            <div class="nav-item py-16pt py-sm-0">
                <div class="media flex-nowrap">
                    <div class="media-left mr-16pt">
                        <a href="{{route('show-course',$lesson->course->slug)}}"><img src="{{asset($lesson->course->image_url)}}" width="40" alt="{{$lesson->course->title}}" class="rounded"></a>
                    </div>
                    <div class="media-body d-flex flex-column">
                        <a href="compact-student-take-course.html" class="card-title">{{$lesson->course->title}}</a>
                        <div class="d-flex">
                            <span class="text-50 small font-weight-bold mr-8pt">{{$lesson->course->teacher->name}}</span>
                            <span class="text-50 small">{{$lesson->course->teacher->about_you}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <ul class="nav navbar-nav ml-sm-auto align-items-center align-items-sm-end d-none d-lg-flex">
            <li class="nav-item active ml-sm-16pt">
                <a href="#" class="nav-link">Video</a>
            </li>
            <li class="nav-item">
                @if($lesson->attachments->count() > 0 )
                    <a href="" class="nav-link">attachments</a>
                @endif
            </li>
            <li class="nav-item">
                @if($lesson->quizzes->count() > 0)
                    <a href="" class="nav-link">quizze</a>
                @endif
            </li>
        </ul>
    </div>
</div>
<div class="bg-primary pb-lg-64pt py-32pt">
    <div class="container page__container">
        <div class="js-player bg-primary embed-responsive embed-responsive-16by9 mb-32pt">
            <div class="player embed-responsive-item">
                <div class="player__content">
                    <div class="player__image" style="--player-image: url(assets/images/illustration/player.svg)"></div>
                    <a href="" class="player__play bg-primary">
                        <span class="material-icons">play_arrow</span>
                    </a>
                </div>
                <div class="player__embed">
                    <iframe class="embed-responsive-item" src="{{asset('teachers/'.$lesson->video_url)}}" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap align-items-end mb-16pt">


            <h1 class="text-white flex m-0">{{$lesson->title}}</h1>
            {{-- <p class="h1 text-white-50 font-weight-light m-0">50:13</p> --}}
        </div>

        

        <p class="hero__lead measure-hero-lead text-white-50 mb-24pt">{!! $lesson->description !!}</p>

        @if($lesson->getPrevLesson() != null)
            <a href="{{route('show-lesson',$lesson->getPrevLesson()->id)}}" class="btn btn-white">previous lesson</a>
        @endif 

        @if($lesson->getNextLesson() != null)
            <a href="{{route('show-lesson',$lesson->getNextLesson()->id)}}" class="btn btn-white" style="float: right">next lesson</a>
        @endif
    </div>
</div>
<div class="navbar navbar-expand-sm navbar-light bg-white border-bottom-2 navbar-list p-0 m-0 align-items-center">
    <div class="container page__container">
        <ul class="nav navbar-nav flex align-items-sm-center">
            <li class="nav-item navbar-list__item">
                <div class="media align-items-center">
                    <span class="media-left mr-16pt">
                        <img src="{{asset($lesson->course->teacher->image_url)}}" width="40" alt="instructor" class="rounded-circle">
                    </span>
                    <div class="media-body">
                        <a class="card-title m-0" href="{{url('student/teacher/profile',$lesson->course->teacher->name)}}">{{$lesson->course->teacher->name}}</a>
                        <p class="text-50 lh-1 mb-0">Instructor</p>
                    </div>
                </div>
            </li>
            <li class="nav-item navbar-list__item">
                <i class="material-icons text-muted icon--left">assessment</i>
                Beginner 
            </li>
            
        </ul>
    </div>
</div>







@endsection

@section('js') 
@endsection
