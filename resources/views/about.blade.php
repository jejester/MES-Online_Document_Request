@extends('layouts.app')

@section('content')
<section class="py-10 sm:py-16 lg:py-24">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid items-center grid-cols-1 gap-12 lg:grid-cols-2">
                <div>
                    <h1 class="mt-4 text-4xl font-bold text-green-900 lg:mt-8 sm:text-6xl xl:text-8xl">Maligaya Elementary School</h1>
                    <a href="https://goo.gl/maps/deyBxUy2Ua6XRL1L9" target="blank"><p class="mt-6 text-lg sm:text-2xl font-paragraph-text 
                        leading-relaxed text-gray-900 hover:text-gray-500">Ilang Ilang St. Maligaya Park Subd. Brgy. Pasong Putik, Quezon City</p></a>
                   
                </div>
                <div>
                    <img class="w-full" src="{{ asset('images/hero-img.png') }}" alt="" />
                </div>
            </div>
        </div>
</section>


<section class="py-10 sm:py-16 lg:py-24 bg-white">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid items-center grid-cols-1 lg:grid-cols-2 gap-x-12 xl:gap-x-24 gap-y-12">
            <div class="hidden relative sm:flex lg:mb-12">
                <img class="absolute -right-0 -bottom-8 xl:-bottom-12 xl:-right-4" src="https://cdn.rareblocks.xyz/collection/celebration/images/content/3/dots-pattern.svg" alt="" />
                <div class="pl-12 pr-6">
                    <img class="relative rounded-lg opacity-90" src="{{ asset('images/about_st.jpg') }}" alt="" />
                </div>
            </div>

            <div class="2xl:pl-16">
                <h2 class="text-3xl font-logo-text leading-tight text-green-900 sm:text-4xl lg:text-5xl lg:leading-10">Mission</h2>
                <p class="text-xl font-paragraph-text text-gray-900 mt-9">To protect and promote the right of every Filipino to quality, equitable, culture-based and complete basic education where:</p>
                <blockquote class="mt-4 text-xl italic font-paragraph-text">
                    <svg aria-hidden="true" class="w-10 h-10 text-gray-600" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/></svg>
                    <p class="text-xl font-paragraph-text text-gray-700">Students learn in a friendly, gender-sensitive, safe and motivating environment.
                        Teachers facilitate learning and constantly nurture every learner
                        Administrators and staff as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen.
                        Family, community and other stakeholders are actively engaged and share responsibility for developing lifelong learner.”</p>
                </blockquote>
            </div>


            <div class="relative sm:hidden lg:mb-12">
                <img class="absolute -right-0 -bottom-8 xl:-bottom-12 xl:-right-4" src="https://cdn.rareblocks.xyz/collection/celebration/images/content/3/dots-pattern.svg" alt="" />
                <div class="pl-12 pr-6">
                    <img class="relative rounded-lg opacity-90" src="{{ asset('images/about_st.jpg') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-10 sm:py-16 lg:py-24 bg-white bg-opacity-50">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid items-center grid-cols-1 lg:grid-cols-2 gap-x-12 xl:gap-x-24 gap-y-12">
            <div class="2xl:pl-16">
                <h2 class="text-3xl font-logo-text leading-tight text-green-900 sm:text-4xl lg:text-5xl lg:leading-tight">Vision</h2>
                <p class="text-xl font-paragraph-text text-gray-900 mt-9">We dream of Filipinos who passionately love their country and whose values and competencies enable them to realize their full potential and contribute meaningfully to building the nation. As a learner-centered public institution, the Department of Education continuously improves itself to better serve its stakeholders.</p>
            </div>

            <div class="relative lg:mb-12">
                <img class="absolute -right-0 -bottom-8 xl:-bottom-12 xl:-right-4" src="https://cdn.rareblocks.xyz/collection/celebration/images/content/3/dots-pattern.svg" alt="" />
                <div class="pl-12 pr-6">
                    <img class="relative rounded-lg opacity-90" src="{{ asset('images/happy.jpg') }}" alt="" />
                </div>
            </div>

        </div>
    </div>
</section>


