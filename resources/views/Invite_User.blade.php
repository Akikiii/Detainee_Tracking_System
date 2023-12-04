<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Update Profile -->
        <div class="col-start-2 my-[19rem] mx-[3rem] col-span-3 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">Invite User</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">
                <div class="grid gap-5">

                    <form method="POST" action="{{ route('invite.send') }}">
                    @csrf
                        <div class="flex flex-col">

                            <div class="flex flex-col">
                                <p class="block font-bold mb-2 labelname text-lg">Email</p>
                                <div class="w-1/2">
                                    <input id="email" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black"
                                                    type="email"
                                                    name="email"
                                                    :value="old('email')"
                                                    required autocomplete="username" />
                                                    
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>

                            <div class="grid grid-flow-row col-2 gap-10 mt-5">
                                <div class="grid col-start-1">
                                    <div class="w-1/6">
                                        <label class="block font-bold mb-2 labelname text-lg">Select Role:</label>
                                        <select name="user_role" id="user_role" class="form-control text-black border border-black rounded w-full py-4 px-3 input[type=text] text-base leading-tight focus:outline-none focus:border-black">
                                            <option value="Admin">Admin</option>
                                            <option value="Lawyer">Normal User</option>
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
                                SEND TO USER
                            </button>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
