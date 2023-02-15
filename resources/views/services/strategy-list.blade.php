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

        .border{
            box-shadow: 0 0 15px #34BBE3;
            border-top-left-radius: 50px;
            border-bottom-right-radius: 50px;
            border: 5px solid #fff !important;
        }

        .bg-light{
            border-top-left-radius: 50px;
            border-bottom-right-radius: 50px;
            background: linear-gradient(#AEE4F4, #E7F1C3);
        }

        .red{
            color: red;
        }

        .buy-now{
            color: black;
            background-color: transparent;
            border-color: black;
            border: 2px solid black;
            border-radius: 30px;
            padding: 10px 40px;
            font-weight: bold;
        }

        .buy-now:hover{
            color: white;
            background-color: #C4DC6A;
            border-color: #9DB055;
            border-radius: 30px;
            padding: 10px 40px;
            font-weight: bold;
        }

        h3{
            font-weight: bold;
        }

        h4, h5, h6{
            font-weight: bold;
        }

        ul{
            margin-bottom: 0 !important;
        }

        @media screen and (max-width: 767px){
            img{
                width: 80%;
            }
        }
    </style>
@stop
@section("content")
    <div class="heading text-center py-4">
        <h1><i>STRATEGY LIST</i></h1>
    </div>
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
                <div class="col-md-6 col-12 mt-4 all {{$type}} mt-5">
                    <div class="p-4 border text-center service-box bg-light">
                        <h3 class="my-2"><i>{{$strategy->name}}</i></h3><br/>
                        @if($photo!=null)
                            <p>
                                <img src="{{asset('strategy/short/'.$photo)}}" width="50%">
                            </p>
                        @endif
                        <br/><h6 class="text-left">Description of the Strategy:</h6>
                        <p class="text-left">{!! ($strategy->description) !!}</p>                        
                        <a href="{{$strategy->link}}" target="_blank" class="btn buy-now mt-3" role="button">Buy Now</a>
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

        $(".buy-now").click(function(e){
            $btn = confirm("This will take you to a third-party site to view the content. Do you wish to continue?");
            if(!$btn){
                e.preventDefault();
            }
            else{
                window.open($(this).attr("href"),"_blank"); 
                window.location = "/feedback";
            }
        });
    </script>
@stop