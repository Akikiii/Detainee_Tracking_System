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
                    @if(Session::has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif

                    <form method="post" action="{{url('save-detainee')}}">
                        @csrf
                        <div class="md-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control text-black" name="first_name" placeholder="Enter First Name" value="{{old('first_name')}}">
                            @error('first_name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Last name</label>
                            <input type="text" class="form-control text-black" name="last_name" placeholder="Enter Last Name" value="{{old('last_name')}}">
                            @error('last_name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control text-black" name="middle_name" placeholder="Enter Middle name" value="{{old('middle_name')}}">
                            @error('middle_name')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Home Address</label>
                            <textarea class="form-control text-black" name="home_address" placeholder="Enter Home Address" value="{{old('home_address')}}"></textarea>
                            @error('home_address')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Contact Address</label>
                            <input type="text" class="form-control text-black" name="contact_address" placeholder="Enter Contact Address" value="{{old('contact_address')}}">
                            @error('contact_address')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="md-3">
                            <label class="form-label">Email Address</label>
                            <input type="text" class="form-control text-black" name="email_address" placeholder="Enter Email Address" value="{{old('email_address')}}">
                            @error('email_address')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Add Detainee</button>
                        <a href="{{url('detainee-list')}}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
