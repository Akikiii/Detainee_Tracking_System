<x-app-layout>

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
            <dd>{{ $detainee['mother_name'] }}</dd>
            <dt>Father's Name:</dt>
            <dd>{{ $detainee['father_name'] }}</dd>
            <dt>Spouse's Name:</dt>
            <dd>{{ $detainee['spouse_name'] }}</dd>
            <dt>Related Photos:</dt>
            <dd>{{ $detainee['related_photos'] }}</dd>
            <dt>Crime History:</dt>
            <dd>{{ $detainee['crime_history'] }}</dd>
            <dt>Max Detention Period:</dt>
            <dd>{{ $detainee['max_detention_period'] }}</dd>
            <dt>Detention Begin:</dt>
            <dd>{{ $detainee['detention_begin'] }}</dd>
            <dt>Medical Information:</dt>
            <dd>{{ $detainee['medical_information'] }}</dd>
            <dt>Emergency Contact Number:</dt>
            <dd>{{ $detainee['emergency_contact_number'] }}</dd>
            <dt>Emergency Contact Name:</dt>
            <dd>{{ $detainee['emergency_contact_name'] }}</dd>
            <dt>Assigned to:</dt>
            <dd>{{ optional($counsel_case_assignment)->assigned_by }}</dd>
        </dl>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <form action="{{ route('assign-attorney', ['detainee_id' => $detainee->id]) }}" method="post">
                @csrf
                @if ($counsel_case_assignment)
                    <a href="{{ url('remove-assignment/' . $counsel_case_assignment->detainee_id) }}"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded"
                        onclick="return confirm('Are you sure you want to delete this detainee?')">Remove Assigned User to Detainee</a>
                @else
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Assign User to Detainee
                    </button>
                @endif
            </form>
            <a href="{{ url('detainee-list') }}"
                class="bg-red-500 hover-bg-red-600 text-white font-bold py-2 px-4 rounded">Back</a>
        </div>
    </div>
</div>

</x-app-layout>
