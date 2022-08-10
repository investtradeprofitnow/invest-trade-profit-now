<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Open Sans" rel='stylesheet'>
		<link href="{{asset('images/logo.jpg')}}"rel="icon" type="image/icon type">
		<title>Login</title>
		<link href="{{asset('css/sidebar.css')}}" rel='stylesheet'>
        <link href="{{asset('css/register.css')}}" rel="stylesheet">
	</head>
    <body>
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/admin/home">
                    <img src="{{asset('images/logo.jpg')}}" alt="" width="80vw" height="80vw">
                </a>
            </div>
        </nav>
        <div class="container">
            <h1 class="mb-3 text-center"><strong><i>Login</i></strong></h1>
            <div class="form p-4">
                @if(isset($error))
                    <div class="error">{{$error}}</div>
                @endif
                <form id="login-form" method="post" action="/checkAdminUser">
                    {{ csrf_field() }}
                    <div class="form-group mt-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" minlength=8 maxlength=20 required>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary btn-login">Login</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="{{asset('js/jquery.validate.js')}}"></script>
        <script src="{{asset('js/form-validation.js')}}"></script>
    </body>
</html>