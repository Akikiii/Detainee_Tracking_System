<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Detainees -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Detainees</h3>
                    <p class="text-3xl font-bold">{{ \App\Models\Detainee::count() }}</p>
                </div>

                <!-- Users -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Users</h3>
                    <p class="text-3xl font-bold">{{ \App\Models\User::count() }}</p>
                </div>

                <!-- Cases -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Cases</h3>
                    <p class="text-3xl font-bold">{{ \App\Models\Cases::count() }}</p>
                </div>

                <!-- Detainees with Assigned Attorneys -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Detainees with Assigned Attorneys</h3>
                    <p class="text-3xl font-bold">{{ \App\Models\Counsel_Case_Assignment::whereNotNull('assigned_lawyer')->count() }}</p>
                </div>

                <!-- Detainees without Assigned Attorneys -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Detainees without Assigned Attorneys</h3>
                    <p class="text-3xl font-bold">{{ $withoutAttorneysCount  }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
