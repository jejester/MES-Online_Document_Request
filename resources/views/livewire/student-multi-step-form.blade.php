<div class="">
    @if(session()->has('message'))
    <div class="text-md font-nav-text text-white mx-auto bg-red-600 rounded-2xl py-3 px-3 md:max-w-2xl text-center mt-5 mb-5">
    {{ session()->get('message') }}
    </div>
    @endif


    
    {{-- @if (date("l")== "Saturday" || date("l")== "Sunday" /*| date("H:i") >= "17:01"*/)
    
        <div class="relative flex flex-col mb-10 w-80 sm:w-6/12 m-auto shadow-lg bg-gray-100 bg-opacity-80 rounded-lg p-10">
                    <div class="m-auto flex flex-col lg:flex-col mb-1 sm:mb-10">
                        <div class="w-full pr-4 pl-4">
                            <div class="mb-4 lg:mb-0">
                                <img class="h-52 w-52 mx-auto" src="{{ asset('images/caution.png') }}" alt="">
                            </div>
                        </div>
    
                        <div class="w-full pr-4 pl-4">
                            <div class="mb-4 lg:mb-0">
                                <p class="font-title-text text-center mx-auto">Website is currently close</p>
                            </div>
                        </div>
                    </div>
            </div>


    @else --}}
    
    <form wire:submit.prevent="register">
        @csrf

        {{-- STEP 1 --}}

        @if ($currentStep == 1)

        
            
     
        <div class="step-one">
         
            <div class="relative flex flex-col mb-10 w-80 sm:w-6/12 m-auto shadow-lg bg-gray-100 bg-opacity-80 rounded-lg p-10">
                <div class="mx-auto container flex justify-between">
                    <div class="text-sm sm:text-2xl text-center border-gray-300 text-green-900 font-logo-text">STEP: 1 of 4</div>
                    <div class="hidden md:flex text-xs font-thin py-1 sm:text-lg text-center sm:py-3 border-gray-300 text-green-900 font-nav-text">Fill out the necessary information</div>
                    <div class="text-xs font-thin py-1 sm:text-lg text-center sm:py-3 border-gray-300 text-green-900 font-logo-text">Student Information</div>
                </div>
                <hr class="border-green-600 m-4">
                <div class="m-auto flex-col sm:p-6 mb-5">
                    <div class="flex flex-col">
                        <div class="w-full pr-4 pl-4">
                            <div class="mb-4">
                                <label for="first_name" class="font-title-text text-green-900">First Name</label>
                                <input type="text" class=" font-nav-text w-full py-3 px-5 mb-1
                                bg-white rounded-lg border-white shadow-lg text-sm md:text-base placeholder:text-xs md:placeholder:text-base" placeholder="Enter student's first name" wire:model="first_name">
                               <span class=" text-sm text-red-600">@error('first_name'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="w-full pr-4 pl-4">
                           <div class="mb-4">
                               <label for="middle_name" class="font-title-text text-green-900">Middle name</label>
                               <input type="text" class="font-nav-text w-full py-3 px-5 mb-1
                               bg-white rounded-lg border-white shadow-lg text-sm md:text-base placeholder:text-xs md:placeholder:text-base" placeholder="Enter student's last name" wire:model="middle_name">
                               <span class="text-red-600 text-sm">@error('middle_name'){{ $message }}@enderror</span>
                           </div>
                       </div>
                       <div class="w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label for="last_name" class="font-title-text text-green-900">Last name</label>
                            <input type="text" class=" font-nav-text w-full py-3 px-5 mb-1
                            bg-white rounded-lg border-white shadow-lg text-sm md:text-base placeholder:text-xs md:placeholder:text-base" placeholder="Enter student's last name" wire:model="last_name">
                            <span class="text-red-600 text-sm">@error('last_name'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    </div>
                    <div class="flex ">
                        <div class="w-full pr-4 pl-4">
                            <div class="mb-4" >
                                <label for="gender" class="font-title-text text-green-900">Gender</label>
                                <select class=" text-gray-800 font-nav-text text-md w-full py-3 px-5 mb-1
                                bg-white rounded-lg border-white shadow-lg text-sm md:text-base" wire:model="gender">
                                       <option value="" selected >Select gender</option>
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                </select>
                                <span class="text-red-600 text-sm">@error('gender'){{ $message }}@enderror</span>
                            </div>
                        </div>
        
                    </div>

                    <div class="w-full pr-4 pl-4">
                        <div class="mb-4">
                            <label for="birthday" class="font-title-text text-green-900">Birthday</label>
                            <input type="date" class="font-nav-text w-full py-3 px-5 mb-1
                            bg-white rounded-lg border-white shadow-lg text-sm md:text-base text-gray-800 placeholder:text-xs md:placeholder:text-base" placeholder="Enter your birthday" wire:model="birthday">
                            <span class="text-red-600 text-sm">@error('birthday'){{ $message }}@enderror</span>
                        </div>
                    </div>

                    <div class="flex-col w-full pl-4">
                        <input type="checkbox" name="terms" id="terms"  wire:model="terms" class="@error('terms') border-red-500 @enderror w-4 h-4 mr-1 text-blue-600 focus:outline-lime-900 bg-white border-gray-500 rounded-full" />
                    
                        <label for="terms" class=" text-sm sm:text-base font-paragraph-text text-gray-700">I agree to</label>

                        <button class=" text-teal-800 text-sm sm:text-base  hover:underline 
                        font-paragraph-text text-center" type="button" data-modal-toggle="defaultModal">Terms of Service</button>

                        <label for="terms" class="text-sm sm:text-base  font-paragraph-text text-gray-700">and</label> 

                        <button class=" text-teal-800 hover:underline text-sm sm:text-base 
                        font-paragraph-text text-center" type="button" data-modal-toggle="medium-modal">Privacy Policy</button>

                        

                    </div>

                    <span class="text-red-600 text-sm pl-4">@error('terms'){{ $message }}@enderror</span>
                        <!-- Main modal -->
                        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow">
                                    <!-- Modal header -->
                                    <div class="flex justify-between items-start p-4 rounded-t border-b">
                                        <h3 class="text-2xl font-logo-text text-success-900 ">
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
                                    <h3 class="text-2xl font-logo-text text-success-900">
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
        



                <div class="flex justify-between w-auto mx-6 sm:w-96 sm:m-auto">

                    @if($currentStep == 1)
                     <div></div>
                    @endif
        
                     
                     @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                         <button type="button" class="px-4 text-sm font-nav-text rounded-full py-2 sm:px-8  sm:text-lg  bg-green-900 text-white hover:bg-green-500" wire:click="increaseStep()">Next</button>
                     @endif
                     
                         
                        
                  </div>
         


            </div>
        </div>
        @endif

        {{-- STEP 2 --}}

        @if ($currentStep == 2)
            
       
        <div class="step-two">
            <div class="relative flex flex-col mb-10 w-80 sm:w-6/12 m-auto shadow-lg bg-gray-100 bg-opacity-80 rounded-lg p-10">
                <div class="mx-auto container flex justify-between">
                    <div class="text-sm sm:text-2xl text-center border-gray-300 text-green-900 font-logo-text">STEP: 2 of 4</div>
                    <div class="text-xs font-thin  py-1 sm:text-lg text-center sm:py-3 border-gray-300 text-green-900 font-logo-text">Contact Details</div>
                    <div class="hidden text-center border-gray-300 text-green-900 font-logo-text">  </div>
                    <div class="hidden text-center border-gray-300 text-green-900 font-logo-text">  </div>
                </div>
                <hr class="border-green-600 m-4">
                <div class="m-auto flex-col sm:p-6 mb-5">
                    <div class="flex flex-col">
                        <div class="w-full pr-4 pl-4">
                            <div class="mb-4">
                                <label for="email" class="font-title-text text-green-900">Email Address</label>
                                <input type="email" class="font-nav-text w-full py-3 px-5 mb-1
                                bg-white rounded-lg border-white shadow-lg text-sm md:text-base placeholder:text-xs md:placeholder:text-base" placeholder="Enter email address" wire:model="email">
                                <span class="text-red-600 text-sm">@error('email'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        <div class="w-full pr-4 pl-4">
                           <div class="mb-4">
                               <label for="contact" class="font-title-text text-green-900">Phone Number</label>
                               <input type="text" class="font-nav-text w-full py-3 px-5 mb-1
                               bg-white rounded-lg border-white shadow-lg text-sm md:text-base  placeholder:text-xs md:placeholder:text-base" placeholder="09XXXXXXXXX" wire:model="contact">
                               <span class="text-red-600 text-sm">@error('contact'){{ $message }}@enderror</span>
                           </div>
                       </div>
                    </div>
                    <div class="flex">
                        <div class="w-full pr-4 pl-4">
                            <div class="mb-4">
                                <label for="address" class="font-title-text text-green-900">Address</label>
                                <input type="text" class="font-nav-text w-full py-3 px-5 mb-1
                                bg-white rounded-lg border-white shadow-lg text-sm md:text-base  placeholder:text-xs md:placeholder:text-base" placeholder="Enter address" wire:model="address">
                                <span class="text-red-600 text-sm">@error('address'){{ $message }}@enderror</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="flex justify-between w-auto mx-6 sm:w-96 sm:m-auto">

                    @if($currentStep == 1)
                     <div></div>
                    @endif
          
                     @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                         <button type="button" class="px-4 text-sm font-nav-text rounded-full py-2 sm:px-8 sm:text-lg bg-green-900 text-white hover:bg-green-500" wire:click="decreaseStep()">Back</button>
                     @endif
                     
                     @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                         <button type="button" class="px-4 text-sm font-nav-text rounded-full py-2 sm:px-8  sm:text-lg  bg-green-900 text-white hover:bg-green-500" wire:click="increaseStep()">Next</button>
                     @endif
                     
            
                         
                        
                  </div>


            </div>
        </div>

        @endif
        {{-- STEP 3 --}}

        @if ($currentStep == 3)
            
    
        <div class="step-three">
            <div class="relative flex flex-col mb-10 w-80 sm:w-6/12 m-auto shadow-lg bg-gray-100 bg-opacity-80 rounded-lg p-10">
                <div class="mx-auto container flex justify-between">
                    <div class="text-sm sm:text-2xl text-center border-gray-300 text-green-900 font-logo-text">STEP: 3 of 4</div>
                    <div class="text-xs font-thin  py-1 sm:text-lg text-center sm:py-3 border-gray-300 text-green-900 font-logo-text">Student Details</div>
                    <div class="hidden text-center border-gray-300 text-green-900 font-logo-text">  </div>
                    <div class="hidden text-center border-gray-300 text-green-900 font-logo-text">  </div>
                </div>
                <hr class="border-green-600 m-4">
                    <div class="m-auto flex-col sm:p-6 mb-5">
                        
                        <div class="flex">
                            <div class="w-full pr-4 pl-4">
                                <div class="mb-4" >
                                    <label for="grade" class="font-title-text text-green-900">Grade Level</label>
                                    <select class=" text-gray-800 font-nav-text w-full py-3 px-5 mb-1
                                    bg-white rounded-lg border-white shadow-lg text-sm md:text-base  placeholder:text-xs md:placeholder:text-base" wire:model="grade">
                                           <option value="" selected>Student's current grade</option>
                                           <option value="Kinder">Kinder</option>
                                           <option value="Grade 1">Grade 1</option>
                                           <option value="Grade 2">Grade 2</option>
                                           <option value="Grade 3">Grade 3</option>
                                           <option value="Grade 4">Grade 4</option>
                                           <option value="Grade 5">Grade 5</option>
                                           <option value="Grade 6">Grade 6</option>
                                           {{-- <option value="Alumni">Alumni</option> --}}
                                    </select>
                                    <span class="text-red-600 text-sm">@error('grade'){{ $message }}@enderror</span>
                                </div>
                            </div>
                        </div>


                        {{-- @if ($grade == "Alumni")
                        <div class="w-full pr-4 pl-4">
                            <div class="mb-4">
                                <label for="section" class="font-title-text text-base text-green-900">Year Graduated</label>
                                <input type="text" class="font-nav-text w-full py-3 px-5 mb-1
                                bg-white rounded-lg border-white shadow-lg text-sm md:text-base  placeholder:text-xs md:placeholder:text-base" placeholder="Enter year graduated" wire:model="section">
                                <span class="text-red-600 text-sm">@error('section'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        @else --}}
                        <div class="w-full pr-4 pl-4">
                            <div class="mb-4">
                                <label for="section" class="font-title-text text-base text-green-900">Section Name</label>
                                <input type="text" class="font-nav-text w-full py-3 px-5 mb-1
                                bg-white rounded-lg border-white shadow-lg text-sm md:text-base  placeholder:text-xs md:placeholder:text-base" placeholder="Enter student's Section" wire:model="section">
                                <span class="text-red-600 text-sm">@error('section'){{ $message }}@enderror</span>
                            </div>
                        </div>
                        {{-- @endif --}}

                       

                      

                            

                            <div class="w-full pr-4 pl-4">
                                <div class="mb-4">
                                    <label for="lrn" class="font-title-text text-base text-green-900">Learner Reference Number (LRN)</label>
                                    <input type="text" class="font-nav-text w-full py-3 px-5 mb-1
                                    bg-white rounded-lg border-white shadow-lg text-sm md:text-base  placeholder:text-xs md:placeholder:text-base" placeholder="Enter student's LRN" wire:model="lrn">
                                    <span class="text-red-600 text-sm">@error('lrn'){{ $message }}@enderror</span>
                                </div>
                            </div>


                            <div class="flex">
                                <div class="w-full pr-4 pl-4">
                                    <div class="mb-4" >
                                        <label for="document" class="font-title-text text-green-900">Document Requesting</label>
                                        <select class=" text-gray-800 font-nav-text w-full py-3 px-5 mb-1
                                        bg-white rounded-lg border-white shadow-lg text-sm md:text-base  placeholder:text-xs md:placeholder:text-base" wire:model="document">
                                               <option value="" selected>Select document</option>
                                               <option value="Form-137">Form-137</option>
                                               <option value="Certificate of Enrollment">Certificate of Enrollment</option>
                                               <option value="Certificate of Graduation">Certificate of Graduation</option>
                                               <option value="Certificate of Good Moral">Certificate of Good Moral</option>
                                        </select>
                                        <span class="text-red-600 text-sm">@error('document'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                    </div>

              

                    

                    <div class="flex justify-between w-auto mx-6 sm:w-96 sm:m-auto">

                        @if($currentStep == 1)
                         <div></div>
                        @endif
              
                         @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                             <button type="button" class="px-4 text-sm font-nav-text rounded-full py-2 sm:px-8 sm:text-lg bg-green-900 text-white hover:bg-green-500" wire:click="decreaseStep()">Back</button>
                         @endif
                         
                         @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3)
                             <button type="button" class="px-4 text-sm font-nav-text rounded-full py-2 sm:px-8  sm:text-lg  bg-green-900 text-white hover:bg-green-500" wire:click="increaseStep()">Next</button>
                         @endif

                         
                    
                            
                      </div>


            </div>
        </div>
        @endif

        {{-- STEP 4 --}}
        @if ($currentStep == 4)
            
    
        <div class="step-four">
            <div class="relative flex flex-col mb-10 w-80 sm:w-6/12 m-auto shadow-lg bg-gray-100 bg-opacity-80 rounded-lg p-10">
                <div class="mx-auto container flex justify-between">
                        <div class="text-sm sm:text-2xl text-center border-gray-300 text-green-900 font-logo-text">STEP: 4 of 4</div>
                        <div class="hidden md:flex text-xs font-thin py-1 sm:text-lg text-center sm:py-3 border-gray-300 text-green-900 font-nav-text">Please review the information that you input</div>
                        <div class="text-xs font-thin  py-1 sm:text-lg text-center sm:py-3 border-gray-300 text-green-900 font-logo-text">Review Request Details</div>
                    </div>
                    <hr class="border-green-600 m-4 mb-9">

                    
                        <div class="m-auto flex flex-col lg:flex-row sm:p-6">
                            <div class="w-full pr-4 pl-4">
                                <div class="mb-4 lg:mb-0">
                                    <label for="first_name" class="font-title-text">First Name</label>
                                    <input type="text" class="text-green-900 font-nav-text w-full py-3 px-5 mb-1
                                    bg-white rounded-lg border-white text-sm md:text-base placeholder:text-xs md:placeholder:text-base" value="{{ $first_name }}" wire:model="first_name" disabled>
                                </div>
                            </div>
        
                            <div class="w-full pr-4 pl-4">
                                <div class="mb-4 lg:mb-0">
                                    <label for="first_name" class="font-title-text">Last Name</label>
                                    <input type="text" class="text-green-900 font-nav-text w-full py-3 px-5 mb-1
                                    bg-white rounded-lg border-white  text-sm md:text-base placeholder:text-xs md:placeholder:text-base" value="{{ $last_name }}" wire:model="last_name" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="m-auto flex flex-col lg:flex-row sm:p-6">
                            <div class="w-full pr-4 pl-4">
                                <div class="mb-4 lg:mb-0">
                                    <label for="first_name" class="font-title-text">Grade Level</label>
                                    <input type="text" class="text-green-900 font-nav-text w-full py-3 px-5 mb-1
                                    bg-white rounded-lg border-white text-sm md:text-base placeholder:text-xs md:placeholder:text-base" value="{{ $grade }}" wire:model="grade" disabled>
                                </div>
                            </div>
        
                            <div class="w-full pr-4 pl-4">
                                <div class="mb-4 lg:mb-0">
                                    <label for="first_name" class="font-title-text">Section</label>
                                    <input type="text" class="text-green-900 font-nav-text w-full py-3 px-5 mb-1
                                    bg-white rounded-lg border-white  text-sm md:text-base placeholder:text-xs md:placeholder:text-base" value="{{ $section }}" wire:model="section" disabled>
                                </div>
                            </div>
                        </div>
    
                        <div class="m-auto flex flex-col lg:flex-row sm:p-6">
                            <div class="w-full pr-4 pl-4">
                                <div class="mb-4 lg:mb-0">
                                    <label for="first_name" class="font-title-text">LRN</label>
                                    <input type="text" class="text-green-900 font-nav-text w-full py-3 px-5 mb-1
                                    bg-white rounded-lg border-white text-sm md:text-base placeholder:text-xs md:placeholder:text-base" value="{{ $lrn }}" wire:model="lrn" disabled>
                                </div>
                            </div>
        
                            <div class="w-full pr-4 pl-4">
                                <div class="mb-4 lg:mb-0">
                                    <label for="first_name" class="font-title-text text-base">Requested Document</label>
                                    <input type="text" class="text-green-900 font-nav-text w-full py-3 px-5 mb-1
                                    bg-white rounded-lg border-white  text-sm md:text-base placeholder:text-xs md:placeholder:text-base" value="{{ $document }}" wire:model="document" disabled>
                                </div>
                            </div>
                        </div>
    
                        <div class="mx-auto flex flex-col lg:flex-row sm:p-6 mb-5">
                            <div class="w-full pr-4 pl-4 ">
                                <div class="mb-4 lg:mb-0">
                                    <label for="first_name" class="font-title-text">Contact Number</label>
                                    <input type="text" class="text-green-900 font-nav-text w-full py-3 px-5 mb-1
                                    bg-white rounded-lg border-white text-sm md:text-base placeholder:text-xs md:placeholder:text-base" value="{{ $contact }}" wire:model="contact" disabled>
                                </div>
                            </div>
        
                            <div class="w-full pr-4 pl-4">
                                <div class="mb-4 lg:mb-0">
                                    <label for="first_name" class="font-title-text">Email</label>
                                    <input type="text" class="text-green-900 font-nav-text w-full py-3 px-5 mb-1
                                    bg-white rounded-lg border-white text-sm md:text-base placeholder:text-xs md:placeholder:text-base" value="{{ $email }}" wire:model="email" disabled>
                                </div>
                            </div>
                        </div>
                   

                        <div class="flex justify-between w-auto mx-6 sm:w-96 sm:m-auto">

                            @if($currentStep == 1)
                             <div></div>
                            @endif
                  
                             @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4)
                                 <button type="button" class="px-4 text-sm font-nav-text rounded-full py-2 sm:px-8 sm:text-lg bg-green-900 text-white hover:bg-green-500" wire:click="decreaseStep()">Back</button>
                             @endif
                             
                             @if ($currentStep == 4)
                                  <button type="button" class="px-4 text-sm font-nav-text rounded-full py-2 sm:px-8  sm:text-lg  bg-success-800 text-white hover:bg-success-400" wire:click="increaseStep()">Submit</button>
                             @endif
                                 
                                
                          </div>
                </div>
            </div>
        </div>

        @endif


        @if ($currentStep == 5)
            
    
        <div class="step-five">
            <div class="relative flex flex-col mb-10 w-80 sm:w-6/12 m-auto shadow-lg bg-gray-100 bg-opacity-80 rounded-lg p-10">
                        <div class="m-auto flex flex-col lg:flex-col mb-1 sm:mb-10">
                            <div class="w-full pr-4 pl-4">
                                
                                <div class="mb-4 lg:mb-0">
                                    <img class="h-52 w-52 mx-auto" src="{{ asset('images/caution.png') }}" alt="">
                                </div>
                            </div>
        
                            <div class="w-full pr-4 pl-4">
                                <div class="mb-4 lg:mb-0">
                                    <p class="font-title-text text-center mx-auto">Are you sure you've reviewed your details and want to submit your request?</p>
                                </div>
                            </div>
                        </div>

                        <div class="mx-auto mb-10">
                            <div wire:loading>
                                <div role="status">
                                    <svg aria-hidden="true" class="w-20 h-20 text-gray-200 animate-spin fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>

                          </div>

                        <div class="flex justify-between w-auto sm:w-auto sm:m-auto mt-5">

                            @if($currentStep == 1)
                             <div></div>
                            @endif
                  
                             @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5)
                                 <button type="button" class="px-4 sm:mr-5 text-sm font-nav-text rounded-full py-2 sm:px-8 sm:text-lg bg-green-900 text-white hover:bg-green-500" wire:click="decreaseStep()">Back</button>
                             @endif
                            
                             @if ($currentStep == 5)
                                  <button type="submit" class="px-4 sm:ml-5 text-sm font-nav-text rounded-full py-2 sm:px-8  sm:text-lg bg-success-700 text-white hover:bg-success-400">Yes</button>
                                  
                             @endif 
                                
                          </div>

                </div>



            </div>

            
        </div>

        @endif

    </form>

    {{-- @endif --}}

</div>