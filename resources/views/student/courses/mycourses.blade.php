@extends('layouts.student_master')

@section('title')
my courses
@endsection   

@section('content')

<div class="container-fluid page__container">
    <div class="page-section">

        <div class="page-separator">
            <div class="page-separator__text">my courses</div>
        </div>
        @forelse ($courses as $c)
            <div class="row card-group-row mb-lg-8pt">
                <div class="col-sm-4 card-group-row__col">
                    <div class="card js-overlay card-sm overlay--primary-dodger-blue stack stack--1 card-group-row__card" data-toggle="popover" data-trigger="click">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex align-items-center">
                                <div class="flex">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded mr-12pt z-0 o-hidden">
                                            <div class="overlay">
                                                <img src="{{asset($c->image_url)}}" width="40" height="40" alt="{{$c->title}}" class="rounded">
                                                <span class="overlay__content overlay__content-transparent">
                                                    <span class="overlay__action d-flex flex-column text-center lh-1">
                                                        <small class="h6 small text-white mb-0" style="font-weight: 500;">80%</small>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="card-title">{{$c->title}}</div>
                                            <p class="flex text-black-50 lh-1 mb-0"><small>{{$c->lessons->count()}} lessons</small></p>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="ml-4pt btn btn-sm btn-link text-secondary border-1 border-secondary">Resume</a>
                            </div>
                        </div>
                    </div>

                    <div class="popoverContainer d-none">
                        <div class="media">
                            <div class="media-left mr-12pt">
                                <img src="{{asset($c->image_url)}}" width="40" height="40" alt="{{$c->title}}" class="rounded">
                            </div>
                            <div class="media-body">
                                <div class="card-title">{{$c->title}}</div>
                                <p class="text-black-50 d-flex lh-1 mb-0 small">{{$c->lessons->count()}} lessons</p>
                            </div>
                        </div>

                        <p class="mt-16pt text-black-70">{!! $c->description !!}</p>

                        <div class="my-32pt">
                            <div class="d-flex align-items-center mb-8pt justify-content-center">
                                <div class="d-flex align-items-center">
                                    <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                                    <p class="flex text-black-50 lh-1 mb-0"><small>{{$c->lessons->count()}} lessons</small></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="{{route('show-course',$c->slug)}}" class="btn btn-primary mr-8pt">Resume</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <small class="text-black-50 mr-8pt">course rate</small>
                            <div class="rating mr-8pt">
                                @php
                                $rating_count = $c->rating_count ;
                                if($rating_count == 0){
                                    $rating_precentage = 0 ;
                                }else{
                                    $rating_precentage = ($c->rating / ($rating_count * 5) ) * 100 ;
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
                        </div>
                    </div>


                </div>
            </div>
        @empty
            <p>no courses</p>
        @endforelse


    </div>
</div>
@endsection

@section('js') 
@endsection
