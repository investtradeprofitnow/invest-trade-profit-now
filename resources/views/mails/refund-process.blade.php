@component('mail::message')
    <h2>Hello {{$name}},</h2>
        <p>We have processed your refund of amount &#8377; {{$amount}} to your original payment mode. Once the refund is credited to your payment mode, we'll notify you via email.
        <p>In case you do not receive a mail in 7 working days, you can contact us on <a href="mailto:{{config('app.contact')}}?subject=Refund Query - {{$id}}">{{config('app.contact')}}</a></p>
    <h2>
        Thanks,<br>
        {{config('app.name')}} Team
    </h2>
@endcomponent