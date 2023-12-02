<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Add Event -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold">Add Event</h1>
                <hr class="mt-[1.94rem] mb-[2.31rem]"/>
                <div class="grid gap-5">
                    
                    <!-- Triggers when user successfully added a detainee -->
                    @if(Session::has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('save-event', ['case_id' => $case_id]) }}"  enctype="multipart/form-data">
                        @csrf

                        <!-- Add the hidden input field for case_id -->
                        <input type="hidden" name="case_id" value="{{ $case_id }}">

                        <div class="grid grid-flow-row col-2 gap-10">
                            <div class="grid col-start-1">
                                <label class="form-label block labelname font-bold mb-2">Event Type</label>
                                <select name="event_type" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black"> 
                                    <option value="Finished">Finished/Archived</option>
                                    <option value="Arraignment">Arraignment</option>
                                    <option value="Bail">Bail Hearing</option>
                                    <option value="Pretrial">Pre-Trial</option>
                                    <option value="Plea">Plea Bargaining</option>
                                    <option value="Trial">Trial</option>
                                    <option value="Sentencing">Sentencing</option>
                                    <option value="Appeal">Appeal</option>
                                </select>
                                @error('event_type')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>


                            <div class="grid col-start-2">
                                <label class="form-label block labelname font-bold mb-2">Event Date</label>
                                <input type="date" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="event_date" value="{{ old('event_date') }}">
                                @error('event_date')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="grid grid-flow-row col-2 mt-5">
                            <label class="form-label block labelname font-bold mb-2">Description</label>
                            <textarea class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="description" placeholder="Enter Description">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">

                            <div class="grid col-start-1">
                                <label class="form-label block labelname font-bold mb-2">Related Entity</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="related_entity" placeholder="Enter Related Entity" value="{{old('related_entity')}}">
                                @error('related_entity')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>


                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <label class="form-label block labelname font-bold mb-2">Event Outcome</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="event_outcome" placeholder="Enter Event Outcome" value="{{old('event_outcome')}}">
                                @error('event_outcome')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10">
                            <div class="grid col-start-1">
                                <label class="form-label block labelname font-bold mb-2">Mode of Payment</label>
                                <select name="event_type" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black"> 
                                    <option value="">Cash</option>
                                    <option value="">Property</option>
                                    <option value="">Surety Bond</option>  
                                </select>
                                @error('event_type')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid col-start-3">
                                <label class="form-label block labelname font-bold mb-2"> Total Amount of Bail:</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="case_id" placeholder="Enter Amount">
                                @error('case_id')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="grid col-start-3">
                                <label class="form-label block labelname font-bold mb-2">Paid:</label>
                                <div class="flex items-center">
                                    <input type="radio" id="paid" name="paid" value="1">
                                    <label for="paid" class="ml-2">Yes</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="not_paid" name="paid" value="0">
                                    <label for="not_paid" class="ml-2">No</label>
                                </div>
                                @error('paid')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

            
                        <div class="flex flex-row justify-end gap-2.5 mt-10">
                            <button type="submit" class="buttonFormat bg-[#D0B638] hover:bg-yellow-400 font-bold py-3 px-6 rounded">SAVE EVENT</button>
                            <a href="{{ url()->previous() }}" class="buttonFormat bg-[#CCCCCC] hover:bg-[#777777] font-bold py-3 px-4 rounded">BACK</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
