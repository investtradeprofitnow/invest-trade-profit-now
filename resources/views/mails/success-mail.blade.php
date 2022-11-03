@component('mail::message')
    <h2>Hello {{$name}},</h2>
        <p>Thank you for signing with {{config('app.name')}}. You can check the strategies on our Website <a href="{{config('app.url')}}">{{config('app.name')}}</a></p>
        <p>In case of any queries, you can contact us on <a href="mailto:{{config('app.contact')}}?subject=Query">{{config('app.contact')}}</a></p>
    <h2>
        Thanks,<br>
        {{config('app.name')}} Team
    </h2>
@endcomponent