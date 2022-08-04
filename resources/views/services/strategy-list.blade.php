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
            Intraday
        </div>
        <div class="tab-pane fade" id="btst" role="tabpanel" aria-labelledby="btst-tab">
            BTST
        </div>
        <div class="tab-pane fade" id="positional" role="tabpanel" aria-labelledby="positional-tab">
            Positional
        </div>
        <div class="tab-pane fade" id="investment" role="tabpanel" aria-labelledby="investment-tab">
            Investment
        </div>
    </div>
</div>
@stop