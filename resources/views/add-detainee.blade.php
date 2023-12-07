<x-app-layout>
    
    <!-- Canvas -->
    <div class="flex bg-[#f0f2f5] justify-center">

        <!-- Create Detainee Profile -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-3 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">Create Detainee Profile</h1>
                <hr class="mt-[1.94rem] mb-[2.31rem]"/>
                <div class="grid gap-5">

                    <!-- Triggers when user successfully added a detainee -->
                    @if(Session::has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif

                    <form method="POST" action="{{url('save-detainee')}}">
                    @csrf
                        <div class="flex flex-col">
                            <label class="block font-bold mb-2 labelname text-lg">Name</label>
                            <div class="grid grid-flow-col gap-10">
                                <div>
                                    <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="last_name" placeholder="Enter Last Name" value="{{old('last_name')}}">
                                    @error('last_name')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div>
                                    <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="first_name" placeholder="Enter First Name" value="{{old('first_name')}}">
                                    @error('first_name')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div>
                                    <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="middle_name" placeholder="Enter Middle name" value="{{old('middle_name')}}">
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
                            <textarea class="form-control text-black border border-black rounded w-full py-4 px-3 input[type=text] text-lg leading-tight focus:outline-none focus:border-black" name="home_address" placeholder="Home Address (Street Name, City, State/Province, Postal Code)" value="{{old('home_address')}}"></textarea>
                            @error('home_address')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <label class="block font-bold mb-2 labelname text-lg">Contact Number</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="contact_number" placeholder="Enter Contact Number" value="{{old('contact_number')}}">
                                @error('contact_number')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="grid col-start-2">
                                <label class="block font-bold mb-2 labelname text-lg">Email Address</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="email_address" placeholder="Enter Email Address" value="{{old('email_address')}}">
                                @error('email_address')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="grid col-start-3">
                                <label class="block font-bold mb-2 labelname text-lg">Detainee ID</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="detainee_id" placeholder="Enter Detainee ID">
                                @error('detainee_id')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <!-- Add Birthdate to Database -->
                            <div class="grid col-start-1">
                                <label class="block font-bold mb-2 labelname text-lg">Birthdate</label>
                                <input type="date" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="birthday" value="{{ old('birthday') }}">
                                @error('birthday')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="grid col-start-2">
                                <label class="block font-bold mb-2 labelname text-lg">Gender</label>
                                <select class="form-control border border-black rounded w-full py-4 px-3 input[type=text] text-lg leading-tight focus:outline-none focus:border-black" name="gender">
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
                            <div class="grid col-start-3">
                                <label class="block font-bold mb-2 labelname text-lg">Start of Detention</label>
                                <input type="date" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="detention_begin" value="{{ old('detention_begin') }}">
                                @error('detention_begin')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col mt-5">
                            <label class="block font-bold mb-2 labelname text-lg">Mother Name</label>
                            <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="mother_name" placeholder="Enter Mother's Name (Last Name, First Name + Middle Name)" value="{{old('mother_name')}}">
                            @error('mother_name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="flex flex-col mt-5">
                            <label class="block font-bold mb-2 labelname text-lg">Father Name</label>
                            <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="father_name" placeholder="Enter Father's Name (Last Name, First Name + Middle Name)" value="{{old('father_name')}}">
                            @error('father_name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="flex flex-col mt-5">
                            <label class="block font-bold mb-2 labelname text-lg">Spouse Name</label>
                            <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="spouse_name" placeholder="Enter Spouse's Name (Last Name, First Name + Middle Name) if N/A leave blank" value="{{old('spouse_name')}}">
                            @error('spouse_name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="flex flex-col mt-5">
                            <label class="block font-bold mb-2 labelname text-lg">Emergency Contact Name</label>
                            <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="emergency_contact_name" placeholder="Enter Emergency Contact Name (Last Name, First Name + Middle Name)" value="{{old('emergency_contact_name')}}">
                            @error('emergency_contact_name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="flex flex-col mt-5">
                            <label class="block font-bold mb-2 labelname text-lg">Emergency Contact Number</label>
                            <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="emergency_contact_number" placeholder="Enter Emergency Contact Number" value="{{old('emergency_contact_number')}}">
                            @error('emergency_contact_number')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                    
                        <div class="flex flex-col mt-5">
                            <label class="block font-bold mb-2 labelname text-lg">Violation</label>
                            <div class="flex">
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="related_photos" placeholder="Input the reason for detention here">
                                @error('related_photos')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <!-- <label class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <input type="file" class="hidden" />
                                </label> -->
                            </div>
                        </div>

                        <div class="flex flex-col mt-5">
                            <label class="block font-bold mb-2 labelname text-lg">Detainee’s Crime History</label>
                            <div class="flex">
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black mr-2" name="crime_history" placeholder="Enter detainee’s history of crime here" value="{{old('crime_history')}}">
                                @error('crime_history')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                <label class="bg-gray-500 hover:bg-black text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <input type="file" class="hidden" />
                                </label>
                            </div>
                        </div>

                        <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                            <button type="submit" class="buttonFormat col-end-4 bg-gray-500 font-bold hover:bg-black text-white hover:text-white py-4 px-4">ADD DETAINEE</button>
                            <a href="{{url('detainee-list')}}" class="buttonFormat col-end-4 bg-gray-500 font-bold hover:bg-black text-white hover:text-white py-4 px-4">BACK</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>