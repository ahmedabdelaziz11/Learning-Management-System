@extends('layouts.master')

@section('css')
@livewireStyles
@stop

@section('title')
courses
@endsection       
@section('content')

<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Courses</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{url('teacher/dashboard')}}">Home</a></li>

                    <li class="breadcrumb-item active">

                        Courses

                    </li>

                </ol>

            </div>
        </div>

        <div class="row" role="tablist">
            <div class="col-auto">
                <a href="{{url('teacher/courses/create')}}" class="btn btn-outline-secondary">Add Course</a>
            </div>
        </div>

    </div>
</div>

{{-- resourse/views/livewire/courses --}}
<livewire:courses />



@endsection

@section('js') 
@livewireScripts
@endsection
