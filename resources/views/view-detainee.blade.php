<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]">
    <div>
        <h1 class="text-[1.875rem] uppercase font-bold">Detainee Details</h1>
        <hr class="mt-[1.94rem] mb-[2.31rem]" />
        <dl>
            <dt>Name:</dt>
            <dd>{{ $detainee['first_name'] }} {{ $detainee['middle_name'] }} {{ $detainee['last_name'] }}</dd>
            <dt>Email Address:</dt>
            <dd>{{ $detainee['email_address'] }}</dd>
            <dt>Home Address:</dt>
            <dd>{{ $detainee['home_address'] }}</dd>
            <dt>Contact Address:</dt>
            <dd>{{ $detainee['contact_address'] }}</dd>
            <dt>Detainee ID:</dt>
            <dd>{{ $detainee['detainee_id'] }}</dd>
            <dt>Gender:</dt>
            <dd>{{ $detainee['gender'] }}</dd>
            <dt>Mother's Name:</dt>
            <dd>{{ $detainee->detaineeDetails->mother_name }}</dd>
            <dt>Father's Name:</dt>
            <dd>{{ $detainee->detaineeDetails->father_name}}</dd>
            <dt>Spouse's Name:</dt>
            <dd>{{ $detainee->detaineeDetails->spouse_name}}</dd>
            <dt>Related Photos:</dt>
            <dd>{{ $detainee->detaineeDetails->related_photos}}</dd>
            <dt>Crime History:</dt>
            <dd>{{ $detainee->detaineeDetails->crime_history }}</dd>
            <dt>Max Detention Period:</dt>
            <dd>{{ $detainee->detaineeDetails->max_detention_period }}</dd>
            <dt>Detention Begin:</dt>
            <dd>{{ $detainee->detaineeDetails->detention_begin }}</dd>
            <dt>Medical Information:</dt>
            <dd>{{ $detainee->detaineeDetails->medical_information }}</dd>
            <dt>Emergency Contact Number:</dt>
            <dd>{{ $detainee->detaineeDetails->emergency_contact_number }}</dd>
            <dt>Emergency Contact Name:</dt>
            <dd>{{ $detainee->detaineeDetails->emergency_contact_name }}</dd>
        </dl>
    </div>

            <a href="{{ url('detainee-list') }}"
               class="bg-red-500 hover-bg-red-600 text-white font-bold py-2 px-4 rounded">Back</a>
        </div>
    </div>
</div>

</x-app-layout>
