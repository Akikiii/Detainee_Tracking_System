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
                                    </tr>
                                </thead>
                                @php
                                    // Sort events by id in descending order
                                    $sortedEvents = $case_events->sortByDesc('id')->values();
                                @endphp
                                @foreach ($sortedEvents as $index => $event)
                                <tbody class="bg-white" onclick="selectedCase(this, {{ $event->case->case_id }})">
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
                                                <p class="text-gray-400">Verdict: {{ ucfirst($event->verdict) }}</p>
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
                                            {{ $event->description }}
                                        </td>
                                        <td class="px-3 py-2">
                                            {{ $event->event_outcome }}
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

                        @php
                            // Get the latest event for the current $case->case_id
                            $latestEvent = $sortedEvents->firstWhere('case.case_id', $case->case_id);
                        @endphp
                        @if (!$latestEvent || $latestEvent->event_type !== 'Finished')
                            <a href="{{ route('add-event', ['case_id' => $case->case_id]) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ADD EVENT</a>
                        @endif
                        
                        <a href="{{ url('cases-list') }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK TO CASES LIST</a>
                        <a href="{{ route('edit-event', ['event_id' => 'event_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">EDIT EVENT</a>
                        <a href="{{ route('delete-event', ['event_id' => 'event_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">DELETE EVENT</a>     
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>


        function selectedCase (clickedElement, caseID) {

            var allCards = document.querySelectorAll('.bg-white');
            allCards.forEach(function(card) {
                if (card !== clickedElement) {
                    card.classList.remove('selected');
                }
            });

            clickedElement.classList.toggle('selected');

            var editEventButton = document.querySelector('a[href*="edit-event"]');
            if (editEventButton) {
                editEventButton.href = caseID ? editEventButton.href.replace('event_id_placeholder', caseID) : 'javascript:void(0);';
            }

            var deleteEventButton = document.querySelector('a[href*="delete-event"]');
            if (deleteEventButton) {
                deleteEventButton.href = caseID ? deleteEventButton.href.replace('event_id_placeholder', caseID) : 'javascript:void(0);';
            }

        }

    </script>
    
</x-app-layout>
