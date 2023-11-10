<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Live Cases -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold">Live Case</h1>
                <hr class="mt-[1.94rem] mb-[2.31rem]"/>

                <div class="grid gap-5">

                    <div class="flex flex-col">
                        <label class="form-label block labelname font-bold">Case Name: {{ $case->case_name }}</label>
                        <label class="text-left mb-3"><strong>Status:</strong>
                            @if ($case->status === 'Active')
                                <span class="bg-green-500 text-white px-2 py-1 rounded">Active</span>
                            @elseif ($case->status === 'Pending')
                                <span class="bg-yellow-500 text-white px-2 py-1 rounded">Pending</span>
                            @elseif ($case->status === 'Finished')
                                <span class="bg-blue-500 text-white px-2 py-1 rounded">Finished</span>
                            @else
                                <span class="bg-gray-500 text-white px-2 py-1 rounded">Unknown</span>
                            @endif
                        </label>
                        @foreach ($case_events as $event)
                            <div class="flex space-x-4 mb-4">
                                <div class="flex flex-row border border-black border rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-left mb-3"><strong>Event ID:</strong> {{ $event->id }}</p>
                                            <p class="text-left mb-3"><strong>Event Type:</strong> {{ $event->event_type }}</p>
                                            <p class="text-left mb-3"><strong>Event Date:</strong> {{ $event->event_date }}</p>
                                            <p class="text-left mb-3"><strong>Description:</strong> {{ $event->description }}</p>
                                            <p class="text-left mb-3"><strong>Related Entity:</strong> {{ $event->related_entity }}</p>
                                            <p class="text-left mb-3"><strong>Event Location:</strong> {{ $event->event_location }}</p>
                                            <p class="text-left mb-3"><strong>Event Outcome:</strong> {{ $event->event_outcome }}</p>
                                            <p class="text-left mb-3"><strong>Event Notes:</strong> {{ $event->event_notes ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-center items-center">
                                    <a href="{{ route('edit-event', ['event_id' => $event->id]) }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-4 px-4 rounded focus:outline-none focus:shadow-outline flex-shrink mb-10" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 3v2a1 1 0 001 1h2m4 4v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h7m4-2h2m-2 0a1 1 0 00-1 1v2h2V4a1 1 0 00-1-1z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('delete-event', ['event_id' => $event->id]) }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-4 px-4 rounded focus:outline-none focus:shadow-outline flex-shrink" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 8v11a2 2 0 002 2h8a2 2 0 002-2V8m-4 0v-2a2 2 0 00-2-2m-4 2h12" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                        <a href="{{ route('add-event', ['case_id' => $case->case_id]) }}" class="buttonFormat bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">ADD EVENT</a>
                        <a href="{{url('cases-list')}}" class="buttonFormat bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">BACK TO CASES LIST</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
