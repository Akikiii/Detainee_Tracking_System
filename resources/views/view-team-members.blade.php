<x-app-layout>
    <!-- ... your header and layout code ... -->
    <div>
        <!-- Display the team leader's name in a unique box -->
        <div class="border border-gray-300 p-4 mb-4">
            <h1 class="text-[1.875rem] uppercase font-bold">Team Leader: {{ $team->team_leader_name }}</h1>
        </div>

        <h2 class="text-[1.875rem] uppercase font-bold">Add Member</h2>
        <hr class="mt-[1.94rem] mb-[2.31rem]" />
        
        <form action="{{ route('add-member') }}" method="post">
            @csrf

            <!-- Display the list of users -->
            @isset($users)
                <p>Users are set!</p>
                @foreach ($users as $user)
                    <div>
                        <input type="checkbox" name="selected_users[]" value="{{ $user->id }}"> {{ $user->name }}
                    </div>
                @endforeach
            @endisset

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Add Members</button>
        </form>
    </div>
</x-app-layout>
