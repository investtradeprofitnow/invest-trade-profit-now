@extends("layouts.app")
@section("pageTitle", "Login")
@section("css")
    <link href="{{asset('css/register.css')}}" rel="stylesheet">
@stop
@section("content")
<div class="container box">
    <h1 class="mb-3 text-center"><strong><i>Login</i></strong></h1>
    <div class="form p-4">          
        @if(session()->has("error"))
            <div class="error mb-3 p-3">{{session()->get("error")}}</div>
        @endif
        <form id="login-form" method="post" action="{{route('checkCustomer')}}">
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
                <button type="submit" class="btn btn-primary btn-register">Login</button>
            </div>
        </form>
    </div>
    <div class="login-link text-center my-5">
        <strong>
            <a href="{{route('display-reset-password')}}">Forgot Password</a>
            <br/><br/>
            Don't Have An Account?
            <a href="{{route('register')}}">Register Here</a>
        </strong>
    </div>
</div>
@stop

@section("js")
    <script src="{{asset('js/jquery.validate.js')}}"></script>
    <script src="{{asset('js/form-validation.js')}}"></script>
@stop