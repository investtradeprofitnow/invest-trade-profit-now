@extends('layouts.app')
@section('pageTitle','Home')
@section('content')
<button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top">
	<i class="fa fa-solid fa-angle-up"></i>
</button>

<!-- Slide Tags Start -->
<div id="carousel-tags" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<div class="text-center">
				<h1 class="tags-home text-center">Unable To Earn Consistently From Market???​​</h1>
			</div>
		</div>
		<div class="carousel-item">
			<div class="text-center">
				<h1 class="tags-home text-center">Want To Earn More Profits???​​</h1>
			</div>
		</div>
		<div class="carousel-item">
			<div class="text-center">
				<h1 class="tags-home text-center">Join Us and Enter A Journey of Profitable Growth​</h1>
				<p><a class="create-btn" href="{{route('register')}}">Create Account</a></p>
			</div>
		</div>
  	</div>
</div>
<!-- Slide Tags End -->

<!-- What We Do Start -->
<div class="container py-5">
	<h1 class="mb-3 text-center section-title">What We Do...</h1>
	<ul class="what-we-do">
		<li><i class="fa fa-solid fa-arrow-right"></i>We provide Strategies To Our Clients for Trading and Investment and charge for each kind of Strategy</li>
		<li><i class="fa fa-solid fa-arrow-right"></i>We have Strategies for Index as well as Stocks (Nifty, Bank Nifty and Shares</li>
		<li><i class="fa fa-solid fa-arrow-right"></i>We provide strategies with capital requirement, lot size, stop loss and target thereby helping them with defined methodology to earn consistent profits</li>
		<li><i class="fa fa-solid fa-arrow-right"></i>We work on numerous strategies to fine tune in this market</li>
	</ul>
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
</div>
<!-- Services End -->

<!-- About Us Start -->
<div class="about-us container pb-5">
	<h1 class="mb-3 text-center section-title">About Us</h1>
	<h4>
		We, Haresh and Sanket Shah started this venture in 2019 from our home with a purpose to help people earn and help change their attitude towards indian markets and investments.
	</h4>
	<h4 class="pt-3">
		We started with 2 and now are more than 10 of us and growing strong. We might be a small team but our aim is very high to help people to trade and invest in the right way.
	</h4>
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
</div>
<!-- Why ITPN End -->
@stop