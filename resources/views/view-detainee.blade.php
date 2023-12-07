<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 my-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black p-[1.44rem] max-w-[600px]">
            @include('profile.partials.sidebar')
        </div>

        <!-- View Detainee Profile -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">View Detainee Profile</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">

                <div class="grid gap-5 border border-black">
                    
                    <div class="flex flex-col gap-4">
                        <div class="flex space-x-4">
                            <div class="flex flex-row rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                                <div class="ml-4">
                                    <!-- <div style="background-color: black; height: 125px; width: 125px; border-radius: 100%; margin-top: 10px;"></div> -->
                                    <div class="ml-10">
                                        <p class="text-left mt-3 mb-3 font-bold">{{ $detainee->last_name }}, {{ $detainee->first_name }} {{ $detainee->middle_name }}</p>
                                        <p class="text-left mb-3"><strong>Detainee ID: </strong>{{ $detainee['detainee_id'] }}</p>
                                        <?php
                                            $detentionStart = new DateTime($detainee->detaineeDetails->detention_begin);
                                            $currentTime = now();
                                            $timeDifference = $currentTime->diff($detentionStart);
                                            $totalDaysServed = $timeDifference->days;
                                            $remainingHoursServed = $timeDifference->h;
                                        ?>
                                        @if (isset($detainee->detaineeDetails))
                                            <p class="text-left mb-3"><strong>Gender: </strong>{{ ucfirst($detainee->detaineeDetails->gender) }}</p>
                                            <p class="text-left mb-3"><strong>Offense: </strong>{{ $detainee->detaineeDetails->crime_history }}</p>
                                            <p class="text-left mb-3"><strong>Start of Detention: </strong>{{ $detainee->detaineeDetails->detention_begin }}</p>
                                            <p class="text-left mb-2">
                                                <strong>Time Served: </strong>
                                                {{ floor($totalDaysServed / 365) }} year/s, 
                                                {{ $totalDaysServed % 365 }} day/s, 
                                                and {{ $remainingHoursServed }} hour/s
                                            </p>
                                        @else
                                            <p class="text-left mb-3"><strong>Offense: </strong>N/A</p>
                                            <p class="text-left mb-3"><strong>Start of Detention: </strong>N/A</p>
                                            <p class="text-left mb-3"><strong>Time Served: </strong>N/A</p>
                                        @endif
                                        <p class="text-left mb-3"><strong>Email Address: </strong>{{ $detainee['email_address'] }}</p>
                                        <p class="text-left mb-3"><strong>Home Address: </strong>{{ $detainee['home_address'] }}</p>
                                        <p class="text-left mb-3"><strong>Mother's Name: </strong>{{ $detainee->detaineeDetails->mother_name }}</p>
                                        <p class="text-left mb-3"><strong>Faher's Name: </strong>{{ $detainee->detaineeDetails->father_name}}</p>
                                        <p class="text-left mb-3"><strong>Spouse's Name: </strong>{{ $detainee->detaineeDetails->spouse_name}}</p>
                                        <p class="text-left mb-3"><strong>Emergency Contact's Name: </strong>{{ $detainee->detaineeDetails->emergency_contact_name }}</p>
                                        <p class="text-left"><strong>Emergency Contact's Number: </strong>{{ $detainee->detaineeDetails->emergency_contact_number }}</p>
                                        <!-- <p class="text-left mb-3">Medical Information: {{ $detainee->detaineeDetails->medical_information }}</p>
                                        <p class="text-left mb-3">Related Photos: {{ $detainee->detaineeDetails->related_photos}}</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-flow-row col-2 gap-2">
                        <label class="text-left font-bold ml-14">Assigned Case/s:</label>
                        <div class="grid grid-flow-col gap-10">
                            @foreach($detainee->cases as $case)
                            <div class="space-x-4 px-14 mb-10"> 
                                <div>
                                <a href="{{ url('live-cases', ['id' => $case->case_id]) }}" class="flex flex-row border border-black border rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative mb-4 hover:bg-gray-100">
                                        <div>
                                            <li class="text-left mb-3"><strong>{{ $case->case_name }}</strong></li>
                                            <p class="text-left mb-3">
                                                
                                                <strong>Status:
                                                @if ($case->status === 'Arraignment')
                                                    <span style="text-shadow: 0 0 1px #FDE581;">Arraignment</span></strong>
                                                    <div class="flex max-w-xs space-x-1.5">
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#FDE581]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                    </div>
                                                @elseif ($case->status === 'Bail')
                                                    <span style="text-shadow: 0 0 2px #FDE581;">Bail Hearing</span></strong>
                                                    <div class="flex max-w-xs space-x-1.5">
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#FDE581]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                    </div>
                                                @elseif ($case->status === 'Pretrial')
                                                    <span style="text-shadow: 0 0 1px #FDE581;">Pretrial</span></strong>
                                                    <div class="flex max-w-xs space-x-1.5">
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#FDE581]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                    </div>
                                                @elseif ($case->status === 'Plea')
                                                    <span style="text-shadow: 0 0 1px #FDE581;">Plea Bargaining</span></strong>
                                                    <div class="flex max-w-xs space-x-1.5">
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#FDE581]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                    </div>
                                                @elseif ($case->status === 'Trial')
                                                    <span style="text-shadow: 0 0 1px #FDE581;">Trial</span></strong>
                                                    <div class="flex max-w-xs space-x-1.5">
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#FDE581]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                    </div>
                                                @elseif ($case->status === 'Sentencing')
                                                    <span style="text-shadow: 0 0 1px #FDE581;">Sentencing</span></strong>
                                                    <div class="flex max-w-xs space-x-1.5">
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#FDE581]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                    </div>
                                                @elseif ($case->status === 'Appeal')
                                                    <span style="text-shadow: 0 0 1px #FDE581;">Appeal</span></strong>
                                                    <div class="flex max-w-xs space-x-1.5">
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#FDE581]"></span>
                                                    </div>
                                                @elseif ($case->status === 'Finished')
                                                    <span style="text-shadow: 0 0 1px #436228;">Finished/Archived</span></strong>
                                                    <div class="flex max-w-xs space-x-1.5">
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#436228]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#436228]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#436228]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#436228]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#436228]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#436228]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#436228]"></span>
                                                    </div>
                                                @else
                                                    <span style="text-shadow: 0 0 2px #FDE581;">Unknown</span></strong>
                                                    <div class="flex max-w-xs space-x-1.5">
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                        <span class="w-5 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                    </div>
                                                @endif
                                                </strong>
                                            </p>
                                            <p class="text-left ml-4"></p>  
                                            
                                        </div>
                                    </a>
                                </div>
                                
                                @if($detainee->cases->isEmpty())
                                    <li>No assigned cases</li>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    

                </div>

                <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                    <a href="{{url('detainee-list')}}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK</a>
                </div>
            </div>
            
        </div>

    </div>

</x-app-layout>
