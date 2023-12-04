<section>
    <header>
        <h1 class="text-[1.875rem] uppercase font-bold">PROFILE INFORMATION</h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Update your account's profile information and email address.</p>
        <hr class="mt-[1.94rem] mb-[2.31rem]"/>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="flex flex-col">
            <p class="block font-bold mb-2 labelname text-lg">Name</p>
            <div class="grid grid-flow-col gap-10">
                <input id="name" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                type="text" 
                                name="name" 
                                :value="old('name', $user->name)"
                                required autofocus autocomplete="name" />
                                
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
        </div>

        <div class="flex flex-col">
            <p class="block font-bold mb-2 labelname text-lg">Email</p>
            <div class="grid grid-flow-col gap-10">
                <input id="email" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                type="email"
                                name="email"
                                :value="old('email', $user->email)"
                                required autocomplete="username" />
                                
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
            </div>
        </div>
        
        <div class="flex flex-row justify-end items-center gap-2.5 mt-[2.12rem]">
            <button class="buttonFormat col-end-4 w-[6.5rem] h-[2.5rem] bg-[#cccccc] font-bold hover:bg-black text-black hover:text-white py-4 px-4">
                {{ __('SAVE') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>

    </form>
</section>
