<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Detainee Details</h2>
                                <dl>
                                    <dt>First Name:</dt>
                                    <dd>{{ $detainee['first_name'] }}</dd>
                                    <dt>Last Name:</dt>
                                    <dd>{{ $detainee['last_name'] }}</dd>
                                    <dt>Middle Name:</dt>
                                    <dd>{{ $detainee['middle_name'] }}</dd>
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
                        </div>
                    </div>
                    <div class="row mt-4">
                    <div class="col-md-12">
                    <form action="{{ route('assign-attorney', ['detainee_id' => $detainee->id]) }}" method="post">
                        @csrf
                        @if ($counsel_case_assignment)
                            <a href="{{ url('remove-assignment/' . $counsel_case_assignment->detainee_id) }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete this detainee?')">Remove Assigned User to Detainee</a>
                        @else
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                Assign User to Detainee
                            </button>
                        @endif
                    </form>
                    <a href="{{ url('detainee-list') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
