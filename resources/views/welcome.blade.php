@extends('layouts.home_master')

@section('title')
Home 
@endsection   

@section('content')
<div class="mdk-box mdk-box--bg-primary bg-dark js-mdk-box mb-0" data-effects="parallax-background blend-background">
    <div class="mdk-box__bg">
        <div class="mdk-box__bg-front" style="background-image: url(assets/images/photodune-4161018-group-of-students-m.jpg);"></div>
    </div>
    <div class="mdk-box__content justify-content-center">
        <div class="hero container page__container text-center py-112pt">
            <h1 class="text-white text-shadow">Edu-Course</h1>
            <p class="lead measure-hero-lead mx-auto text-white text-shadow mb-48pt">Business, Technology and Creative Skills taught by industry experts. Explore a wide range of skills with our professional tutorials.</p>
            {{-- <a href="mini-secondary-courses.html" class="btn btn-lg btn-white btn--raised mb-16pt">Browse Courses</a> --}}
            @if(!auth()->guard('user')->check())
                <p class="mb-0"><a href="teacher/login" class="text-white text-shadow"><strong>Are you a teacher?</strong></a></p>
            @endif
        </div>
    </div>
</div>

<div class="bg-white border-bottom-2 py-16pt ">
    <div class="container page__container">
        <div class="row align-items-center">
            <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                <div class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                    <i class="material-icons text-white">subscriptions</i>
                </div>
                <div class="flex">
                    <div class="card-title mb-4pt">{{DB::table('courses')->count()}}+ Courses</div>
                    <p class="card-subtitle text-black-70">Explore a wide range of skills.</p>
                </div>
            </div>
            <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                <div class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                    <i class="material-icons text-white">verified_user</i>
                </div>
                <div class="flex">
                    <div class="card-title mb-4pt">By Industry Experts</div>
                    <p class="card-subtitle text-black-70">Professional development from the best people.</p>
                </div>
            </div>
            <div class="d-flex col-md align-items-center">
                <div class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                    <i class="material-icons text-white">update</i>
                </div>
                <div class="flex">
                    <div class="card-title mb-4pt">Unlimited Access</div>
                    <p class="card-subtitle text-black-70">Unlock Library and learn any topic with one subscription.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js') 
@endsection
