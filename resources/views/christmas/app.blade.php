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
		<style type="text/css">
			h1{
				background-image: linear-gradient(#055012,white, red);
				background-size: 100%;
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;
				-webkit-text-stroke-width: 1px;
            	-webkit-text-stroke-color: black;
			}

			.christmas-bg{
				background: linear-gradient( rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65) ),url('../images/christmas-bg.jpg');
			}

			.text-right{
				text-align: right;
			}

			.success{
				background-color: #055012;
				color: white;
				border-radius: 20px;
				font-weight: bold;
			}
		</style>		
        @yield('css')
	</head>
    <body>
		@yield('content')
        <script src="http://127.0.0.1:8000/js/jquery.min.js"></script>
        <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
		<script src="http://127.0.0.1:8000/js/bootstrap.min.js"></script>
        @yield('js')
    </body>
</html>