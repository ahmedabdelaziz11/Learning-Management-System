@extends('layouts.home_master')

@section('title')
teacher login 
@endsection   

@section('content')
<div class="pt-32pt pt-sm-64pt pb-32pt">
    <div class="container page__container">

        <div class="row">
            <div style="margin:0 auto;">
                <h4>teacher login</h4>
            </div>
        </div>
        <br>
        <form method="POST" action="{{ route('save.teacher.login') }}">
            @csrf
            <input hidden type="text" name="guard" value="teacher">

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
<div class="page-separator justify-content-center m-0">
    <div class="page-separator__text">sign-up</div>
</div>
<div class="bg-body pt-32pt pb-32pt pb-md-64pt text-center">
    <div class="container page__container">
        <a href="{{url('teacher/teacher_register')}}" class="btn btn-secondary btn-block-xs">sign up</a>
    </div>
</div>
@endsection

@section('js') 
@endsection
