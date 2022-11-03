@component('mail::message')
    <h2>Hello {{$name}},</h2>
        <p>We are sorry to hear about your unsubscription. We have refunded your remaining amount of &#8377; {{$amount}} to your original payment mode. We'll notify you once the amount is processed.
        <p>In case you do not receive a mail in 7 working days, you can contact us on <a href="mailto:{{config('app.contact')}}?subject=Refund Query - {{$id}}">{{config('app.contact')}}</a></p>
    <h2>
        Thanks,<br>
        {{config('app.name')}} Team
    </h2>
@endcomponent