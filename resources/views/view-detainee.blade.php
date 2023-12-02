<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- View Detainee Profile -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">View Detainee Profile</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">

                <div class="grid gap-5">

                    <div class="flex flex-col gap-4">
                        <div class="flex space-x-4">
                            <div class="flex flex-row border border-black border rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                                <div class="ml-4 flex">
                                    <div style="background-color: black; height: 125px; width: 125px; border-radius: 100%; margin-top: 10px;"></div>
                                    <div class="ml-10">
                                        <p class="text-left mt-3 mb-3 font-bold">{{ $detainee->last_name }}, {{ $detainee->first_name }} {{ $detainee->middle_name }}</p>
                                        <p class="text-left mb-3">Detainee ID: {{ $detainee['detainee_id'] }}</p>
                                        <?php
                                            $detentionStart = new DateTime($detainee->detaineeDetails->detention_begin);
                                            $currentTime = now();
                                            $timeDifference = $currentTime->diff($detentionStart);
                                            $totalDaysServed = $timeDifference->days;
                                            $remainingHoursServed = $timeDifference->h;
                                        ?>
                                        @if (isset($detainee->detaineeDetails))
                                            <p class="text-left mb-3">Gender: {{ ucfirst($detainee->detaineeDetails->gender) }}</p>
                                            <p class="text-left mb-3">Offense: {{ $detainee->detaineeDetails->crime_history }}</p>
                                            <p class="text-left mb-3">Start of Detention: {{ $detainee->detaineeDetails->detention_begin }}</p>
                                            <p class="text-left mb-2">Time Served: {{ $totalDaysServed }} days and {{ $remainingHoursServed }} hours</p>
                                        @else
                                            <p class="text-left mb-3">Offense: N/A</p>
                                            <p class="text-left mb-3">Start of Detention: N/A</p>
                                            <p class="text-left mb-3">Time Served: N/A</p>
                                        @endif
                                        <p class="text-left mb-3">Email Address: {{ $detainee['email_address'] }}</p>
                                        <p class="text-left mb-3">Home Address: {{ $detainee['home_address'] }}</p>
                                        <p class="text-left mb-3">Mother's Name: {{ $detainee->detaineeDetails->mother_name }}</p>
                                        <p class="text-left mb-3">Faher's Name: {{ $detainee->detaineeDetails->father_name}}</p>
                                        <p class="text-left mb-3">Spouse's Name: {{ $detainee->detaineeDetails->spouse_name}}</p>
                                        <p class="text-left mb-3">Emergency Contact's Name: {{ $detainee->detaineeDetails->emergency_contact_name }}</p>
                                        <p class="text-left mb-3">Emergency Contact's Number: {{ $detainee->detaineeDetails->emergency_contact_number }}</p>
                                        <p class="text-left mb-3">Medical Information: {{ $detainee->detaineeDetails->medical_information }}</p>
                                        <p class="text-left mb-3">Related Photos: {{ $detainee->detaineeDetails->related_photos}}</p>
                                        <p class="text-left mb-10">
                                            Assigned Case/s:
                                        </p>
                                        <ul>
                                            @forelse($detainee->cases as $case)
                                                <li>{{ $case->case_name }}</li>
                                            @empty
                                                <li>No assigned cases</li>
                                            @endforelse
                                        </ul>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                    <form action="{{ route('assign-attorney', ['detainee' => $detainee->detainee_id]) }}" method="post">
                            @csrf
                            @if ($counsel_case_assignment)
                                <a href="{{ url('remove-assignment/' . $counsel_case_assignment->detainee_id) }}"
                                    class="buttonFormat bg-[#D0B638] hover:bg-yellow-400 font-bold py-3 px-6 rounded"
                                    onclick="return confirm('Are you sure you want to remove your assignment?')">REMOVE ASSIGNED ATTORNEY TO DETAINEE
                                </a>
                            @else
                                <button type="submit" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">
                                    ASSIGN ATTORNEY TO DETAINEE
                                </button>
                            @endif
                        </form>
                        <a href="{{url('detainee-list')}}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK</a>
                    </div>

                </div>
            </div>
            
        </div>

    </div>

</x-app-layout>
