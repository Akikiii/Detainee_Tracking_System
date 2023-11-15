<!-- resources/views/users/user-list.blade.php -->

<x-app-layout>
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">
        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>
        <!-- User List -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">ADD MEMBERS</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">
                <div class="grid gap-5">
                    <div>
                        <!-- Display user list in boxes with edit and delete buttons -->
                        <div class="grid grid-cols-3 gap-4">
                            @foreach ($users as $user)
                                <div class="bg-gray-200 p-4 rounded-md">
                                    <p class="text-gray-900">{{ $user->name }}</p>
                                    <p class="text-gray-900">{{ $user->email }}</p>
                                    <div class="flex mt-2">
                                    <form action="{{ route('save-member', ['userId' => $user->id]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-2 px-2">ADD MEMBER</button>
                                    </form>

                                        <a href="{{ route('show-user', ['id' => $user->id]) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-2 px-2">VIEW</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Buttons for Actions -->
                    <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                        <a href="{{ url('dashboard') }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
