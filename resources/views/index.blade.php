@extends('layouts.app')
@section('pageTitle','Home')
@section('content')
    @if(session()->has("days"))
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(function(){
				$(".modal-body").html("<p>Your plan will expire in "+{{session()->get("days")}}+" day(s). Please renew your plan after it expires else you will loose all the benefites of getting discount.</p>");
                $("#willExpireModal").modal("show");
            });
        </script>        
    @endif
	<!-- Slide Tags Start -->
	<div id="carousel-tags" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-inner">
			@if(Session::has("email"))
				<div class="carousel-item">
					<div class="text-center">
						<h1 class="tags-home text-center mt-3">Buy To Learn and Earn...​</h1>
						<p><a class="create-btn" href="{{route('strategy-list')}}">Buy Strategies</a></p>
					</div>
				</div>
			@endif
			<div class="carousel-item active">
				<div class="text-center">
					<h1 class="tags-home text-center">Want to learn how to make consistent profits from markets​​</h1>
				</div>
			</div>
			<div class="carousel-item">
				<div class="text-center">
					<h1 class="tags-home text-center">Want to become an independent trader/investor​​</h1>
				</div>
			</div>			
			@if(!Session::has("email"))
				<div class="carousel-item">
					<div class="text-center">
						<h1 class="tags-home text-center mt-3">Register now and start your profitable journey today​</h1>
						<p><a class="create-btn" href="{{route('register')}}">Create Account</a></p>
					</div>
				</div>
            @endif			
		</div>
	</div>
	<!-- Slide Tags End -->

	<!-- What We Do Start -->
	<div class="container py-5">
		<h1 class="mb-3 text-center section-title">What We Do...</h1>
		<ul class="what-we-do">
			<li><i class="fa fa-solid fa-arrow-right"></i>&nbsp;&nbsp;&nbsp;We provide strategies to our clients for helping them learn on how to become independent in markets.</li>
			<li><i class="fa fa-solid fa-arrow-right"></i>&nbsp;&nbsp;&nbsp;We provide intraday as well as positional trading strategies.</li>
			<li><i class="fa fa-solid fa-arrow-right"></i>&nbsp;&nbsp;&nbsp;We provide strategies to identify short term and long term investment opportunities in markets</li>
			<li><i class="fa fa-solid fa-arrow-right"></i>&nbsp;&nbsp;&nbsp;We provide strategies for buying as well as selling in index as well as stock options.</li>
		</ul>
		<p class="text-right"><a role="button" class="btn btn-success" href="{{route('strategy-list')}}">Buy Strategies</a></p>	
	</div>
	<!-- What We Do End -->

	<!-- Services Start -->
	<div class="container pb-5">
		<h1 class="mb-3 text-center section-title">To Start With, Subscribe To Our Services</h1>
		<div class="row">
			<div class="col-md-6 col-12 mt-4">
				<div class="p-4 border text-center service-box">
					<img src="{{asset('images/intraday-icon.png')}}" class="py-4" alt="Intraday"/>
					<h4><strong>Intraday</strong></h4>
					<p>Buy and Sell on the <strong>SAME DAY</strong></p>
				</div>
			</div>
			<div class="col-md-6 col-12 mt-4">
				<div class="p-4 border text-center service-box">
					<img src="{{asset('images/intraday-icon.png')}}" class="py-4" alt="Intraday"/>
					<h4><strong>BTST</strong></h4>
					<p>Buy it today and sell it tomorrow</p>
				</div>
			</div>
			<div class="col-md-6 col-12 mt-4">
				<div class="p-4 border text-center service-box">
					<img src="{{asset('images/positional-icon.png')}}" class="py-4" alt="Intraday"/>
					<h4><strong>Positional</strong></h4>
					<p>This contains of Short Terms (buy and sell after more than a day upto <strong>A MONTH or 3 MONTHS</strong>) or Long Term (buy and sell after more than<strong>3 MONTHS upto 1 YEAR</strong>)</p>
				</div>
			</div>
			<div class="col-md-6 col-12 mt-4">
				<div class="p-4 border text-center service-box">
					<img src="{{asset('images/investment-icon.png')}}" class="py-4" alt="Intraday"/>
					<h4><strong>Investment</strong></h4>
					<p>Buy and Sell for <strong>3 to 5 YEARS</strong></p>
				</div>
			</div>
		</div>
		<p class="text-right mt-4"><a role="button" class="btn btn-success" href="{{route('strategy-list')}}">Buy Strategies</a></p>	
	</div>
	<!-- Services End -->

	<!-- About Us Start -->
	<div class="about-us container pb-5">
		<h1 class="mb-3 text-center section-title">About Us</h1>
		<p>
			We started our journey in the market as small time retailers and have gathered enough experience and knowledge to start this wonderful venture with a purpose to help our fellow retailers earn with the strategies bringing consistent profit and help change their attitude towards markets and investments.
		</p>
		<p class="text-right"><a role="button" class="btn btn-success" href="{{route('strategy-list')}}">Buy Strategies</a></p>	
	</div>
	<!-- About Us End -->

	<!-- Why ITPN Start -->
	<div class="why-itpn container pb-5">
		<div class="row">
			<div class="col-12">
				<h1 class="mb-3 text-center section-title">Why Invest Trade Profit Now...</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-sm-6 col-12 mt-4">
				<div class="px-4 py-5 text-center reason">
					<span>Our Strategies Help You Compound Your Money</span>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-12 mt-4">
				<div class="px-4 py-5 text-center reason">
					<span>Earn Regular Money</span>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-12 mt-4">
				<div class="px-4 py-5 text-center reason">
					<span>Remain Profitable Even In A Volatile Market</span>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6 col-12 mt-4">
				<div class="px-4 py-5 text-center reason">
					<span>Become Independent Investor / Trader</span>
				</div>
			</div>
		</div>
		<p class="text-right mt-4"><a role="button" class="btn btn-success" href="{{route('strategy-list')}}">Buy Strategies</a></p>	
	</div>
	<!-- Why ITPN End -->

	<!-- Disclaimer Start -->
	<div class="container pb-5">
		<div class="row">
			<div class="col-12">
				<h5 class="mb-3"><b>Disclaimer:</b></h5>
				<h6><b>KIND ATTENTION TO ALL PARTICIPANTS:</b></h6>
				<b>Disclaimer from Admin/Owner of our website:</b><br/>
				<p>
					The services have been created by 
					<a target="_blank" href="{{config('app.url')}}">{{config('app.url')}}</a> 
					exclusively for package subscribers. You may not copy, reproduce, distribute, 
					publish, display, perform, modify, create derivative works, transmit, or in any way 
					exploit any such content. Unauthorized usage is an infringement of our intellectual 
					property rights and a violation of law, and it may also result in cancellation of 
					your subscription without any refund and may lead to legal action.
				</p>
				<p>
					This website and its content including all strategies are only for educational 
					purposes and the admin / owner of the website is in no way responsible for any 
					financial or other loss of any of the participants. Do consult your financial 
					advisor before taking any trades or taking any investment decisions. This website 
					and its admin / owner do not provide any recommendations / advice / tips. This 
					disclaimer / disclosure / terms and conditions is applicable to all users of the 
					content of the website in whatsoever case or manner.
					&nbsp; <a href="{{route('disclaimer')}}">Read More>></a>
				</p>
			</div>
		</div>
	</div>
	<!-- Disclaimer End -->

	<div class="modal fade" id="willExpireModal" tabindex="-1" aria-labelledby="willExpireModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="willExpireModalLabel">Plan will Expire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop