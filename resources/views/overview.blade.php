<x-app-layout>
    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#D9D9D9] grid-row-4">
        
        <!-- Sidebar -->

        <div class="col-start-1 my-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black p-[1.44rem] max-w-[600px]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Overview -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
                <div class="flex flex-row justify-center gap-20 py-12">
                    <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex">
                            <h6 class="mr-2 text-4xl font-bold md:text-5xl text-deep-purple-accent-400">
                                {{ \App\Models\Detainee::count() }}
                            </h6>
                            <div class="flex items-center justify-center rounded-full bg-teal-accent-400 w-7 h-7">
                            <svg class="text-teal-900 w-7 h-7" stroke="currentColor" viewBox="0 0 52 52">
                                <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                            </svg>
                            </div>
                        </div>
                        <p class="mb-2 font-bold md:text-lg">Detainees</p>
                        <p class="text-gray-700">
                            Number of Detainees that were added to the Detainee Tracking System.
                        </p>
                    </div>
                    <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex">
                            <h6 class="mr-2 text-4xl font-bold md:text-5xl text-deep-purple-accent-400">
                                {{ \App\Models\Counsel_Case_Assignment::whereNotNull('assigned_lawyer')->count() }}
                            </h6>
                            <div class="flex items-center justify-center rounded-full bg-teal-accent-400 w-7 h-7">
                            <svg class="text-teal-900 w-7 h-7" stroke="currentColor" viewBox="0 0 52 52">
                                <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                            </svg>
                            </div>
                        </div>
                        <p class="mb-2 font-bold md:text-lg">Detainees with Assigned Attorney</p>
                        <p class="text-gray-700">
                            Number of Detainees that has already an assigned Attorney for their pending cases.
                        </p>
                    </div>
                    <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex">
                            <h6 class="mr-2 text-4xl font-bold md:text-5xl text-deep-purple-accent-400">
                                {{ $withoutAttorneysCount  }}
                            </h6>
                            <div class="flex items-center justify-center rounded-full bg-teal-accent-400 w-7 h-7">
                            <svg class="text-teal-900 w-7 h-7" stroke="currentColor" viewBox="0 0 52 52">
                                <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                            </svg>
                            </div>
                        </div>
                        <p class="mb-2 font-bold md:text-lg">Detainees without Assigned Attorney</p>
                        <p class="text-gray-700">
                            Number of Detainees without an Attorney for their pending cases.
                        </p>
                    </div>
                </div>
                <div class="flex flex-row justify-center gap-20 py-12">
                    <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex">
                            <h6 class="mr-2 text-4xl font-bold md:text-5xl text-deep-purple-accent-400">
                                {{ \App\Models\User::count() }}
                            </h6>
                            <div class="flex items-center justify-center rounded-full bg-teal-accent-400 w-7 h-7">
                            <svg class="text-teal-900 w-7 h-7" stroke="currentColor" viewBox="0 0 52 52">
                                <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                            </svg>
                            </div>
                        </div>
                        <p class="mb-2 font-bold md:text-lg">Users</p>
                        <p class="text-gray-700">
                            Number of Attorneys that has access to the Detainee Tracking System.
                        </p>
                    </div>
                    <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex">
                            <h6 class="mr-2 text-4xl font-bold md:text-5xl text-deep-purple-accent-400">
                                {{ \App\Models\Cases::count() }}
                            </h6>
                            <div class="flex items-center justify-center rounded-full bg-teal-accent-400 w-7 h-7">
                            <svg class="text-teal-900 w-7 h-7" stroke="currentColor" viewBox="0 0 52 52">
                                <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                            </svg>
                            </div>
                        </div>
                        <p class="mb-2 font-bold md:text-lg">Cases</p>
                        <p class="text-gray-700">
                            Number of Occurring Cases of the Detainees.
                        </p>
                    </div>
                <div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
