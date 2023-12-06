<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Event Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Event Information</h3>

                @if(isset($event))
                    <p><strong>Event Type:</strong> {{ $event->event_type }}</p>
                    <p><strong>Event Date:</strong> {{ $event->event_date }}</p>
                    <p><strong>Description:</strong> {{ $event->description }}</p>
                
                @else
                    <p>No event found.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
