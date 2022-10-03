@extends('layouts.app')
@section('pageTitle', 'Strategy List')
@section('css')
    <style type="text/css">
        .nav-tabs .nav-link{
            background-color: #EDFDFD;
        }

        .nav-tabs .active{
            background-color: white !important;
            color: black !important;
        }

        .active{
            color: black !important;
        }

        .tab-pane{
            color: black;
        }

        .service-box{
            color: black;
        }

        h4, h5, h6{
            font-weight: bold;
        }
    </style>
@stop
@section('content')
<div class="container my-5">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="intraday-tab" data-bs-toggle="tab" data-bs-target="#intraday" type="button" role="tab" aria-controls="intraday" aria-selected="true">Intraday</button>
            <button class="nav-link" id="btst-tab" data-bs-toggle="tab" data-bs-target="#btst" type="button" role="tab" aria-controls="btst" aria-selected="false">BTST</button>
            <button class="nav-link" id="positional-tab" data-bs-toggle="tab" data-bs-target="#positional" type="button" role="tab" aria-controls="positional" aria-selected="false">Positional</button>
            <button class="nav-link" id="investment-tab" data-bs-toggle="tab" data-bs-target="#investment" type="button" role="tab" aria-controls="investment" aria-selected="false">Investment</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="intraday" role="tabpanel" aria-labelledby="intraday-tab">
            @if(count($intradayList)>0)
                <div class="container">
                    <div class="row">
                        @foreach($intradayList as $intraday)
                            <div class="col-md-6 col-12 mt-4">
                                <div class="p-4 border text-center service-box">
                                    @php
                                        $videoName = $intraday->video;
                                        $index = strrpos($videoName, '.')+1;
                                        $end = strlen($videoName)-1;
                                        $type = substr($videoName,$index,$end);
                                        $id = $intraday->id;
                                    @endphp
                                    <video width="100%" height="auto" controls>
                                        <source src="{{asset('strategy/short/'.$videoName)}}" type="{{'video/'.$type}}">
                                    </video>
                                    <h5 class="my-2">{{$intraday->name}}</h5>
                                    <h6 class="text-left">Description of the Strategy:</h6>
                                    <p class="text-left">{{$intraday->description}}</p>
                                </div>                      
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <h5 class="pt-4">There are no Strategies in this category</h5>
            @endif
        </div>
        <div class="tab-pane fade" id="btst" role="tabpanel" aria-labelledby="btst-tab">
            @if(count($btstList)>0)
                <div class="container">
                    <div class="row">
                        @foreach($btstList as $btst)
                            <div class="col-md-6 col-12 mt-4">
                                <div class="p-4 border text-center service-box">
                                    @php
                                        $videoName = $btst->video;
                                        $index = strrpos($videoName, '.')+1;
                                        $end = strlen($videoName)-1;
                                        $type = substr($videoName,$index,$end);
                                        $id = $btst->id;
                                    @endphp
                                    <video width="100%" height="auto" controls>
                                        <source src="{{asset('strategy/short/'.$videoName)}}" type="{{'video/'.$type}}">
                                    </video>
                                    <h5 class="my-2">{{$btst->name}}</h5>
                                    <h6 class="text-left">Description of the Strategy:</h6>
                                    <p class="text-left">{{$btst->description}}</p>                                    
                                </div>                      
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <h5 class="pt-4">There are no Strategies in this category</h5>
            @endif
        </div>
        <div class="tab-pane fade" id="positional" role="tabpanel" aria-labelledby="positional-tab">
            @if(count($positionalList)>0)
                <div class="container">
                    <div class="row">
                        @foreach($positionalList as $positional)
                            <div class="col-md-6 col-12 mt-4">
                                <div class="p-4 border text-center service-box">
                                    @php
                                        $videoName = $positional->video;
                                        $index = strrpos($videoName, '.')+1;
                                        $end = strlen($videoName)-1;
                                        $type = substr($videoName,$index,$end);
                                        $id = $positional->id;
                                    @endphp
                                    <video width="100%" height="auto" controls>
                                        <source src="{{asset('strategy/short/'.$videoName)}}" type="{{'video/'.$type}}">
                                    </video>
                                    <h5 class="my-2">{{$positional->name}}</h5>
                                    <h6 class="text-left">Description of the Strategy:</h6>
                                    <p class="text-left">{{$positional->description}}</p>
                                </div>                      
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <h5 class="pt-4">There are no Strategies in this category</h5>
            @endif
        </div>
        <div class="tab-pane fade" id="investment" role="tabpanel" aria-labelledby="investment-tab">
            @if(count($investmentList)>0)
                <div class="container">
                    <div class="row">
                        @foreach($investmentList as $investment)
                            <div class="col-md-6 col-12 mt-4">
                                <div class="p-4 border text-center service-box">
                                    @php
                                        $videoName = $investment->video;
                                        $index = strrpos($videoName, '.')+1;
                                        $end = strlen($videoName)-1;
                                        $type = substr($videoName,$index,$end);
                                        $id = $investment->id;
                                    @endphp
                                    <video width="100%" height="auto" controls>
                                        <source src="{{asset('strategy/short/'.$videoName)}}" type="{{'video/'.$type}}">
                                    </video>
                                    <h5 class="my-2">{{$investment->name}}</h5>
                                    <h6 class="text-left">Description of the Strategy:</h6>
                                    <p class="text-left">{{$investment->description}}</p>
                                </div>                      
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <h5 class="pt-4">There are no Strategies in this category</h5>
            @endif
        </div>
    </div>
</div>
@stop