@component('mail::message')
Hi User

We just wanted to let you know that "{{ $todo->todo }}" is due in less than 24 hours!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
