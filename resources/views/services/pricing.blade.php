@extends('layouts.app')
@section('pageTitle', 'Pricing')
@section('css')
    <link href="{{asset('css/pricing.css')}}" rel="stylesheet">
@stop
@section('content')
    <div class="heading text-center py-4">
        <h1><i>PRICING</i></h1>
    </div>
    <div id="generic_price_table">   
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="generic_content border">
                        <div class="generic_head_price">
                            <div class="generic_head_content">
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Silver</span>
                                </div>                              
                            </div>
                            <div class="generic_price_tag">  
                                <span class="price">
                                    <span class="sign">&#8377;</span>
                                    <span class="currency"><s>1499</s><span class="red">  999</span></span>
                                </span>
                            </div>
                        </div>
                        <div class="generic_feature_list">
                            <ul>
                                <li>Flat <span>10%</span> Discount on purchase of every Strategy</li>
                                <li>Validity: <span class="year">1 year</span></li>  
                            </ul>
                        </div>
                        @if(session("customer"))
                            <a class="btn btn-outline mb-4" href="/save-plan/1">Pay Now</a>
                        @else
                            <a class="btn btn-outline mb-4" href="/save-plan/1">Register</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="generic_content border">
                        <div class="generic_head_price">
                            <div class="generic_head_content">
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Gold</span>
                                </div>                              
                            </div>
                            <div class="generic_price_tag">  
                                <span class="price">
                                    <span class="sign">&#8377;</span>
                                    <span class="currency"><s>2499</s><span class="red">  1999</span></span>
                                </span>
                            </div>
                        </div>
                        <div class="generic_feature_list">
                            <ul>
                                <li>Flat <span>25%</span> Discount on purchase of every Strategy</li>
                                <li>Validity: <span class="year">2 years</span></li>  
                            </ul>
                        </div>
                        @if(session("customer"))
                            <a class="btn btn-outline mb-4" href="/save-plan/2">Pay Now</a>
                        @else
                            <a class="btn btn-outline mb-4" href="/save-plan/2">Register</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="generic_content active border">
                        <div class="generic_head_price">
                            <div class="generic_head_content">
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Platinum</span>
                                </div>                              
                            </div>
                            <div class="generic_price_tag">  
                                <span class="price">
                                    <span class="sign">&#8377;</span>
                                    <span class="currency"><s>5999</s><span class="red">  3999</span></span>
                                </span>
                            </div>
                        </div>
                        <div class="generic_feature_list">
                            <ul>
                                <li>Flat <span>50%</span> Discount on purchase of every Strategy</li>
                                <li>Validity: <span class="year">5 years</span></li>  
                            </ul>
                        </div>
                        @if(session("customer"))
                            <a class="btn btn-outline mb-4" href="/save-plan/3">Pay Now</a>
                        @else
                            <a class="btn btn-outline mb-4" href="/save-plan/3">Register</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript">
        $(".generic_content").click(function(){
            $(".generic_content").removeClass("active");
            $(this).addClass("active");
        });
    </script>
@stop
