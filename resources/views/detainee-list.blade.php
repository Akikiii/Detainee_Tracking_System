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
                        <h2>Detainee List</h2>
                        <div>
                            <a href="{{ url('add-detainee') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Add</a>
                        </div>
                        <table class="table border">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Phone</th>
                                    <th class="px-4 py-2">Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = count($data);
                                @endphp
                                @foreach ($data as $detainee)
                                    <tr>
                                        <td class="px-4 py-2">{{ $counter-- }}</td>
                                        <td class="px-4 py-2">{{ $detainee->last_name . ', ' . $detainee->first_name . ' ' . $detainee->middle_name }}</td>
                                        <td class="px-4 py-2">{{ $detainee->email_address }}</td>
                                        <td class="px-4 py-2">{{ $detainee->contact_address }}</td>
                                        <td class="px-4 py-2">{{ $detainee->home_address }}</td>
                                        <td class="px-4 py-2">
                                            <a href="{{ url('edit-detainee/'. $detainee->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Edit</a>
                                            |
                                            <a href="{{ url('delete-detainee/'. $detainee->id) }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete</a>
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
