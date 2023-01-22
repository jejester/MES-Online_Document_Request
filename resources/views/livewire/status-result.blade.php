@vite('resources/css/app.css')



<section class=" mt-14 mb-14 py-10 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl mb-24">
        <div class="grid items-center grid-cols-1 gap-y-12 lg:grid-cols-2 lg:gap-x-24">
            @if (request()->status == "Awaiting for approval")
            <div class="flex">
                <img class="max-w-md mx-auto h-48 w-48 lg:h-full lg:w-full" src="{{ asset('images/pending.png') }}" alt="" />
            </div>

            @elseif (request()->status == "Approved and being process")
            <div class="flex">
                <img class="max-w-md mx-auto h-48 w-48 lg:h-full lg:w-full" src="{{ asset('images/approved.png') }}" alt="" />
            </div>

            @elseif (request()->status == "Ready for Pickup")
            <div class="flex">
                <img class="max-w-md mx-auto h-48 w-48 lg:h-full lg:w-full" src="{{ asset('images/pickup.png') }}" alt="" />
            </div>

            @elseif (request()->status == "Received and Picked up")
            <div class="flex">
                <img class="max-w-md mx-auto h-48 w-48 lg:h-full lg:w-full" src="{{ asset('images/received.png') }}" alt="" />
            </div>


            @elseif (request()->status == "Unclaimed")
            <div class="flex">
                <img class="max-w-md mx-auto h-48 w-48 lg:h-full lg:w-full" src="{{ asset('images/unclaimed.png') }}" alt="" />
            </div>

            @else
            <div class="flex">
                <img class="max-w-md mx-auto h-48 w-48 lg:h-full lg:w-full" src="{{ asset('images/arrival.png') }}" alt="" />
            </div>
            @endif
            

            <div class="mt-10 text-center lg:text-left">
                <h2 class="text-3xl font-logo-text text-green-900 sm:text-4xl lg:text-5xl">Request Status</h2>

            

                <div class="mx-auto flex flex-col lg:flex-row mt-7"> 
                    <div class="w-full pr-4">
                        <div class="mb-4 lg:mb-0">
                            <label for="first_name" class="font-title-text">Transaction Number</label>
                            <input type="text" class="text-center text-green-900 font-nav-text w-full py-3 mb-1
                            bg-green-100 rounded-lg border-white text-lg" value="{{ request()->number }}"disabled>
                        </div>
                    </div>
                    <div class="w-full pr-4">
                        <div class="mb-4 lg:mb-0">
                            <label for="first_name" class="font-title-text">Pin</label>
                            <input type="text" class="text-center text-green-900 font-nav-text w-full py-3 px-5 mb-1
                            bg-green-100 rounded-lg border-white text-lg" value="{{ request()->pin }}" disabled>
                        </div>
                    </div>   
                </div>

                <p class="text-xl mt-6 md:mb-10 font-paragraph-text text-black"><b class="text-green-900">{{ request()->name }}</b>{{ __(', Thank you for your patience!') }}</p>

                @if (request()->status == "Received and Picked up")
                <p class="text-xl font-paragraph-text text-black"> {{ __('Your request is already:') }}</p>

                <div class="w-full pr-4">
                    <div class="mb-4 lg:mb-0">
                        <input type="text" class="text-center text-green-900 font-nav-text w-full py-3 px-5 mb-1
                        bg-green-100 rounded-lg border-white text-lg" value="{{ request()->status }}" disabled>
                    </div>
                </div> 

                <p class="text-xl font-paragraph-text text-black"> {{ __('On:') }}</p>

                <div class="w-full pr-4">
                    <div class="mb-4 lg:mb-0">
                        <input type="text" class="text-center text-green-900 font-nav-text w-full py-3 px-5 mb-1
                        bg-green-100 rounded-lg border-white text-lg" value="{{ request()->date }}" disabled>
                    </div>
                </div> 

                @elseif (request()->status == "Awaiting for approval")
                <p class="text-xl font-paragraph-text text-black"> {{ __('Your request is currently:') }}</p>
                <div class="w-full pr-4">
                    <div class="mb-4 lg:mb-0">
                        <input type="text" class="text-center text-green-900 font-nav-text w-full py-3 px-5 mb-1
                        bg-green-100 rounded-lg border-white text-lg" value="{{ request()->status }}" disabled>
                    </div>
                </div> 

                @elseif (request()->status == "Approved and being process")
                <p class="text-xl font-paragraph-text text-black"> {{ __('Your request is already:') }}</p>
                <div class="w-full pr-4">
                    <div class="mb-4 lg:mb-0">
                        <input type="text" class="text-center text-green-900 font-nav-text w-full py-3 px-5 mb-1
                        bg-green-100 rounded-lg border-white text-lg" value="{{ request()->status }}" disabled>
                    </div>
                </div> 

                <p class="text-xl font-paragraph-text text-black"> {{ __('Estimated date of release:') }}</p>
                <div class="w-full pr-4">
                    <div class="mb-4 lg:mb-0">
                        <input type="text" class="text-center text-green-900 font-nav-text w-full py-3 px-5 mb-1
                        bg-green-100 rounded-lg border-white text-lg" value="{{ request()->date }}" disabled>
                </div>

                @elseif (request()->status == "Ready for Pickup")
                <p class="text-xl font-paragraph-text text-black"> {{ __('Your request is:') }}</p>
                <div class="w-full pr-4">
                    <div class="mb-4 lg:mb-0">
                        <input type="text" class="text-center text-green-900 font-nav-text w-full py-3 px-5 mb-1
                        bg-green-100 rounded-lg border-white text-lg" value="{{ request()->status }}" disabled>
                    </div>
                </div> 
                <p class="text-xl font-paragraph-text text-black"> {{ __('Please check your email for instructions.') }}</p>

                @elseif (request()->status == "Unclaimed")
                <p class="text-xl font-paragraph-text text-black"> {{ __('Your request is still:') }}</p>
                <div class="w-full pr-4">
                    <div class="mb-4 lg:mb-0">
                        <input type="text" class="text-center text-green-900 font-nav-text w-full py-3 px-5 mb-1
                        bg-green-100 rounded-lg border-white text-lg" value="{{ request()->status }}" disabled>
                    </div>
                </div> 
                <p class="text-xl font-paragraph-text text-black"> {{ __('Since:') }}</p>

                <div class="w-full pr-4">
                    <div class="mb-4 lg:mb-0">
                        <input type="text" class="text-center text-green-900 font-nav-text w-full py-3 px-5 mb-1
                        bg-green-100 rounded-lg border-white text-lg" value="{{ request()->date }}" disabled>
                    </div>
                </div> 
                <p class="text-xl font-paragraph-text text-black"> {{ __('Please pick it up, you can check your email for instructions.') }}</p>
                @endif
                
                 <a href="{{ route('home') }}"><button type="submit" class=" font-nav-text mt-8 inline-flex items-center justify-center px-8 py-4 
                     text-white transition-all duration-200 text-xl
                    bg-green-900 rounded-lg hover:bg-green-500 focus:bg-green-200 focus:text-green-900">{{ __('Back to home') }}</button></a>
            </div>
        </div>
    </div>
</section>

