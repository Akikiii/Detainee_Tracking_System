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
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                        <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                            <p class="text-gray-900">Create Attorney Profile</p>
                        </div>
                        <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                            <p class="text-gray-900">Assign Attorney</p>
                        </div>
                        <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                            <p class="text-gray-900">Create Detainee Profile</p>
                        </div>
                        <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                            <p class="text-gray-900">View Detainee List</p>
                        </div>
                        <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                            <p class="text-gray-900">View Profile</p>
                        </div>
                        <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                            <p class="text-gray-900">Update Profile</p>
                        </div>
                        <div class="bg-gray-200 p-4 rounded-md w-56 h-56">
                            <p class="text-gray-900">Settings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
