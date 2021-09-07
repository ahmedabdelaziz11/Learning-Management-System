@extends('layouts.student_master')

@section('css')
@livewireStyles
@stop
@section('title')
browse courses
@endsection   
@section('content')



        <div class="page-section">
            <div class="container page__container">
                <div class="page-separator">
                    <div class="page-separator__text">Recommended Courses</div>
                </div>

                <div class="row card-group-row">
                @forelse($recommended as $c)
                    <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">
                        
                        <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay mdk-reveal js-mdk-reveal card-group-row__card" data-partial-height="44" data-toggle="popover" data-trigger="click">


                            <a href="{{route('show-course',$c->slug)}}" class="js-image" data-position="" data-height="100">
                                <img src="{{asset($c->image_url)}}" alt="course">
                                <span class="overlay__content align-items-start justify-content-start">
                                    <span class="overlay__action card-body d-flex align-items-center">
                                        <i class="material-icons mr-4pt">play_circle_outline</i>
                                        <span class="card-title text-white">Preview</span>
                                    </span>
                                </span>
                            </a>

                            <div class="mdk-reveal__content">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex">
                                            <a class="card-title" href="{{route('show-course',$c->slug)}}">{{$c->title}}</a>
                                            <small class="text-50 font-weight-bold mb-4pt">{{$c->teacher->name}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popoverContainer d-none">
                            <div class="media">
                                <div class="media-left mr-12pt">
                                    <img src="{{asset($c->image_url)}}" width="40" height="40" alt="Angular" class="rounded">
                                </div>
                                <div class="media-body">
                                    <div class="card-title mb-0">{{$c->title}}</div>
                                    <p class="lh-1 mb-0">
                                        <span class="text-black-50 small">with</span>
                                        <span class="text-black-50 small font-weight-bold">{{$c->teacher->name}}</span>
                                    </p>
                                </div>
                            </div>

                            <p class="my-16pt text-black-70">{!!$c->description!!}</p>


                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="d-flex align-items-center mb-4pt">
                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                        <p class="flex text-black-50 lh-1 mb-0"><small>{{$c->lessons->count()}}</small></p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="material-icons icon-16pt text-black-50 mr-4pt">assessment</span>
                                        <p class="flex text-black-50 lh-1 mb-0"><small>Beginner</small></p>
                                    </div>
                                </div>
                                <div class="col text-right">
                                    <a href="{{route('show-course',$c->slug)}}" class="btn btn-primary">Show Course</a>
                                </div>
                            </div>



                        </div>



                    </div>
                    @empty
                        <p>no recommended courses</p>
                    @endforelse
                </div> 
                <livewire:browse-courses />




            </div>
        </div>


@endsection

@section('js') 
@livewireScripts
@endsection
