@extends('layouts.app')
@section('pageTitle', 'Registration')
@section('css')
    <link href="{{asset('css/register.css')}}" rel="stylesheet">
@stop
@section('content')
<div class="container">
    @if(isset($error))
        <div class="error">{{$error}}</div>
    @elseif(isset($modal))
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(function() {
                $('#otpModal').modal('show');
            });
        </script>   
    @endif
    <h1 class="mb-3 text-center"><strong><i>Register</i></strong></h1>
    <div class="form p-4">
        <form id="register-form" method="post" action="/displayOTP">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" maxlength=50 required>
            </div>
            <div class="form-group mt-3">
                <label for="mobile">Mobile:</label>
                <input type="text" class="form-control" name="mobile" id="mobile" maxlength=10 oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
            </div>
            <div class="form-group mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group mt-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" minlength=8 maxlength=20 required>
            </div>
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">I agree to the <a href="{{route('terms-and-conditions')}}">Terms and Conditions</a></label><br/>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary btn-register">Register</button>
            </div>
        </form>
    </div>
    <div class="login-link text-center my-3">
        <strong>
            Already Have An Account?
            <a href="{{route('login')}}">Login Here</a>
        </strong>
    </div>
</div>

<div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="otpModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
    <script src="{{asset('js/jquery.validate.js')}}"></script>
    <script src="{{asset('js/form-validation.js')}}"></script>
@stop