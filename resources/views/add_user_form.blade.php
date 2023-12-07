<x-app-layout>
    <!-- Your form content -->
    <form method="POST" action="{{ route('admin.addUser', ['caseId' => $caseId]) }}">
        @csrf
        <label for="user_id">Select User:</label>
        <select name="user_id" id="user_id">
            @foreach ($existingUsers as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <button type="submit">Add User</button>
    </form>
</x-app-layout>