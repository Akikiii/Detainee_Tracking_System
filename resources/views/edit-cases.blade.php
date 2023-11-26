<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <!-- Triggers when user successfully added a Case -->
                @if(Session::has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <form method="post" action="{{ url('update-cases/' . $data->case_id) }}">
                        @csrf
                        <div>
                            <label class = 'form-label'>Case Name</label>
                            <input type="text" class='form-control text-black' name='case_name' placeholder='Case Name' value="{{ $data->case_name }}">
                            @error('case_name')
                            <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role></div>
                            {{$message}} 
                        </div>
                        @enderror

                        <div>
                            <label class = 'form-label'>Violations</label>
                            <input type="text" class='form-control text-black' name='violations' placeholder='Violations' value="{{ $data->violations }}">
                            @error('violations')
                            <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role></div>
                            {{$message}}
                        </div>
                        @enderror
                        <div>
                            <label class='form-label'>Arrest Report</label>
                            <input type="text" class='form-control text-black' name='arrest_report' placeholder='Arrest Report' value="{{ $data->arrest_report }}">
                            @error('arrest_report')
                            <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <label class = 'form-label'>Testimonies</label>
                            <input type="text" class='form-control text-black' name='testimonies' placeholder='Testimonies' value="{{ $data->testimonies }}">
                            @error('violations')
                            <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role></div>
                            {{$message}}
                        </div>
                        @enderror
                        <div>
                            <label class="form-label">Case Created</label>
                            <input type="date" class="form-control text-black" name="case_created" placeholder="Case Created" value="{{ $data->case_created ? date('Y-m-d', strtotime($data->case_created)) : '' }}">
                            @error('case_created')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="md-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="Arrest" selected="{{ old('status') === 'Arrest' }}">Arrest</option>
                                <option value="Bail Hearing" selected="{{ old('status') === 'Bail Hearing' }}">Bail Hearing</option>
                                <option value="Pretrial" selected="{{ old('status') === 'Pretrial' }}">Pretrial</option>
                                <option value="Plea Bargaining" selected="{{ old('status') === 'Plea Bargaining' }}">Plea Bargaining</option>
                                <option value="Arraignment" selected="{{ old('status') === 'Arraignment' }}">Arraignment</option>
                                <option value="Sentencing" selected="{{ old('status') === 'Sentencing' }}">Sentencing</option>
                                <option value="Appeal" selected="{{ old('status') === 'Appeal' }}">Appeal</option>
                                <option value="Finished/Archived" selected="{{ old('status') === 'Finished/Archived' }}">Finished/Archived</option>
                            </select>
                            @error('status')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Update Case to Detainee</button>
                        <a href="{{url('detainee-list')}}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Back to Detainee List</a>
                        <a href="{{url('cases-list')}}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Back to Cases List</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
