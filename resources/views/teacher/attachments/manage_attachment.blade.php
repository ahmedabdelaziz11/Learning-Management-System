@extends('layouts.master')

@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <!-- Select2 -->
    <link type="text/css" href="{{asset('assets/css/select2.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/vendor/select2/select2.min.css')}}" rel="stylesheet">
    <!-- notifiit -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection

@section('title')
attachments
@endsection       

@section('modal')

    @include('teacher.attachments.add_attachment')
    @include('teacher.attachments.delete_attachment')



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

<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Manage Attachments</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{url('teacher/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        Manage Attachments
                    </li>
                </ol>
            </div>
        </div>
        <div class="row" role="tablist">
            <div class="col-auto">
                <button type="button" data-target="#addAttachment" data-toggle="modal" class="btn btn-outline-secondary">Add Attachment</button>
            </div>
        </div>
    </div>
</div>

<div class="container page__container page-section">

    <div class="page-separator">
        <div class="page-separator__text">ALL attachments</div>
    </div>
    <div class="card mb-lg-12" style="width: 100%">
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th>file name</th>
                                <th>course</th>
                                <th>lesson</th>
                                <th>opperations</th>
                            </tr>
                        </thead>
                        <tbody>
                                @forelse ($attachments as $attachment)
                                <tr>
                                    <td>{{mb_substr($attachment->file_name,0,15)}}</td>
                                    <td><a href="{{route('courses.show' , $attachment->course->slug)}}">{{$attachment->course->title}}</a></td>
                                    <td>{{$attachment->lesson->title}}</td>
                                    <td>
                                        <a class="btn btn-outline-success btn-sm"
                                        href="{{ url('teacher/view_file') }}/{{$attachment->course->id }}/{{ $attachment->lesson->id }}/{{ $attachment->file_name }}"
                                        role="button"><i class="fas fa-eye"></i>&nbsp;
                                        show</a>

                                        <a class="btn btn-outline-info btn-sm"
                                        href="{{ url('teacher/download_file') }}/{{$attachment->course->id }}/{{ $attachment->lesson->id }}/{{ $attachment->file_name }}"
                                        role="button"><i
                                            class="fas fa-download"></i>&nbsp;
                                        download</a>


                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                        data-toggle="modal"
                                        data-file_name="{{ $attachment->file_name }}"
                                        data-file_id="{{ $attachment->id }}"
                                        data-lesson_id="{{ $attachment->lesson->id }}"
                                        data-course_id="{{ $attachment->course->id }}"
                                        data-target="#deleteAttachment">delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align: center">
                                        <p><strong>no attachment added </strong></p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('js') 

    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/select2.js')}}"></script>
    <!--notifiy -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            $('select[name="course"]').on('change', function() {
                var CourseId = $(this).val();
                if (CourseId) {
                    $.ajax({
                        url: "{{ URL::to('teacher/get_lessons') }}/" + CourseId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="lesson"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="lesson"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

    

    <script>
        $('#deleteAttachment').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var file_id = button.data('file_id')
            var file_name = button.data('file_name')
            var lesson_id = button.data('lesson_id')
            var course_id = button.data('course_id')
            var modal = $(this)
            modal.find('.modal-body #file_id').val(file_id);
            modal.find('.modal-body #file_name').val(file_name);
            modal.find('.modal-body #lesson_id').val(lesson_id);
            modal.find('.modal-body #course_id').val(course_id);
        })
    </script> 
@endsection
