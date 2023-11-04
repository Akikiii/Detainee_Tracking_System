<section>
    <header>
        <h1 class="text-[1.875rem] uppercase font-bold">UPDATE PASSWORD</h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Ensure your account is using a long, random password to stay secure.</p>
        <hr class="mt-[1.94rem] mb-[2.31rem]"/>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="flex flex-col">
            <p class="block font-bold mb-2 labelname text-lg">Current Password</p>
            <div class="grid grid-flow-col gap-10">
                <input id="current_password" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                type="password"
                                name="current_password"
                                autocomplete="current-password" />
                                
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>
        </div>

        <div class="flex flex-col">
            <p class="block font-bold mb-2 labelname text-lg">New Password</p>
            <div class="grid grid-flow-col gap-10">
                <input id="password" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                type="password"
                                name="password"
                                autocomplete="new-password" />
                                
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>
        </div>

        <div class="flex flex-col">
            <p class="block font-bold mb-2 labelname text-lg">Confirm Password</p>
            <div class="grid grid-flow-col gap-10">
                <input id="password_confirmation" class="form-control text-black border border-black rounded w-full py-4 px-3 placeholderfont text-lg leading-tight focus:outline-none focus:border-black" 
                                type="password"
                                name="password_confirmation"
                                autocomplete="new-password" />
                                
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="flex flex-row justify-end items-center gap-2.5 mt-[2.12rem]">
            <button class="buttonFormat col-end-4 w-[6.5rem] h-[2.5rem] bg-[#cccccc] font-bold">
                {{ __('SAVE') }}
            </button>

            @if (session('status') === 'password-updated')
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
