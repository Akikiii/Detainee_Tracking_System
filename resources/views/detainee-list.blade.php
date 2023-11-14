<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Detainee Masterlist -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">View Detainee Masterlist</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">

                <div class="grid gap-5">
                    <div class="flex flex-col">
                        <div class="grid grid-flow-col gap-10">
                            <input
                                type="text"
                                class="pl-10 rounded-3xl w-[42.9375rem] py-4 px-3 font-bold leading-tight bg-gray-200 focus:outline-none searchBarPlaceHolder"
                                placeholder="Search for a detainee (Enter detainee name)"
                            />
                        </div>
                    </div>

                    <div class="flex flex-col gap-4" >
                        <label class="form-label block labelname font-bold mb-2">Detainees</label>
                        @php
                            $counter = count($data);
                        @endphp
                        @foreach ($data as $detainee)
                            <div class="flex space-x-4" onclick="selectCard(this, id)">
                                id = {{ $detainee->detainee_id }}>
                                <div class="flex flex-row border border-black border rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                                    <div class="flex items-center">
                                        <div style="background-color: black; height: 85px; width: 85px; border-radius: 100%;"></div>
                                        <div class="ml-4">
                                            <p class="text-left mb-2 font-bold">{{ $detainee->last_name }}, {{ $detainee->first_name }} {{ $detainee->middle_name }}</p>
                                            <p class="text-left mb-2">Age: {{ $detainee->age }} years old</p>
                                            @if (isset($detainee->detaineeDetails))
                                                <p class="text-left mb-2">Gender: {{ ucfirst($detainee->detaineeDetails->gender) }}</p>
                                                <p class="text-left mb-2">Offense: {{ $detainee->detaineeDetails->crime_history }}</p>
                                                <p class="text-left mb-2">Start of Detention: {{ $detainee->detaineeDetails->detention_begin }}</p>
                                                <p class="text-left mb-2">Time Served: {{ $detainee->detaineeDetails->max_detention_period }} hours</p>
                                            @else
                                                <p class="text-left mb-2">Offense: N/A</p>
                                                <p class="text-left mb-2">Start of Detention: N/A</p>
                                                <p class="text-left mb-2">Time Served: N/A</p>
                                            @endif
                                            <!-- Assigned Attorney Label still not working -->
                                            <p class="text-left mb-2">
                                                Assigned Attorney: 
                                                @if (optional($detainee->counselCaseAssignment)->assigned_by)
                                                    <strong class="bg-green-500 text-white px-1 py-1 rounded">{{ $detainee->counselCaseAssignment->assigned_by }}</strong>
                                                @else
                                                    <strong class="bg-orange-500 text-white px-1 py-1 rounded">None</strong>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="flex flex-col justify-center items-center">
                                    <a href="{{ route('view-detainee', ['id' => $detainee->detainee_id]) }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline flex-shrink" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2.46-2.46a4.88 4.88 0 014.9-1.227m3.094.45a4.88 4.88 0 014.898 1.227L21 12M9 6a6 6 0 100 12 6 6 0 000-12z" />
                                        </svg>
                                    </a>
                                </div> -->
                            </div>
                        @endforeach
                    </div>

                    <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                        <a href="{{ url('add-detainee') }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ADD NEW DETAINEE</a>
                        <a href="{{ url('edit-detainee/'.$detainee->detainee_id) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">EDIT</a>
                        <a href="{{ url('delete-detainee/'.$detainee->detainee_id) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4" onclick="return confirm('Are you sure you want to delete this detainee?')">DELETE</a>
                        <a href="{{ url('assign-attorney/'.$detainee->detainee_id) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ASSIGN ATTORNEY</a>
                        <a href="{{ url('add-cases/'.$detainee->detainee_id) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ASSIGN A CASE</a>
                        <a href="{{ url('detainee-list')}}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK</a>
                    </div>

                </div>
            </div>
            
        </div>

    </div>

    <script>
        var selectedDetaineeId = null;

        function selectCard(clickedElement, detaineeId) {
            // Remove 'selected' class from all other cards
            var allCards = document.querySelectorAll('.flex.space-x-4');
            allCards.forEach(function(card) {
                if (card !== clickedElement) {
                    card.classList.remove('selected');
                }
            });

            // Add 'selected' class to the clicked card
            clickedElement.classList.toggle('selected');

            // Update the links with the selected detainee ID
            document.getElementById('editLink').href = "{{ url('edit-detainee') }}/" + detaineeId;
            document.getElementById('deleteLink').href = "{{ url('delete-detainee') }}/" + detaineeId;
            document.getElementById('assignAttorneyLink').href = "{{ url('assign-attorney') }}/" + detaineeId;
            document.getElementById('assignCaseLink').href = "{{ url('add-cases') }}/" + detaineeId;

            // You can also perform other actions here based on the selection
            // For example, update a variable or send an AJAX request
        }
    </script>

</x-app-layout>