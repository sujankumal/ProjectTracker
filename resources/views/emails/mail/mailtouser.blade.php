@component('mail::message')
# Hello Dear,

Message:<br>
**{{$message}}**

Thanks,<br>
{{ config('app.name') }}
@endcomponent
