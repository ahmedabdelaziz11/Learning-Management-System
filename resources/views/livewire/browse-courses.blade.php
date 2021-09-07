<div class="page-separator">
    <div class="page-separator__text">All Courses</div>
</div>

<div class="page-separator">
    <div class="col-md-12">
        <label for="recipient-name" class="col-form-label"> search:</label>            
        <input  class="form-control"  wire:model="search">
    </div>
</div>

<div class="row card-group-row">
    @forelse ($courses as $c)
        <div class="col-md-6 col-lg-4 col-xl-3 card-group-row__col">
            <div class="card card-sm card--elevated p-relative o-hidden overlay overlay--primary-dodger-blue js-overlay card-group-row__card">

                <a href="{{route('show-course',$c->id)}}" class="card-img-top js-image" data-position="" data-height="140">
                    <img src="{{asset($c->image_url)}}" height="150" alt="course">
                    <span class="overlay__content">
                        <span class="overlay__action d-flex flex-column text-center">
                            <i class="material-icons icon-32pt">play_circle_outline</i>
                            <span class="card-title text-white">Preview</span>
                        </span>
                    </span>
                </a>

                <div class="card-body flex">
                    <div class="d-flex">
                        <div class="flex">
                            <a class="card-title" href="#">{{$c->title}}</a>
                            <small class="text-50 font-weight-bold mb-4pt">{{$c->teacher->name}}</small>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="rating rating-24">
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
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-between">
                        <div class="col-auto d-flex align-items-center">
                            <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                            <p class="flex text-black-50 lh-1 mb-0"><small>{{$c->lessons->count()}} lessons</small></p>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            @if(auth()->user()->hasSubscribe($c->id))
                                <button style="margin-top: 5px" type="button" class="btn btn-success">subscribed</button>
                            @else
                                <form action="{{route('subscribe')}}" method="post">
                                    @csrf
                                        <input type="text" hidden name="course_id" value="{{$c->id}}">
                                        <button style="margin-top: 5px" type="submit" class="btn btn-primary">subscribe</button>
                                </form>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            <div class="popoverContainer d-none">
                <div class="media">
                    <div class="media-left mr-12pt">
                        <img src="{{asset($c->image_url)}}" width="40" height="40" alt="{{$c->title}}" class="rounded">
                    </div>
                    <div class="media-body">
                        <div class="card-title mb-0">{{$c->title}}</div>
                        <p class="lh-1 mb-0">
                            <span class="text-black-50 small">with</span>
                            <span class="text-black-50 small font-weight-bold">{{$c->teacher->name}}</span>
                        </p>
                    </div>
                </div>
                <p class="my-16pt text-black-70">{!! $c->description !!}</p>


                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="d-flex align-items-center mb-4pt">
                            <span class="material-icons icon-16pt text-black-50 mr-4pt">play_circle_outline</span>
                            <p class="flex text-black-50 lh-1 mb-0"><small>{{$c->lessons->count()}} lessons</small></p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="material-icons icon-16pt text-black-50 mr-4pt">assessment</span>
                            <p class="flex text-black-50 lh-1 mb-0"><small>Beginner</small></p>
                        </div>

                    </div>
                    <div class="col text-right">
                        <a class="btn btn-primary"
                        data-toggle="modal"
                        data-effect="effect-scale"
                        data-id="{{ $c->id }}" 
                        data-target="#subscribe" title="subscribe">
                        subscribe</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>no courses</p>
    @endforelse


 
</div>
<div style="margin:0 auto ; padding-bottom: 10px;" class="row justify-content-center">
        {{ $courses->links('pagination-links') }} 
</div> 
