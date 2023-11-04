<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Cases List -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold">View Cases List</h1>
                <hr class="mt-[1.94rem] mb-[2.31rem]"/>

                <div class="grid gap-5">
                    <form action="" method="GET">
                        <div class="col-md-3">
                            <div class="card shadow mt-3">
                                <div class="card-header">
                                    <h5>Filter</h5>
                                </div>
                                <div class="card-body">
                                    <h6>Status:</h6>
                                    <hr>
                                    <?php
                                    $con = mysqli_connect("localhost", "root", "", "detainee_tracker_db");
                                    $category_query = "SELECT DISTINCT status FROM cases";
                                    $category_query_run = mysqli_query($con, $category_query);

                                    $statuses = [];
                                    if (isset($_GET['statuses'])) {
                                        $statuses = $_GET['statuses'];
                                    }

                                    while ($categorylist = mysqli_fetch_assoc($category_query_run)) {
                                        $status = $categorylist['status'];
                                        $checked = in_array($status, $statuses) ? 'checked' : '';
                                        ?>
                                        <div>
                                            <input type="checkbox" name="statuses[]" value="<?= $status; ?>" <?= $checked; ?>>
                                            <?= $status; ?>
                                        </div>
                                        <?php
                                    }
                                    mysqli_close($con);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="flex flex-col">
                        <div class="grid grid-flow-col gap-10">
                            <input
                                type="text"
                                class="pl-10 rounded-3xl w-[42.9375rem] py-4 px-3 font-bold leading-tight bg-gray-200 focus:outline-none searchBarPlaceHolder"
                                placeholder="Search for a case (Enter Case Name)"
                            />
                        </div>
                    </div>

                    <div class="flex flex-col gap-4">
                        <label class="form-label block labelname font-bold mb-2">Cases</label>
                        @php
                            $counter = count($data);
                        @endphp
                        @foreach ($data as $key => $Cases)
                            <div class="flex space-x-4">
                                <div class="flex flex-row border border-black border rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <p class="text-left font-bold mb-3">{{ $Cases->case_name}}</p>
                                            <p class="text-left mb-3"><strong>Violation/s:</strong> {{ $Cases->violations }}</p>
                                            <p class="text-left mb-3"><strong>Case Created:</strong> {{ $Cases->case_created }}</p>
                                            <p class="text-left mb-3"><strong>Arrest Report:</strong> {{ $Cases->arrest_report }}</p>
                                            <p class="text-left mb-3"><strong>Testimonies:</strong> {{ $Cases->testimonies }}</p>
                                            <p class="text-left mb-3"><strong>Status:</strong>
                                                @if ($Cases->status === 'Active')
                                                    <span class="bg-green-500 text-white px-1 py-1 rounded">Active</span>
                                                @elseif ($Cases->status === 'Pending')
                                                    <span class="bg-orange-500 text-white px-1 py-1 rounded">Pending</span>
                                                @elseif ($Cases->status === 'Finished')
                                                    <span class="bg-green-500 text-white px-1 py-1 rounded">Finished</span>
                                                @else
                                                    <span class="bg-orange-500 text-white px-1 py-1 rounded">Unknown</span>
                                                @endif
                                            </p>

                                            @if ($Cases->assignedDetainee)
                                                <p class="text-left mb-3">{{ $Cases->assignedDetainee->first_name }} {{ $Cases->assignedDetainee->middle_name }} {{ $Cases->assignedDetainee->last_name }}</p>
                                            @else
                                                <p class="text-left mb-3"><strong>No Assigned Detainee</strong></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col justify-center items-center">
                                    <a href="{{ url('live-cases/'. $Cases->id) }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline flex-shrink" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2.46-2.46a4.88 4.88 0 014.9-1.227m3.094.45a4.88 4.88 0 014.898 1.227L21 12M9 6a6 6 0 100 12 6 6 0 000-12z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                        <a href="{{ url('live-cases/'. $Cases->id) }}" class="buttonFormat bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">CASE OVERVIEW</a>
                        <a href="{{ url('edit-cases/'. $Cases->id) }}" class="buttonFormat bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">UPDATE</a>
                        <a href="{{ url('delete-cases/'. $Cases->id) }}" class="buttonFormat bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">DELETE</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>

<script>
    // JavaScript code to filter table rows
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="statuses[]"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', filterTable);
    });

    function filterTable() {
        const checkedStatuses = Array.from(checkboxes).filter(checkbox => checkbox.checked).map(checkbox => checkbox.value);

        const tableRows = document.querySelectorAll('.status-filter');
        tableRows.forEach(row => {
            const status = row.querySelector('td:nth-child(8) span').innerText.trim();
            if (checkedStatuses.includes(status) || checkedStatuses.length === 0) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Initial filtering when the page loads
    filterTable();
</script>