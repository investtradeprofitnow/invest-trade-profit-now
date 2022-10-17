@extends("layouts.app")
@section("pageTitle", "Profile")
@section("css")
    <link href="{{asset('css/register.css')}}" rel="stylesheet">
    <style type="text/css">
        a{
            color: #34BBE3;
        }
        a:hover{
            color: #34BBE3;
        }

        .resend{
            text-decoration: none;
        }
    </style>
@stop
@section("content")
    @if(session("emailOtpModal")=="yes")
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(function(){
                $("#otpEmailModal").modal("show");
            });
        </script>
    @elseif(session("mobileOtpModal")=="yes")
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(function(){
                $("#otpMobileModal").modal("show");
            });
        </script>
    @elseif(session("nameModal")=="yes")   
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(function(){
                $("#updateNameModal").modal("show");
            });
        </script> 
    @elseif(session("emailModal")=="yes")   
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(function(){
                $("#updateEmailModal").modal("show");
            });
        </script>
    @elseif(session("mobileModal")=="yes")   
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(function(){
                $("#updateMobileModal").modal("show");
            });
        </script> 
    @endif
    <div class="container">
        <h1 class="mb-3 text-center"><strong><i>Profile</i></strong></h1>
        @if(session("error"))
            <div class="error mb-3">{{session("error")}}</div>
        @endif
        <div class="form p-4 mb-5">
            <div class="mb-4 text-center">
                <img src="{{asset('images/customer-images/'.$customer->photo)}}" width="100"/>
            </div>
            <div class="text-center">
                <a href="#changePhotoModal" id="change-photo" data-toggle="modal">Change Photo</a>
                @if(isset($photo))
                    <a href="#deletePhotoModal" id="delete-photo" data-toggle="modal">Remove Photo</a>
                @endif
            </div>
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
            <div class="row mb-4">
                <div class="col-8">
                    <div class="form-group">
                        <label for="name">Mobile:</label><br/>
                        <span id="cust_mobile">{{$customer->mobile}}</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group mt-3">
                        <button class="btn btn-primary btn-outline float-right" data-bs-toggle="modal" data-bs-target="#updateMobileModal" id="updateMobile">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("user.update-modals")
@stop
@section("js")
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

        $("#updateMobile").click(function(){
            $("#mobile").val($("#cust_mobile").html());
        });

        $("#updateMobileDb").click(function(){
            $("#mobile-form").submit();
        });

        $("#verify-mobile-otp").click(function(){
            $("#otp-mobile-form").submit();
        });

        $("#change-photo").click(function(){
            $("#changePhotoModal").modal("show");
        });

        $("#change-photo-btn").click(function(){
            if($("#cust-photo").val()==""){
                $(".error").html("Please upload a photo");
            }
            else{
                $("#change-photo-form").submit();
            }
        });

        $("#delete-photo").click(function(){
            $("#deletePhotoModal").modal("show");
        });
    </script>
@stop