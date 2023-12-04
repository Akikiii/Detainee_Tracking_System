<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 my-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-black p-[1.44rem] max-w-[600px]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Live Cases -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">Live Case</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">

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

                            <div id="selectedEventID"></div>

                            <div class="flex space-x-4 mb-4" onclick="selectedEvent(this, {{ $event->id }})">
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
                            </div>
                        @endforeach
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

    <script>

        function selectedEvent (clickedElement, eventID) {

            var allCards = document.querySelectorAll('.flex.space-x-4.mb-4');
            allCards.forEach(function(card) {
                if (card !== clickedElement) {
                    card.classList.remove('selected');
                }
            });

            clickedElement.classList.toggle('selected');

            var editEventButton = document.querySelector('a[href*="edit-event"]');
            if (editEventButton) {
                editEventButton.href = eventID ? editEventButton.href.replace('event_id_placeholder', eventID) : 'javascript:void(0);';
            }

            var deleteEventButton = document.querySelector('a[href*="delete-event"]');
            if (deleteEventButton) {
                deleteEventButton.href = eventID ? deleteEventButton.href.replace('event_id_placeholder', eventID) : 'javascript:void(0);';
            }

            var livecaseBox = document.getElementById('selectedEventID');
            livecaseBox.textContent = eventID ? 'Selected Event ID: ' + eventID : 'No Event Selected'; // For Checking lang if nakuha yung ID
        }

    </script>

</x-app-layout>
