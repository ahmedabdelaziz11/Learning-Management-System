@extends('layouts.admin_master')
@section('title')
Dashboard
@endsection       
@section('content')

<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Dashboard</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>

                    <li class="breadcrumb-item active">

                        Dashboard

                    </li>

                </ol>

            </div>
        </div>

    </div>
</div>

<div class="page-section border-bottom-2">
    <div class="container page__container">

        <div class="row">
            <div class="col-lg-4">
                <div class="card border-1 border-left-3 border-left-accent text-center mb-lg-0">
                    <div class="card-body">
                        <h4 class="h2 mb-0">{{$courses_count}}</h4>
                        <div>Courses</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-center mb-lg-0">
                    <div class="card-body">
                        <h4 class="h2 mb-0">{{$published_courses_count}}</h4>
                        <div>Published Courses</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-center mb-lg-0">
                    <div class="card-body">
                        <h4 class="h2 mb-0">{{$unpublished_courses_count}}</h4>
                        <div>Unpublished Courses</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- <div class="container page__container page-section">

    <div class="page-separator">
        <div class="page-separator__text">courses - progress</div>
    </div>
    <div class="card card-body mb-32pt">
        <div class="card-body" style="width: 100% ; height: 100%">
            {!! $chartjs->render() !!}

        </div>
    </div>


</div>

<div class="container page__container page-section">


        <div class="page-separator">
            <div class="page-separator__text">Courses</div>
        </div>



        <div class="row card-group-row">
            @forelse ($courses as $c)
                <div class="card-group-row__col col-md-6">
                    <div class="card card-group-row__card card-sm">
                        <div class="card-body d-flex align-items-center">
                            <a href="{{route('show_course',$c->id)}}" class="avatar overlay overlay--primary avatar-4by3 mr-12pt">
                                <img src="{{asset($c->image_url)}}" alt="{{$c->title}}" class="avatar-img rounded">
                                <span class="overlay__content"></span>
                            </a>
                            @php
                                $progress = auth()->user()->percentageCompletedForCourse($c) ;
                            @endphp
                            <div class="flex mr-12pt">
                                <a class="card-title" href="compact-student-take-quiz.html">{{$c->title}}</a>
                                <div class="card-subtitle text-50">{{$progress}} %</div>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <span class="lead text-headings lh-1">{{$c->lessons->count()}}</span>
                                <small class="text-50 text-uppercase text-headings">lesson</small>
                            </div>
                        </div>

                        <div class="progress rounded-0" style="height: 4px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$progress}}%;"  aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <div class="card-footer">
                            <div class="d-flex align-items-center">
                                <div class="flex mr-2">
                                    <a href="{{route('show_course',$c->id)}}" class="btn btn-light btn-sm">

                                        <i class="material-icons icon--left">refresh</i> show course

                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            @empty
                <p>no courses</p>
            @endforelse


        </div>


</div> --}}










@endsection
@section('js') 
@endsection
