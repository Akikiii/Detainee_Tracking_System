<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- ginatry lang pagconvert sa code sa add detainee na style

        <div class="flex flex-col">
            <p class="block font-bold mb-2 labelname text-lg">Name</p>
            <div class="grid grid-flow-col gap-10">
                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="name" placeholder="Enter Full Name (Last Name, First Name + Middle Name)" value="{{old('name')}}"/>
                @error('name')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="flex flex-col mt-5">
            <p class="block labelname font-bold mb-2">Email Address</p>
            <div class="grid grid-flow-col gap-10">
                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="email" placeholder="Enter Full Name (Last Name, First Name + Middle Name)" value="{{old('email')}}"/>
                @error('email')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        -->

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Office Address -->
        <div class="mt-4">
            <x-input-label for="office_address" :value="__('Office Address')" />
            <x-text-input id="office_address" class="block mt-1 w-full" type="text" name="office_address" :value="old('office_address')" required />
            <x-input-error :messages="$errors->get('office_address')" class="mt-2" />
        </div>

        <!-- Contact Number -->
        <div class="mt-4">
            <x-input-label for="contact_number" :value="__('Contact Number')" />
            <x-text-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" :value="old('contact_number')" required />
            <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
        </div>

        <!-- Choice of Gender -->
        <div class="mt-4">
            <x-input-label for="gender" :value="__('Choice of Gender')" />

            <div class="flex items-center mt-2">
                <label for="gender-male" class="mr-2">
                    <input type="radio" id="gender-male" name="gender" value="male" required />
                    Male
                </label>
                <label for="gender-female">
                    <input type="radio" id="gender-female" name="gender" value="female" required />
                    Female
                </label>
            </div>

            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Education and Qualifications -->
        <div class="mt-4">
            <x-input-label for="education_qualifications" :value="__('Education and Qualifications')" />
            <x-text-input id="education_qualifications" class="block mt-1 w-full" type="text" name="education_qualifications" :value="old('education_qualifications')" required />
            <x-input-error :messages="$errors->get('education_qualifications')" class="mt-2" />
        </div>

        <!-- Practice Areas -->
        <div class="mt-4">
            <x-input-label for="practice_areas" :value="__('Practice Areas')" />
            <x-text-input id="practice_areas" class="block mt-1 w-full" type="text" name="practice_areas" :value="old('practice_areas')" required />
            <x-input-error :messages="$errors->get('practice_areas')" class="mt-2" />
        </div>

        <!-- Work Experience -->
        <div class="mt-4">
            <x-input-label for="work_experience" :value="__('Work Experience')" />
            <x-text-input id="work_experience" class="block mt-1 w-full" type="text" name="work_experience" :value="old('work_experience')" required />
            <x-input-error :messages="$errors->get('work_experience')" class="mt-2" />
        </div>

        <!-- Professional Affiliations -->
        <div class="mt-4">
            <x-input-label for="professional_affiliations" :value="__('Professional Affiliations')" />
            <x-text-input id="professional_affiliations" class="block mt-1 w-full" type="text" name="professional_affiliations" :value="old('professional_affiliations')" required />
            <x-input-error :messages="$errors->get('professional_affiliations')" class="mt-2" />
        </div>

        <!-- Cases Handled -->
        <div class="mt-4">
            <x-input-label for="cases_handled" :value="__('Cases Handled')" />
            <x-text-input id="cases_handled" class="block mt-1 w-full" type="text" name="cases_handled" :value="old('cases_handled')" required />
            <x-input-error :messages="$errors->get('cases_handled')" class="mt-2" />
        </div>

        <!-- Language Spoken -->
        <div class="mt-4">
            <x-input-label for="language_spoken" :value="__('Language Spoken')" />
            <x-text-input id="language_spoken" class="block mt-1 w-full" type="text" name="language_spoken" :value="old('language_spoken')" required />
            <x-input-error :messages="$errors->get('language_spoken')" class="mt-2" />
        </div>

        <!-- Office Hours -->
        <div class="mt-4">
            <x-input-label for="office_hours_open" :value="__('Office Hours (Opening)')" />
            <input id="office_hours_open" class="block mt-1 w-full" type="time" name="office_hours_open" :value="old('office_hours_open')" required />
            <x-input-error :messages="$errors->get('office_hours_open')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="office_hours_close" :value="__('Office Hours (Closing)')" />
            <input id="office_hours_close" class="block mt-1 w-full" type="time" name="office_hours_close" :value="old('office_hours_close')" required />
            <x-input-error :messages="$errors->get('office_hours_close')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
