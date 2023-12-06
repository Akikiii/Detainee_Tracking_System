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
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">Live Case</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">
                <div class="grid gap-5">

                    <div id="selectedEventID"></div>

                    <div class="flex flex-col gap-4">
                        <div class="flex space-x-4">
                            <div class="flex flex-row border border-black border rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                                <table class="justify-center w-full p-6 text-xs text-left">
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
                                        <tr class="bg-gray-400 text-white">
                                            <th class="p-3">Status</th>
                                            <th class="p-3">Event Type</th>
                                            <th class="p-3">Event Date</th>
                                            <th class="p-3">Event Location</th>
                                            <th class="p-3">Description</th>
                                            <th class="p-3">Event Outcome</th>
                                            <th class="p-3"></th>
                                        </tr>
                                    </thead>
                                    @php
                                        // Sort events by id in descending order
                                        $sortedEvents = $case_events->sortByDesc('id')->values();
                                    @endphp
                                    @foreach ($sortedEvents as $index => $event)
                                    <tbody class="bg-white" onclick="selectedCase(this, {{ $event->id }})">
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
                                                @if ($event->event_type == 'Bail')
                                                    Bail Hearing
                                                    <p class="text-gray-400"> Bail Amount: {{ optional($event->bail)->amount}} | Bail Status: {{ ucfirst($event->bail_confirmation) }} | Bail Type: {{optional($event->bail)->bail_type}} </p>
                                                @elseif ($event->event_type == 'Arraignment')
                                                    {{ $event->event_type }}
                                                    <p class="text-gray-400">Verdict:
                                                        @if ($event->verdict == 'guilty')
                                                            Guilty
                                                        @elseif ($event->verdict == 'not_guilty')
                                                            Not Guilty
                                                        @elseif ($event->verdict == 'no_contest')
                                                            No Contest
                                                        @endif
                                                    </p>
                                                @else
                                                    {{ $event->event_type }}
                                                @endif
                                            </td>
                                            <td class="px-3 py-2">
                                                {{ $event->event_date }}
                                            </td>
                                            <td class="px-3 py-2">
                                                @if($event->case->location == 'rtc')
                                                    Regional Trial Court
                                                @elseif($event->case->location == 'mtc')
                                                    Municipal Trial Court
                                                @endif
                                            </td>
                                            <td class="px-3 py-2">
                                                {{ Illuminate\Support\Str::limit($event->description, $limit = 30, $end = '...') }}
                                            </td>
                                            <td class="px-3 py-2">
                                                {{ $event->event_outcome }}
                                            </td>
                                            <td class="flex gap-2 px-3 py-3">
                                                <a href="{{ route('view-event', ['event_id' => $event->id]) }}">
                                                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Black" viewBox="0 0 20 14">
                                                        <path stroke="Black" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                                                    </svg>
                                                </a>
                                                <!-- <a href="{{ route('edit-event', ['event_id' => $event->id]) }}">
                                                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Black" stroke="Black" viewBox="0 0 20 18">
                                                        <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                                        <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('delete-event', ['event_id' => $event->id]) }}">
                                                    <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="Black" stroke="Black" viewBox="0 0 18 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                                    </svg>
                                                </a> -->
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                        @if ($case->assignedAttorney()->count() > 0)
                            <a href="{{ route('removeAssignedAttorney', ['case_id' => $case->case_id]) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">REMOVE ASSIGNED ATTORNEY</a>
                        @else
                            <a href="{{ route('assignToCase', ['case_id' => $case->case_id]) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ASSIGN ATTORNEY TO CASE</a>
                        @endif

                        <!-- <a href="{{ url('view-event', ['id' => 'event_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">VIEW EVENT</a> -->
                        
                        @php
                            // Get the latest event for the current $case->case_id
                            $latestEvent = $sortedEvents->firstWhere('case.case_id', $case->case_id);
                        @endphp
                        @if (!$latestEvent || $latestEvent->event_type !== 'Finished')
                            <a href="{{ route('add-event', ['case_id' => $case->case_id]) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ADD EVENT</a>
                        @endif
                        
                        <a href="{{ url('cases-list') }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK TO CASES LIST</a>
                        <!-- <a href="{{ route('edit-event', ['event_id' => 'event_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">EDIT EVENT</a>
                        <a href="{{ route('delete-event', ['event_id' => 'event_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">DELETE EVENT</a>      -->
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>

        function selectedCase (clickedElement, eventID) {

            var allCards = document.querySelectorAll('.bg-white');
            allCards.forEach(function(card) {
                if (card !== clickedElement) {
                    card.classList.remove('selected');
                }
            });

            clickedElement.classList.toggle('selected');

            var viewEventButton = document.querySelector('a[href*="view-event"]');
            if (viewEventButton) {
                viewEventButton.href = eventID ? caseOverviewButton.href.replace('event_id_placeholder', eventID) : 'javascript:void(0);';
            }

            var caseoverviewBox = document.getElementById('selectedEventID');
            caseoverviewBox.textContent = eventID ? 'Selected Event ID: ' + eventID : 'No Event Selected'; // For Checking lang if nakuha yung ID
        }

    </script>
    
</x-app-layout>
