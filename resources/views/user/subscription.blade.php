@extends("layouts.app")
@section("pageTitle", "Subscription Details")
@section("css")
    <link href="{{asset('css/register.css')}}" rel="stylesheet">
@stop
@section("content")
    <div class="container">
        <h1 class="mb-3 text-center"><strong><i>Subscription Details</i></strong></h1>
        @if(session()->has("amount"))
            <div class="success p-3 mb-4">Your refund for amount &#8377; {{session()->get("amount")}} has been 
                processed. You should receive the same in 7 working days. In case you do not receive it, 
                please contact us by raising a query to 
                <a href="mailto:{{config('app.contact')}}?subject=Refund Query">{{config('app.contact')}}</a>
            </div>
        @endif
        <div class="form p-4 mb-5">
            <div class="row mb-4">
                <div class="col-8">
                    Plan Name:
                </div>
                <div class="col-4">
                    {{$subscription["planName"]}}
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-8">
                    Amount:
                </div>
                <div class="col-4">
                    {{$subscription["amount"]}}
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-8">
                    Start Date:
                </div>
                <div class="col-4">
                    {{$subscription["startDate"]}}
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-8">
                    End Date:
                </div>
                <div class="col-4">
                    {{$subscription["endDate"]}}
                </div>
            </div>

            @if($subscription["unsubscribe"])
                <div class="row mb-4 text-right">
                    <div class="col-12">
                        <a class="btn btn-primary btn-success" href="/unsubscribe/{{$subscription['amount']}}/{{$subscription['totalDays']}}/{{$subscription['expiredDays']}}">Unsubscribe</a>
                    </div>
                </div>
            @endif
        </div>
    </div>    
@stop