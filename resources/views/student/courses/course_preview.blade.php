@extends('layouts.student_master')

@section('title')
course preview
@endsection   

@section('content')
<div class="mdk-box bg-primary js-mdk-box mb-0" data-effects="blend-background">
    <div class="mdk-box__content">
        <div class="hero py-64pt text-center text-sm-left">
            <div class="container page__container">
                <h1 class="text-white">{{$course->title}}</h1>
                <p class="lead text-white-50 measure-hero-lead mb-24pt">{!! $course->description !!}</p>
            </div>
        </div>
    </div>
</div>

<div class="navbar navbar-expand-sm navbar-light bg-white border-bottom-2 navbar-list p-0 m-0 align-items-center">
    <div class="container page__container">
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
                    @php
                    $rating_count = $course->rating_count ;
                    if($course->rating_count == 0){
                        $rating_precentage = 0 ;
                    }else{
                        $rating_precentage = ($course->rating / ($course->rating_count * 5) ) * 100 ;
                    }
                    @endphp
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

<div class="page-section border-bottom-2">
    <div class="container page__container">

        <div class="page-separator">
            <div class="page-separator__text">Table of Contents</div>
        </div>
        <div class="row mb-0">
            <div class="col-lg-7">


                <div class="accordion js-accordion accordion--boxed list-group-flush" id="parent">

                    @forelse ($course->lessons as $l)
                        <div class="accordion__item">
                            <a href="#" class="accordion__toggle collapsed" data-toggle="collapse" data-target="#course-toc-{{$loop->iteration}}" data-parent="#parent">
                                <span class="flex">{{$l->title}}</span>
                                <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                            </a>
                            <div class="accordion__menu collapse" id="course-toc-{{$loop->iteration}}">
                                <div class="accordion__menu-link">
                                    <p>{!! $l->description !!}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted" style="text-align: center; ">no lessons yet </p>                       
                    @endforelse
                </div>

            </div>
            <div class="col-lg-5 justify-content-center">


                <div class="card">
                    <div class="card-body py-16pt text-center">
                        <span class="icon-holder icon-holder--outline-secondary rounded-circle d-inline-flex mb-8pt">
                            <i class="material-icons">timer</i>
                        </span>
                        <h4 class="card-title"><strong>Subscribe to the course</strong></h4>
                        <p class="card-subtitle text-70 mb-24pt">Get access to all videos and resource in the course</p>
                        <form action="{{route('subscribe')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" hidden name="course_id" value="{{$course->id}}">
                                <button type="submit" class="btn btn-accent mb-8pt">subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

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

                                            @php
                                            $rating_count = $tc->rating_count ;
                                            if($tc->rating_count == 0){
                                                $rating_precentage = 0 ;
                                            }else{
                                                $rating_precentage = ($tc->rating / ($tc->rating_count * 5) ) * 100 ;
                                            }
                                            @endphp
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
                        <a href="{{url('student/teacher/profile',$course->teacher->id)}}" class="btn btn-outline-secondary">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js') 
@endsection
