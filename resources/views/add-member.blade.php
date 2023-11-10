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

                    <h3 class="text-lg font-semibold mb-4">List of Users</h3>

                    @if(count($users) > 0)
                        @foreach($users as $user)
                        @if($user->name !== $team->team_leader_name)
                                <div class="border p-4 mb-4 user-box">
                                    <p>{{ $user->name }} - {{ $user->email }}</p>
                                    {{-- You can add more details or buttons as needed --}}
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p>No users found.</p>
                    @endif

                    <!-- Add button to add a new user -->
                    <button id="addButton" class="bg-blue-500 text-white px-4 py-2 rounded">
                        Add User/s
                    </button>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var userBoxes = document.querySelectorAll('.user-box');

            userBoxes.forEach(function(box) {
                box.addEventListener('click', function() {
                    // Toggle the 'highlight' class on click
                    this.classList.toggle('highlight');
                });
            });

            // Add event listener for the "Add" button
            var addButton = document.getElementById('addButton');
            addButton.addEventListener('click', function() {
                // Add your logic to handle the addition of a new user
                console.log('Add button clicked');
            });
        });
    </script>

    <style>
        /* Add your highlighting styles here */
        .highlight {
            background-color: #ffe6b3; /* You can change this color as needed */
        }
    </style>
</x-app-layout>
