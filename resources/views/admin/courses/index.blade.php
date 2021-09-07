@extends('layouts.admin_master')

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
Courses
@endsection       

@section('modal')
    
    @include('admin.courses.state_course') 
    @include('admin.courses.delete_course') 

@endsection

@section('content')

@if (session()->has('delete'))
<script>
    window.onload = function() {
        notif({
            msg: "course deleted successfully",
            type: "error"
        })
    }
</script> 
@endif

@if (session()->has('update'))
<script>
    window.onload = function() {
        notif({
            msg: "course updated successfully",
            type: "success"
        })
    }
</script> 
@endif

<div class="pt-32pt">
    <div class="container page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                <h2 class="mb-0">Manage Courses</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{url('Admin/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        Manage Courses
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container page__container page-section">

    <div class="page-separator">
        <div class="page-separator__text">ALL Courses</div>
    </div>
    <div class="card mb-lg-12" style="width: 100%">
        <div class="row">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead style="text-align: center">
                            <tr>
                                <th>name</th>
                                <th>course subscribers</th>
                                <th>state</th>
                                <th>teacher name</th>
                                <th>opperations</th>
                            </tr>
                        </thead>
                        <tbody style="text-align: center">
                                @forelse ($courses as $course)
                                <tr>
                                    <td>{{$course->title}}</td>
                                    <td>{{$course->subscribers->count()}}</td>
                                    <td>
                                        @if($course->displayed)
                                            <button type="button"
                                                class="text-success btn btn-sm"
                                                style="font-weight: bold"
                                                data-toggle="modal"
                                                data-course_id="{{$course->id}}"
                                                data-target="#stateCourse"
                                                >published
                                            </button>  
                                        @else
                                            <button 
                                                class="text-danger btn btn-sm"
                                                style="font-weight: bold"
                                                data-toggle="modal"
                                                data-course_id="{{$course->id}}"
                                                data-target="#stateCourse"
                                                >unpublish
                                            </button>                                             
                                        @endif
                                    </td>
                                    <td>{{$course->teacher->name}}</td>
                                    <td>

                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                        data-toggle="modal"
                                        data-course_id="{{$course->id}}"
                                        data-target="#deleteCourse">delete</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align: center">
                                        <p><strong>no courses added </strong></p>
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
        $('#deleteCourse').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var course_id = button.data('course_id')

            var modal = $(this)
            modal.find('.modal-body #course_id').val(course_id);

        })
    </script>
        <script>
            $('#stateCourse').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var course_id = button.data('course_id')
    
                var modal = $(this)
                modal.find('.modal-body #course_id').val(course_id);
    
            })
        </script> 
@endsection
