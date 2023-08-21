<x-app-layout>
    <form method="POST" action="{{ route('invite.send') }}">
        @csrf

        <!-- Email to user -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Select ROLES -->
        <label for="user_role">Select Role:</label>
        <select name="user_role" id="user_role">
            <option value="Lawyer">Lawyer</option>
            <option value="BJMP">BJMP</option>
            <option value="Admin">Admin</option>
        </select>

        <!-- ASK USER CURRENT PASSWORD FOR RECONFIRMATION (Future to add) -->

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Send to User
            </button>
        </div>
    </form>

</x-app-layout>
