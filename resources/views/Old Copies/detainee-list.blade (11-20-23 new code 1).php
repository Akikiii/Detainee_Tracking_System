<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
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
                                id="searchInput"
                                class="pl-7 w-[42.9375rem] py-4 px-3 font-bold leading-tight bg-gray-200 focus:outline-none searchBarPlaceHolder"
                                placeholder="Search for a Detainee (Enter Detainee Name or ID)"
                                oninput="searchDetainees()"
                            />
                        </div>
                    </div>
                
                    <div id="selectedDetaineeId"></div>
                    
                    <div class="flex flex-col gap-4" >
                        <label class="form-label block labelname font-bold mb-2">Detainees</label>
                        @php
                            $counter = count($data);
                        @endphp
                        @foreach ($data as $detainee)
                            <div class="flex space-x-4" onclick="selectedID(this, {{ $detainee->detainee_id }})">
                                <div class="flex flex-row border border-black border rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                                    <div class="flex items-center">
                                        <div style="background-color: black; height: 85px; width: 85px; border-radius: 100%;"></div>
                                        <div class="ml-4">
                                            <p class="text-left mb-2 font-bold">{{ $detainee->first_name }} {{ $detainee->middle_name }} {{ $detainee->last_name }}</p>
                                            <p class="text-left mb-2">Detainee ID: {{ $detainee->detainee_id }}</p>
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
                            </div>
                        @endforeach
                    </div>

                    <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                        <a href="{{ url('view-detainee', ['id' => 'detainee_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">VIEW DETAINEE</a>
                        <a href="{{ url('add-detainee') }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ADD NEW DETAINEE</a>
                        <a href="{{ url('edit-detainee' , ['id' => 'detainee_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">EDIT</a>
                        <a href="{{ url('delete-detainee' , ['id' => 'detainee_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4" onclick="return confirm('Are you sure you want to delete this detainee?')">DELETE</a>
                        <a href="{{ route('assign-attorney', ['detainee' => 'detainee_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ASSIGN ATTORNEY</a>
                        <a href="{{ url('add-cases', ['id' => 'detainee_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ASSIGN A CASE</a>
                        <a href="{{ url('detainee-list') }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK</a>
                    </div>

                </div>
            </div>
            
        </div>
    </div>

    <script>
        function selectedID(clickedElement, detaineeId) {

            var allCards = document.querySelectorAll('.flex.space-x-4');
            allCards.forEach(function(card) {
                if (card !== clickedElement) {
                    card.classList.remove('selected');
                }
            });

            clickedElement.classList.toggle('selected');

            var viewDetaineeButton = document.querySelector('a[href*="view-detainee"]');
            if (viewDetaineeButton) {
                viewDetaineeButton.href = detaineeId ? viewDetaineeButton.href.replace('detainee_id_placeholder', detaineeId) : 'javascript:void(0);';
            }

            var editButton = document.querySelector('a[href*="edit-detainee"]');
            if (editButton) {
                editButton.href = detaineeId ? editButton.href.replace('detainee_id_placeholder', detaineeId) : 'javascript:void(0);';
            }

            var deleteButton = document.querySelector('a[href*="delete-detainee"]');
            if (deleteButton) {
                deleteButton.href = detaineeId ? deleteButton.href.replace('detainee_id_placeholder', detaineeId) : 'javascript:void(0);';
            }

            var assignAttorneyButton = document.querySelector('a[href*="assign-attorney"]');
            if (assignAttorneyButton) {
                assignAttorneyButton.href = detaineeId ? assignAttorneyButton.href.replace('detainee_id_placeholder', detaineeId) : 'javascript:void(0);';
            }

            var assignCaseButton = document.querySelector('a[href*="add-cases"]');
            if (assignCaseButton) {
                assignCaseButton.href = detaineeId ? assignCaseButton.href.replace('detainee_id_placeholder', detaineeId) : 'javascript:void(0);';
            }

            var selectedDetaineeIdBox = document.getElementById('selectedDetaineeId');
            selectedDetaineeIdBox.textContent = detaineeId ? 'Selected Detainee ID: ' + detaineeId : 'No Detainee Selected'; // For Checking lang if nakuha yung ID

        }

        function searchDetainees() {
            var input = document.getElementById("searchInput").value.toLowerCase();

            var detainees = document.querySelectorAll(".flex.space-x-4");

            detainees.forEach(function (detainee) {
                var name = detainee.querySelector(".font-bold").textContent.toLowerCase();

                var nameMatch = name.includes(input);

                if (nameMatch) {
                    detainee.style.display = "flex";
                } else {
                    detainee.style.display = "none";
                }
            });
        }
    </script>

</x-app-layout>