@vite('resources/css/app.css')



<section class=" mt-14 mb-14 py-10 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl mb-24">
        <div class="grid items-center grid-cols-1 gap-y-12 lg:grid-cols-2 lg:gap-x-24">
            <div class="flex">
                <img class="max-w-md mx-auto h-48 w-48 lg:h-full lg:w-full" src="{{ asset('images/checked.png') }}" alt="" />
            </div>

            <div class="mt-10 text-center lg:text-left">
                <h2 class="text-3xl font-logo-text text-green-900 sm:text-4xl lg:text-5xl">Request Complete!</h2>

            

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

                <p class="text-xl mt-6 font-paragraph-text text-black"><b class="text-green-900">{{ request()->name }}</b>{{ __(', Thank you for requesting!') }}</p>
                <p class="text-xl font-paragraph-text text-black"> {{ __('Your request has been sent and will be processed.') }}</p>

                 <p class="text-xl mt-6 font-paragraph-text text-black">Please save your <b class="text-green-900">Transaction Number</b> and <b class="text-green-900">Pin</b> to track the status of your request. Mabuhay!</p> 

                
                 <a href="{{ route('home') }}"><button type="submit" class=" font-nav-text mt-8 inline-flex items-center justify-center px-8 py-4 
                     text-white transition-all duration-200 text-xl
                    bg-green-900 rounded-lg hover:bg-green-500 focus:bg-green-200 focus:text-green-900">{{ __('Back to home') }}</button></a>
            </div>
        </div>
    </div>
</section>



