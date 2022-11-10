@extends('layouts.app')
@section('pageTitle', 'Change Password')
@section('css')
    <link href="{{asset('css/register.css')}}" rel="stylesheet">
@stop
@section('content')
    <div class="container box">        
        <h1 class="mb-3 text-center"><strong><i>Change Password</i></strong></h1>
        @if(session("success"))
            <div class="success mb-3">{{session("success")}}</div>
        @elseif(session("error"))
            <div class="error mb-3">{{session("error")}}</div>
        @endif
        <div class="form p-4 mb-5">
            <form id="change-password-form" method="post" action="{{route('change-password')}}">
                {{ csrf_field() }}
                @if(session("emailChange"))
                    <div class="form-group mt-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{session('emailChange')}}" readonly required>
                    </div>
                @endif
                <div class="form-group mt-3">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" minlength=8 maxlength=20 required>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Confirm Password:</label>
                    <input type="password" class="form-control" name="cnfm_password" id="cnfm_password" minlength=8 maxlength=20 required>
                </div>
                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary btn-register" value="Change Password"/>
                </div>
            </form>
        </div>
    </div>
@stop