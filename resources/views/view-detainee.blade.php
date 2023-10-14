<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Sidebar -->
        <div class="col-start-1 mt-[2.36rem] h-screen col-span-1 bg-[#FFFFFF] border-black pt-[1.44rem] pb-[3.72rem] px-[1rem]">
            <div class="flex flex-col justify-between h-full">

            <div class="grid gap-4 text-[1.125rem] row-start-1">

                <a href="{{ route('dashboard') }}" class="flex items-center gap-[0.5rem]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 44 51" fill="none">
                        <path d="M4.57501 25.4118C4.57501 15.9282 4.57501 11.1865 7.12099 8.24028C9.66699 5.29413 13.7647 5.29413 21.9601 5.29413C30.1554 5.29413 34.2532 5.29413 36.7992 8.24028C39.3451 11.1865 39.3451 15.9282 39.3451 25.4118C39.3451 34.8952 39.3451 39.6371 36.7992 42.5834C34.2532 45.5294 30.1554 45.5294 21.9601 45.5294C13.7647 45.5294 9.66699 45.5294 7.12099 42.5834C4.57501 39.6371 4.57501 34.8952 4.57501 25.4118Z" stroke="#141B34" stroke-width="1.5"/>
                        <path d="M4.57501 19.0588H39.3451" stroke="#141B34" stroke-width="1.5" stroke-linejoin="round"/>
                        <path d="M12.8097 12.7059H12.8268" stroke="#141B34" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20.1297 12.7059H20.1469" stroke="#141B34" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M31.1101 36C31.1101 30.1523 27.0135 25.4117 21.9601 25.4117C16.9067 25.4117 12.8101 30.1523 12.8101 36" stroke="#141B34" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M23.2539 32.3852L20.6659 35.38" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <h1 class="font-bold text-[1.625rem]">Dashboard</h1>
                </a>

                <div class="sections ml-1">
                    <a href="{{ url('detainee-list') }}" class="flex items-center gap-[0.5rem] mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="38" viewBox="0 0 41 38" fill="none">
                            <path d="M21.3542 34.8333H11.2594C8.6194 34.8333 6.51955 33.6427 4.63415 31.9779C0.774521 28.5698 7.11147 25.8463 9.52837 24.5125C13.1172 22.5319 17.3171 21.8055 21.3542 22.3332C22.8191 22.5247 24.2457 22.8814 25.625 23.4031" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M28.1875 10.2917C28.1875 14.2267 24.7457 17.4167 20.5 17.4167C16.2543 17.4167 12.8125 14.2267 12.8125 10.2917C12.8125 6.35666 16.2543 3.16669 20.5 3.16669C24.7457 3.16669 28.1875 6.35666 28.1875 10.2917Z" stroke="#141B34" stroke-width="1.5"/>
                            <path d="M31.6042 34.8333V23.75M25.625 29.2917H37.5833" stroke="#141B34" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        <p>Assign Attorney</p>
                    </a>

                    <a href="{{ route('register.user') }}" class="flex items-center gap-[0.5rem] mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="38" viewBox="0 0 39 40" fill="none">
                            <path d="M20.3125 33.3332H17.0625C10.9548 33.3332 7.90096 33.3332 5.86212 31.6817C5.53602 31.4175 5.23443 31.1265 4.9608 30.8117C3.25 28.8435 3.25 25.8957 3.25 19.9998C3.25 14.104 3.25 11.1561 4.9608 9.188C5.23443 8.87322 5.53602 8.58209 5.86212 8.31795C7.90096 6.6665 10.9548 6.6665 17.0625 6.6665H21.9375C28.0452 6.6665 31.0991 6.6665 33.1378 8.31795C33.4639 8.58209 33.7656 8.87322 34.0392 9.188C35.489 10.8558 35.7102 13.2272 35.744 17.4998" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M30.0625 33.3332V21.6665M24.375 27.4998H35.75" stroke="#141B34" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M3.25 15H35.75" stroke="#141B34" stroke-width="1.5" stroke-linejoin="round"/>
                        </svg>
                        <p>Create Attorney Profile </p>
                    </a>
                </div>

                <div>
                    <h1 class="font-bold text-[1.625rem] mt-3.5">My Profile </h1>
                    <div class="sections ml-1">
                        <a href="{{ route('view.profile') }}" class="flex items-center gap-[0.5rem] mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="38" viewBox="0 0 51 49" fill="none">
                                <path d="M35.8017 4.02783V8.05561M25.2743 4.02783V8.05561M14.747 4.02783V8.05561" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.37787 20.139C7.37787 13.4935 7.37787 10.1707 9.53624 8.10625C11.6946 6.04175 15.1685 6.04175 22.1161 6.04175H28.4325C35.3801 6.04175 38.854 6.04175 41.0125 8.10625C43.1708 10.1707 43.1708 13.4935 43.1708 20.139V30.2084C43.1708 36.8539 43.1708 40.1766 41.0125 42.2412C38.854 44.3057 35.3801 44.3057 28.4325 44.3057H22.1161C15.1685 44.3057 11.6946 44.3057 9.53624 42.2412C7.37787 40.1766 7.37787 36.8539 7.37787 30.2084V20.139Z" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M28.4325 32.2222H35.8016" stroke="#141B34" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M28.4325 18.125H35.8016" stroke="#141B34" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M14.747 20.1389C14.747 20.1389 15.7997 20.1389 16.8525 22.1527C16.8525 22.1527 20.1965 17.118 23.1689 16.1111" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.747 34.236C14.747 34.236 15.7997 34.236 16.8525 36.2499C16.8525 36.2499 20.1965 31.2152 23.1689 30.2083" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <p>View my Profile</p>
                        </a>

                        <hr class="my-3 border-black">
                        
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-[0.5rem] mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="38" viewBox="0 0 51 49" fill="none">
                                <path d="M22.1161 44.3057H20.0107C13.063 44.3057 9.58913 44.3057 7.43078 42.2412C5.2724 40.1766 5.2724 36.8539 5.2724 30.2084V20.139C5.2724 13.4935 5.2724 10.1707 7.43078 8.10625C9.58913 6.04175 13.063 6.04175 20.0107 6.04175H26.3271C33.2747 6.04175 36.7485 6.04175 38.907 8.10625C41.0653 10.1707 41.0653 13.4935 41.0653 20.139V22.1529" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M42.4671 34.5205L35.5027 41.1821L37.7357 43.3182L44.7004 36.6565L42.4671 34.5205ZM31.6981 37.543L38.6626 30.8814L36.4295 28.7453L29.4648 35.407L31.6981 37.543ZM30.9399 42.538C30.5706 42.6135 30.2754 42.6738 30.0217 42.7189C29.7659 42.7644 29.5981 42.7859 29.4844 42.7928C29.3676 42.8 29.3756 42.7867 29.4484 42.8047C29.5476 42.8292 29.6823 42.8903 29.7973 43.0002L27.5642 45.1361C28.2458 45.7882 29.0974 45.8434 29.6849 45.8076C30.2439 45.7735 30.9252 45.6301 31.6002 45.492L30.9399 42.538ZM27.1922 41.2757C27.0478 41.9214 26.8979 42.5731 26.8623 43.1077C26.8248 43.6696 26.8825 44.4842 27.5642 45.1361L29.7973 43.0002C29.9122 43.1102 29.976 43.2391 30.0017 43.3339C30.0205 43.4036 30.0066 43.4112 30.0142 43.2995C30.0213 43.1907 30.0438 43.0302 30.0914 42.7855C30.1386 42.5429 30.2015 42.2605 30.2805 41.9073L27.1922 41.2757ZM42.4671 30.8814C43.2409 31.6215 43.399 31.7913 43.4797 31.9248L46.2149 30.4144C45.874 29.8495 45.3304 29.3481 44.7004 28.7453L42.4671 30.8814ZM44.7004 36.6565C45.3304 36.0539 45.874 35.5522 46.2149 34.9875L43.4797 33.4771C43.399 33.6107 43.2409 33.7804 42.4671 34.5205L44.7004 36.6565ZM43.4797 31.9248C43.7696 32.4051 43.7696 32.9968 43.4797 33.4771L46.2149 34.9875C47.0689 33.5726 47.0689 31.8294 46.2149 30.4144L43.4797 31.9248ZM44.7004 28.7453C44.0702 28.1427 43.546 27.6228 42.9554 27.2967L41.3763 29.913C41.5159 29.9901 41.6934 30.1413 42.4671 30.8814L44.7004 28.7453ZM38.6626 30.8814C39.4363 30.1413 39.6138 29.9901 39.7534 29.913L38.1743 27.2967C37.5839 27.6228 37.0595 28.1427 36.4295 28.7453L38.6626 30.8814ZM42.9554 27.2967C41.4761 26.4799 39.6536 26.4799 38.1743 27.2967L39.7534 29.913C40.2556 29.6356 40.8741 29.6356 41.3763 29.913L42.9554 27.2967ZM35.5027 41.1821C35.0909 41.5758 34.5283 41.8305 33.7288 42.0257C33.3284 42.1236 32.9012 42.1991 32.4251 42.2778C31.9676 42.3533 31.444 42.4349 30.9399 42.538L31.6002 45.492C32.0251 45.4052 32.4605 45.3375 32.9629 45.2546C33.4465 45.1746 33.9796 45.0822 34.5102 44.9527C35.573 44.6931 36.7561 44.2553 37.7357 43.3182L35.5027 41.1821ZM30.2805 41.9073C30.3883 41.4251 30.4736 40.9243 30.5525 40.4867C30.6348 40.0313 30.7138 39.6227 30.8161 39.2397C31.0201 38.475 31.2865 37.9369 31.6981 37.543L29.4648 35.407C28.4852 36.3441 28.0274 37.4757 27.756 38.4923C27.6207 38.9998 27.524 39.5097 27.4404 39.9723C27.3537 40.4528 27.2829 40.8693 27.1922 41.2757L30.2805 41.9073Z" fill="#141B34"/>
                                <path d="M33.6962 4.02783V8.05561M23.1689 4.02783V8.05561M12.6415 4.02783V8.05561" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.747 30.2084H23.1689M14.747 20.1389H31.5907" stroke="#141B34" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                            <p>Update my Profile</p>
                        </a>
                    </div>
                </div>

                <div>
                    <h1 class="font-bold text-[1.625rem] mt-3.5">Detainee Tracker </h1>
                    <div class="sections ml-1">
                        <a href="{{ url('add-detainee') }}" class="flex items-center gap-[0.5rem] mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="38" viewBox="0 0 39 40" fill="none">
                                <path d="M20.3125 33.3334H17.0625C10.9548 33.3334 7.90096 33.3334 5.86212 31.6819C5.53602 31.4177 5.23443 31.1267 4.9608 30.8119C3.25 28.8437 3.25 25.8959 3.25 20.0001C3.25 14.1043 3.25 11.1564 4.9608 9.18825C5.23443 8.87346 5.53602 8.58233 5.86212 8.3182C7.90096 6.66675 10.9548 6.66675 17.0625 6.66675H21.9375C28.0452 6.66675 31.0991 6.66675 33.1378 8.3182C33.4639 8.58233 33.7656 8.87346 34.0392 9.18825C35.489 10.856 35.7102 13.2274 35.744 17.5001" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M30.0625 33.3334V21.6667M24.375 27.5001H35.75" stroke="#141B34" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M3.25 15H35.75" stroke="#141B34" stroke-width="1.5" stroke-linejoin="round"/>
                            </svg>
                            <p>Create Detainee Profile</p>
                        </a>
                        <hr class="my-3 border-black">

                        <a href="{{ url('detainee-list') }}" class="flex items-center gap-[0.5rem] mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="38" viewBox="0 0 51 49" fill="none">
                                <path d="M35.8017 4.02783V8.05561M25.2743 4.02783V8.05561M14.747 4.02783V8.05561" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M7.37787 20.139C7.37787 13.4935 7.37787 10.1707 9.53624 8.10625C11.6946 6.04175 15.1685 6.04175 22.1161 6.04175H28.4325C35.3801 6.04175 38.854 6.04175 41.0125 8.10625C43.1708 10.1707 43.1708 13.4935 43.1708 20.139V30.2084C43.1708 36.8539 43.1708 40.1766 41.0125 42.2412C38.854 44.3057 35.3801 44.3057 28.4325 44.3057H22.1161C15.1685 44.3057 11.6946 44.3057 9.53624 42.2412C7.37787 40.1766 7.37787 36.8539 7.37787 30.2084V20.139Z" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M28.4325 32.2222H35.8016" stroke="#141B34" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M28.4325 18.125H35.8016" stroke="#141B34" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M14.747 20.1389C14.747 20.1389 15.7997 20.1389 16.8525 22.1527C16.8525 22.1527 20.1965 17.118 23.1689 16.1111" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.747 34.236C14.747 34.236 15.7997 34.236 16.8525 36.2499C16.8525 36.2499 20.1965 31.2152 23.1689 30.2083" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <p>View Detainee List</p>
                        </a>
                        <hr class="my-3 border-black">
                        
                        <a href="{{url('cases-list')}}" class="flex items-center gap-[0.5rem] mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="38" viewBox="0 0 45 42" fill="none">
                                <path d="M9.71263 26.7687C7.35467 28.0586 1.17227 30.6925 4.93777 33.9885C6.77719 35.5985 8.82581 36.75 11.4014 36.75H26.0985C28.6742 36.75 30.7228 35.5985 32.5622 33.9885C36.3278 30.6925 30.1453 28.0586 27.7873 26.7687C22.2579 23.7438 15.242 23.7438 9.71263 26.7687Z" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M26.25 12.25C26.25 16.116 22.8921 19.25 18.75 19.25C14.6079 19.25 11.25 16.116 11.25 12.25C11.25 8.384 14.6079 5.25 18.75 5.25C22.8921 5.25 26.25 8.384 26.25 12.25Z" stroke="#141B34" stroke-width="1.5"/>
                                <path d="M36.5625 12.5V14M36.5625 12.5C35.2069 12.5 34.0125 11.8371 33.312 10.8305M36.5625 12.5C37.9181 12.5 39.1125 11.8371 39.813 10.8305M33.312 10.8305L31.8756 11.75M33.312 10.8305C32.8978 10.2352 32.6563 9.51968 32.6563 8.75C32.6563 7.9804 32.8978 7.26497 33.312 6.66969M39.813 10.8305L41.2494 11.75M39.813 10.8305C40.2272 10.2352 40.4687 9.51968 40.4687 8.75C40.4687 7.9804 40.2272 7.26497 39.813 6.66969M36.5625 5C37.9181 5 39.1127 5.663 39.813 6.66969M36.5625 5C35.2069 5 34.0123 5.663 33.312 6.66969M36.5625 5V3.5M39.813 6.66969L41.25 5.74999M33.312 6.66969L31.875 5.74999" stroke="#141B34" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                            <p>Case View</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid row-start-2 w-full justify-center">
                <button class="buttonFormat flex bg-[#cccccc] w-[8.835rem] h-[2.6583rem] justify-center text-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="27" viewBox="0 0 25 27" fill="none">
                        <path d="M4.13678 10.1687C4.13678 7.87827 4.13678 6.73308 4.50663 5.803C4.81557 5.02611 5.30315 4.35927 5.91757 3.87337C6.65313 3.29166 7.64027 3.0868 9.61457 2.67708C11.6675 2.25104 12.694 2.03801 13.4929 2.37749C14.1565 2.65948 14.7156 3.19211 15.0775 3.88689C15.513 4.72326 15.513 5.91409 15.513 8.29576V18.2187C15.513 20.6004 15.513 21.7912 15.0775 22.6276C14.7156 23.3224 14.1565 23.855 13.4929 24.137C12.694 24.4765 11.6675 24.2635 9.61457 23.8374C7.64027 23.4277 6.65313 23.2229 5.91757 22.6411C5.30315 22.1552 4.81557 21.4884 4.50663 20.7115C4.13678 19.7814 4.13678 18.6362 4.13678 16.3459V10.1687Z" stroke="black" stroke-width="1.5"/>
                        <path d="M15.513 21.8727C17.0098 22.0389 19.0292 22.5503 20.1023 21.0886C20.684 20.2962 20.684 19.0891 20.684 16.6749V9.83993C20.684 7.4257 20.684 6.2186 20.1023 5.42621C19.0292 3.96447 17.0098 4.47585 15.513 4.6421" stroke="black" stroke-width="1.5"/>
                        <path d="M12.4104 14.3621V12.1526" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.6498 21.7935H22.7524" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.06842 22.0955H5.17101" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="ml-2">Sign Out</span>
                </button>
            </div>

            </div>
        </div>

        <!-- View Detainee Profile -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-4 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]">
            <div>
                <h1 class="text-[1.875rem] uppercase font-bold">View Detainee Profile</h1>
                <hr class="mt-[1.94rem] mb-[2.31rem]"/>

                <div class="grid gap-5">

                    <div class="flex flex-col gap-4">
                        <div class="flex space-x-4">
                            <div class="flex flex-row border border-black border rounded py-4 px-4 w-full leading-tight focus:outline-none focus:border-black relative">
                                <div class="ml-4 flex">
                                    <div style="background-color: black; height: 125px; width: 125px; border-radius: 100%; margin-top: 10px;"></div>
                                    <div class="ml-10">
                                        <p class="text-left mt-3 mb-3 font-bold">{{ $detainee->last_name }}, {{ $detainee->first_name }} {{ $detainee->middle_name }}</p>
                                        <p class="text-left mb-3">Detainee ID: {{ $detainee['detainee_id'] }}</p>
                                        <p class="text-left mb-3">Age: {{ $detainee->age }} years old</p>
                                        @if (isset($detainee->detaineeDetails))
                                            <p class="text-left mb-3">Gender: {{ ucfirst($detainee->detaineeDetails->gender) }}</p>
                                            <p class="text-left mb-3">Offense: {{ $detainee->detaineeDetails->crime_history }}</p>
                                            <p class="text-left mb-3">Start of Detention: {{ $detainee->detaineeDetails->detention_begin }}</p>
                                            <p class="text-left mb-3">Time Served: {{ $detainee->detaineeDetails->max_detention_period }} hours</p>
                                        @else
                                            <p class="text-left mb-3">Offense: N/A</p>
                                            <p class="text-left mb-3">Start of Detention: N/A</p>
                                            <p class="text-left mb-3">Time Served: N/A</p>
                                        @endif
                                        <p class="text-left mb-3">Email Address: {{ $detainee['email_address'] }}</p>
                                        <p class="text-left mb-3">Home Address: {{ $detainee['home_address'] }}</p>
                                        <p class="text-left mb-3">Mother's Name: {{ $detainee->detaineeDetails->mother_name }}</p>
                                        <p class="text-left mb-3">Faher's Name: {{ $detainee->detaineeDetails->father_name}}</p>
                                        <p class="text-left mb-3">Spouse's Name: {{ $detainee->detaineeDetails->spouse_name}}</p>
                                        <p class="text-left mb-3">Emergency Contact's Name: {{ $detainee->detaineeDetails->emergency_contact_name }}</p>
                                        <p class="text-left mb-3">Emergency Contact's Number: {{ $detainee->detaineeDetails->emergency_contact_number }}</p>
                                        <p class="text-left mb-3">Medical Information: {{ $detainee->detaineeDetails->medical_information }}</p>
                                        <p class="text-left mb-3">Related Photos: {{ $detainee->detaineeDetails->related_photos}}</p>
                                        <p class="text-left mb-10">
                                            Assigned Attorney:
                                            @if (optional($counsel_case_assignment)->assigned_by)
                                                <strong class="bg-green-500 text-white px-1 py-1 rounded">{{ $counsel_case_assignment->assigned_by }}</strong>
                                            @else
                                                <strong class="bg-red-500 text-white px-1 py-1 rounded">None</strong>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row justify-end gap-2.5 mt-[2.12rem]">
                        <form action="{{ route('assign-attorney', ['detainee_id' => $detainee->id]) }}" method="post">
                            @csrf
                            @if ($counsel_case_assignment)
                                <a href="{{ url('remove-assignment/' . $counsel_case_assignment->detainee_id) }}"
                                    class="buttonFormat bg-[#D0B638] hover:bg-yellow-400 font-bold py-3 px-6 rounded"
                                    onclick="return confirm('Are you sure you want to delete this detainee?')">REMOVE ASSIGNED ATTY TO DETAINEE
                                </a>
                            @else
                                <button type="submit" class="buttonFormat bg-[#D0B638] hover:bg-yellow-400 font-bold py-3 px-6 rounded">
                                    ASSIGN ATTORNEY TO DETAINEE
                                </button>
                            @endif
                        </form>
                        <a href="{{url('detainee-list')}}" class="buttonFormat bg-[#CCCCCC] hover:bg-[#777777] font-bold py-3 px-4 rounded">BACK</a>
                    </div>

                </div>
            </div>
            
        </div>

    </div>

</x-app-layout>
