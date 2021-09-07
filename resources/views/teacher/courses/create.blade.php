@extends('layouts.master')
@section('css')
    <!-- Quill Theme -->
    <link type="text/css" href="{{asset('assets/css/quill.css')}}" rel="stylesheet">
    <!-- Select2 -->
    <link type="text/css" href="{{asset('assets/css/select2.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/vendor/select2/select2.min.css')}}" rel="stylesheet">
    <!-- notifiit -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('title')
Create Course
@endsection       
@section('content')


@if (session()->has('Add'))
<script>
    window.onload = function() {
        notif({
            msg: "Course Created successfully",
            type: "success"
        })
    }
</script>
@endif

@if (session()->has('delete'))
<script>
    window.onload = function() {
        notif({
            msg: "Course deleted successfully",
            type: "error"
        })
    }
</script> 
@endif

@if (session()->has('edit'))
<script>
    window.onload = function() {
        notif({
            msg: "Course Modified successfully",
            type: "success"
        })
    }
</script>
@endif



<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Create Course</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{url('teacher/courses')}}">COURSE</a></li>

                    <li class="breadcrumb-item active">

                        create Course

                    </li>

                </ol>

            </div>
        </div>

        <div class="row" role="tablist">
            <div class="col-auto">
                <a href="{{url('teacher/courses')}}" class="btn btn-outline-secondary">BACK</a>
            </div>
        </div>

    </div>
</div>


<div class="page-section border-bottom-2">
    <div class="container page__container">

        <div class="row">
            <div class="col-md-8">
                <form method="post" action="{!! route('courses.store') !!}" id="create_course" enctype="multipart/form-data">
                    @csrf

                    <div class="page-separator">
                        <div class="page-separator__text">Basic information</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Course photo</label>
                        <div class="media align-items-center">
                            <div class="media-body">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" accept=".jpg, .png, image/jpeg, image/png" id="inputGroupFile01" required>
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <small class="form-text text-danger text-muted">accepted only (jpeg,jpg,png)</a></small>
                    </div>
    
                    <label class="form-label">Course title</label>
                    <div class="form-group mb-24pt">
                        <input type="text" name="title" class="form-control form-control-lg" placeholder="Course title" value="" required>
                    </div>
    
                    <div class="form-group mb-32pt">
                        <label class="form-label">Description</label>
                        <textarea hidden id="description" name="description"></textarea> 
                        <div style="height: 150px;" id="quillArea" class="mb-0" data-toggle="quill" data-quill-placeholder="Course description">
                        </div>
                        <small class="form-text text-muted">Shortly describe this course.</small>
                    </div>

                    <div class="form-group mb-32pt">
                        <label class="form-label">CATEGORY</label>
                        <select name="category_id" id="category_id" class="form-control form-control-lg select2" required>
                            <option value="" selected disabled>course category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Please select the gategory.</small>
                    </div>

                    <button class="btn btn-primary">Create course</button>
    
                    


    

                </form>

            </div>
        </div>

    </div>
</div>

@endsection
@section('js') 
    <!-- Quill -->
    <script src="{{asset('assets/vendor/quill.min.js')}}"></script>
    <script src="{{asset('assets/js/quill.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/select2.js')}}"></script>
    <!--notifiy -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    <script>
        $("#create_course").on("submit",function(){
            $("#description").val($("#quillArea .ql-editor").html());
        })
    </script>

    <script>
        (function() {
            'use strict';

            // ENABLE sidebar menu tabs
            $('.js-sidebar-mini-tabs [data-toggle="tab"]').on('click', function(e) {
                e.preventDefault()
                $(this).tab('show')
            })

            $('.js-sidebar-mini-tabs').on('show.bs.tab', function(e) {
                $('.js-sidebar-mini-tabs > .active').removeClass('active')
                $(e.target).parent().addClass('active')
            })
        })()
    </script>
@endsection
