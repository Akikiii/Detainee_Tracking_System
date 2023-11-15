<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Add Cases -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">ADD CASES</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">
                <div class="grid gap-5">
                    
                    <!-- Triggers when user successfully added a detainee -->
                    @if(Session::has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif

                    <form method="POST" action="{{url('save-cases')}}">
                        @csrf

                        <div class="grid col-start-3">
                                <label class="form-label block labelname font-bold mb-2">Case ID</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="case_id" placeholder="Enter Case ID">
                                @error('case_id')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        <div class="grid grid-flow-row col-2 gap-10">
                            <div class="grid col-start-1">
                                <label class="form-label block labelname font-bold mb-2">Case Name</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name='case_name' placeholder='Case Name'>
                                @error('case_name')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role>
                                    {{$message}} 
                                </div>
                                @enderror
                            </div>

                            
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <label class="form-label block labelname font-bold mb-2">Violations</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name='violations' placeholder='Violations'>
                                @error('violations')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role>
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="grid col-start-2">
                                <label class="form-label block labelname font-bold mb-2">Arrest Report</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name='arrest_report' placeholder='Arrest Report'>
                                @error('arrest_report')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role='alert'>
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">

                            <div class="grid col-start-1">
                                <label class="form-label block labelname font-bold mb-2">Testimonies</label>
                                <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name='testimonies' placeholder='Testimonies'>
                                @error('violations')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role>
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="grid col-start-2">
                                <label class="form-label block labelname font-bold mb-2">Case Created</label>
                                <input type="date" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="case_created" placeholder="Case Created" value="{{ old('case_created') }}">
                                @error('case_created')
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="grid col-start-3">
                                <label class="form-label block labelname font-bold mb-2">Status</label>
                                <select class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="status">
                                    <option value="Active">Active</option>
                                    <option value="Pending" selected>Pending</option>
                                    <option value="Finished">Finished</option>
                                </select>
                                @error('case_created') 
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>

                        <div class="flex flex-row justify-end gap-2.5 mt-10">
                            <button type="submit" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ADD CASE TO DETAINEE</button>
                            <a href="{{url('detainee-list')}}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK TO DETAINEE LIST</a>
                            <a href="{{url('cases-list')}}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK TO CASES LIST</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
