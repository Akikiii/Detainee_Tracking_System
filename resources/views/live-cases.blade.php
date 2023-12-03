<x-app-layout>
    <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
        <a href="{{ route('add-event', ['case_id' => $case->case_id]) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ADD EVENT</a>
        <a href="{{ url('cases-list') }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK TO CASES LIST</a>
        <a href="{{ route('edit-event', ['event_id' => 'event_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">EDIT EVENT</a>
        <a href="{{ route('delete-event', ['event_id' => 'event_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">DELETE EVENT</a>
    </div>


    <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">Live Case</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">

                <div class="grid gap-5">

                <div class="timeline-container">
            <table class="timeline-table">
                <thead>
                    <tr>
                        <th>STATUS</th>
                        <th>EVENT</th>
                        <th>DESCRIPTION</th>
                        <th>PLANNED DATE</th>
                        <th>EVENT LOCATION</th>
                        <th>EVENT OUTCOME</th>
                        <th>DELAYED DAYS</th>
                        <th>NOTES</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Sort events by id in descending order
                        $sortedEvents = $case_events->sortByDesc('id')->values();
                    @endphp

                    @foreach ($sortedEvents as $index => $event)
                        <tr>
                            <td>
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
                            <td>{{ $event->event_type }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->event_date }}</td>
                            <td>{{ $event->event_location }}</td>
                            <td>{{ $event->event_outcome }}</td>
                            <td>{{ $event->delayed_days }}</td>
                            <td>{{ $event->event_notes }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
