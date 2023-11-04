<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Assign Attorney -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold">Assign Attorney</h1>
                <hr class="mt-[1.94rem] mb-[2.31rem]"/>

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
                        <form action="{{ route('assign-attorney', ['detainee_id' => $detainee->id]) }}" method="post">
                            @csrf
                            @if ($counsel_case_assignment)
                                <a href="{{ url('remove-assignment/' . $counsel_case_assignment->detainee_id) }}"
                                    class="buttonFormat bg-[#D0B638] hover:bg-yellow-400 font-bold py-3 px-6 rounded"
                                    onclick="return confirm('Are you sure you want to delete this detainee?')">REMOVE ASSIGNED ATTY TO DETAINEE
                                </a>
                            @else
                                <button type="submit" class="buttonFormat bg-[#D0B638] hover:bg-yellow-400 font-bold py-3 px-6 rounded">
                                    ASSIGN ATTORNEY TO DETAINEE
                                </button>
                            @endif
                        </form>
                        <a href="{{url('detainee-list')}}" class="buttonFormat bg-[#CCCCCC] hover:bg-[#777777] font-bold py-3 px-4 rounded">BACK</a>
                    </div>

                </div>
            </div>
            
        </div>

    </div>

</x-app-layout>
