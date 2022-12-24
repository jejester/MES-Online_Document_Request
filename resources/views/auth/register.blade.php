@extends('layouts.app')

@section('content')

<section class="bg-transparent">
    <div class="grid">
        <div class="flex items-center justify-center px-4 py-10 bg-transparent sm:px-6 lg:px-8">
            <div class="xl:w-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
                <h2 class="text-3xl font-logo-text leading-tight text-green-900 sm:text-4xl">Sign up to Request</h2>
                <p class="mt-2 font-paragraph-text text-base text-gray-600">Already have an account? <a href="{{ route('login') }}" title="" class="font-medium text-yellow-600 transition-all duration-200 hover:text-orange-800 hover:underline">Login here</a></p>

                <form action="{{ route('register') }}" method="POST" class="mt-8">
                    @csrf
                    <div class="space-y-5">
                        <div>
                            <label for="" class="text-base font-paragraph-text text-gray-900"> Full Name </label>
                            <div class="mt-2.5">
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    placeholder="Enter your full name"
                                    value="{{ old('name') }}"
                                    class=" @error('name') border-red-500 @enderror block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                />
                            </div>
                                @error('name')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                        <div>
                            <label for="" class="text-base font-paragraph-text text-gray-900"> Email address </label>
                            <div class="mt-2.5">
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    value="{{ old('email') }}"
                                    placeholder="Enter email to get started"
                                    class="@error('email') border-red-500 is-invalid @enderror block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                />
                            </div>
                                @error('email')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                        <div>
                            <label for="" class="text-base font-paragraph-text text-gray-900"> Password </label>
                            <div class="mt-2.5">
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    placeholder="Enter your password"
                                    class=" @error('password') border-red-500 @enderror block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                />
                            </div>
                                @error('password')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                           <div>
                            <label for="" class="text-base font-paragraph-text text-gray-900">Confirm Password </label>
                            <div class="mt-2.5">
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    placeholder="Repeat your password"
                                    class=" @error('password_confirmation') border-red-500 @enderror block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-gray-200 rounded-md bg-gray-50 focus:outline-none focus:border-blue-600 focus:bg-white caret-blue-600"
                                />
                            </div>
                                @error('password_confirmation')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="agree" id="agree" class="@error('agree') border-red-500 @enderror w-5 h-5 text-green-600 focus:outline-lime-900 bg-white border-gray-200 rounded" />
                        
                            <label for="agree" class="ml-3 text-md font-paragraph-text text-gray-500">
                                I agree to
                            </label>
                            <button class="block text-yellow-600 hover:underline font-paragraph-text px-1 text-md text-center" type="button" data-modal-toggle="defaultModal">
                                Terms of Service
                              </button>
        
                              <label for="agree" class="text-md font-paragraph-text text-gray-500">
                               and
                            </label>  

                            <button class="block text-yellow-600 hover:underline text-md font-paragraph-text px-1 text-md text-center" type="button" data-modal-toggle="medium-modal">
                                Privacy Policy
                              </button>
                              <!-- Main modal -->
                              <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                  <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                      <!-- Modal content -->
                                      <div class="relative bg-white rounded-lg shadow">
                                          <!-- Modal header -->
                                          <div class="flex justify-between items-start p-4 rounded-t border-b">
                                              <h3 class="text-2xl font-logo-text text-green-900 ">
                                                  Terms of Service
                                              </h3>
                                              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal">
                                                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                  <span class="sr-only">Close modal</span>
                                              </button>
                                          </div>
                                          <!-- Modal body -->
                                          <div class="p-6 space-y-6">
                                            <p class="font-paragraph-text text-sm sm:text-base leading-relaxed text-gray-800">
                                                When you create an account with us, you must provide us information that is accurate, complete, and
                                                current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate
                                                termination of your account on our service. <br>
                                                You are responsible for safeguarding the password that You use to access the service and for any activities
                                                or actions under your password, whether your password is with our service or a third-party Social Media
                                                Service. <br>
                                                You agree not to disclose your password to any third party. You must notify us immediately upon becoming
                                                aware of any breach of security or unauthorized use of Your account. <br>
                                                You may not use as a username the name of another person or entity or that is not lawfully available for
                                                use, a name or trademark that is subject to any rights of another person or entity other than you without
                                                appropriate authorization, or a name that is otherwise offensive, vulgar or obscene.
                                            </p>          
                                        </div>

                                      </div>
                                  </div>
                              </div>

                              <div id="medium-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex justify-between items-center p-5 rounded-t border-b">
                                            <h3 class="text-2xl font-logo-text text-green-900">
                                                Privacy Policy
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="medium-modal">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                <span class="sr-only">Close modal</span> 
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6">
                                            <p class="font-paragraph-text text-base leading-relaxed text-gray-800">
                                                All employees and personnel of the school shall maintain the confidentiality and secrecy of all personal data that come to their 
                                                knowledge and possession, even after resignation, termination of contract, or other contractual relations. Personal data under 
                                                the custody of the school shall be disclosed only pursuant to a lawful purpose, and to authorized recipients of such data.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @error('agree')
                            <div class="text-red-500 text-md">
                                {{ $message }}
                            </div>
                            @enderror

                        <div>
                            <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-white transition-all duration-200 bg-green-900 border border-transparent rounded-md focus:outline-none hover:bg-green-500 focus:bg-green-200 focus:text-green-900">
                                Create free account
                            </button>
                        </div>
                    </div>
                </form>

                <div class="mt-3 space-y-3">
                    <a href="{{ route('google.auth') }}"><button
                        type="button"
                        class="relative inline-flex items-center justify-center w-full px-4 py-4 text-base font-semibold text-gray-700 transition-all duration-200 bg-white border-2 border-gray-200 rounded-md hover:bg-gray-100 focus:bg-gray-100 hover:text-black focus:text-black focus:outline-none">
                        <div class="absolute inset-y-0 left-0 p-4">
                            <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z"></path>
                            </svg>
                        </div>Sign up with Google</button></a>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection