@vite('resources/css/app.css')


<section class=" mt-20 mb-20 sm:mt-0">
    <div class="grid grid-cols-1">
        <div class="flex items-center justify-center px-4 py-10sm:px-6 lg:px-8 sm:py-16 lg:py-24">
            <div class="xl:w-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">
                <h2 class="text-3xl font-logo-text leading-tight text-green-900 sm:text-4xl">Reset Passoword</h2>
                <p class="font-paragraph-text mt-2 text-base text-gray-600">Enter your new password</p>

                @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
                @endif
                <form action="{{ route('password.update') }}" method="POST" class="mt-8">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="space-y-5">
                        <div>
                            <label for="" class="text-base font-paragraph-text text-gray-900"> Email address </label>
                            <div class="mt-2.5">
                                <input
                                    type="email"
                                    name="email" 
                                    value="{{ $email ?? old('email') }}"
                                    class=" @error('email') border-red-500 @enderror block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-green-900 rounded-md
                                     bg-gray-50 focus:outline-none focus:border-green-900"/>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label for="" class="text-base font-paragraph-text text-gray-900"> Password </label>
                            </div>
                            <div class="mt-2.5">
                                @error('password')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                                <input
                                    type="password"
                                    name="password"
                                    id="password"
                                    placeholder="Enter your password"
                                    class=" @error('password') border-red-500 @enderror block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-green-900 rounded-md bg-gray-50 focus:outline-none focus:border-green-900"
                                />
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password-confirm" class="text-base font-paragraph-text text-gray-900"> Confirm Password </label>
                            </div>
                            <div class="mt-2.5">
                                @error('password_confirmation')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                                <input
                                    id="password-confirm" 
                                    type="password"
                                    name="password_confirmation" 
                                    required autocomplete="new-password"
                                    placeholder="Confirm your password"
                                    class=" @error('password_confirmation') border-red-500 @enderror block w-full p-4 text-black placeholder-gray-500 transition-all duration-200 border border-green-900 rounded-md bg-gray-50 focus:outline-none focus:border-green-900"
                                />
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="inline-flex items-center justify-center w-full px-4 py-4 text-base font-paragraph-text text-white transition-all duration-200
                             bg-green-900 border border-transparent rounded-md focus:outline-none hover:text-green-900 hover:bg-green-100 focus:bg-green-300">{{ __('Reset Password') }}</button>
                        </div>
                    </div>
                </form>
                <div class="mt-2.5">
            </div>
        </div>

    </div>
</section>
