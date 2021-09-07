@extends('layouts.student_master')

@section('title')
browse courses
@endsection   

@section('content')
<div class="page-section bg-primary">
    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
        @if($teacher->image_url == null)
        <span class="avatar avatar-sm mr-8pt2">
            <span class="avatar-title rounded-circle bg-primary"><i class="material-icons">account_box</i></span>
        </span>   
        @else
            <img src="{{asset($teacher->image_url)}}" width="104" class="mr-md-32pt mb-32pt mb-md-0" alt="instructor" />
        @endif
        <div class="flex mb-32pt mb-md-0">
            <h2 class="text-white mb-0">{{$teacher->name}}</h2>
            <p class="lead text-white-50 d-flex align-items-center">Instructor <span class="ml-16pt d-flex align-items-center"><i class="material-icons icon-16pt mr-4pt">opacity</i>{{$teacher->courses->count()}} courses</span></p>
        </div>
        <a href="{{url('student/getchat')}}/{{$teacher->id}}" class="btn btn-outline-white">message</a>
    </div>
</div>

<div class="page-section bg-white border-bottom-2">
    <div class="container-fluid page__container">
        <div class="row">
            <div class="col-md-6">
                <h4>About me</h4>
                <p>{{$teacher->about_you}}</p>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid page__container page-section">

    <div class="page-headline text-center">
        <h2>Level-up Your Career</h2>
        <p class="lead text-70 col-lg-8 mx-auto">Courses by {{$teacher->name}}</p>
    </div>



    <div class="row card-group-row mb-8pt">
        @forelse ($teacher->courses as $c)
            <div class="col-sm-6 card-group-row__col">
                <div class="card card-sm card-group-row__card">
                    <div class="card-body d-flex align-items-center">
                        <a href="{{route('show-course',$c->slug)}}" class="avatar avatar-4by3 overlay overlay--primary mr-12pt">
                            <img src="{{asset($c->image_url)}}" alt="{{$c->title}}" class="avatar-img rounded">
                            <span class="overlay__content"></span>
                        </a>
                        <div class="flex">
                            <a class="card-title mb-4pt" href="{{route('show-course',$c->slug)}}">{{$c->title}}</a>
                            <div class="d-flex align-items-center">
                                <div class="rating mr-8pt">

                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                    <span class="rating__item"><span class="material-icons">star</span></span>

                                    <span class="rating__item"><span class="material-icons">star</span></span>


                                </div>
                                <small class="text-muted">5/5</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted" style="text-align: center; ">no courses from the author</p>  
        @endforelse
    </div>

</div>
@endsection

@section('js') 
@endsection
