<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">
        
        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Dashboard -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <!-- class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" -->
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">

                            <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                                <a href="{{ route('register.user') }}">
                                    <p class="text-gray-900">Create Attorney Profile</p>
                                </a>
                            </div>

                            <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                                <a href="{{ url('detainee-list') }}">
                                    <p class="text-gray-900">Assign Attorney</p>
                                </a>
                            </div>

                            <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                                <a href="{{ url('add-detainee') }}">
                                    <p class="text-gray-900">Create Detainee Profile</p>
                                </a>
                            </div>
                                
                            <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                                <a href="{{ url('detainee-list') }}">
                                    <p class="text-gray-900">View Detainee List</p>
                                </a>
                            </div>
                                    
                            <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                                <a href="{{ route('view.profile') }}">
                                    <p class="text-gray-900">View Profile</p>
                                </a>
                            </div>

                            <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                                <a href="{{url('cases-list')}}">
                                    <p class="text-gray-900">Case View</p>
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
