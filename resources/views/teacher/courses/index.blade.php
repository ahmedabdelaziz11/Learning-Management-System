@extends('layouts.master')
@section('css')
    <!-- Quill Theme -->
    <link type="text/css" href="{{asset('assets/css/quill.css')}}" rel="stylesheet">
    <!-- Select2 -->
    <link type="text/css" href="{{asset('assets/css/select2.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/vendor/select2/select2.min.css')}}" rel="stylesheet">
    <!-- notifiit -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <style>
        .file-field.big .file-path-wrapper {
        height: 3.2rem; }
        .file-field.big .file-path-wrapper .file-path {
        height: 3rem; }
    </style>
@endsection
@section('title')
Create Course
@endsection 

@section('modal')

    @include('teacher.lessons.add_lesson')
    @include('teacher.courses.add_attachment')
    @include('teacher.courses.delete_attachment')
    @include('teacher.lessons.update_lesson')
    @include('teacher.lessons.delete_lesson')
    @include('teacher.videos.add_video')
    @include('teacher.videos.delete_video')
    @include('teacher.courses.delete_course')

@endsection
@section('content')

<!-- notify -->
<div>

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

    @if (session()->has('addLesson'))
    <script>
        window.onload = function() {
            notif({
                msg: "Lesson Created successfully",
                type: "success"
            })
        }
    </script>
    @endif

    @if (session()->has('add_video'))
    <script>
        window.onload = function() {
            notif({
                msg: "video uploaded successeflly",
                type: "success"
            })
        }
    </script>
    @endif

    @if (session()->has('delete_video'))
    <script>
        window.onload = function() {
            notif({
                msg: "Video deleted successfully",
                type: "error"
            })
        }
    </script> 
    @endif

    @if (session()->has('deleteAttachment'))
    <script>
        window.onload = function() {
            notif({
                msg: "attachment deleted successfully",
                type: "error"
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

    @if (session()->has('deleteLesson'))
    <script>
        window.onload = function() {
            notif({
                msg: "lesson deleted successfully",
                type: "error"
            })
        }
    </script> 
    @endif

    @if (session()->has('updateLesson'))
    <script>
        window.onload = function() {
            notif({
                msg: "lesson Modified successfully",
                type: "success"
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
</div>


<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Mangae Course</h2>

                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{url('teacher/courses')}}">COURSES</a></li>

                    <li class="breadcrumb-item active">

                        {{$course->title}}

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
    <div class="container-fluid page__container">

        <div class="row">

            <div class="col-md-8">

                <form action="{{route('courses.update',$course->slug)}}" method="POST" id="update_course" enctype="multipart/form-data">
                @csrf
                {{ method_field('patch') }}
                <div class="page-separator">
                    <div class="page-separator__text">Basic information</div>
                </div>


                <!-- Course title -->
                <div class="form-group mb-24pt">
                    <label class="form-label">Course title</label>
                    <input type="text" name="title" class="form-control form-control-lg" placeholder="Course title" value="{{$course->title}}">
                </div>

                <!-- Description -->
                <div class="form-group mb-32pt">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" hidden name="description" rows="3" id="description" placeholder="Course description"></textarea>
                    <div style="height: 150px;" class="mb-0" data-toggle="quill" id="quillArea" data-quill-placeholder="Course description">
                        {!! $course->description !!}
                    </div>
                    <small class="form-text text-muted">Shortly describe this course.</small>
                </div>

                <!-- lessons -->
                <div class="page-separator" style="display: block">
                    <div class="page-separator__text">Lessons</div>
                </div>
                <div class="accordion js-accordion accordion--boxed mb-24pt" >
                    <button type="button"  data-toggle="modal" data-target="#addLesson" class="btn btn-outline-secondary mb-24pt mb-sm-0">Add Lesson</button>
                </div>
                <div class="accordion js-accordion accordion--boxed mb-24pt" id="parent">
                    @php
                        $counter = 0 ;
                    @endphp
                    @foreach ($course->lessons as $l)
                    @php
                        $counter ++;
                    @endphp
                    <div class="accordion__item">
                        <a href="#" class="accordion__toggle collapsed" data-toggle="collapse" data-target="#course-toc-{{$counter}}" data-parent="#parent">
                            <span class="flex">{{$l->title}}</span>
                            <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                        </a>
                        @if($l->video_url == null)
                    
                            <div class="accordion__menu collapse" id="course-toc-{{$counter}}">
                                <div class="accordion__menu-link">
                                    <button type="button"  style="width: 100%" data-lessons_id="{{$l->id}}" data-toggle="modal" data-target="#addVideo" class="btn btn-outline-secondary mb-24pt mb-sm-0">Add Lesson video</button>
                                </div>
                            </div>
                        @else
                            <div class="accordion__menu collapse" id="course-toc-{{$counter}}">
                                <div class="accordion__menu-link">
                                    <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                                    <a style="width: 50%" class="flex" href="boxed-student-lesson.html">{{$l->video_name}}</a>
                                    <span style="width: 30%" class="text-muted"></span>

                                    <a class="btn btn-outline-success btn-sm"
                                    href="{{ url('teacher/view_video') }}/{{ $l->id }}"
                                    role="button"><i class="fas fa-eye"></i>&nbsp;
                                    show</a>

                                    <a class="btn btn-outline-info btn-sm"
                                    href="{{ url('teacher/download_video') }}/{{ $l->id }}"
                                    role="button"><i
                                        class="fas fa-download"></i>&nbsp;
                                    download</a>

                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                    data-toggle="modal"
                                    data-effect="effect-scale"
                                    data-id="{{ $l->id }}" 
                                    data-target="#deletevideo" title="delete">
                                    delete video</button>
                                </div>
                            </div>
                        @endif
                        @foreach ($l->attachments as $a)
                            <div class="accordion__menu collapse" id="course-toc-{{$counter}}">
                                <div class="accordion__menu-link">
                                    <i class="material-icons text-70 icon-16pt icon--left">drag_handle</i>
                                    <a class="flex" href="boxed-student-lesson.html">{{$a->file_name}}</a>

                                    <a class="btn btn-outline-success btn-sm"
                                    href="{{ url('teacher/view_file') }}/{{$course->id}}/{{ $l->id }}/{{ $a->file_name }}"
                                    role="button"><i class="fas fa-eye"></i>&nbsp;
                                    show</a>

                                    <a class="btn btn-outline-info btn-sm"
                                    href="{{ url('teacher/download_file') }}/{{$course->id}}/{{ $l->id }}/{{ $a->file_name }}"
                                    role="button"><i
                                        class="fas fa-download"></i>&nbsp;
                                    download</a>


                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                    data-toggle="modal"
                                    data-file_name="{{ $a->file_name }}"
                                    data-file_id="{{ $a->id }}"
                                    data-lesson_id="{{ $l->id }}"
                                    data-target="#deleteAttachment">delete</button>


                                </div>
                            </div>
                        @endforeach
                        

                            <!-- update lesson -->
                            <div class="accordion__menu collapse" id="course-toc-{{$counter}}">
                                <div class="accordion__menu-link">
                                    <button type="button"
                                    style="width: 100%" 
                                    data-id="{{$l->id}}" data-title="{{$l->title}}" data-description="{{$l->description}}" data-episode_number="{{$l->episode_number}}"
                                    data-toggle="modal" data-target="#updateLesson" 
                                    class="btn btn-primary">Update Lesson</button>
                                </div>
                            </div>
                            <!-- end update lesson -->

                            <!-- delete lesson -->
                            <div class="accordion__menu collapse" id="course-toc-{{$counter}}">
                                <div class="accordion__menu-link">
                                    <button style="width:100%"
                                    type="button" data-id="{{$l->id}}" data-toggle="modal" data-target="#deleteLesson" class="btn btn-accent">delete lesson</button>
                                </div>  
                            </div>
                            <!-- end delete lesson -->
                    </div>
                    @endforeach
                </div> 

            </div>

            <!-- right side bar -->
            <div class="col-md-4">

                <!-- Course photo -->
                <div class="page-separator">
                    <div class="page-separator__text">Image</div>
                </div>
                <div class="card">
                    <img src="{{asset($course->image_url)}}" height="200px"  style="width: 100%" alt="">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Course photo</label>
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" accept=".jpg, .png, image/jpeg, image/png" id="inputGroupFile01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <small class="form-text text-danger text-muted">accepted only (jpeg,jpg,png)</a></small>
                        </div>
                    </div> 
                </div>

                <!-- options -->
                <div class="page-separator">
                    <div class="page-separator__text">options</div>
                </div>
                <div class="card"> 
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control form-control-lg select2" required>
                                <option value="{{$course->category->id}}" name="category_id">{{$course->category->name}}</option>
                                @foreach ($categories as $category)
                                    <option name="category_id" value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Select a category.</small>
                        </div>
                    </div>                 
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">attachments</label>
                        </div>
                        <button type="button" style="width: 100%" data-toggle="modal" data-target="#addAttachment" class="btn btn-outline-secondary mb-24pt mb-sm-0">Add attachment</button>
                    </div>

                </div>

                <!-- update and delete course -->
                <div class="card">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
                <div class="card">
                    <button style="width:100%"
                    type="button" data-toggle="modal" data-target="#deleteCourse" class="btn btn-accent">delete course</button>
                </div>
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
    <!-- video -->
    <script src="{{asset('assets/js/video.js')}}"></script>


    <script>
        $("#update_course").on("submit",function(){
            $("#description").val($("#quillArea .ql-editor").html());
        })
    </script>

    <script>
        $("#add_lesson").on("submit",function(){
            $("#description2").val($("#quillArea2 .ql-editor").html());
        })
    </script>

    <script>
        $("#update_lesson").on("submit",function(){
            $("#description3").val($("#quillArea3 .ql-editor").html());
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

    <script>
        $('#addVideo').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var lessons_id = button.data('lessons_id')
            var modal = $(this)
            modal.find('.modal-body #lessons_id').val(lessons_id);
        })
    </script>
    
    <script>
        $('#updateLesson').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var title = button.data('title')
            var description = button.data('description')
            var episode_number = button.data('episode_number')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title').val(title);
            modal.find('.modal-body #quillArea3 .ql-editor').html(description);
            modal.find('.modal-body #episode_number').val(episode_number);
        })
    </script>  

    <script>
        $('#deleteLesson').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>

    <script>
        $('#deletevideo').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script> 

    <script>
        $('#deleteAttachment').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var file_id = button.data('file_id')
            var file_name = button.data('file_name')
            var lesson_id = button.data('lesson_id')
            var modal = $(this)
            modal.find('.modal-body #file_id').val(file_id);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #lesson_id').val(lesson_id);
        })
    </script> 

@endsection
