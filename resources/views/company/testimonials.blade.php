@extends('layouts.app')
@section('pageTitle', 'Testimonials')
@section('css')
    <style type="text/css">
        .box{
            width: 60% !important;
        }

        .border{
            box-shadow: 0 0 15px #34BBE3;
            border-top-left-radius: 30px;
            border-bottom-right-radius: 30px;
            border: 5px solid #fff !important;
        }
    </style>
@stop
@section('content')
    <div class="page-title">
        <h1 class="text-center py-4">TESTIMONIALS</h1>
    </div>
    <div class="container box text-center mt-5">
        @php
            $feedbacks = Session::get("feedbacks");
        @endphp
        @foreach($feedbacks as $key=>$feedback)
            @php
                $rating = $feedback["rating"];
                $anonymous = $feedback["anonymous"];
                $name = $feedback["name"];
                if($anonymous=="yes"){
                    $image = "A.png";
                    $name = "Anonymous";
                }
                else if(is_null($feedback["photo"]) || empty($feedback["photo"])){
                    $image = strtoupper($feedback["name"][0]).".png";
                }
                else{
                    $image = $feedback["photo"];
                }
            @endphp
            @if($key%2==0)
                <div class="row border">
                    <div class="col-3 my-auto">
                        <img src="{{asset('images/customer-images/'.$image)}}" width="100" class="pb-4 mt-4" alt="{{$image}}"/>                      
                    </div>
                    <div class="col-9 pt-3">
                        <h1 class="star text-left pb-2">
                            @for($i=1;$i<=$rating;$i++)
                                &#9733;
                            @endfor
                        </h1>
                        <h6 class="text-justify">"{{$feedback['feedback']}}"</h6>
                        <h5 class="text-justify"><b>{{$name}}</b></h5>
                    </div>
                </div>
                <br/><br/>
            @else
                <div class="row border">
                    <div class="col-9 pt-3">
                        <h1 class="star text-left pb-2">
                            @for($i=1;$i<=$rating;$i++)
                                &#9733;
                            @endfor
                        </h1>
                        <h6 class="text-justify">"{{$feedback['feedback']}}"</h6>
                        <h5 class="text-justify"><b>{{$name}}</b></h5>
                    </div>
                    <div class="col-3 my-auto">
                    <img src="{{asset('images/customer-images/'.$image)}}" width="100" class="pb-4 mt-4" alt="{{$image}}"/>                      
                    </div>
                </div>
                <br/><br/>
            @endif
        @endforeach
    </div>
@stop