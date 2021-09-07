<div class="container page__container page-section">


    <div class="page-separator">
        <div class="page-separator__text">ALL Courses</div>
    </div>

    <div class="page-separator">
        <div class="col-md-12">
            <label for="recipient-name" class="col-form-label"> search:</label>            
            <input  class="form-control" type="text" wire:model="search"/>
        </div>
    </div>



    <div class="row">
        @foreach ($courses as $course)
            <div class="col-sm-6 col-md-4 col-xl-3">
                <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary js-overlay mdk-reveal js-mdk-reveal " data-partial-height="44" data-toggle="popover" data-trigger="click">
                    <a href="{{route('courses.show' , $course->slug)}}" class="js-image" data-position="">
                        <img src="{{asset($course->image_url)}}" height="200" width="100" alt="course">
                        <span class="overlay__content align-items-start justify-content-start">
                            <span class="overlay__action card-body d-flex align-items-center">
                                <i class="material-icons mr-4pt">edit</i>
                                <span class="card-title text-white">Edit</span>
                            </span>
                        </span>
                    </a>
                    <div class="mdk-reveal__content">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex">
                                    <a class="card-title mb-4pt" href="{{route('courses.show' , $course->slug)}}">{{$course->title}}</a>
                                </div>
                                <a href="{{route('courses.show' , $course->slug)}}" class="ml-4pt material-icons text-black-20 card-course__icon-favorite">edit</a>
                            </div>
                            <div class="d-flex">
                                <div class="rating rating-24">
                                    @php
                                    $rating_count = $course->rating_count ;
                                    if($rating_count == 0)
                                    {
                                        $rating_precentage = 0;
                                    }else{
                                    $rating_precentage = ($course->rating / ($rating_count * 5) ) * 100 ;
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
                                <p style="margin-top: 25px;margin-left: 5px;">{{$rating_count}} ratings</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popoverContainer d-none">
                    <div class="media">
                        <div class="media-left mr-12pt">
                            <img src="{{asset($course->image_url)}}" width="40" height="40" alt="{{$course->title}}" class="rounded">
                        </div>
                        <div class="media-body">
                            <div class="card-title mb-0">{{$course->title}}</div>
                            <p class="lh-1">
                                <span class="text-black-50 small">with</span>
                                <span class="text-black-50 small font-weight-bold">{{Auth::user()->name}}</span>
                            </p>
                        </div>
                    </div>

                    <p class="my-16pt text-black-70">{!! $course->description !!}</p>


                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="d-flex align-items-center mb-4pt">
                                <span class="material-icons icon-16pt text-black-50 mr-4pt">access_time</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>{{$course->lessons->count()}} lessons</small></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="material-icons icon-16pt text-black-50 mr-4pt">assessment</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>Beginner</small></p>
                            </div>
                        </div>
                        <div class="col text-right">
                            <a href="{{route('courses.show' , $course->slug)}}" class="btn btn-primary">manage course</a>
                        </div>
                    </div>

                </div>
            </div> 
        @endforeach
        </div>
            <div class="row d-felx justify-content-center">
            {{ $courses->links('pagination-links') }} 
        </div>  
</div>
