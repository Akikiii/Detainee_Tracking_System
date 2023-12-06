<!-- resources/views/users/user-list.blade.php -->

<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 my-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black p-[1.44rem] max-w-[600px]">
            @include('profile.partials.sidebar')
        </div>

        <!-- User List -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">User List</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">

                <div class="grid gap-5">

                    <div id="selectedUserID"></div>

                    @foreach ($users as $user)
                    <div class="flex flex-col gap-4" onclick="selectedUser(this, {{ $user->id }})">
                        <div class="flex flex-row border border-black border rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                            <div class="flex items-center">
                                <div style="background-color: black; height: 85px; width: 85px; border-radius: 100%;"></div>
                                <div class="ml-4">
                                    <p class="text-left mb-2 font-bold">{{ $user->name }}</p>
                                    <p class="text-left mb-2">Email: {{ $user->email }}</p>
                                    <p class="text-left mb-2">Number of Cases Handled: {{ $user->assignedCases->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                    <a href="{{ url('view-user', ['id' => 'user_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">VIEW PROFILE</a>
                    <a href="{{ route('delete-user', ['id' => $user->id]) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">DELETE</a>
                    <a href="{{ url('dashboard') }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">BACK</a>
                </div>

            </div>
        </div>
    </div>

    <script>

        function selectedUser (clickedElement, userID) {

            var allCards = document.querySelectorAll('.flex.flex-col.gap-4');
            allCards.forEach(function(card) {
                if (card !== clickedElement) {
                    card.classList.remove('selected');
                }
            });

            clickedElement.classList.toggle('selected');

            var viewUserProfileButton = document.querySelector('a[href*="view-user"]');
            if (viewUserProfileButton) {
                viewUserProfileButton.href = userID ? viewUserProfileButton.href.replace('user_id_placeholder', userID) : 'javascript:void(0);';
            }

            var selectedUserBox = document.getElementById('selectedUserID');
            selectedUserBox.textContent = userID ? 'Selected User ID: ' + userID : 'No Detainee Selected'; // For Checking lang if nakuha yung ID

        }

    </script>

</x-app-layout>
