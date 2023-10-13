<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]">
    <div>
        <h1 class="text-[1.875rem] uppercase font-bold">Profile Details</h1>
        <hr class="mt-[1.94rem] mb-[2.31rem]" />
        <dl>
            <dt>Name:</dt>
            <dd>{{ $user['name']}} </dd>
            <dt>Email:</dt>
            <dd>{{ $user['email']}} </dd>
            <dt>Office Address:</dt>
            <dd>{{ $user['office_address']}} </dd>
            <dt>gender:</dt>
            <dd>{{ $user['gender']}} </dd>
            <dt>Education:</dt>
            <dd>{{ $user['education_qualifications']}} </dd>
            <dt>Practice Areas:</dt>
            <dd>{{ $user['practice_areas']}} </dd>
            <dt>Cases Handled:</dt>
            <dd>{{ $user['cases_handled']}} </dd>
            <dt>Language Spoken:</dt>
            <dd>{{ $user['language_spoken']}} </dd>
            <dt>Office Hours Opening:</dt>
            <dd>{{ $user['office_hours_open']}} </dd>
            <dt>Office Hours Close:</dt>
            <dd>{{ $user['office_hours_close']}} </dd>
        </dl>
    </div>

            <a href="{{ url('dashboard') }}" 
               class="bg-red-500 hover-bg-red-600 text-white font-bold py-2 px-4 rounded">Back</a>
        </div>
    </div>
</div>

</x-app-layout>
