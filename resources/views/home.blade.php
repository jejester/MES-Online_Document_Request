@extends('layouts.app')


@section('content')
<div class="container m-auto justify-center text-center mt-28">
    <h1 class="text-3xl font-bold-text mx-auto text-center tracking-tight text-green-500 md:text-6xl">Online Document <i class=" text-green-600 ml-1">Request</i></h1>
    <p class="text-base m-auto font-paragraph-text text-gray-800 md:text-lg">Requesting document made easier, accessible and hassle-free.</p>
</div>

<div class="container m-auto flex justify-center space-x-5 mt-5 p-3">
    @auth
        
    <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="font-nav-text transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110  duration-300 rounded-full text-white bg-green-900 hover:shadow-2xl hover:bg-green-200 hover:text-green-900 focus:outline-none text-lg px-4 py-2.5 
    text-center inline-flex items-center" type="button">Request Document <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
    <!-- Dropdown menu -->
    <div id="dropdown" class="hidden z-10 w-48 text-start p-5 bg-yellow-100 rounded-2xl divide-y divide-gray-100 shadow">
        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
          <li>
            <a href="{{ route('student') }}" class="text-lg block py-2 px-4 rounded-xl hover:text-white hover:bg-green-900">for Student</a>
          </li>
          <li>
            <a href="{{ route('employee') }}" class="text-lg block py-2 px-4 rounded-xl hover:text-white hover:bg-green-900">for Employee</a>
          </li>
        </ul>
    </div>
    @endauth

    @guest
    <a href="{{ route('login') }}"><button class="font-nav-text transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110  duration-300 rounded-full text-white bg-green-900 hover:shadow-2xl hover:bg-green-200 hover:text-green-900 focus:outline-none text-lg px-5 py-3 
    text-center inline-flex items-center" type="button">Login to Request</button></a>
    @endguest

    <div>
        <a href="{{ route('track.request') }}"><abbr title="Track Request"><button class="sm:hidden transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110  duration-300 font-nav-text rounded-full text-white bg-green-200 hover:shadow-xl hover:bg-green-100 focus:outline-none text-lg px-4 py-2.5 
        text-center inline-flex items-center" type="button"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 sm:hidden text-green-900">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
        </svg>
        </button></abbr></a>
            
            <a href="{{ route('track.request') }}"><button class="font-nav-text text-lg rounded-full hidden sm:block hover:bg-green-200 hover:border-green-200
             hover:text-green-900 border-2 border-green-900 p-3 
             transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110  duration-300 ...">Track Existing Request</button></a>
      </div>
</div>   


<section class="py-10 mt-34 sm:py-16 lg:py-24 mt-20">
    <div class="max-w-5xl px-4 mx-auto sm:px-6 lg:px-8">
        <div class="grid items-center md:grid-cols-2 gap-y-10 md:gap-x-20">
            <div>
                <h2 class="text-3xl font-logo-text text-green-900 sm:text-4xl lg:text-5xl">For Students</h2>
                <p class="mt-4 text-lg font-paragraph-text leading-relaxed text-gray-600">We're happy to accomodate your requests. Open for all students of Maligaya Elementary School.</p>
            </div>
            <div class="pr-12 sm:pr-0">
                <div class="relative max-w-xs mb-12">
                    <img class="object-bottom rounded-md shadow-2xl max-h-96" src="{{ asset('images/maligaya2.jpeg') }}" alt="" />

                    <img class="absolute origin-bottom-right scale-75 rounded-full -bottom-12 -right-12 shadow-2xl" src="{{ asset('images/students.jpg') }}" alt="" />
                </div>
            </div>

           
        </div>
    </div>
</section>


<section class="py-10 mt-34 sm:py-16 lg:py-24">
    <div class="max-w-5xl px-4 mx-auto sm:px-6 lg:px-8">
        <div class="grid items-center md:grid-cols-2 gap-y-10 md:gap-x-20">
            <div class="flex flex-col sm:hidden">
                <h2 class="text-3xl font-logo-text text-green-900 sm:text-4xl lg:text-5xl">For Employees</h2>
                <p class="mt-4 text-lg font-paragraph-text leading-relaxed text-gray-600">And open for all employees of Maligaya Elementary School.</p>
            </div>
            <div class="pr-12 sm:pr-0">
                <div class="relative max-w-xs mb-12">
                    <img class="object-bottom rounded-md shadow-2xl max-h-96" src="{{ asset('images/maligaya2.jpeg') }}" alt="" />

                    <img class="absolute origin-bottom-right scale-75 rounded-full -bottom-12 -right-12 shadow-2xl max-h-50" src="{{ asset('images/faculty.jpg') }}" alt="" />
                </div>
            </div>

            <div class="hidden sm:flex sm:flex-col">
                <h2 class="text-3xl font-logo-text text-green-900 sm:text-4xl lg:text-5xl">For Employees</h2>
                <p class="mt-4 text-lg font-paragraph-text leading-relaxed text-gray-600">And open for all employees of Maligaya Elementary School.</p>
            </div>
           
        </div>
    </div>
</section>


<section class="py-10 bg-white bg-opacity-70 sm:py-16 lg:py-24">
    <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
        <h2 class="text-3xl font-logo-text leading-tight text-green-900 sm:text-4xl lg:text-5xl">Frequently Asked Questions</h2>

        <div class="flow-root mt-12 sm:mt-16">
            <div class="divide-y divide-gray--200 -my-9">
                <div class="py-9">
                    <p class="text-xl font-title-text text-blue-700">How to create an account?</p>
                    <p class="mt-3 text-lg font-paragraph-text text-gray-600">Fill in your name, email and password in the form provided in the registration page.</p>
                    <p class="text-lg font-paragraph-text text-gray-600">After clicking register button, confirm your email address. By clicking the link in the email that we'll send to you.</p>
                </div>

                <div class="py-9">
                    <p class="text-xl font-title-text text-blue-700">What payment method do you support?</p>
                    <p class="text-lg font-paragraph-text text-gray-600">Requesting a document is free and doesn't have charges. Just bring your identification cards if you're picking up a document.</p>
                </div>

                <div class="py-9">
                    <p class="text-xl font-title-text text-blue-700">How long does it take to process my request?</p>
                    <p class="text-lg font-paragraph-text text-gray-600">The whole process takes around 3 to 5 days, since we first need to confirm every identity and information of requestors then process each documents.</p>
                </div>

                <div class="py-9">
                    <p class="text-xl font-title-text text-blue-700">How do you provide support?</p>
                    <p class="text-lg font-paragraph-text text-gray-600">
                        If you have any inquiries or questions, you can reach and contact us at our <a href="{{ route('contact.show') }}" title="" class="text-blue-600 transition-all duration-200 hover:text-blue-700 focus:text-blue-700 hover:underline">Contact Page.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="py-10 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="text-center">
            <h2 class="text-3xl font-logo-text leading-tight text-black sm:text-4xl lg:text-5xl">Ready to request?</h2>

            <div class="flex flex-col items-center justify-center px-16 mt-3 md:mt-8 space-y-4 sm:space-y-0 sm:space-x-4 sm:flex-row lg:mt-10 sm:px-0">
                <a href="{{ route('login') }}" title="" class="inline-flex items-center justify-center sm:w-auto px-5 py-2 md:px-20 md:py-4 font-nav-text text-base sm:text-xl text-white transition-all duration-200 bg-green-900 border border-transparent rounded-full hover:bg-green-500" role="button"> Request Now </a>
            </div>
        </div>
    </div>
</section>


@endsection


