<x-app-layout>
    <!-- ... your header and layout code ... -->
    <div>
        <h1 class="text-[1.875rem] uppercase font-bold">Add Member</h1>
        <hr class="mt-[1.94rem] mb-[2.31rem]" />

        <!-- Display the list of users -->
        @foreach ($users as $user)
            <div>
                <input type="checkbox" name="selected_users[]" value="{{ $user->id }}"> {{ $user->name }}
            </div>
        @endforeach

        <!-- Create a form or button to add members -->
        <form method="post" action="{{ route('members.store') }}">
            @csrf

            <!-- Include other form fields if needed -->

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Add Members</button>
        </form>
    </div>
</x-app-layout>
