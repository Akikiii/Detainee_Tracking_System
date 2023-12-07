<x-app-layout>

    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">
        <!-- Sidebar -->
        <div class="col-start-1 my-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black p-[1.44rem] max-w-[600px]">
            @include('profile.partials.sidebar')
        </div>

        <!-- User Details -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">USER DETAILS</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">

                <div class="grid gap-5 border border-black">

                    <div class="flex flex-col gap-0">
                        <div class="flex space-x-4 bg-[#a0b4b7] h-1/4">
                            <div class="flex flex-row rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                                <div>
                                    <div class="ml-16 flex">
                                        <div class="ring ring-white" style="background-color: black; height: 150px; width: 150px; border-radius: 100%; margin-top: 60px;"></div>
                                    </div>
                                    <div class="ml-16 mt-4">
                                        <p class="mt-3 mb-3 font-bold text-2xl">{{ $user['name']}} </p>
                                        <p class="text-left mb-3">Office Address: {{ $user['office_address']}} </p>
                                        <p class="text-left mb-3">Office Hours: {{ date('g:ia', strtotime($user['office_hours_open'])) }} - {{ date('g:ia', strtotime($user['office_hours_close'])) }}</p>
                                        <p class="text-left mb-3">Email: {{ $user['email']}} </p>
                                        
                                        <p class="text-left mb-3">Contact Number: {{ $user->contact_number }}</p>
                                        <p class="text-left mb-3">Gender: {{ ucfirst($user->gender) }}</p>
                                        <p class="text-left mb-3">Education Qualifications: {{ $user->education_qualifications }}</p>
                                        <p class="text-left mb-3">Practice Areas: {{ $user->practice_areas }}</p>
                                        <p class="text-left mb-3">Work Experience: {{ $user->work_experience }}</p>
                                        <p class="text-left mb-3">Professional Affiliations: {{ $user->professional_affiliations }}</p>
                                        <p class="text-left mb-3">Cases Handled: {{ $user->cases_handled }}</p>
                                        <p class="text-left mb-3">Language Spoken: {{ $user->language_spoken }}</p>
                                        <!-- <p class="text-left mb-3">Active Team/s:  </p> -->

                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="flex space-x-4 bg-[#FFFFFF] h-3/4">
                        <p class="text-left mb-20"></p>
                        </div>
                        
                    </div>
                </div>

                <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                    <a href="{{ route('user-list') }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK</a>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
