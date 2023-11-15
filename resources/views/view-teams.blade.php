<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- View Teams -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">TEAMS LIST AND DETAILS</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">

                <div class="grid gap-5">

                    <div class="flex flex-col">
                        <div class="grid grid-flow-col gap-10">
                            <input
                                type="text"
                                class="pl-10 rounded-3xl w-[42.9375rem] py-4 px-3 font-bold leading-tight bg-gray-200 focus:outline-none searchBarPlaceHolder"
                                placeholder="Search for a team (Enter Team Name)"
                            />
                        </div>
                    </div>

                    <div id="selectedTeamID"></div>

                    <div class="flex flex-col gap-4">
                        <label class="form-label block labelname font-bold mb-2">Teams</label>
                        @php
                            $counter = count($data);
                        @endphp
                        @foreach ($data as $team)
                            <div class="flex space-x-4" onclick="selectedTeam(this, {{ $team->id }})">
                                <div class="flex flex-row border border-black border rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-left font-bold mb-3">Team ID: {{ $team->id }}</p>
                                            <p class="text-left mb-3"><strong>Team Name:</strong> {{ $team->team_name }}</p>
                                            <p class="text-left mb-3"><strong>Team Leader Name:</strong> {{ $team->team_leader_name ?? 'N/A' }}</p>
                                            <p class="text-left mb-3"><strong>Case ID:</strong> {{ $team->case_id ?? 'N/A' }}</p>
                                            <p class="text-left mb-3"><strong>Creation Date:</strong> {{ $team->creation_date }}</p>
                                            <p class="text-left mb-3"><strong>Description:</strong> {{ $team->description ?? 'N/A' }}</p>
                                            <p class="text-left mb-3"><strong>Status:</strong>
                                                @if ($team->status === 'active')
                                                    <span class="bg-green-500 text-white px-1 py-1 rounded">Active</span>
                                                @elseif ($team->statuss === 'disbanded')
                                                    <span class="bg-red-500 text-white px-1 py-1 rounded">Disbanded</span>
                                                @elseif ($team->statuss === 'oh hold')
                                                    <span class="bg-orange-500 text-white px-1 py-1 rounded">On Hold</span>
                                                @else
                                                    <span class="bg-orange-500 text-white px-1 py-1 rounded">Unknown</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                        <a href="{{ url('view-team-members', ['id' => 'team_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">VIEW TEAM MEMBERS</a>
                        <a href="{{ url('create-team-form') }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">CREATE TEAM</a>
                        <a href="{{ url('detainee-list') }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>

        function selectedTeam (clickedElement, teamID) {
            
            var allCards = document.querySelectorAll('.flex.space-x-4');
            allCards.forEach(function(card) {
                if (card !== clickedElement) {
                    card.classList.remove('selected');
                }
            });

            clickedElement.classList.toggle('selected');

            var viewTeamMembersButton = document.querySelector('a[href*="view-team-members"]');
            if (viewTeamMembersButton) {
                viewTeamMembersButton.href = teamID ? viewTeamMembersButton.href.replace('team_id_placeholder', teamID) : 'javascript:void(0);';
            }

            var selectedTeamIDBox = document.getElementById('selectedTeamID');
            selectedTeamIDBox.textContent = teamID ? 'Selected Team ID: ' + teamID : 'No Team Selected';
        }

    </script>
    
</x-app-layout>
