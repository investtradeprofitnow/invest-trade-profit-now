@extends("layouts.app")
@section("pageTitle", "Pricing")
@section("css")
    <link href="{{asset('css/pricing.css')}}" rel="stylesheet">
@stop
@section("content")
    @if(session()->has("expired"))
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(function(){
                $("#expiredModal").modal("show");
            });
        </script>        
    @endif
    <div class="heading text-center py-4">
        <h1><i>PRICING</i></h1>
    </div>
    <div id="price_table">   
        <div class="container">
            <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                    <div class="content border">
                        <div class="head_price">
                            <div class="head_content">
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Basic</span>
                                </div>                              
                            </div>
                            <div class="price_tag">  
                                <span class="price">
                                    <span class="currency">Free</span></span>
                                </span>
                            </div>
                        </div>
                        <div class="feature_list">
                            <ul>
                                <li style="margin-bottom: 4vw">No discount offered</li>
                                <li class="no-coupon" style="margin-bottom: 3vw">No coupons offered</li>
                                <li>Validity: Lifetime</li>
                            </ul>
                        </div>
                        @if(session("customer"))
                            <a class="btn btn-outline mb-4" href="{{route('save-plan',1)}}">Pay Now</a>
                        @elseif(session("email"))
                            <a class="btn btn-outline mb-4" href="{{route('update-plan',1)}}">Change Plan</a>
                        @else
                            <a class="btn btn-outline mb-4" href="{{route('save-plan',1)}}">Register</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="content border">
                        <div class="head_price">
                            <div class="head_content">
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Silver</span>
                                </div>                              
                            </div>
                            <div class="price_tag">  
                                <span class="price">
                                    <span class="sign">&#8377;</span>
                                    <span class="currency"><s>1499</s><span class="red">  999</span></span>
                                </span>
                            </div>
                        </div>
                        <div class="feature_list">
                            <ul>
                                <li>Flat <span>10%</span> Discount on purchase of every Strategy</li>
                                <li><span>Coupon codes</span> will be provided while buying strategies</li>
                                <li>Validity: <span class="year">1 year</span></li>  
                            </ul>
                        </div>
                        @if(session("customer"))
                            <a class="btn btn-outline mb-4" href="{{route('save-plan',2)}}">Pay Now</a>
                        @elseif(session("email"))
                            <a class="btn btn-outline mb-4" href="{{route('update-plan',2)}}">Change Plan</a>
                        @else
                            <a class="btn btn-outline mb-4" href="{{route('save-plan',2)}}">Register</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="content border">
                        <div class="head_price">
                            <div class="head_content">
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Gold</span>
                                </div>                              
                            </div>
                            <div class="price_tag">  
                                <span class="price">
                                    <span class="sign">&#8377;</span>
                                    <span class="currency"><s>2499</s><span class="red">  1999</span></span>
                                </span>
                            </div>
                        </div>
                        <div class="feature_list">
                            <ul>
                                <li>Flat <span>25%</span> Discount on purchase of every Strategy</li>
                                <li><span>Coupon codes</span> will be provided while buying strategies</li>
                                <li>Validity: <span class="year">2 years</span></li>  
                            </ul>
                        </div>
                        @if(session("customer"))
                            <a class="btn btn-outline mb-4" href="{{route('save-plan',3)}}">Pay Now</a>
                        @elseif(session("email"))
                            <a class="btn btn-outline mb-4" href="{{route('update-plan',3)}}">Change Plan</a>
                        @else
                            <a class="btn btn-outline mb-4" href="{{route('save-plan',3)}}">Register</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="content active_pr border">
                        <div class="head_price">
                            <div class="head_content">
                                <div class="head_bg"></div>
                                <div class="head">
                                    <span>Platinum</span>
                                </div>                              
                            </div>
                            <div class="price_tag">  
                                <span class="price">
                                    <span class="sign">&#8377;</span>
                                    <span class="currency"><s>5999</s><span class="red">  3999</span></span>
                                </span>
                            </div>
                        </div>
                        <div class="feature_list">
                            <ul>
                                <li>Flat <span>50%</span> Discount on purchase of every Strategy</li>
                                <li><span>Coupon codes</span> will be provided while buying strategies</li>
                                <li>Validity: <span class="year">5 years</span></li>  
                            </ul>
                        </div>
                        @if(session("customer"))
                            <a class="btn btn-outline mb-4" href="{{route('save-plan',4)}}">Pay Now</a>
                        @elseif(session("email"))
                            <a class="btn btn-outline mb-4" href="{{route('update-plan',4)}}">Change Plan</a>
                        @else
                            <a class="btn btn-outline mb-4" href="{{route('save-plan',4)}}">Register</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="expiredModal" tabindex="-1" aria-labelledby="expiredModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="expiredModalLabel">Plan has Expired</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Your plan has expired. Please renew your plan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section("js")
    <script type="text/javascript">
        $(".content").click(function(){
            $(".content").removeClass("active_pr");
            $(this).addClass("active_pr");
        });
    </script>
@stop
