@component('mail::message')
# Hello Dear,

Message:<br>
**{{$message->notice}}**
<br>
Sender:*{{ Auth::user()->name }}*
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
