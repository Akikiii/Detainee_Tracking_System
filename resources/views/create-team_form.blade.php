<x-app-layout>
    
    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Create Team Form -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">CREATE TEAM</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">
                <div class="grid gap-5">
                    
                    <!-- Triggers when user successfully added a detainee -->
                    @if(Session::has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{Session::get('success')}}
                        <script>
                            setTimeout(function(){
                                document.querySelector('.bg-green-100').style.display = 'none';
                            }, 5000);
                        </script>
                    </div>
                    @endif

                    <form action="{{ route('saveTeam') }}" method="post"> t"> 
                        @csrf

                        <div class="grid grid-flow-row col-2 gap-10">
                            <div class="grid col-start-1">
                                <div class="w-1/2">
                                    <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Team Name:</label>
                                    <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight"  name='team_name' placeholder='Input the name of the team' />
                                    @error('team_name')
                                    <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 relative' role></div>
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <div class="w-1/6">
                                    <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Case ID</label>
                                    <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight"  name='case_id' placeholder='Case ID'>
                                    @error('case_id')
                                    <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role></div>
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <div class="w-1/6">
                                    <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Creation Date:</label>
                                    <input type="date" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight"  name='creation_date' value="{{ date('Y-m-d') }}" onfocus="this.style.color='black'" onblur="this.style.color='#F8861E'">
                                    @error('creation_date')
                                    <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <div class="w-full">
                                    <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Description:</label>
                                    <input type="text" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight"  name='description' placeholder='Description'>
                                    @error('description')
                                    <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role></div>
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <div class="w-1/6">
                                    <label class="form-label block labelname font-bold mb-2" style="color: black; text-shadow: 0 0 1px #888888;">Status:</label>
                                    <select name="status" class="form-control text-black border-2 border-black w-full py-4 px-3 text-lg leading-tight" >
                                        <option value="Active">Active</option>
                                        <option value="Disbanded">Disbanded</option>
                                        <option value="On Hold">On Hold</option>
                                    </select>
                                    @error('status')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-row justify-end gap-2.5 mt-10">
                            <button type="submit" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ADD TEAM</button>
                            <a href="{{ url('view-teams') }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK TO TEAM LIST</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
