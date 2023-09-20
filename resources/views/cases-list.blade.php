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
                    <div class="container mt-4">
                        <div class="row">
                        <div class="col-md-12">
                        <h2>Cases List</h2>
                        <div>
                            <a href="{{ url('add-cases') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Add</a>
                        </div>
                        <table class="table border">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Case Name</th>
                                    <th class="px-4 py-2">Violations</th>
                                    <th class="px-4 py-2">Case Created</th>
                                    <th class="px-4 py-2">Arrest Report</th>
                                    <th class="px-4 py-2">Testimonies</th>
                                    <th class="px-4 py-2">Assigned Detainee</th>
                                    <th class="px-4 py-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = count($data);
                                @endphp
                                @foreach ($data as $key => $Cases)
                                    <tr>
                                        <td class="px-4 py-2">{{ $key+1 }}</td>
                                        <td class="px-4 py-2">{{ $Cases->case_name}}</td>
                                        <td class="px-4 py-2">{{ $Cases->violations }}</td>
                                        <td class="px-4 py-2">{{ $Cases->case_created }}</td>
                                        <td class="px-4 py-2">{{ $Cases->arrest_report }}</td>
                                        <td class="px-4 py-2">{{ $Cases->testimonies }}</td>
                                        <td class="px-4 py-2">
                                            @if ($Cases->assignedDetainee)
                                                {{ $Cases->assignedDetainee->first_name }} {{ $Cases->assignedDetainee->middle_name }} {{ $Cases->assignedDetainee->last_name }}
                                            @else
                                                No Assigned Detainee
                                            @endif
                                        </td>

                                        <td class="px-4 py-2">
                                            @if ($Cases->status === 'Active')
                                                <span class="bg-green-500 text-white px-2 py-1 rounded">Active</span>
                                            @elseif ($Cases->status === 'Pending')
                                                <span class="bg-orange-500 text-white px-2 py-1 rounded">Pending</span>
                                            @elseif ($Cases->status === 'Finished')
                                                <span class="bg-blue-500 text-white px-2 py-1 rounded">Finished</span>
                                            @else
                                                <span class="bg-gray-500 text-white px-2 py-1 rounded">Unknown</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">
                                        <a href="{{ url('live-cases/'. $Cases->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Case Overview</a>
                                            <a href="{{ url('edit-cases/'. $Cases->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Update</a>
                                            <a href="{{ url('delete-cases/'. $Cases->id) }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
