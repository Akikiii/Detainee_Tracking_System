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
                <div class="grid gap-24 row-gap-8 lg:grid-cols-5">
                    <div class="grid gap-8 lg:col-span-2">
                        <div>
                            <p class="mb-2 text-lg font-bold">Public Attorney's Office Mission</p>
                            <p class="text-gray-700">
                            By 2023, the Public Attorney's Office, as the principal law office of the government, shall be composed of highly motivated, effective and empowered public servants, consistently responsive to the ever-growing legal needs of the indigents and other qualified persons, utilizing modern facilities, information technology systems and tools, needed for efficient delivery of free legal aid services to promote access to justice, truth and peace.
                            </p>
                        </div>
                        <div>
                            <p class="mb-2 text-lg font-bold">Public Attorney's Office Vision</p>
                            <p class="text-gray-700">
                            The Public Attorney's Office exists to provide the indigent litigants, the oppressed, marginalized, and underprivileged members of the society free access to courts, judicial and quasi-judicial agencies, by rendering legal services, counselling and assistance in consonance with the Constitutional mandate that "free access to courts shall not be denied to any person by reason of poverty" in order to ensure the rule of law, truth and social justice as components of the country's sustainable development.
                            </p>
                        </div>
                    </div>

                    <div class="grid border divide-y rounded lg:col-span-3 sm:grid-cols-2 sm:divide-y-0 sm:divide-x">
                        <div class="flex flex-col justify-between p-10">

                            <div>
                                <p class="text-base font-semibold text-gray-800">
                                    Detainees
                                </p>
                                <p class="text-2xl font-bold text-deep-purple-accent-400 sm:text-xl">
                                    {{ \App\Models\Detainee::count() }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm font-semibold text-gray-800">
                                    Detainees with Assigned Attorneys
                                </p>
                                <p class="text-2xl font-bold text-deep-purple-accent-400 sm:text-xl">
                                    {{ \App\Models\Counsel_Case_Assignment::whereNotNull('assigned_lawyer')->count() }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm font-semibold text-gray-800">
                                    Detainees without Assigned Attorneys
                                </p>
                                <p class="text-2xl font-bold text-deep-purple-accent-400 sm:text-xl">
                                    {{ $withoutAttorneysCount  }}
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-col justify-between p-10">
                            <div>
                                <p class="text-base font-semibold text-gray-800">Users</p>
                                <p class="text-2xl font-bold text-deep-purple-accent-400 sm:text-xl">
                                    {{ \App\Models\User::count() }}
                                </p>
                            </div>

                            <div>
                                <p class="text-base font-semibold text-gray-800">
                                    Cases
                                </p>
                                <p class="text-2xl font-bold text-deep-purple-accent-400">
                                    {{ \App\Models\Cases::count() }}
                                </p>
                            </div>

                            <div>
                                <p class="text-base font-semibold text-gray-800">
                                    
                                </p>
                                <p class="text-2xl font-bold text-deep-purple-accent-400">
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
