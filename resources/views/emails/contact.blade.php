<x-mail::message>
Contact from <b>{{ $name }}</b>
<br>
Email Address: {{ $email }}
<br>
<br>
<br>
Message:
<br>
{{ $content }}


Regards,<br>
{{ config('app.name') }}
</x-mail::message>
