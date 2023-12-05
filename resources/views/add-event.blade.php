<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 my-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black p-[1.44rem] max-w-[600px]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Add Event -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold">Add Event</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">
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
                                <div class="w-1/6">
                                    <label class="block font-bold mb-2 labelname text-lg">Event Type</label>
                                    <select name="event_type" id="event_type" class="form-control border border-black rounded w-full py-4 px-3 input[type=text] text-base leading-tight focus:outline-none focus:border-black">
                                        <option value="Arraignment">Arraignment</option>
                                        <option value="Bail">Bail Hearing</option>
                                        <option value="Pretrial">Pre-Trial</option>
                                        <option value="Plea">Plea Bargaining</option>
                                        <option value="Trial">Trial</option>
                                        <option value="Sentencing">Sentencing</option>
                                        <option value="Appeal">Appeal</option>
                                        <option value="Finished">Finished/Archived</option>
                                    </select>
                                    @error('event_type')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <div class="w-1/6">
                                <label class="block font-bold mb-2 labelname text-lg">Event Date</label>
                                <input type="date" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="event_date" value="{{ old('event_date') }}">
                                @error('event_date')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col mt-5">
                            <label class="block font-bold mb-2 labelname text-lg">Description</label>
                            <textarea class="form-control text-black border border-black rounded w-full py-4 px-3 input[type=text] text-lg leading-tight focus:outline-none focus:border-black" name="description" placeholder="Enter Description">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <label class="block font-bold mb-2 labelname text-lg">Related Entity</label>
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
                                <label class="block font-bold mb-2 labelname text-lg">Event Outcome</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="event_outcome" placeholder="Enter Event Outcome" value="{{old('event_outcome')}}">
                                @error('event_outcome')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5" id="bailAmount" style="display: none;">
                            <div class="grid col-start-1">
                                <div class="w-2/5">
                                    <label class="block font-bold mb-2 labelname text-lg"> Total Amount of Bail:</label>
                                    <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="case_id" placeholder="Enter Amount">
                                    @error('case_id')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5" id="bailType" style="display: none;">
                            <div class="grid col-start-1">
                                <div class="w-1/6">
                                    <label class="block font-bold mb-2 labelname text-lg">Bail Type</label>
                                    <select name="" class="form-control text-black border border-black rounded w-full py-4 px-3 input[type=text] text-base leading-tight focus:outline-none focus:border-black"> 
                                        <option value="">Cash Bail</option>
                                        <option value="">Property Bond</option>
                                        <option value="">Surety Bond</option>  
                                    </select>
                                    @error('')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5" id="bailConfirmation" style="display: none;">
                            <div class="main flex overflow-hidden select-none">
                                <div class="buttonFormat py-3 my-auto px-5 bg-black text-white text-sm font-semibold mr-3">PAID:</div>
                                <label class="flex radio p-2 cursor-pointer">
                                    <input class="my-auto transform scale-90" type="radio" id="paid" name="paid" value="1"/>
                                    <div for="paid" class="title ml-2"> Yes</div>
                                </label>

                                <label class="flex radio p-2 cursor-pointer">
                                    <input class="my-auto transform scale-90" type="radio" id="not_paid" name="paid" value="0"/>
                                    <div for="not_paid" class="title ml-2">No</div>
                                </label>

                                @error('paid')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5" id="verdict" style="display: none;">
                            <div class="grid col-start-1">
                                <div class="w-1/6">
                                    <label class="block font-bold mb-2 labelname text-lg">Verdict</label>
                                    <select name="" class="form-control text-black border border-black rounded w-full py-4 px-3 input[type=text] text-base leading-tight focus:outline-none focus:border-black"> 
                                        <option value="">Guilty</option>
                                        <option value="">Not Guilty</option>
                                    </select>
                                    @error('')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        

            
                        <div class="flex flex-row justify-end gap-2.5 mt-10">
                            <button type="submit" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">SAVE EVENT</button>
                            <a href="{{ url()->previous() }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var bailSections = document.getElementById("bailSections");
            var eventTypeSelect = document.getElementById("event_type");

            toggleBailSections(eventTypeSelect.value);

            eventTypeSelect.addEventListener("change", function() {
                toggleBailSections(this.value);
            });

            function toggleBailSections(selectedEventType) {
                if (selectedEventType === "Bail") {
                    bailAmount.style.display = "block";
                    bailType.style.display = "block";
                    bailConfirmation.style.display = "block";
                    verdict.style.display = "none";
                }
                else if (selectedEventType === "Arraignment") {
                    verdict.style.display = "block";
                    bailAmount.style.display = "none";
                    bailType.style.display = "none";
                    bailConfirmation.style.display = "none";
                } 
                else {
                    bailAmount.style.display = "none";
                    bailType.style.display = "none";
                    bailConfirmation.style.display = "none";
                    verdict.style.display = "none";
                }
            }
        });
    </script>

</x-app-layout>
