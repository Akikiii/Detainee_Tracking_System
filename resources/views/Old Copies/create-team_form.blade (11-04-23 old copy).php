<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Triggers when the user successfully added a Team -->
                    @if(Session::has('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <form method="post" action="{{ url('save-team') }}">
                        @csrf

                        <div>
                            <label class='form-label'>Team Name:</label>
                            <input type="text" class='form-control text-black' name='team_name' placeholder='Team Name'>
                            @error('team_name')
                            <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role></div>
                            {{ $message }}
                            @enderror
                        </div>

                        <div>
                            <label class='form-label'>Case ID</label>
                            <input type="text" class='form-control text-black' name='case_id' placeholder='Case ID'>
                            @error('case_id')
                            <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role></div>
                            {{ $message }}
                            @enderror
                        </div>

                        <div>
                            <label class='form-label'>Creation Date:</label>
                            <input type="date" class='form-control text-black' name='creation_date' placeholder='Creation Date' value="{{ date('Y-m-d') }}">
                            @error('creation_date')
                            <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div>
                            <label class='form-label'>Description:</label>
                            <input type="text" class='form-control text-black' name='description' placeholder='Description'>
                            @error('description')
                            <div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role></div>
                            {{ $message }}
                            @enderror
                        </div>

                        <div>
                            <label class="form-label">Status:</label>
                            <select name="status" class="form-control text-black">
                                <option value="Active">Active</option>
                                <option value="Disbanded">Disbanded</option>
                                <option value="On Hold">On Hold</option>
                            </select>
                            @error('status')
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Add Team</button>
                        <a href="{{ url('team-list') }}" class="bg-red-500 hover-bg-red-600 text-white font-bold py-2 px-4 rounded">Back to Team List</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
