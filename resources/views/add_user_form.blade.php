<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Invite User -->
        <div class="col-start-2 my-[19rem] mx-[3rem] col-span-3 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">ADD USER</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">
                <div class="grid gap-5">

                    <form method="POST" action="{{ route('admin.addUser', ['caseId' => $caseId]) }}">
                    @csrf
                        <div class="flex flex-col">

                            <div class="grid grid-flow-row col-2 gap-5">
                                <div class="grid col-start-1">
                                    <div class="w-1/3">
                                        <label class="block font-bold mb-2 labelname text-lg">Users</label>
                                        <select name="user_id" id="user_id" class="form-control text-black border border-black rounded w-full py-5 px-5 input[type=text] text-base leading-tight focus:outline-none focus:border-black">
                                            @foreach ($existingUsers as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <!-- ASK USER CURRENT PASSWORD FOR RECONFIRMATION (Future to add) -->

                        <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                            <button type="submit" class="buttonFormat border-2 border-black bg-black hover:bg-[#aaaab2] text-white font-bold py-4 px-4">
                                ADD USER
                            </button>
                        </div>
                    
                    </form>
                    <div class="mt-20"></div>
                    <div class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>