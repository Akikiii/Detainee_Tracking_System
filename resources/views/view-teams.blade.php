<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] mt-[2.38rem] rounded-md">
        <h1 class="text-[1.875rem] uppercase font-bold">Team Details</h1>
        <hr class="mt-[1.94rem] mb-[2.31rem]" />
        @foreach ($data as $team)
        <div class="bg-black text-white p-4 rounded mb-4 cursor-pointer" onclick="location.href='{{ url('team/' . $team->id . '/members') }}'">
            <table>
                <tr>
                    <td>Team ID</td>
                    <td>{{ $team->id }}</td>
                </tr>
                <tr>
                    <td>Team Name</td>
                    <td>{{ $team->team_name }}</td>
                </tr>
                <tr>
                    <td>Team Leader Name</td>
                    <td>{{ $team->team_leader_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Case ID</td>
                    <td>{{ $team->case_id ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Creation Date</td>
                    <td>{{ $team->creation_date }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $team->description ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>{{ $team->status }}</td>
                </tr>
            </table>
        </div>
        @endforeach
        <a href="{{ url('detainee-list') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Back</a>
        <a href="{{ url('create-team-form') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Create Team</a>
    </div>
</x-app-layout>
