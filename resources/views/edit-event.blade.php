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
                    <form method="POST" action="{{ route('update-event', ['case_id' => $case_id]) }}">
                        @csrf
                        <!-- Add the hidden input field for case_id -->
                        <input type="hidden" name="case_id" value="{{ $case_id }}">
                        <div class="md-3">
                            <label class="form-label">Event Type</label>
                            <input type="text" class="form-control text-black" name="event_type" placeholder="Enter Event Type" value="{{old('event_type')}}">
                            @error('event_type')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="md-3">
                            <label class="form-label">Event Date</label>
                            <input type="date" class="form-control text-black" name="event_date" value="{{ old('event_date') }}">
                            @error('event_date')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>

                    <div class="md-3">
                        <label class="form-label">description</label>
                        <textarea class="form-control text-black" name="description" placeholder="Enter Description">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="md-3">
                            <label class="form-label">Related Entity</label>
                            <input type="text" class="form-control text-black" name="related_entity" placeholder="Enter Related Entity" value="{{old('related_entity')}}">
                            @error('related_entity')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="md-3">
                            <label class="form-label">Event Location</label>
                            <input type="text" class="form-control text-black" name="event_location" placeholder="Enter Event Location" value="{{old('event_location')}}">
                            @error('event_location')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="md-3">
                            <label class="form-label">Event Outcome</label>
                            <input type="text" class="form-control text-black" name="event_outcome" placeholder="Enter event_outcome" value="{{old('event_outcome')}}">
                            @error('event_outcome')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="md-3">
                        <label class="form-label">Event Notes</label>
                        <textarea class="form-control text-black" name="event_notes" placeholder="Enter Event Notes">{{ old('event_notes') }}</textarea>
                        @error('event_notes')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                        <div class="mt-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Save Event</button>
                            </div>
                    </form>
                    <div class="mt-4">
                        <a href="{{ url()->previous() }}" class="bg-red-600 hover:bg-red-400 text-black font-bold py-2 px-4 rounded">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
