<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- View Team Members -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">LIST OF USERS</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">
                <div class="grid gap-5">
                    <form method="POST" action="{{ route('save-new-member') }}">
                        @csrf

                        <div class="flex flex-col gap-4">
                            <div class="flex space-x-4">
                                <div class="flex flex-row border border-black border rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            @if(count($users) > 0)
                                                @foreach($users as $user)
                                                    <input type="radio" name="selected_user" value="{{ $user->id }}" id="user{{ $user->id }}" class="hidden">
                                                    <label for="user{{ $user->id }}" class="cursor-pointer transition-all duration-300 ease-in-out">
                                                        <p>{{ $user->name }} - {{ $user->email }}</p>
                                                    </label>
                                                @endforeach
                                            @else
                                                <p>No users found.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row justify-end gap-2.5 mt-10">
                            <button type="submit" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">ADD SELECTED USER</button>
                            <a href="{{ url('view-teams') }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK TO TEAM LIST</a>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200">
                    <h3 class="text-lg font-semibold mb-4">List of Users</h3>

                    <form method="POST" action="{{ route('save-new-member') }}">
                        @csrf

                        @if(count($users) > 0)
                            @foreach($users as $user)
                                <div class="border p-4 mb-4 user-box" tabindex="0">
                                    <input type="radio" name="selected_user" value="{{ $user->id }}" id="user{{ $user->id }}" class="hidden">
                                    <label for="user{{ $user->id }}" class="cursor-pointer transition-all duration-300 ease-in-out">
                                        <p>{{ $user->name }} - {{ $user->email }}</p>
                                    </label>
                                </div>
                            @endforeach
                        @else
                            <p>No users found.</p>
                        @endif

                        <!-- Add button to add the selected user -->
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Add Selected User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
