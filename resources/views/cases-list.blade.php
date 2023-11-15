<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Cases List -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">View Cases List</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">

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

                    <div id="selectedCaseID"></div>

                    <div class="flex flex-col gap-4">
                        <label class="form-label block labelname font-bold mb-2">Cases</label>
                        @php
                            $counter = count($data);
                        @endphp
                        @foreach ($data as $key => $Cases)
                            <div class="flex space-x-4" onclick="selectedCase(this, {{ $Cases->case_id }})">
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
                            </div>
                        @endforeach
                    </div>

                    <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                        <a href="{{ url('live-cases', ['id' => 'case_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">CASE OVERVIEW</a>
                        <a href="{{ url('edit-cases', ['id' => 'case_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">UPDATE</a>
                        <a href="{{ url('delete-cases', ['id' => 'case_id_placeholder']) }}" class="buttonFormat border-2 border-black bg-rgba(165, 42, 42, 0) hover:bg-black text-black hover:text-white font-bold py-4 px-4">DELETE</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>

        function selectedCase (clickedElement, caseID) {

            var allCards = document.querySelectorAll('.flex.space-x-4');
            allCards.forEach(function(card) {
                if (card !== clickedElement) {
                    card.classList.remove('selected');
                }
            });

            clickedElement.classList.toggle('selected');

            var caseOverviewButton = document.querySelector('a[href*="live-cases"]');
            if (caseOverviewButton) {
                caseOverviewButton.href = caseID ? caseOverviewButton.href.replace('case_id_placeholder', caseID) : 'javascript:void(0);';
            }

            var editCasesButton = document.querySelector('a[href*="edit-cases"]');
            if (editCasesButton) {
                editCasesButton.href = caseID ? editCasesButton.href.replace('case_id_placeholder', caseID) : 'javascript:void(0);';
            }

            var deleteCasesButton = document.querySelector('a[href*="delete-cases"]');
            if (deleteCasesButton) {
                deleteCasesButton.href = caseID ? deleteCasesButton.href.replace('case_id_placeholder', caseID) : 'javascript:void(0);';
            }

            var caseoverviewBox = document.getElementById('selectedCaseID');
            caseoverviewBox.textContent = caseID ? 'Selected Case ID: ' + caseID : 'No Case Selected'; // For Checking lang if nakuha yung ID
        }

    </script>

</x-app-layout>

<!-- <script>
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
</script> -->