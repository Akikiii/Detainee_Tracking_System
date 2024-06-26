<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 my-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black p-[1.44rem] max-w-[600px]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Assign Attorney -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">Assign Attorney</h1>
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
                                        <p class="text-left mb-3">Age: {{ $detainee->age }} years old</p>
                                        @if (isset($detainee->detaineeDetails))
                                            <p class="text-left mb-3">Gender: {{ ucfirst($detainee->detaineeDetails->gender) }}</p>
                                            <p class="text-left mb-3">Offense: {{ $detainee->detaineeDetails->crime_history }}</p>
                                            <p class="text-left mb-3">Start of Detention: {{ $detainee->detaineeDetails->detention_begin }}</p>
                                            <p class="text-left mb-3">Time Served: {{ $detainee->detaineeDetails->max_detention_period }} hours</p>
                                        @else
                                            <p class="text-left mb-3">Offense: N/A</p>
                                            <p class="text-left mb-3">Start of Detention: N/A</p>
                                            <p class="text-left mb-3">Time Served: N/A</p>
                                        @endif
                                        <p class="text-left mb-3">Medical Information: {{ $detainee->detaineeDetails->medical_information }}</p>
                                        <p class="text-left mb-3">Related Photos: {{ $detainee->detaineeDetails->related_photos}}</p>
                                        <p class="text-left mb-10">
                                            Assigned Attorney:
                                            @if (optional($counsel_case_assignment)->assigned_by)
                                                <strong class="bg-green-500 text-white px-1 py-1 rounded">{{ $counsel_case_assignment->assigned_by }}</strong>
                                            @else
                                                <strong class="bg-red-500 text-white px-1 py-1 rounded">None</strong>
                                            @endif
                                        </p>
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
                                class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4"
                                    onclick="return confirm('Are you sure you want to remove your assignment?')">REMOVE ASSIGNED ATTY TO DETAINEE
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
