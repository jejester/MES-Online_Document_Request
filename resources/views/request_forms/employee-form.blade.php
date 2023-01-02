@extends('layouts.app')


@section('content')


<div class="max-w-2xl mx-auto text-center mb-5 mt-10">
    <h2 class="text-3xl font-logo-text leading-tight text-green-900 sm:text-4xl lg:text-5xl">Employee Request Form</h2>
</div>
@livewire('employee-multi-step-form')
<div class=" h-52"></div>



@endsection