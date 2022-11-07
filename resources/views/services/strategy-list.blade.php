@extends("layouts.app")
@section("pageTitle", "Strategy List")
@section("css")
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

        .red{
            color: red;
        }

        @media screen and (max-width: 767px){
            img{
                width: 60%;
            }
        }
    </style>
@stop
@section("content")
    <div class="container my-5">
        <div class="text-right">
            <b>Type of Strategy:</b>&nbsp;&nbsp;
            <select class="" id="type">
                <option value="all" selected>All</option>
                <option value="intraday">Intraday</option>
                <option value="btst">BTST</option>
                <option value="positional">Positional</option>
                <option value="investment">Investment</option>
            </select>
        </div>
        <div class="row">
            @foreach($strategies as $strategy)
                @php
                    $id = $strategy->strategy_short_id;
                    $photo = $strategy->photo;
                    $type = strtolower($strategy->type);
                @endphp
                <div class="col-md-6 col-12 mt-4 all {{$type}}">
                    <div class="p-4 border text-center service-box">
                        <h4 class="my-2">{{$strategy->name}}</h4><br/>
                        <p>
                            <img src="{{asset('strategy/short/'.$photo)}}" width="100%">
                        </p>
                        <h6 class="text-left">Description of the Strategy:</h6>
                        <p class="text-left">{!! nl2br($strategy->description) !!}</p>
                        <h5>
                            To buy this strategy please click on the link below<br>
                            <a href="{{$strategy->link}}" target="_blank">{{$strategy->link}}</a>
                        </h5>
                    </div>                      
                </div>
            @endforeach
        </div>
    </div>
@stop
@section('js')
    <script>
        $("#type").change(function(){
            $type=$('#type :selected').val();
            if($type=="all"){
                $(".all").show();
            }
            else{
                $(".all").hide();
                $("."+$type).show();
            }
        });
    </script>
@stop