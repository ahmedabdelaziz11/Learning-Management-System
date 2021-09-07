<!-- Title -->
<title> EDU-@yield('title')</title>
<!-- Prevent the demo from appearing in search engines -->
<meta name="robots" content="noindex">

<link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap" rel="stylesheet">

<!-- Perfect Scrollbar -->
<link type="text/css" href="{{ asset('assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">

<!-- Fix Footer CSS -->
<link type="text/css" href="{{ asset('assets/vendor/fix-footer.css') }}" rel="stylesheet">

<!-- Material Design Icons -->
<link type="text/css" href="{{ asset('assets/css/material-icons.css') }}" rel="stylesheet">


<!-- Font Awesome Icons -->
<link type="text/css" href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet">


<!-- Preloader -->
<link type="text/css" href="{{ asset('assets/css/preloader.css') }}" rel="stylesheet">


<!-- App CSS -->
<link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">

<meta name="csrf-token" content="{{ csrf_token() }}" />

@yield('css')