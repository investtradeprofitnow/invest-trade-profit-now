@extends("layouts.app")
@section("pageTitle","Contact Us")
@section("css")
    <style type="text/css">
        .container .email{
            font-size: 20px;
            font-weight: bold;
            padding-left: 15px;
            color: #34BBE3;
            background: none;
        }

        .mail-link{
            padding-left: 60px;
            color: black;
            text-decoration: none;
            font-weight: bolder;
        }

        .mail-link:hover{
            color: #34BBE3;
        }

        .web-details{
            padding-left: 15px;
        }

    </style>
@stop
@section("content")
    <div class="heading text-center py-4">
        <h1><i>CONTACT US</i></h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 col-12">
                <img src="{{asset('images/email-icon.png')}}" width="40px"/>
                <span class="email">Email Address:</span><br/>
                <p><a href="mailto:{{config('app.contact')}}?subject=Query" class="mail-link">{{config('app.contact')}}</a></p>
                <br/>   
                <p>
                    <span class="email">Website Creator:</span><br/>
                    <p class="web-details">
                        <strong>Name:</strong> Karishma Shah<br/>
                        <strong>Designation:</strong> Senior Design Development Maintenance Support<br/>
                        <strong>Address:</strong> Mumbai, Maharashtra, India<br/>
                        <strong>Working Days: </strong>Monday to Friday<br/>
                        <strong>Timings: </strong>9am to 6pm IST<br>
                    </p>
                </p>
            </div>
            <div class="col-md-6 col-12 mt-4 mt-md-0">
                @if ($errors->any())
                    <div class="alert error mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @elseif(session()->has("success"))
                    <div class="success mb-4">{{session()->get("success")}}</div>
                    @php
                        Session::forget("success");
                    @endphp
                @endif
                <p class="email title pl-0">
                    In case of any query, please submit the same via the form below. Our Team will revert within 48 working hours.
                </p>                
                <div class="form pt-0 p-4">
                    <form id="contact-form" method="post" action="{{route('submit-query')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" maxlength=50 required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="desc">Query:</label>
                            <textarea class="form-control" rows="5" name="query" id="query" required></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-outline" value="Submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{asset('js/jquery.validate.js')}}"></script>
    <script src="{{asset('js/form-validation.js')}}"></script>
@stop