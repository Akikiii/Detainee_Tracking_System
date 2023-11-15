<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">
        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>
        
        <!-- User Details -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono">User Details</h1>
                <hr class="mt-[1.94rem] mb-[2.31rem]" />
                <div>
                    <p class="font-bold mb-2">Name: {{ $user->name }}</p>
                    <p class="font-bold mb-2">Email: {{ $user->email }}</p>
                    <p class="font-bold mb-2">Office Address: {{ $user->office_address }}</p>
                    <p class="font-bold mb-2">Contact Number: {{ $user->contact_number }}</p>
                    <p class="font-bold mb-2">Gender: {{ $user->gender }}</p>
                    <p class="font-bold mb-2">Education Qualifications: {{ $user->education_qualifications }}</p>
                    <p class="font-bold mb-2">Practice Areas: {{ $user->practice_areas }}</p>
                    <p class="font-bold mb-2">Work Experience: {{ $user->work_experience }}</p>
                    <p class="font-bold mb-2">Professional Affiliations: {{ $user->professional_affiliations }}</p>
                    <p class="font-bold mb-2">Cases Handled: {{ $user->cases_handled }}</p>
                    <p class="font-bold mb-2">Language Spoken: {{ $user->language_spoken }}</p>
                    <p class="font-bold mb-2">Office Hours (Opening): {{ $user->office_hours_open }}</p>
                    <p class="font-bold mb-2">Office Hours (Closing): {{ $user->office_hours_close }}</p>
                    <!-- Add other user details here -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
