<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Display Case Details -->
                    <h2>Case Details</h2>
                    <table class="table border">
                        <tbody>
                            <tr>
                                <th class="px-4 py-2">Case Name:</th>
                                <td class="px-4 py-2">{{ $case->case_name }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Violations:</th>
                                <td class="px-4 py-2">{{ $case->violations }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Case Created:</th>
                                <td class="px-4 py-2">{{ $case->case_created }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Arrest Report:</th>
                                <td class="px-4 py-2">{{ $case->arrest_report }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Testimonies:</th>
                                <td class="px-4 py-2">{{ $case->testimonies }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-2">Status:</th>
                                <td class="px-4 py-2">
                                    @if ($case->status === 'Active')
                                        <span class="bg-green-500 text-white px-2 py-1 rounded">Active</span>
                                    @elseif ($case->status === 'Pending')
                                        <span class="bg-yellow-500 text-white px-2 py-1 rounded">Pending</span>
                                    @elseif ($case->status === 'Finished')
                                        <span class="bg-blue-500 text-white px-2 py-1 rounded">Finished</span>
                                    @else
                                        <span class="bg-gray-500 text-white px-2 py-1 rounded">Unknown</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{url('cases-list')}}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Back to Cases List</a>
                    <div class="my-4">
                        <a href="{{ route('add-event', ['case_id' => $case->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Add Event</a>
                    </div>

                    <!-- Event Table -->
                    <h2>Litigation Process</h2>
                    <table class="table border">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Event ID</th>
                                <th class="px-4 py-2">Event Type</th>
                                <th class="px-4 py-2">Event Date</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Related Entity</th>
                                <th class="px-4 py-2">Event Location</th>
                                <th class="px-4 py-2">Event Outcome</th>
                                <th class="px-4 py-2">Additional Notes</th>
                                <th class="px-4 py-2">Actions</th> <!-- Add this header for actions -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($case_events as $event)
                            <tr>
                                <td class="px-4 py-2">{{ $event->id }}</td>
                                <td class="px-4 py-2">{{ $event->event_type }}</td>
                                <td class="px-4 py-2">{{ $event->event_date }}</td>
                                <td class="px-4 py-2">{{ $event->description }}</td>
                                <td class="px-4 py-2">{{ $event->related_entity }}</td>
                                <td class="px-4 py-2">{{ $event->event_location }}</td>
                                <td class="px-4 py-2">{{ $event->event_outcome }}</td>
                                <td class="px-4 py-2">{{ $event->event_notes ?? '-' }}</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('edit-event', ['event_id' => $event->id]) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <a href="{{ route('delete-event', ['event_id' => $event->id]) }}" class="text-red-500 hover:text-red-700">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
