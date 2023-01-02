<x-mail::message>
<h1 style="text-align: center">Hi! {{ $name }}, Thank you for requesting!</h1>
<br>
Your Transaction Number is: <b>{{ $data }}</b> <br>
Your Pin is: <b>{{ $p }}</b> <br>
<br>
We still need to confirm your request details before approving it and begin processing, if you have any inquiries or questions feel free to contact us. 
<br>
<br>
<br>
Cheers,<br>
{{ __('Maligaya Elementary School') }}
</x-mail::message>