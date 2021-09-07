@extends('layouts.admin_master')

@section('css')
    <!-- Select2 -->
    <link type="text/css" href="{{asset('assets/css/select2.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/vendor/select2/select2.min.css')}}" rel="stylesheet">
    <!-- notifiit -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection

@section('title')
admin account
@endsection       

@section('modal')


@endsection

@section('content')

@if (session()->has('update'))
<script>
    window.onload = function() {
        notif({
            msg: "your account update successfully",
            type: "success"
        })
    }
</script>
@endif


<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">account</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        account
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
        <form action="{{url('admin/update_profile')}}" method="POST">
            @csrf
            <input type="text" name="id" value="{{Auth::id()}}" hidden>
            <div class="form-group">
                <label class="form-label">your name</label>
                <input type="text" class="form-control" name="name" placeholder="Your profile name ..." value="{{auth()->user()->name}}" required>
            </div>

            <div class="form-group">
                <label class="form-label">your email</label>
                <input type="email" class="form-control" name="email" placeholder="Your email ..." value="{{auth()->user()->email}}" required >
            </div>

            <div class="form-group">
                <label class="form-label">your password</label>
                <input type="password" class="form-control" name="password" placeholder="Your new password ..." required>
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
