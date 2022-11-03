@component('mail::message')
    <h2>Hello {{$name}},</h2>
        <p>Your refund amount of &#8377; {{$amount}} has been credited to your original payment mode.
        <p>In case you have not received in the same, plese share the screenshot of the statement on <a href="mailto:{{config('app.contact')}}?subject=Refund Closed - {{$id}}">{{config('app.contact')}}</a></p>
    <h2>
        Thanks,<br>
        {{config('app.name')}} Team
    </h2>
@endcomponent