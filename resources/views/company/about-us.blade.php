@extends('layouts.app')
@section('pageTitle','About Us')
@section('css')
    <link href="{{asset('css/support.css')}}" rel="stylesheet">
@stop
@section('content')
    <div class="heading text-center py-4">
        <h1><i>ABOUT US</i></h1>
    </div>
    <div class="container">
        <div class="mt-4">
            <h2 class="mb-3 section-title">Who We Are</h2>
            <p>
                We started our journey in the market as small time retailers and have gathered enough 
                experience and knowledge to start this wonderful venture with a purpose to help our 
                fellow retailers earn with the strategies bringing consistent profit and help change 
                their attitude towards markets and investments.
            </p>
        </div>
        <div class="mt-4">
            <h2 class="mb-3 section-title">What We Do</h2>
            <ul>
                <li>We provide strategies to our clients for helping them learn on how to become independent in markets.</li>
                <li>We provide intraday as well as positional trading strategies.</li>
                <li>We provide strategies to identify short term and long term investment opportunities in markets</li>
                <li>We provide strategies for buying as well as selling in index as well as stock options.</li>
            </ul>
        </div>
    </div>
@stop