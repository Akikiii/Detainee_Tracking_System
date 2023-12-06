<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 my-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-2 border-black p-[1.44rem] max-w-[600px]">
            @include('profile.partials.sidebar')
        </div>

        <!-- Cases List -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-2 border-black mt-[2.38rem]" style="background-image: url('logos/background-with-grid-bw.png'); background-size: contain;">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold ibm-plex-mono" style="color: black; text-shadow: 0 0 2px #888888;">View Cases List</h1>
                <img class="mt-[1.94rem] mb-[2.31rem]" src="{{ asset('logos/line-bw.png') }}" alt="TVA Line" style="height: 10px;">

                <div class="grid gap-5">
                    <!-- <form action="" method="GET">
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
                    </form> -->

                    <div class="flex flex-col">
                        <div class="grid grid-flow-col gap-10">
                            <input
                                type="text"
                                id="searchInput"
                                class="pl-5 w-[42.9375rem] py-4 px-3 leading-tight bg-gray-200 focus:outline-none searchBarPlaceHolder"
                                placeholder="Search for a Detainee (Enter Detainee Name)"
                                oninput="searchDetainees()"
                            />
                        </div>
                    </div>

                    <div id="selectedCaseID"></div>

                    <div class="flex flex-col gap-4">
                    <label class="form-label block labelname font-bold mb-2">Cases</label>
                    @php
                        $counter = is_countable($cases) ? count($cases) : 0;
                    @endphp

                    @foreach ($cases as $key => $case)
                    <div class="flex space-x-4" onclick="selectedCase(this, {{ $case->case_id }})">
                        <div class="flex flex-row border border-black border rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-left mb-2 font-bold">{{ $case->detainee->first_name }} {{ $case->detainee->middle_name }} {{ $case->detainee->last_name }}</p>
                                    <p class="text-left mb-3"><strong>Case Title: </strong> {{ $case->case_name}}</p>
                                    <p class="text-left mb-3"><strong>Case Created:</strong> {{ $case->case_created }}</p>
                                    <p class="text-left mb-3"><strong>Location:
                                        @if ($case->location === 'mtc')
                                        <span style="text-shadow: 0 0 1px #FDE581;">Municipal Trial Court</span></strong>
                                        @elseif ($case->location === 'rtc')
                                        <span style="text-shadow: 0 0 1px #FDE581;">Regional Trial Court</span></strong>
                                        @else 
                                        <span style="text-shadow: 0 0 1px #FDE581;">No Location Set</span></strong>
                                        @endif
                                    </p>
                                    @php
                                        $assignedAttorneys = $case->assignedAttorney;
                                    @endphp
                                    <p class="text-left mb-3"><strong>Assigned Attorney:
                                        @if ($assignedAttorneys->isNotEmpty())
                                            @foreach ($assignedAttorneys as $attorney)
                                                {{ $attorney->name }}
                                            @endforeach
                                        @else
                                            None
                                        @endif
                                        </strong>
                                    </p>

                                    <p class="text-left mb-3"><strong>Status:
                                        @if ($case->status === 'Arraignment')
                                            <span style="text-shadow: 0 0 1px #FDE581;">Arraignment</span></strong>
                                            <div class="flex max-w-xs space-x-3">
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#FDE581]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                            </div>
                                        @elseif ($case->status === 'Bail')
                                            <span style="text-shadow: 0 0 2px #FDE581;">Bail Hearing</span></strong>
                                            <div class="flex max-w-xs space-x-3">
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#FDE581]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                            </div>
                                        @elseif ($case->status === 'Pretrial')
                                            <span style="text-shadow: 0 0 1px #FDE581;">Pretrial</span></strong>
                                            <div class="flex max-w-xs space-x-3">
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#FDE581]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                            </div>
                                        @elseif ($case->status === 'Plea')
                                            <span style="text-shadow: 0 0 1px #FDE581;">Plea Bargaining</span></strong>
                                            <div class="flex max-w-xs space-x-3">
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#FDE581]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                            </div>
                                        @elseif ($case->status === 'Trial')
                                            <span style="text-shadow: 0 0 1px #FDE581;">Trial</span></strong>
                                            <div class="flex max-w-xs space-x-3">
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#FDE581]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                            </div>
                                        @elseif ($case->status === 'Sentencing')
                                            <span style="text-shadow: 0 0 1px #FDE581;">Sentencing</span></strong>
                                            <div class="flex max-w-xs space-x-3">
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#FDE581]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                            </div>
                                        @elseif ($case->status === 'Appeal')
                                            <span style="text-shadow: 0 0 1px #FDE581;">Appeal</span></strong>
                                            <div class="flex max-w-xs space-x-3">
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#99B927]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#FDE581]"></span>
                                            </div>
                                        @elseif ($case->status === 'Finished')
                                            <span style="text-shadow: 0 0 1px #436228;">Finished/Archived</span></strong>
                                            <div class="flex max-w-xs space-x-3">
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#436228]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#436228]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#436228]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#436228]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#436228]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#436228]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#436228]"></span>
                                            </div>
                                        @else
                                            <span style="text-shadow: 0 0 2px #FDE581;">Unknown</span></strong>
                                            <div class="flex max-w-xs space-x-3">
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                                <span class="w-12 h-2 rounded-sm dark:bg-[#CA9614]"></span>
                                            </div>
                                        @endif
                                    </p>

                                    <div class="py-5"></div>

                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

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
            caseoverviewBox.textContent = caseID ? 'Selected Case Number: ' + caseID : 'No Case Selected'; // For Checking lang if nakuha yung ID
        }

        function searchDetainees() {
            var input = document.getElementById("searchInput").value.toLowerCase();

            var detainees = document.querySelectorAll(".flex.space-x-4");

            detainees.forEach(function (detainee) {
                var name = detainee.querySelector(".font-bold").textContent.toLowerCase();

                var nameMatch = name.includes(input);

                if (nameMatch) {
                    detainee.style.display = "flex";
                } else {
                    detainee.style.display = "none";
                }
            });
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