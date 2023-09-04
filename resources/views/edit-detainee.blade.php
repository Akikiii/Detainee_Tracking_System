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
                    
                    <!-- Triggers when user successfully added a detainee -->
                    @if(Session::has('Success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{Session::get('Success')}}
                    </div>
                    @endif

                    <form method="post" action="{{url('update-detainee')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="md-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control text-black" name="first_name" placeholder="Enter First Name" value="{{$data->first_name}}">
                            @error('first_name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Last name</label>
                            <input type="text" class="form-control text-black" name="last_name" placeholder="Enter Last Name" value="{{$data->last_name}}">
                            @error('last_name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control text-black" name="middle_name" placeholder="Enter Middle name" value="{{$data->middle_name}}">
                            @error('middle_name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Home Address</label>
                            <textarea class="form-control text-black" name="home_address" placeholder="Enter Home Address">{{$data->home_address}}</textarea>
                            @error('home_address')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Contact Address</label>
                            <input type="text" class="form-control text-black" name="contact_address" placeholder="Enter Contact Address" value="{{$data->contact_address}}">
                            @error('contact_address')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Email Address</label>
                            <input type="text" class="form-control text-black" name="email_address" placeholder="Enter Email Address" value="{{$data->email_address}}">
                            @error('email_address')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            </div>
                            <label class="form-label">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="male" @if ($data->detaineeDetails->gender === 'male') selected @endif>Male</option>
                                <option value="female" @if ($data->detaineeDetails->gender === 'female') selected @endif>Female</option>
                            </select>
                            @error('gender')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Mother Name</label>
                            <input type="text" class="form-control text-black" name="mother_name" placeholder="Enter Mother name" value="{{ $data->detaineeDetails->mother_name }}">
                            @error('mother_name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Father Name</label>
                            <input type="text" class="form-control text-black" name="father_name" placeholder="Enter Father name" value="{{ $data->detaineeDetails->father_name }}">
                            @error('father_name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Spouse Name</label>
                            <input type="text" class="form-control text-black" name="spouse_name" placeholder="Enter Spouse name if None leave blank" value="{{ $data->detaineeDetails->spouse_name }}">
                            @error('spouse_name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="md-3">
                            <label class="form-label">Crime History</label>
                            <input type="text" class="form-control text-black" name="crime_history" placeholder="Enter Crime History" value="{{$data->detaineeDetails->crime_history}}">
                            @error('crime_history')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <!-- Make it related to time -->
                        <div class="md-3">
                            <label class="form-label">Max Detention Period</label>
                            <input type="text" class="form-control text-black" name="max_detention_period" placeholder="Enter Crime History" value="{{$data->detaineeDetails->max_detention_period}}">
                            @error('max_detention_period')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="md-3">
                        <label class="form-label">Detention begin</label>
                        <input type="date" class="form-control text-black" name="detention_begin" value="{{$data->detaineeDetails->detention_begin }}">
                        @error('detention_begin')
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="md-3">
                            <label class="form-label">Medical Information</label>
                            <input type="text" class="form-control text-black" name="medical_information" placeholder="Enter Medical Information" value="{{$data->detaineeDetails->medical_information}}">
                            @error('medical_information')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>  

                        <div class="md-3">
                            <label class="form-label">Emergency Contact Number</label>
                            <input type="text" class="form-control text-black" name="emergency_contact_number" placeholder="Enter Emergency Contact Number" value="{{$data->detaineeDetails->emergency_contact_number}}">
                            @error('emergency_contact_number')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="md-3">
                            <label class="form-label">Emergency Contact Name</label>
                            <input type="text" class="form-control text-black" name="emergency_contact_name" placeholder="Enter Emergency Contact Name" value="{{$data->detaineeDetails->emergency_contact_name}}">
                            @error('emergency_contact_name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Update Detainee</button>
                        <a href="{{url('detainee-list')}}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
