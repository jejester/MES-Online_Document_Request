@extends('layouts.app')



@section('content')

<section class="py-10 sm:py-16">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl font-logo-text leading-tight text-green-900 sm:text-4xl lg:text-5xl">Contact us</h2>
            <p class="max-w-xl font-paragraph-text mx-auto mt-4 text-base leading-relaxed text-gray-500">If you want to reach us out, you can use our contact number, email or the form provided below.</p>
        </div>

        <div class="max-w-5xl mx-auto mt-12 sm:mt-16">
            <div class="grid grid-cols-1 gap-6 px-8 text-center md:px-0 md:grid-cols-3">
                <div class="overflow-hidden bg-white rounded-xl shadow-lg">
                    <div class="p-6">
                        <svg class="flex-shrink-0 w-10 h-10 mx-auto text-green-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                            />
                        </svg>
                        <h1 class="font-nav-text tracking-tight text-green-900 mt-1">Contact Number</h1>
                        <p class="mt-6 text-lg font-paragraph-text text-gray-900">417-1875</p>
                    </div>
                </div>

                <div class="overflow-hidden bg-white rounded-xl shadow-lg">
                    <div class="p-6">
                        <svg class="flex-shrink-0 w-10 h-10 mx-auto text-green-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <h1 class="font-nav-text tracking-tight text-green-900 mt-1">Email</h1>
                        <p class="mt-6 text-lg font-paragraph-text text-gray-900">es.maligaya@depedqc.ph</p>
                    </div>
                </div>

                <div class="overflow-hidden bg-white rounded-xl shadow-lg">
                    <div class="p-6">
                        <svg class="flex-shrink-0 w-10 h-10 mx-auto text-green-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <h1 class="font-nav-text tracking-tight text-green-900 mt-1">School Address</h1>
                        <a href="https://goo.gl/maps/deyBxUy2Ua6XRL1L9" target="blank"><p class="mt-6 text-lg font-paragraph-text 
                            leading-relaxed text-gray-900 hover:text-gray-500">Ilang Ilang St. Maligaya Park Subd. Brgy. Pasong Putik, Quezon City</p></a>
                    </div>
                </div>
            </div>
            
            @if(session()->has('message'))
            <div class="text-md font-nav-text text-white mx-auto bg-green-600 rounded-2xl py-3 px-3 md:max-w-2xl text-center mt-5 mb-5">
            {{ session()->get('message') }}
            </div>
            @endif

            <div class="mt-6 overflow-hidden bg-white rounded-xl shadow-2xl">
                <div class="px-6 py-12 sm:p-12">
                    <h3 class="text-3xl font-nav-text text-center text-green-900">Send us a message</h3>

                    <form action="" method="POST" class="mt-14">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-5 gap-y-4">
                            <div>
                                <label for="" class="text-base font-paragraph-text text-gray-900"> Your name </label>
                                <div class="mt-2.5 relative">
                                    <input type="text" name="name" id="name" placeholder="Enter your full name" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-green-600 caret-green-600" />
                                </div>
                                <span class=" text-sm text-red-600">@error('name'){{ $message }}@enderror</span>
                            </div>
        

                            <div>
                                <label for="" class="text-base font-paragraph-text text-gray-900"> Email address </label>
                                <div class="mt-2.5 relative">
                                    <input type="email" name="email" id="email" placeholder="Enter your full name" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md focus:outline-none focus:border-green-600 caret-green-600" />
                                </div>
                                <span class=" text-sm text-red-600">@error('email'){{ $message }}@enderror</span>
                            </div>
                

                            <div class="sm:col-span-2">
                                <label for="content" class="text-base font-paragraph-text text-gray-900"> Message </label>
                                <div class="mt-2.5 relative">
                                    <textarea name="content" id="content" placeholder="" class="block w-full px-4 py-4 text-black placeholder-gray-500 transition-all duration-200 bg-white border border-gray-200 rounded-md resize-y focus:outline-none focus:border-green-600 caret-green-600" rows="4"></textarea>
                                </div>
                                <span class=" text-sm text-red-600">@error('content'){{ $message }}@enderror</span>
                            </div>

                        

                            <div class="sm:col-span-2">
                                <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-4 mt-2 text-base font-paragraph-textld text-white transition-all duration-200 bg-green-900 border border-transparent rounded-md focus:outline-none hover:bg-green-500 focus:bg-green-200 focus:text-green-900">
                                    Send
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection