

<div class="">


    
    
    <form wire:submit.prevent="register">
        @csrf

        {{-- STEP 1 --}}

        @if ($currentStep == 1)

        
            
     
        <div class="step-one">
         
            <div class="relative flex flex-col mb-10 w-80 m-auto shadow-lg sm:w-auto sm:ml-28 sm:mr-28 bg-yellow-100 rounded-lg p-10">
                <div class="mx-auto container flex justify-between">
                    <div class="text-sm sm:text-2xl text-center border-gray-300 text-green-900 font-logo-text">STEP: 1 of 4</div>
                    <div class="hidden md:flex text-xs font-thin py-1 sm:text-lg text-center sm:py-3 border-gray-300 text-green-900 font-nav-text">Fill out the necessary information</div>
                    <div class="text-xs font-thin py-1 sm:text-lg text-center sm:py-3 border-gray-300 text-green-900 font-logo-text">Personal Information</div>
                </div>
                <hr class="border-green-600 m-4">
                <div class="m-auto flex-col sm:p-6">
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
                                       <option value="No_response">Prefer not to respond</option>
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
                        <input type="checkbox" name="terms" id="terms"  wire:model="terms" class="@error('terms') border-red-500 @enderror w-4 h-4 mr-1 text-green-600 focus:outline-lime-900 bg-white border-gray-200 rounded-full" />
                    
                        <label for="terms" class=" text-sm sm:text-base font-paragraph-text text-gray-700">I agree to</label>

                        <button class=" text-yellow-600 text-sm sm:text-base  hover:underline 
                        font-paragraph-text text-center" type="button" data-modal-toggle="defaultModal">Terms of Service</button>

                        <label for="terms" class="text-sm sm:text-base  font-paragraph-text text-gray-700">and</label> 

                        <button class=" text-yellow-600 hover:underline text-sm sm:text-base 
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
                                        <p class="font-paragraph-text text-base leading-relaxed text-gray-800">
                                            With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                                        </p>
                                        <p class="font-paragraph-text text-base leading-relaxed text-gray-800">
                                            The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
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
                                        With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                                    </p>
                                    <p class="font-paragraph-text text-base leading-relaxed text-gray-800">
                                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
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
            <div class="relative flex flex-col mb-10 w-80 m-auto shadow-lg sm:w-auto sm:ml-28 sm:mr-28 bg-yellow-100 rounded-lg p-10">
                <div class="mx-auto container flex justify-between">
                    <div class="text-sm sm:text-2xl text-center border-gray-300 text-green-900 font-logo-text">STEP: 2 of 4</div>
                    <div class="text-xs font-thin  py-1 sm:text-lg text-center sm:py-3 border-gray-300 text-green-900 font-logo-text">Contact Details</div>
                    <div class="hidden text-center border-gray-300 text-green-900 font-logo-text">  </div>
                    <div class="hidden text-center border-gray-300 text-green-900 font-logo-text">  </div>
                </div>
                <hr class="border-green-600 m-4">
                <div class="m-auto flex-col sm:p-6">
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
                               <label for="contact" class="font-title-text text-green-900">Contact</label>
                               <input type="text" class="font-nav-text w-full py-3 px-5 mb-1
                               bg-white rounded-lg border-white shadow-lg text-sm md:text-base  placeholder:text-xs md:placeholder:text-base" placeholder="Enter phone number" wire:model="contact">
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
            <div class="relative flex flex-col mb-10 w-80 m-auto shadow-lg sm:w-auto sm:ml-28 sm:mr-28 bg-yellow-100 rounded-lg p-10">
                <div class="mx-auto container flex justify-between">
                    <div class="text-sm sm:text-2xl text-center border-gray-300 text-green-900 font-logo-text">STEP: 3 of 4</div>
                    <div class="text-xs font-thin  py-1 sm:text-lg text-center sm:py-3 border-gray-300 text-green-900 font-logo-text">Student Details</div>
                    <div class="hidden text-center border-gray-300 text-green-900 font-logo-text">  </div>
                    <div class="hidden text-center border-gray-300 text-green-900 font-logo-text">  </div>
                </div>
                <hr class="border-green-600 m-4">
                    <div class="m-auto flex-col sm:p-6">
                            <div class="w-full pr-4 pl-4">
                                <div class="mb-4">
                                    <label for="employee_id" class="font-title-text text-base text-green-900">Employee ID</label>
                                    <input type="text" class="font-nav-text w-full py-3 px-5 mb-1
                                    bg-white rounded-lg border-white shadow-lg text-sm md:text-base  placeholder:text-xs md:placeholder:text-base" placeholder="Enter your Employee ID" wire:model="employee_id">
                                    <span class="text-red-600 text-sm">@error('employee_id'){{ $message }}@enderror</span>
                                </div>
                            </div>


                            <div class="flex">
                                <div class="w-full pr-4 pl-4">
                                    <div class="mb-4" >
                                        <label for="document" class="font-title-text text-green-900">Document Requesting</label>
                                        <select class=" text-gray-800 font-nav-text w-full py-3 px-5 mb-1
                                        bg-white rounded-lg border-white shadow-lg text-sm md:text-base  placeholder:text-xs md:placeholder:text-base" wire:model="document">
                                               <option value="" selected>Select document</option>
                                               <option value="FDS">FDS</option>
                                               <option value="Certificate of Employement">Certificate of Employement</option>
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
            <div class="relative flex flex-col mb-10 w-80 m-auto shadow-lg sm:w-auto sm:ml-28 sm:mr-28 bg-yellow-100 rounded-lg p-10">
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
                                    <label for="employee_id" class="font-title-text">Employee ID</label>
                                    <input type="text" class="text-green-900 font-nav-text w-full py-3 px-5 mb-1
                                    bg-white rounded-lg border-white text-sm md:text-base placeholder:text-xs md:placeholder:text-base" value="{{ $employee_id }}" wire:model="employee_id" disabled>
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
    
                        <div class="mx-auto flex flex-col lg:flex-row sm:p-6 ">
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
                     
                     @if ($currentStep == 4)
                          <button type="submit" class="px-4 text-sm font-nav-text rounded-full py-2 sm:px-8  sm:text-lg  bg-lime-600 text-white hover:bg-lime-400">Submit</button>
                     @endif
                         
                        
                  </div>


            </div>

            
        </div>

        @endif
    

  

        


    </form>


</div>