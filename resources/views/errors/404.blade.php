@extends("layouts.app")
@section("pageTitle", "Page Not Found")
@section("css")
    <style type="text/css">
        .error{
            background-color: #d1fbfb;
            border-top-left-radius: 100px;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 100px;
            border-bottom-left-radius: 20px;
            width: 70%;
            color: black;
        }
        h1{
            color: #34bbe3;
            font-size: 800%;
            font-weight: 900;
        }        
        h2{
            font-size: 300%;
            font-weight: 700;
            text-align: center;
        }
        .error .btn{
            font-size: 50%;
            border-radius: 100px;
        }

        @media only screen and (max-width: 991px){
            .error{
                width: 90% !important;
            }
        }
    </style>
@stop
@section("content")
    <div class="container text-center">
        <div class="error mx-auto p-3 mb-5">
            <h1>404</h1>
            <h2 class="my-4">It seems you have landed on the Wrong Page.<h2>
            <p><a role="button" class="btn btn-success" href="{{('/')}}">Go To HomePage</a></p>
        </div>
    </div>
@stop