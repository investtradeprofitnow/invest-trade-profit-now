@extends('layouts.app')
@section('pageTitle', 'Profile')
@section('css')
    <link href="{{asset('css/register.css')}}" rel="stylesheet">
@stop
@section('content')
    @if(session('emailOtpModal')=="yes")
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(function(){
                $('#otpEmailModal').modal('show');
            });
        </script>
    @endif
    <div class="container">
        <h1 class="mb-3 text-center"><strong><i>Profile</i></strong></h1>
        @if(session("error"))
            <div class="error mb-3">{{session("error")}}</div>
        @endif
        <div class="form p-4 mb-5">
            <div class="row mb-4">
                <div class="col-8">
                    <div class="form-group">
                        <label for="name">Name:</label><br/>
                        <span id="cust_name">{{$customer->name}}</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mt-3">
                        <button class="btn btn-primary btn-outline float-right" data-bs-toggle="modal" data-bs-target="#updateNameModal" id="updateName">Edit</button>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-8">
                    <div class="form-group">
                        <label for="name">Email:</label><br/>
                        <span id="cust_email">{{$customer->email}}</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mt-3">
                        <button class="btn btn-primary btn-outline float-right" data-bs-toggle="modal" data-bs-target="#updateEmailModal" id="updateEmail">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.updateModals')
@stop
@section('js')
    <script type="text/javascript">
        $("#updateName").click(function(){
            $("#name").val($("#cust_name").html());
        });

        $("#updateNameDb").click(function(){
            $("#name-form").submit();
        });

        $("#updateEmail").click(function(){
            $("#email").val($("#cust_email").html());
            $("#emailName").val($("#cust_name").html());
        });

        $("#updateEmailDb").click(function(){
            $("#email-form").submit();
        });

        $("#verify-email-otp").click(function(){
            $("#otp-email-form").submit();
        });
    </script>
@stop