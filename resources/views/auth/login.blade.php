<x-guest-layout>

    <!-- Canvas -->
    <div class="flex justify-center items-center bg-[#f0f2f5] grid-row-4">

        <div class="gap-2 flex items-center my-[2.36rem] mx-[3rem] py-[2.81rem] px-[2.84rem] rounded-lg border-black mt-[2.38rem]">
            <div>
                <img class="circle" src="{{ asset('logos/pao-logo-bw.png') }}" alt="PAO Logo">
            </div>
            <div>
                <img class="circle" src="{{ asset('logos/bjmp-logo-bw.png') }}" alt="BJMP Logo">
            </div>
            <div>
                <div class="fontLogo text-5xl font-black ml-4 mr-4">DETAINEE TRACKING</div>
                <div class="fontLogo text-5xl font-black ml-4 mr-4">SYSTEM</div>
            </div>
        </div>

        <div class="my-[2.36rem] mx-[3rem] bg-[#FFFFFF] h-[22rem] w-[22rem] py-[2.81rem] px-[2.84rem] rounded-lg border-black mt-[2.38rem]">

            <div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
                        @csrf

                        <div class="flex flex-col">
                            <div class="grid grid-flow-col gap-10">
                                <input id="email" class="form-control text-black border border-black rounded w-full py-3 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                                placeholder="Email or Username"
                                                type="email"
                                                name="email"
                                                :value="old('email')"
                                                required autofocus autocomplete="username" />
                                                
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <div class="grid grid-flow-col gap-10">
                                <input id="password" class="form-control text-black border border-black rounded w-full py-3 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                                placeholder="Password"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" />
                                                
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                            <button type="submit" class="w-full placeholderfont rounded-md border-2 border-black bg-[#44414f] hover:bg-black text-white font-bold py-3 px-3">LOG IN</button>
                        </div>

                        <div class="flex flex-row justify-center gap-2.5 mt-[2.12rem]">
                            @if (Route::has('password.request'))
                                <a class="underline text-xs text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        
                    </form>
            </div>
        </div>

    </div>

</x-guest-layout>
