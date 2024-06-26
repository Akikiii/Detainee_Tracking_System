<x-app-layout>
    
    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Create Detainee Profile Part 1 -->
        <div id="part1" class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <form id="part1Form" method="POST" action="{{url('save-detainee')}}">
                @csrf
                <div>
                    <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">Create Detainee Profile</h1>
                    <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">
                    <div class="grid gap-5">

                        <!-- Triggers when user successfully added a detainee -->
                        @if(Session::has('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif


                            <div class="flex flex-col">
                                <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Name</label>
                                <div class="grid grid-flow-col gap-10">
                                    <div>
                                        <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="last_name" placeholder="Enter Last Name" value="{{old('last_name')}}">
                                        @error('last_name')
                                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div>
                                        <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="first_name" placeholder="Enter First Name" value="{{old('first_name')}}">
                                        @error('first_name')
                                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div>
                                        <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="middle_name" placeholder="Enter Middle name" value="{{old('middle_name')}}">
                                        @error('middle_name')
                                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col mt-5">
                                <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Home Address</label>
                                <textarea class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="home_address" placeholder="Home Address (Street Name, City, State/Province, Postal Code)" value="{{old('home_address')}}"></textarea>
                                @error('home_address')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="grid grid-flow-row col-2 gap-10 mt-5">
                                <div class="grid col-start-1">
                                    <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Contact number</label>
                                    <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="contact_number" placeholder="Enter Contact Number" value="{{old('contact_number')}}">
                                    @error('contact_number')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="grid col-start-2">
                                    <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Email Address</label>
                                    <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="email_address" placeholder="Enter Email Address" value="{{old('email_address')}}">
                                    @error('email_address')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <div class="grid col-start-3">
                                    <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Detainee ID</label>
                                    <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="detainee_id" placeholder="Enter Detainee ID">
                                    @error('detainee_id')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-flow-row col-2 gap-10 mt-5">
                                <div class="grid col-start-1">
                                    <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Gender</label>
                                    <select class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    @error('gender')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Make It Related To Time -->
                                <div class="grid col-start-2">
                                    <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Start of Detention</label>
                                    <input type="date" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="detention_begin" value="{{ old('detention_begin') }}">
                                    @error('detention_begin')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="grid col-start-3">
                                    <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Max Detention Period</label>
                                    <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="max_detention_period" placeholder="Max Detention" value="{{old('max_detention_period')}}">
                                    @error('max_detention_period')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                                <button type="button" onclick="showPart(2)" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">NEXT</button>
                                <a href="{{url('detainee-list')}}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK</a>
                            </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Create Detainee Profile Part 2 -->
        <div id="part2" class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain; display: none;">
            <form id="part2Form" method="POST" action="{{url('save-detainee')}}">
                @csrf
                <div>
                    <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">Create Detainee Profile</h1>
                    <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">
                    <div class="grid gap-5">

                        <!-- Triggers when user successfully added a detainee -->
                        @if(Session::has('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
                            
                            <div class="flex flex-col mt-5">
                                <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Mother Name</label>
                                <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="mother_name" placeholder="Enter Mother's Name (Last Name, First Name + Middle Name)" value="{{old('mother_name')}}">
                                @error('mother_name')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="flex flex-col mt-5">
                                <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Father Name</label>
                                <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="father_name" placeholder="Enter Father's Name (Last Name, First Name + Middle Name)" value="{{old('father_name')}}">
                                @error('father_name')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="flex flex-col mt-5">
                                <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Spouse Name</label>
                                <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="spouse_name" placeholder="Enter Spouse's Name (Last Name, First Name + Middle Name) if N/A leave blank" value="{{old('spouse_name')}}">
                                @error('spouse_name')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="flex flex-col mt-5">
                                <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Emergency Contact Name</label>
                                <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="emergency_contact_name" placeholder="Enter Emergency Contact Name (Last Name, First Name + Middle Name)" value="{{old('emergency_contact_name')}}">
                                @error('emergency_contact_name')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="flex flex-col mt-5">
                                <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Emergency Contact Number</label>
                                <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="emergency_contact_number" placeholder="Enter Emergency Contact Number" value="{{old('emergency_contact_number')}}">
                                @error('emergency_contact_number')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- FIX TO ADD PHOTOS -->
                            <div class="flex flex-col mt-5">
                                <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Medical Information</label>
                                <div class="flex">
                                    <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight mr-2" name="medical_information" placeholder="Input Detainee’s existing allergy and conditions (Upload Medical Documents)" value="{{old('Medical Information')}}">
                                    @error('medical_information')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <label class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        <input type="file" class="hidden" />
                                    </label>
                                </div>
                            </div>

                            <div class="flex flex-col mt-5">
                                <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Reason For Detention</label>
                                <div class="flex">
                                    <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight mr-2" name="related_photos" placeholder="Input the reason for detention here (Upload Documents if necessary)">
                                    @error('related_photos')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <label class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        <input type="file" class="hidden" />
                                    </label>
                                </div>
                            </div>

                            <div class="flex flex-col mt-5">
                                <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Detainee’s Crime History</label>
                                <div class="grid grid-flow-col gap-10">
                                    <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" name="crime_history" placeholder="Enter detainee’s history of crime here" value="{{old('crime_history')}}">
                                    @error('crime_history')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col mt-5">
                                <p class="block labelname font-bold mb-2">Upload Photo/s (Mugshot, Full-body photo, Injuries, Evidence, Etc.)</p>
                                <div class="grid grid-flow-col gap-10">
                                    <div class="border border-black w-full py-40 px-3 placeholderfont leading-tight focus:outline-none focus:border-black relative text-center">
                                        <span class="block text-black mb-2">Drag & Drop to Upload File</span>
                                        <p class="font-bold">OR</p>
                                        <div class="flex justify-center mt-2">
                                            <button class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) font-bold py-4 px-4">
                                                Browse File
                                            </button>
                                        </div>
                                        <input
                                        class="opacity-0 absolute top-0 left-0 w-full h-full cursor-pointer"
                                        type="file"
                                        />
                                    </div>
                                </div>
                            </div>

                            <!-- Hidden input fields to store Part 1 values -->
                            <input type="hidden" name="last_name" value="{{ old('last_name') }}">
                            <input type="hidden" name="first_name" value="{{ old('first_name') }}">
                            <input type="hidden" name="middle_name" value="{{ old('middle_name') }}">
                            <input type="hidden" name="home_address" value="{{ old('home_address') }}">
                            <input type="hidden" name="contact_number" value="{{ old('contact_number') }}">
                            <input type="hidden" name="email_address" value="{{ old('email_address') }}">
                            <input type="hidden" name="detainee_id" value="{{ old('detainee_id') }}">
                            <input type="hidden" name="gender" value="{{ old('gender') }}">
                            <input type="hidden" name="detention_begin" value="{{ old('detention_begin') }}">
                            <input type="hidden" name="max_detention_period" value="{{ old('max_detention_period') }}">
                            <!-- Add more hidden fields for other Part 1 values -->

                            <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                                <button type="submit" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ADD DETAINEE</button>
                                <button type="button" onclick="showPart(1)" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK</button>
                            </div>
                    </div>
                </div>
            </form>
        </id=>
        
    </div>

    <script>
        function showPart(partNumber) {
            if (partNumber === 1) {
                document.getElementById('part1').style.display = 'block';
                document.getElementById('part2').style.display = 'none';
            } else if (partNumber === 2) {
                document.getElementById('part1').style.display = 'none';
                document.getElementById('part2').style.display = 'block';
            }
        }
    </script>
    
</x-app-layout>