<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		@include('layouts.head')
	</head>

	<body class="layout-mini layout-mini">
		<!-- Loader -->
		<div class="preloader">
			<div class="sk-double-bounce">
				<div class="sk-child sk-double-bounce1"></div>
				<div class="sk-child sk-double-bounce2"></div>
			</div>
		</div>
		<!-- /Loader -->
		@yield('modal')
		<div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
			<div class="mdk-drawer-layout__content page-content">
				@include('layouts.main-header')	
				@yield('content')
				@include('layouts.footer')
			</div>
				@include('layouts.student_sidebar')
		</div>
		@include('layouts.footer-scripts')	
	</body>
</html>

<script>
    setInterval(function() {
        $("#notifications_count1").load(window.location.href + " #notifications_count1");
        $("#unreadNotifications1").load(window.location.href + " #unreadNotifications1");
    }, 5000);
</script>