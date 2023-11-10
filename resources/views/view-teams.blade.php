<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- View Teams -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold">TEAMS LIST AND DETAILS</h1>
                <hr class="mt-[1.94rem] mb-[2.31rem]"/>

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

                    <div class="flex flex-col gap-4">
                        <label class="form-label block labelname font-bold mb-2">Teams</label>
                        @php
                            $counter = count($data);
                        @endphp
                        @foreach ($data as $team)
                            <div class="flex space-x-4">
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
                                <!-- No Hypertext Reference yet -->
                                <div class="flex flex-col justify-center items-center">
                                    <a href="{{ route('view-team-members', ['id' => $team->id]) }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline flex-shrink" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2.46-2.46a4.88 4.88 0 014.9-1.227m3.094.45a4.88 4.88 0 014.898 1.227L21 12M9 6a6 6 0 100 12 6 6 0 000-12z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                        <a href="{{ url('detainee-list') }}" class="buttonFormat bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">BACK</a>
                        <a href="{{ url('create-team-form') }}" class="buttonFormat bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">CREATE TEAM</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
    
</x-app-layout>
