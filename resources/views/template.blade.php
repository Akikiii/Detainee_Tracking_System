<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

                                        <!-- detainee list-->
                                            <p class="text-left mb-2">
                                                Assigned Attorney: 
                                                @if (optional($detainee->counselCaseAssignment)->assigned_by)
                                                    <strong class="bg-green-500 text-white px-1 py-1 rounded">{{ $detainee->counselCaseAssignment->assigned_by }}</strong>
                                                @else
                                                    <strong class="bg-orange-500 text-white px-1 py-1 rounded">None</strong>
                                                @endif
                                            </p>

                                        <!-- create-team -->
                                        <form action="{{ route('saveTeam') }}" method="post"> 

                                        <a href="{{ url('view-teams') }}" class="buttonFormat border-2 border-[#F8861E] bg-rgba(165, 42, 42, 0) hover:bg-[#F8861E] text-[#F8861E] hover:text-black font-bold py-2 px-4">BACK TO TEAM LIST</a>