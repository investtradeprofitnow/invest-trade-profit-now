<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('css/font.css')}}" rel='stylesheet'>
		<link href="{{asset('images/logo.jpg')}}"rel="icon" type="image/icon type">
		<title>@yield('pageTitle')</title>
		<link href="{{asset('css/sidebar.css')}}" rel='stylesheet'>
        @yield('css')
	</head>
    <body>
		@include('admin.layouts.sidebar')
		@yield('content')
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/jquery.validate.min.js')}}"></script>
		<script src="{{asset('js/popper.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
        @yield('js')
    </body>
</html>