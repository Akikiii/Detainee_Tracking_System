<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200">
                    <h3 class="text-lg font-semibold mb-4">List of Users</h3>

                    <form method="POST" action="{{ route('save-new-member') }}">
                        @csrf

                        @if(count($users) > 0)
                            @foreach($users as $user)
                                <div class="border p-4 mb-4 user-box" tabindex="0">
                                    <input type="radio" name="selected_user" value="{{ $user->id }}" id="user{{ $user->id }}" class="hidden">
                                    <label for="user{{ $user->id }}" class="cursor-pointer transition-all duration-300 ease-in-out">
                                        <p>{{ $user->name }} - {{ $user->email }}</p>
                                    </label>
                                </div>
                            @endforeach
                        @else
                            <p>No users found.</p>
                        @endif

                        <!-- Add button to add the selected user -->
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Add Selected User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Add your highlighting styles here */
        .user-box:focus,
        .user-box:active {
            background-color: #ffe6b3; /* You can change this color as needed */
        }
    </style>
</x-app-layout>