<section class="py-10 bg-white sm:py-16 lg:py-24">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl font-logo-text leading-tight text-green-900 sm:text-4xl lg:text-5xl">Core Values</h2>
        </div>

        <div class="grid grid-cols-1 gap-6 mt-8 lg:mt-16 xl:gap-10 sm:grid-cols-2 lg:grid-cols-2">
            <div class="overflow-hidden bg-white rounded-lg shadow-xl hover:shadow-2xl hover:shadow-red-300">
                <div class="p-8">
                    <div class="flex items-center">
                        <img class="flex-shrink-0 w-12 h-auto" src="{{ asset('images/makadiyos.png') }}" alt="" />
                        <div class="ml-5 mr-auto">
                            <p class="text-xl font-title-text text-black">Makadiyos</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center mt-5">
                            <ul class="mb-8 space-y-4 text-center text-gray-700 font-paragraph-text">
                                <li class="flex items-center space-x-3">
                                    <!-- Icon -->
                                    <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    <span>Manalangin</span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <!-- Icon -->
                                    <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    <span>Gawing sentro ng buhay ang Diyos</span>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden bg-white rounded shadow-xl hover:shadow-2xl hover:shadow-yellow-300">
                <div class="p-8">
                    <div class="flex items-center">
                        <img class="flex-shrink-0 w-12 h-auto" src="{{ asset('images/makatao.png') }}" alt="" />
                        <div class="ml-5 mr-auto">
                            <p class="text-xl font-title-text text-black">Makatao</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center mt-5">
                        <ul class="mb-8 space-y-4 text-center text-gray-700 font-paragraph-text">
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Magmalasakit at ipakita ang respeto.</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Magbahagi lamang ng tamang impormasyon at totoong balita.</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Tumulong sa abot ng inyong makakaya.</span>
                            </li>
                        </ul>
                </div>
                </div>
            </div>

            <div class="overflow-hidden bg-white rounded shadow-xl hover:shadow-2xl hover:shadow-green-300">
                <div class="p-8">
                    <div class="flex items-center">
                        <img class="flex-shrink-0 w-12 h-auto" src="{{ asset('images/makakalikasan.png') }}" alt="" />
                        <div class="ml-5 mr-auto">
                            <p class="text-xl font-title-text text-black">Makakalikasan</p>
        
                        </div>
                    </div>
                    <div class="flex items-center justify-center mt-9">
                    <ul class="mb-8 space-y-4 text-center text-gray-700 font-paragraph-text">
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Maglinis ng inyong bahay</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Magtanim ng halaman</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Maging disiplinado</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                            <span>Reuse, Reduce, Recycle</span>
                        </li>
                    </ul>
                </div>
                </div>
            </div>

            <div class="overflow-hidden bg-white rounded shadow-xl hover:shadow-2xl hover:shadow-primary-300">
                <div class="p-8">
                    <div class="flex items-center">
                        <img class="flex-shrink-0 w-12 h-auto" src="{{ asset('images/makabansa.png') }}" alt="" />
                        <div class="ml-5 mr-auto">
                            <p class="text-xl font-title-text text-black">Makabansa</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center mt-5">
                        <ul class="mb-8 space-y-4 text-center text-gray-700 font-paragraph-text">
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Sumunod sa tuntunin</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Makiisa sa inyong komunidad</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Makipag-ugnayan ng maayos sa inyong barangay</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Ipakita ang tama</span>
                            </li>
                            <li class="flex items-center space-x-3">
                                <!-- Icon -->
                                <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                <span>Ipagmalaki na ikaw ay Pilipino sa isip, sa salita at sa gawa</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
</section>


<section class="py-10 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl font-logo-text leading-tight text-green-900 sm:text-4xl lg:text-5xl">How does the website work</h2>
            <p class="max-w-lg mx-auto mt-4 text-lg font-paragraph-text leading-relaxed text-gray-800">With these simple steps you can requests your documents.</p>
        </div>

        <ul class="max-w-md mx-auto mt-16 space-y-12">
            <li class="relative flex items-start">
                <div class="-ml-0.5 absolute mt-0.5 top-14 left-8 w-px border-l-4 border-dotted border-gray-300 h-full" aria-hidden="true"></div>

                <div class="relative flex items-center justify-center flex-shrink-0 w-16 h-16 bg-white rounded-full shadow">
                    <svg class="w-10 h-10 text-pink-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class="ml-6">
                    <h3 class="text-xl font-title-text text-black">Create a free account</h3>
                    <p class="mt-4 text-lg font-paragraph-text text-gray-800">Sign in or create your account for free, you will also required to verify your email before accessing the site.</p>
                </div>
            </li>

            <li class="relative flex items-start">
                <div class="-ml-0.5 absolute mt-0.5 top-14 left-8 w-px border-l-4 border-dotted border-gray-300 h-full" aria-hidden="true"></div>

                <div class="relative flex items-center justify-center flex-shrink-0 w-16 h-16 bg-white rounded-full shadow">
                    <svg class="w-10 h-10 text-pink-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                    </svg>
                </div>
                <div class="ml-6">
                    <h3 class="text-xl font-title-text text-black">Request a Document</h3>
                    <p class="mt-4 text-lg font-paragraph-text text-gray-800">Fill up the necessary information then submit.</p>
                </div>
            </li>

            <li class="relative flex items-start">
                <div class="relative flex items-center justify-center flex-shrink-0 w-16 h-16 bg-white rounded-full shadow">
                    <svg class="w-10 h-10 text-pink-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div class="ml-6">
                    <h3 class="text-xl font-title-text text-black">Wait for the pick-up notification</h3>
                    <p class="mt-4 text-lg font-paragraph-text text-gray-800">A notification will be sent to you via email if your document is ready to pickup.</p>
                </div>
            </li>
        </ul>
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