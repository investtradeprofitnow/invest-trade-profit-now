@extends('layouts.app')
@section('pageTitle', 'Forgot Password')
@section('css')
    <link href="{{asset('css/register.css')}}" rel="stylesheet">
@stop
@section('content')
    <div class="container">
        <h1 class="mb-3 text-center"><strong><i>Forgot Password</i></strong></h1>
        @if(session("success"))
            <div class="success mb-3">{{session("success")}}</div>
        @elseif(session("error"))
            <div class="error mb-3">{{session("error")}}</div>
        @endif
        <div class="form p-4 mb-5">
            <form id="reset-password-form" method="post" action="{{route('send-password-link')}}">
                {{ csrf_field() }}
                <div class="form-group mt-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary btn-register" value="Send Password Link"/>
                </div>
            </form>
        </div>
    </div>
@stop