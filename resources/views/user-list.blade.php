<!-- resources/views/users/user-list.blade.php -->

<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- User List -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">User List</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">

                <div class="grid gap-5">

                    <div id="selectedEventID"></div>

                    @foreach ($users as $user)
                    <div class="flex flex-col gap-4" onclick="selectedUser(this, {{ $user->id }})">
                        <div class="flex flex-row border border-black border rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                            <p class="text-gray-900">{{ $user->name }} - {{ $user->email }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                    <a href="{{ url('user', ['id' => 'user_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">VIEW PROFILE</a>
                    <a href="{{ route('delete-user', ['id' => 'user_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">DELETE</a>
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

            var viewUserButton = document.querySelector('a[href*="user"]');
            if (viewUserButton) {
                viewUserButton.href = userID ? viewUserButton.href.replace('user_id_placeholder', userID) : 'javascript:void(0);';
            }

            var deleteUserButton = document.querySelector('a[href*="delete-user"]');
            if (deleteUserButton) {
                deleteUserButton.href = userID ? deleteUserButton.href.replace('user_id_placeholder', userID) : 'javascript:void(0);';
            }

            var livecaseBox = document.getElementById('selectedEventID');
            livecaseBox.textContent = userID ? 'Selected User ID: ' + userID : 'No User Selected'; // For Checking lang if nakuha yung ID
        }

    </script>

</x-app-layout>
