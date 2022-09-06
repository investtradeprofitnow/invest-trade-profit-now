<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('css/font.css')}}" rel='stylesheet'>
		<link href="{{asset('css/home.css')}}" rel="stylesheet">
		<link href="{{asset('images/logo.jpg')}}"rel="icon" type="image/icon type">
		<title>@yield('pageTitle')</title>
        @yield('css')
	</head>
    <body>
        @include('layouts.header')		
			<button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top">
				<i class="fa fa-angle-up"></i>
			</button>
		@yield('content')
		@include('layouts.footer')
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/jquery.validate.min.js')}}"></script>
		<script src="{{asset('js/popper.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script type="text/javascript">
			//Get the button
			let mybutton = document.getElementById("btn-back-to-top");

			// When the user scrolls down 20px from the top of the document, show the button
			window.onscroll = function () {
				scrollFunction();
			};

			function scrollFunction() {
				if(document.body.scrollTop>20 || document.documentElement.scrollTop > 20){
					mybutton.style.display = "block";
				}
				else{
					mybutton.style.display = "none";
				}
			}
			// When the user clicks on the button, scroll to the top of the document
			mybutton.addEventListener("click", backToTop);

			function backToTop() {
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
			}
		</script>
		@yield('js')
    </body>