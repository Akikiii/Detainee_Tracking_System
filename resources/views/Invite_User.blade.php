<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invite a User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                <!--
                    FOR ROLES stuffs
                    <div class="mt-4">
                        <x-input-label for="user_type" :value="__('User Type')" />
                        <x-select-input id="user_type" class="block mt-1 w-full" name="user_type" :options="['Admin' => 'Admin', 'BJMP' => 'Bureau of Jail Management and Penology', 'Attorney' => 'Attorney/Lawyer']" :value="old('user_type')" required />
                        <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
                    </div>
                -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
