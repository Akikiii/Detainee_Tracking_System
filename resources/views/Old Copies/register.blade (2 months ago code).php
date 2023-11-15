<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Canvas -->
        <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

            <!-- Sidebar -->
            <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
                @include('profile.partials.sidebar')
            </div>

            <!-- Application Form -->
            <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]">
                <div>
                    <h1 class="text-[1.875rem] uppercase font-bold">Create Attorney Profile</h1>
                    <hr class="mt-[1.94rem] mb-[2.31rem]"/>
                    <div class="grid gap-5">

                    <!-- Triggers when user successfully added a detainee -->
                        <!-- @if(Session::has('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif -->

                    <div class="flex flex-col">
                        <p class="block font-bold mb-2 labelname text-lg">Name</p>
                        <div class="grid grid-flow-col gap-10">
                            <input id="name" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                            type="text" 
                                            name="name" 
                                            :value="old('name')" 
                                            required autofocus autocomplete="name" />
                                            
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex flex-col mt-5">
                            <p class="block labelname font-bold mb-2">Email Address</p>
                            <div class="grid grid-flow-col gap-10">
                                <input id="email" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                                type="email" 
                                                name="email" 
                                                :value="old('email')" 
                                                required autocomplete="email" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <p class="block labelname font-bold mb-2">Password</p>
                                <input id="password" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="grid col-start-2">
                                <p class="block labelname font-bold mb-2">Confirm Password</p>
                                <input id="password_confirmation" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black"
                                                type="password"
                                                name="password_confirmation" 
                                                required autocomplete="new-password" />
                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-col mt-5">
                            <p class="block labelname font-bold mb-2">Office Address</p>
                            <div class="grid grid-flow-col gap-10">
                                <input id="office_address" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                                type="text" 
                                                name="office_address" 
                                                :value="old('office_address')" required />
                                
                                <x-input-error :messages="$errors->get('office_address')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <p class="block labelname font-bold mb-2">Contact Number</p>
                                <input id="contact_number" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                                type="text" 
                                                name="contact_number" 
                                                :value="old('contact_number')" 
                                                required />
                            
                                <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
                            </div>
                            <div class="grid col-start-2">
                                <p class="block labelname font-bold mb-2">Gender</p>
                                <select class="form-control text-black border border-black rounded rounded w-full py-4 px-3 placeholderfont leading-tight focus:outline-none focus:border-black" name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('gender')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-col mt-5">
                            <p class="block labelname font-bold mb-2">Education and Qualifications</p>
                            <div class="grid grid-flow-col gap-10">
                                <input id="education_qualifications" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                                type="text" 
                                                name="education_qualifications" 
                                                :value="old('education_qualifications')" 
                                                required />
                                
                                <x-input-error :messages="$errors->get('education_qualifications')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-col mt-5">
                            <p class="block labelname font-bold mb-2">Practice Areas</p>
                            <div class="grid grid-flow-col gap-10">
                                <input id="practice_areas" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                                type="text" 
                                                name="practice_areas" 
                                                :value="old('practice_areas')" 
                                                required />
                                
                                <x-input-error :messages="$errors->get('practice_areas')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-col mt-5">
                            <p class="block labelname font-bold mb-2">Work Experience</p>
                            <div class="grid grid-flow-col gap-10">
                                <input id="work_experience" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                                type="text" 
                                                name="work_experience" 
                                                :value="old('work_experience')" 
                                                required />
                            
                                <x-input-error :messages="$errors->get('work_experience')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-col mt-5">
                            <p class="block labelname font-bold mb-2">Professional Affiliations</p>
                            <div class="grid grid-flow-col gap-10">
                                <input id="professional_affiliations" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                                type="text" 
                                                name="professional_affiliations" 
                                                :value="old('professional_affiliations')" 
                                                required />
                                
                                <x-input-error :messages="$errors->get('professional_affiliations')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-col mt-5">
                            <p class="block labelname font-bold mb-2">Cases Handled</p>
                            <div class="grid grid-flow-col gap-10">
                                <input id="cases_handled" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                                type="text" 
                                                name="cases_handled" 
                                                :value="old('cases_handled')" 
                                                required />
                                
                                <x-input-error :messages="$errors->get('cases_handled')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-col mt-5">
                            <p class="block labelname font-bold mb-2">Language Spoken</p>
                            <div class="grid grid-flow-col gap-10">
                                <input id="language_spoken" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                                type="text" 
                                                name="language_spoken" 
                                                :value="old('language_spoken')" 
                                                required />
                                
                                <x-input-error :messages="$errors->get('language_spoken')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <p class="block labelname font-bold mb-2">Office Hours (Opening)</p>
                                    <input id="office_hours_open" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                                    type="time" 
                                                    name="office_hours_open" 
                                                    :value="old('office_hours_open')" 
                                                    required />
                                    
                                    <x-input-error :messages="$errors->get('office_hours_open')" class="mt-2" />
                            </div>
                            <div class="grid col-start-2">
                                <p class="block labelname font-bold mb-2">Office Hours (Closing)</p>
                                    <input id="office_hours_close" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                                    type="time" 
                                                    name="office_hours_close" 
                                                    :value="old('office_hours_close')" 
                                                    required />
                                    
                                    <x-input-error :messages="$errors->get('office_hours_close')" class="mt-2" />
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <p class="block labelname font-bold mb-2">Upload Photo (Formal Picture for Display Profile)</p>
                            <div class="grid grid-flow-col gap-10">
                                <div class="border border-black border rounded w-full py-40 px-3 placeholderfont leading-tight focus:outline-none focus:border-black relative text-center">
                                    <span class="block text-gray-400 mb-2">Drag & Drop to Upload File</span>
                                    <p class="font-bold">OR</p>
                                    <div class="flex justify-center mt-2">
                                        <button class="buttonFormat w-[8.5rem] h-[2.5rem] bg-[#cccccc] font-bold text-[#000] uppercase font-inter">
                                            Browse File
                                        </button>
                                    </div>
                                    <input
                                    class="opacity-0 absolute top-0 left-0 w-full h-full cursor-pointer"
                                    type="file"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row justify-end items-center gap-2.5 mt-[2.12rem]">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mr-2" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                            <button class="buttonFormat col-end-4 w-[9.5rem] h-[2.5rem] bg-[#cccccc] font-bold">
                                {{ __('REGISTER') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </form>
</x-app-layout>