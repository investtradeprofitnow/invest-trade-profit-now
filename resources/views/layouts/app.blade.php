<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
		<link href="{{asset('css/home.css')}}" rel="stylesheet">
		<link href="{{asset('images/logo.jpg')}}"rel="icon" type="image/icon type">
		<title>@yield('pageTitle')</title>
        @yield('css')
	</head>
    <body>
        @include('layouts.header')
		@yield('content')
		@include('layouts.footer')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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