@component('mail::message')
    <h2>Hello {{$name}},</h2>
    <p>Thank you for buying our strategies.</p>
    <p>Please find below your order details.</p>
    <h1><b>Order Details: </b></h1>
    <p><b>Order Id: </b>{{$orderId}}</p>
    <p><b>Date: </b>{{$date}}</p>
    <p><b>Strategy Names: </b></p>
    <ul>
        @foreach($strategyNames as $strategy)
            <li>{{$strategy}}</li>
        @endforeach
    </ul>
    <p><b>Total Amount: </b>&#8377; {{$amount}}</p>
    @if($coupon!=null)
        <p><b>Coupon Code: </b>{{$coupon}}</p>
    @endif
    <h2>
        Thanks,<br>
        {{config('app.name')}} Team
    </h2>
@endcomponent