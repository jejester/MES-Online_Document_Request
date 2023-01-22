
<section class="py-10sm:py-16 lg:py-24">
    <form wire:submit.prevent="submit">
        @csrf

    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl font-logo-text leading-tight text-green-900 sm:text-4xl lg:text-5xl">Track Status</h2>
        </div>
        @if(session()->has('message'))
        <div class="text-md font-nav-text text-red-700 bg-white mx-auto border-2 border-red-600 rounded-2xl py-3 px-3 md:max-w-2xl text-center mt-5">
        {{ session()->get('message') }}
        </div>
        @endif


        <div class="relative max-w-md bg-white bg-opacity-70 mx-auto mt-8 md:mt-10">
            <div class="overflow-hidden rounded-md shadow-md">
                <div class="px-4 py-6 sm:px-8 sm:py-7">
                    <form action="#" method="POST">
                        <div class="space-y-5">
                            <div>
                                <label for="tracking_num" class="text-base font-title-text text-gray-900">Transaction Number</label>
                                <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                          </svg>
                                          
                                    </div>

                                    <input
                                        name="tracking_num"
                                        id="tracking_num"
                                        placeholder="Enter your transaction number"
                                        wire:model="tracking_num"
                                        class="text-center font-paragraph-text block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 transition-all placeholder:text-left duration-200 bg-white border border-gray-200 rounded-md focus:outline-none"
                                    />
    
                                </div>
                                <span class="text-red-600 text-sm">@error('tracking_num'){{ $message }}@enderror</span>
                            </div>

                            <div>
                                <div class="flex items-center justify-between">
                                    <label for="" class="text-base font-title-text text-gray-900">Pin</label>

                                </div>
                                <div class="mt-2.5 relative text-gray-400 focus-within:text-gray-600">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"
                                            />
                                        </svg>
                                    </div>

                                    <input
                                        name="pin"
                                        id="pin"
                                        placeholder="Enter your pin"
                                        wire:model="pin"
                                        class="text-center font-paragraph-text block w-full py-4 pl-10 pr-4 text-black placeholder-gray-500 placeholder:text-left transition-all duration-200 bg-white border border-gray-200 rounded-md"
                                    />
                                </div>
                                <span class="text-red-600 text-sm">@error('pin'){{ $message }}@enderror</span>
                            </div>

                            <div>
                                <div class="mt-2.5 relative text-white focus-within:text-gray-600">
                                    <div class="absolute inset-y-0 left-0 sm:left-32 flex items-center pl-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                          </svg>
                                    </div>

                                    <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200
                                     bg-green-900 rounded-md hover:bg-green-500">
                                        Track
                                    </button>
                                </div>
                            
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
</section>
