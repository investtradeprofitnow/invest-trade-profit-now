@extends("layouts.app")
@section("pageTitle","Contact Us")
@section("css")
    <style type="text/css">
        .container .email{
            font-size: 20px;
            font-weight: bold;
            padding-left: 15px;
            color: #34bbe2;
            background: none;
        }

        .mail-link{
            padding-left: 60px;
            color: #34bbe2;
            text-decoration: none;
            font-weight: bolder;
        }

        .mail-link:hover{
            color: #34bbe2;
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
                    In case of any queries, please submit the form.
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