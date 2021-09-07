@extends('layouts.student_master')

@section('css')
    <!-- Select2 -->
    <link type="text/css" href="{{asset('assets/css/select2.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/vendor/select2/select2.min.css')}}" rel="stylesheet">
    <!-- notifiit -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection

@section('title')
student profile
@endsection       

@section('modal')


@endsection

@section('content')

@if (session()->has('addAttachment'))
<script>
    window.onload = function() {
        notif({
            msg: "attachment uploaded successfully",
            type: "success"
        })
    }
</script>
@endif


<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">profile</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{url('student/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        profile
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="page-section container page__container">
    <div class="page-separator">
        <div class="page-separator__text">Profile &amp; Privacy</div>
    </div>
    <div class="col-md-7 p-0">
        <form action="{{route('student_update',auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label">Your photo</label>
                <div class="media align-items-center">
                    <div  class="media-left mr-16pt">
                        @if(auth()->user()->image_url == null)
                            <span class="avatar avatar-sm mr-8pt2">
                                <span class="avatar-title rounded-circle bg-primary"><i class="material-icons">account_box</i></span>
                            </span>   
                        @else
                            <img src="{{asset(auth()->user()->image_url)}}" alt="people" width="56" class="rounded-circle" />
                        @endif
                    </div>
                    <div class="media-body">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">your name</label>
                <input type="text" class="form-control" name="name" placeholder="Your profile name ..." value="{{auth()->user()->name}}" >
            </div>

            <div class="form-group">
                <label class="form-label">About you</label>
                <textarea rows="3" class="form-control" name="about_you" placeholder="About you ...">{{auth()->user()->about_you}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
    </div>
</div>


@endsection
@section('js') 

    <!-- Select2 -->
    <script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/select2.js')}}"></script>
    <!--notifiy -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>   
@endsection
