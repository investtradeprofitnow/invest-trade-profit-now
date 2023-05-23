<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{asset('css/font.css')}}" rel='stylesheet'>
		<link href="{{asset('css/home.css')}}" rel="stylesheet">
		<link href="{{asset('images/logo.jpg')}}"rel="icon" type="image/icon type">
		<style type="text/css">
			a.btn-social, .btn-social
			{
				border-radius: 50%;
				color: #ffffff !important;
				display: inline-block;
				height: 54px;
				line-height: 54px;
				margin: 8px 4px;
				text-align: center;
				text-decoration: none;
				transition: background-color .3s;
				webkit-transition: background-color .3s;
				width: 54px;
			}

			.btn-social .fa,.btn-social i
			{
				backface-visibility: hidden;
				moz-backface-visibility: hidden;
				ms-transform: scale(1);
				o-transform: scale(1);
				transform: scale(1);
				transition: all .25s;
				webkit-backface-visibility: hidden;
				webkit-transform: scale(1);
				webkit-transition: all .25s;
			}

			.btn-social:hover,.btn-social:focus
			{
				color: #fff;
				outline: none;
				text-decoration: none;
			}

			.btn-social:hover .fa,.btn-social:focus .fa,.btn-social:hover i,.btn-social:focus i
			{
				ms-transform: scale(1.3);
				o-transform: scale(1.3);
				transform: scale(1.3);
				webkit-transform: scale(1.3);
			}

			.btn-youtube
			{
				background-color: #E52D27;
				font-size: 30px;
			}

			.btn-youtube:hover
			{
				background-color: #EA5955;
			}
		</style>
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