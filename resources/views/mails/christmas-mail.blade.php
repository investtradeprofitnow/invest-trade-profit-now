@component('mail::message')
    <h2>Hello Haresh Sir,</h2>
    <p>Please find below my answers for the {{$event}}:</p>
    <ol>
        @foreach($answers as $answer)
            <li>{{$answer}}</li>
        @endforeach
    </ol>
Thanks,<br>
{{$name}}
@endcomponent