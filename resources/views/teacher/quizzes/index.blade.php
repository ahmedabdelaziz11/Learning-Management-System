@extends('layouts.master')

@section('css')
    <!-- Select2 -->
    <link type="text/css" href="{{asset('assets/css/select2.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('assets/vendor/select2/select2.min.css')}}" rel="stylesheet">
    <!-- notifiit -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection

@section('title')
quizzes
@endsection       

@section('modal')

@include('teacher.quizzes.add_quizze')
@include('teacher.quizzes.delete_quizze')
@include('teacher.quizzes.update_quizze')


@endsection

@section('content')

@if (session()->has('Add'))
<script>
    window.onload = function() {
        notif({
            msg: "quizze added successfully",
            type: "success"
        })
    }
</script>
@endif

@if (session()->has('update'))
<script>
    window.onload = function() {
        notif({
            msg: "quizze uploaded successfully",
            type: "success"
        })
    }
</script>
@endif

@if (session()->has('delete'))
<script>
    window.onload = function() {
        notif({
            msg: "quizze deleted successfully",
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
                <h2 class="mb-0">Manage Quizzes</h2>
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="{{url('teacher/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">
                        Manage Quizzes
                    </li>
                </ol>
            </div>
        </div>
        <div class="row" role="tablist">
            <div class="col-auto">
                <button type="button" data-target="#addQuizze" data-toggle="modal" class="btn btn-outline-secondary">Add Quizze</button>
            </div>
        </div>
    </div>
</div>

<div class="container page__container page-section">

    <div class="page-separator">
        <div class="page-separator__text">ALL Quizzes</div>
    </div>
    <div class="row">
        <div class="card mb-lg-12" style="width: 100%">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th>quizze title</th>
                                <th style="text-align: right">opperations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($quizzes as $quizze)
                            <tr>
                                <td>{{$quizze->title}}</td>
                                <td style="text-align: right">

                                    <a class="btn btn-outline-success btn-sm"
                                    href="{{route('quizzes.edit',[$quizze->id])}}"
                                    role="button"><i class="fas fa-eye"></i>&nbsp;
                                    show</a>

                                    <button type="button" class="btn btn-outline-info btn-sm"
                                    data-toggle="modal"
                                    data-id="{{ $quizze->id }}"
                                    data-title="{{ $quizze->title }}"
                                    data-target="#editQuizze">eidt</button>

                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                    data-toggle="modal"
                                    data-id="{{ $quizze->id }}"
                                    data-target="#deleteQuizze">delete</button>

                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td style="text-align: center" colspan="2">
                                        <p class="mb-0"><strong class="js-lists-values-employee-name">no quizzes added </strong></p>
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
        $('#deleteQuizze').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script> 

    <script>
        $('#editQuizze').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var title = button.data('title')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #title').val(title);
        })
    </script> 

    
@endsection
