<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 my-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black p-[1.44rem] max-w-[600px]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Cases List -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
            @if ($case->assignedAttorney)
            <a href="{{ route('removeAssignedAttorney', ['case_id' => $case->case_id]) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">Remove Assigned Attorney</a>
        @else
            <a href="{{ route('assignToCase', ['case_id' => $case->case_id]) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">Assign To Case</a>
        @endif
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">Live Case</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">
                <div class="grid gap-5">

                    <div class="container p-2 mx-auto sm:p-4 text-gray-100">
                        <div class="overflow-x-auto">
                            <table class="w-full p-6 text-xs text-left whitespace-nowrap">
                                <colgroup>
                                    <col class="w-5">
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col>
                                    <col class="w-5">
                                </colgroup>
                                <thead>
                                    <tr class="bg-gray-700">
                                        <th class="p-3">Status</th>
                                        <th class="p-3">Event Type</th>
                                        <th class="p-3">Event Date</th>
                                        <th class="p-3">Event Location</th>
                                        <th class="p-3">Event Outcome</th>
                                        <th class="p-3">Description</th>
                                    </tr>
                                </thead>
                                @php
                                    // Sort events by id in descending order
                                    $sortedEvents = $case_events->sortByDesc('id')->values();
                                @endphp
                                @foreach ($sortedEvents as $index => $event)
                                <tbody class="border-b bg-gray-900 border-gray-700">
                                    <tr>
                                        <td class="px-3 py-2">
                                        @if ($index === 0 && $event->event_type !== 'Finished')
                                            Ongoing
                                        @else
                                            @if ($event->id === $sortedEvents[0]->id && $event->event_type !== 'Finished')
                                                Ongoing
                                            @else
                                                @if ($event->event_type === 'Finished')
                                                    Finished
                                                @else
                                                    Finished
                                                @endif
                                            @endif
                                        @endif
                                        </td>
                                        <td class="px-3 py-2">
                                            <span>{{ $event->event_type }}</span>
                                            <p class="text-gray-400">Paid: P500 (Dagdagan ko lang ng If Else)</p>
                                        </td>
                                        <td class="px-3 py-2">
                                            {{ $event->event_date }}
                                        </td>
                                        <td class="px-3 py-2">
                                            {{ $event->event_location }}
                                        </td>
                                        <td class="px-3 py-2">
                                            {{ $event->event_outcome }}
                                        </td>
                                        <td class="px-3 py-2">
                                            {{ $event->description }}
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    


                    <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                        <a href="{{ route('add-event', ['case_id' => $case->case_id]) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ADD EVENT</a>
                        <a href="{{ url('cases-list') }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK TO CASES LIST</a>
                        <a href="{{ route('edit-event', ['event_id' => 'event_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">EDIT EVENT</a>
                        <a href="{{ route('delete-event', ['event_id' => 'event_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">DELETE EVENT</a>    
                    </div>

                </div>

            </div>
        </div>
    </div>
    
</x-app-layout>
