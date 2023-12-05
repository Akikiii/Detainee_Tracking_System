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
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">Edit Cases</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">
                <div class="grid gap-5">

                    <!-- Triggers when user successfully added a detainee -->
                    @if(Session::has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif

                    <form method="post" action="{{ url('update-cases/' . $data->case_id) }}">
                    @csrf

                        <div class="flex flex-col">
                            <label class="block font-bold mb-2 labelname text-lg">Case Title</label>
                            <div class="grid grid-flow-col gap-10">
                                <div class="w-1/2">
                                    <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name='case_name' placeholder='Case Name' value="{{ $data->case_name }}">
                                    @error('case_name')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <div class="w-1/6">
                                    <label class="form-label block labelname font-bold mb-2">Violation/s</label>
                                    <input type="text" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name='violations' placeholder='Violations' value="{{ $data->violations }}">
                                    @error('violations')
                                    <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role></div>
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <div class="w-1/6">
                                    <label class="form-label block labelname font-bold mb-2">Case Filed Date:</label>
                                    <input type="date" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" name="case_created" placeholder="Case Created" value="{{ $data->case_created ? date('Y-m-d', strtotime($data->case_created)) : '' }}" onfocus="this.style.color='black'" onblur="this.style.color='#F8861E'">
                                    @error('case_created')
                                    <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- <div class="grid grid-flow-row col-2 gap-10 mt-5">
                            <div class="grid col-start-1">
                                <div class="w-1/6">
                                    <label class="form-label block labelname font-bold mb-2">Status:</label>
                                    <select name="status" class="form-control border border-black rounded w-full py-4 px-3 input[type=text] text-base leading-tight focus:outline-none focus:border-black">
                                        <option value="Arrest" selected="{{ old('status') === 'Arrest' }}">Arrest</option>
                                        <option value="Bail Hearing" selected="{{ old('status') === 'Bail Hearing' }}">Bail Hearing</option>
                                        <option value="Pretrial" selected="{{ old('status') === 'Pretrial' }}">Pretrial</option>
                                        <option value="Plea Bargaining" selected="{{ old('status') === 'Plea Bargaining' }}">Plea Bargaining</option>
                                        <option value="Arraignment" selected="{{ old('status') === 'Arraignment' }}">Arraignment</option>
                                        <option value="Sentencing" selected="{{ old('status') === 'Sentencing' }}">Sentencing</option>
                                        <option value="Appeal" selected="{{ old('status') === 'Appeal' }}">Appeal</option>
                                        <option value="Finished/Archived" selected="{{ old('status') === 'Finished/Archived' }}">Finished/Archived</option>
                                    </select>
                                    @error('status')
                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div> -->

                        <div class="flex flex-row justify-end gap-2.5 mt-[7.12rem]">
                            <button type="submit" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">UPDATE CASE TO DETAINEE</button>
                            <a href="{{url('detainee-list')}}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK TO DETAINEE LIST</a>
                            <a href="{{url('cases-list')}}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK TO CASES LIST</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
