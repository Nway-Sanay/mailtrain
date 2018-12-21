@component('mail::message')
# Hi {{$content['to_email']}}

{{$content['body']}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
