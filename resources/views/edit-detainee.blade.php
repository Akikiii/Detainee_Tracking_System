<x-app-layout>
    
    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 my-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black p-[1.44rem] max-w-[600px]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Create Detainee Profile -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">Edit Detainee Profile</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">
                <div class="grid gap-5">

                    <!-- Triggers when user successfully added a detainee -->
                    @if(Session::has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif

                    <form method="POST" action="{{url('update-detainee/' . $detaineeId)}}">
                    @csrf
                        <div class="flex flex-col">
                            <label class="block font-bold mb-2 labelname text-lg">Name</label>
                            <div class="grid grid-flow-col gap-10">
                                <div>
                                    <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="last_name" placeholder="Enter Last Name" value="{{$detainee->last_name}}">
                                    @error('last_name')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div>
                                    <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="first_name" placeholder="Enter First Name" value="{{$detainee->first_name}}">
                                    @error('first_name')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div>
                                    <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="middle_name" placeholder="Enter Middle name" value="{{$detainee->middle_name}}">
                                    @error('middle_name')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col mt-5">
                            <label class="block font-bold mb-2 labelname text-lg">Home Address</label>
                            <textarea class="form-control text-black border border-black rounded w-full py-4 px-3 input[type=text] text-lg leading-tight focus:outline-none focus:border-black" name="home_address" placeholder="Home Address (Street Name, City, State/Province, Postal Code)" >{{$detainee->home_address}}</textarea>
                            @error('home_address')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <label class="block font-bold mb-2 labelname text-lg">Contact number</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="contact_number" placeholder="Enter Contact Number" value="{{$detainee->contact_number}}">
                                @error('contact_number')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="grid col-start-2">
                                <label class="block font-bold mb-2 labelname text-lg">Email Address</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="email_address" placeholder="Enter Email Address" value="{{$detainee->email_address}}">
                                @error('email_address')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="grid col-start-3">
                                <label class="block font-bold mb-2 labelname text-lg">Detainee ID</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="detainee_id" placeholder="Enter Detainee ID" value="{{$detainee->detainee_id}}">
                                @error('detainee_id')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <label class="block font-bold mb-2 labelname text-lg">Gender</label>
                                <select class="form-control text-black border border-black rounded w-full py-4 px-3 input[type=text] text-lg leading-tight focus:outline-none focus:border-black" name="gender" >
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                                <!-- Make It Related To Time -->
                                <div class="grid col-start-2">
                                    <label class="block font-bold mb-2 labelname text-lg">Start of Detention</label>
                                    <input type="date" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="detention_begin" value="{{$detainee->detaineeDetails->detention_begin }}">
                                    @error('detention_begin')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col mt-5">
                                <label class="block font-bold mb-2 labelname text-lg">Mother Name</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="mother_name" placeholder="Enter Mother's Name (Last Name, First Name + Middle Name)" value="{{$detainee->detaineeDetails->mother_name}}">
                                @error('mother_name')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="flex flex-col mt-5">
                                <label class="block font-bold mb-2 labelname text-lg">Father Name</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="father_name" placeholder="Enter Father's Name (Last Name, First Name + Middle Name)" value="{{$detainee->detaineeDetails->father_name}}">
                                @error('father_name')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="flex flex-col mt-5">
                                <label class="block font-bold mb-2 labelname text-lg">Spouse Name</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="spouse_name" placeholder="Enter Spouse's Name (Last Name, First Name + Middle Name) if N/A leave blank" value="{{$detainee->detaineeDetails->spouse_name}}">
                                @error('spouse_name')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="flex flex-col mt-5">
                                <label class="block font-bold mb-2 labelname text-lg">Emergency Contact Name</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="emergency_contact_name" placeholder="Enter Emergency Contact Name (Last Name, First Name + Middle Name)" value="{{$detainee->detaineeDetails->emergency_contact_name}}">
                                @error('emergency_contact_name')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        <div class="flex flex-col mt-5">
                            <label class="block font-bold mb-2 labelname text-lg">Emergency Contact Number</label>
                            <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="emergency_contact_number" placeholder="Enter Emergency Contact Number" value="{{$detainee->detaineeDetails->emergency_contact_number}}">
                            @error('emergency_contact_number')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                       

                        <div class="flex flex-col mt-5">
                            <label class="block font-bold mb-2 labelname text-lg">Violation</label>
                            <div class="flex">
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="related_photos" placeholder="Input the reason for detention here (Upload Documents if necessary)" value="{{$detainee->detaineeDetails->related_photos}}">
                                @error('related_photos')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror

                      
                            </div>
                        </div>

                        <div class="flex flex-col mt-5">
                            <label class="block font-bold mb-2 labelname text-lg">Detainee’s Crime History</label>
                            <div class="flex">
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black mr-2" name="crime_history" placeholder="Enter detainee’s history of crime here" value="{{$detainee->detaineeDetails->crime_history}}">
                                @error('crime_history')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                    
                    

                        <div class="flex flex-row justify-end gap-2.5 mt-[3.12rem]">
                            <button type="submit" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">SAVE CHANGES</button>
                            <a href="{{url('detainee-list')}}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>