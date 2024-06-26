<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#D9D9D9] grid-row-4">
        
        <!-- Sidebar -->
        
        <div class="col-start-1 my-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black p-[1.44rem] max-w-[600px]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Dashboard -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[8rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <!-- class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" -->
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">

                            <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                                <a href="{{ url('add-detainee') }}">
                                    <p class="text-gray-900">Create Detainee Profile</p>
                                </a>
                            </div>

                            <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                                <a href="{{ route('view.profile') }}">
                                    <p class="text-gray-900">View Profile</p>
                                </a>
                            </div>

                            <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                                <a href="{{ url('detainee-list') }}">
                                    <p class="text-gray-900">View Detainee List</p>
                                </a>
                            </div>

                            <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                                <a href="{{ url('detainee-list') }}">
                                    <p class="text-gray-900">Assign Self to Detainee</p>
                                </a>
                            </div>

                            <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                                <a href="{{url('cases-list')}}">
                                    <p class="text-gray-900">View Cases</p>
                                </a>
                            </div>

                            <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                                <a href="{{url('view-teams')}}">
                                    <p class="text-gray-900">View Team</p>
                                </a>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    
</x-app-layout>
