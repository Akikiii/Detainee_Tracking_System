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
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">EVENT DETAILS</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">

                <div class="grid gap-5">

                    <div class="flex flex-col gap-4">
                        <label class="form-label block labelname font-bold">Event Information</label>

                        <div class="flex space-x-4">
                            <div class="flex flex-row border border-black border rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                                <div class="ml-4 flex">
                                    <div class="ml-2">
                                        @if(isset($event))
                                            <p class="text-[1.875rem] mb-3"><strong>Case Title: </strong> {{ $event->case->case_name}}</p>
                                            <p class="text-left mb-3"><strong>Event Type:</strong> {{ $event->event_type }}</p>
                                            @if ($event->event_type == 'Bail')
                                                <p class="text-left mb-3"><strong>Bail Amount: </strong>{{ optional($event->bail)->amount}}</p>
                                                <p class="text-left mb-3"><strong>Bail Status: </strong>{{ ucfirst($event->bail_confirmation) }}</p>
                                                <p class="text-left mb-3"><strong>Bail Type: </strong>{{optional($event->bail)->bail_type}}</p>
                                            @elseif ($event->event_type == 'Arraignment')
                                                <p class="text-left mb-3"><strong>Verdict: </strong>
                                                    @if ($event->verdict == 'guilty')
                                                        Guilty
                                                    @elseif ($event->verdict == 'not_guilty')
                                                        Not Guilty
                                                    @elseif ($event->verdict == 'no_contest')
                                                        No Contest
                                                    @endif
                                                </p>
                                            @endif
                                            <p class="text-left mb-3"><strong>Event Date:</strong> {{ $event->event_date }}</p>
                                            <p class="text-left mb-3"><strong>Event Location:</strong> 
                                                @if($event->case->location == 'rtc')
                                                    Regional Trial Court
                                                @elseif($event->case->location == 'mtc')
                                                    Municipal Trial Court
                                                @endif
                                            </p>
                                            <p class="text-left mb-3"><strong>Description:</strong> {{ $event->description }}</p>
                                            <p class="text-left mb-3"><strong>Event Outcome:</strong> {{ $event->event_outcome }}</p>
                                            
                                        @else
                                            <p>No event found.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                        <a href="{{ url()->previous() }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK TO EVENT TIMELINE</a>
                    </div>

                </div>
            </div>
            
        </div>

    </div>
</x-app-layout>
