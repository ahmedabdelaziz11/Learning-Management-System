@extends('layouts.master')
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
                    <li class="breadcrumb-item"><a href="{{url('teacher/dashboard')}}">Home</a></li>

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
            <div class="col-lg-6">
                <div class="card border-1 border-left-3 border-left-accent text-center mb-lg-0">
                    <div class="card-body">
                        <h4 class="h2 mb-0">{{$courses_count}}</h4>
                        <div>Courses</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-center mb-lg-0">
                    <div class="card-body">
                        <h4 class="h2 mb-0">{{$lessons_count}}</h4>
                        <div>Lessons</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container page__container page-section">

    <div class="page-separator">
        <div class="page-separator__text">courses - Subscribers</div>
    </div>
    <div class="card card-body mb-32pt">
        <div class="card-body" style="width: 100% ; height: 100%">
            {!! $chartjs->render() !!}

        </div>
    </div>


</div>





@endsection
@section('js') 
@endsection
