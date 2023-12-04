<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#D9D9D9] grid-row-4">
        
        <!-- Sidebar -->

        <div class="col-start-1 my-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black p-[1.44rem] max-w-[600px]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Dashboard -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            
            <div class="flex flex-row justify-center gap-20 py-16">
                <a href="{{ url('detainee-list') }}" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <div class="p-4 rounded-md w-56 h-56" style="display: flex; flex-direction: column; align-items: center;">
                        <svg class="w-180 h-180 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="Black" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
                        </svg>
                        <p class="navigation-text text-xl text-gray-900">ASSIGN ATTORNEY</p>
                    </div>
                </a>

            
                <a href="{{ url('add-detainee') }}" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <div class="p-4 rounded-md w-56 h-56" style="display: flex; flex-direction: column; align-items: center;">
                        <svg class="w-180 h-180 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="Black" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
                        </svg>
                        <p class="navigation-text text-xl text-gray-900">CREATE DETAINEE PROFILE</p>
                    </div>
                </a>

                <a href="{{ url('admin', 'Invite_User') }}" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <div class="p-4 rounded-md w-56 h-56" style="display: flex; flex-direction: column; align-items: center;">
                        <svg class="w-180 h-180 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="Black" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
                        </svg>
                        <p class="navigation-text text-xl text-gray-900">INVITE USER</p>
                    </div>
                </a>

                <a href="{{ url('detainee-list') }}">
                    <div class="p-4 rounded-md w-56 h-56" style="display: flex; flex-direction: column; align-items: center;">
                        <svg class="w-180 h-200 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="Black" stroke-linecap="round" stroke-width="0.5" d="M12 2h4a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4m6 0v3H6V2m6 0a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1M5 5h8m-5 5h5m-8 0h.01M5 14h.01M8 14h5"/>
                        </svg>
                        <p class="navigation-text text-xl text-gray-900">VIEW DETAINEE LIST</p>
                    </div>
                </a>
            </div>

            <div class="flex flex-row justify-center gap-20">
                <a href="{{url('cases-list')}}">
                    <div class="p-4 rounded-md w-56 h-56" style="display: flex; flex-direction: column; align-items: center;">
                        <svg class="w-180 h-180 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 18">
                            <path stroke="Black" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M9.5 3h9.563M9.5 9h9.563M9.5 15h9.563M1.5 13a2 2 0 1 1 3.321 1.5L1.5 17h5m-5-15 2-1v6m-2 0h4"/>
                        </svg>
                        <p class="navigation-text text-xl text-gray-900">VIEW CASES LIST</p>
                    </div>
                </a>

                <a href="{{url('user-list')}}">
                    <div class="p-4 rounded-md w-56 h-56" style="display: flex; flex-direction: column; align-items: center;">
                        <svg class="w-180 h-180 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="Black" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M14 3a3 3 0 1 1-1.614 5.53M15 12a4 4 0 0 1 4 4v1h-3.348M10 4.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
                        </svg>
                        <p class="navigation-text text-xl text-gray-900">VIEW USER LIST</p>
                    </div>
                </a>

                <a href="{{url('view-teams')}}">
                    <div class="p-4 rounded-md w-56 h-56" style="display: flex; flex-direction: column; align-items: center;">
                        <svg class="w-180 h-180 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="Black" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M4.333 6.764a3 3 0 1 1 3.141-5.023M2.5 16H1v-2a4 4 0 0 1 4-4m7.379-8.121a3 3 0 1 1 2.976 5M15 10a4 4 0 0 1 4 4v2h-1.761M13 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-4 6h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z"/>
                        </svg>
                        <p class="navigation-text text-xl text-gray-900">VIEW TEAMS</p>
                    </div>
                </a>
            </div>
        </div>

        
    </div>
    
</x-app-layout>
