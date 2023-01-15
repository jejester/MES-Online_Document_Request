<x-mail::message>
<h1 style="text-align: center">Hi! {{ $name }}, Your document is now ready for pick up!</h1>
<br>
Transaction Number is: <b>{{ $tr }}</b><br>
Pin: <b>{{ $p }}</b> <br>
<br>
Make sure to bring yours and the student's identification documents so we can confirm your identity, Be safe and take care. 
<br>
<br>
<br>
Cheers,<br>
{{ __('Maligaya Elementary School') }}
</x-mail::message>