@extends('layouts.student_master')


@section('css')
    <link type="text/css" href="{{ asset('assets/css/chat.css') }}" rel="stylesheet">
    @livewireStyles
@endsection

@section('title')
Dashboard
@endsection     

@section('content')

@livewire('chat',['id' => $id])


@endsection
@section('js') 
@livewireScripts
    <!-- Messages App -->
    <script src="{{asset('assets/js/messages.js')}}"></script>

    <!-- Sidebar Mini JS -->
    <script src="{{asset('assets/js/sidebar-mini.js')}}"></script>
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
