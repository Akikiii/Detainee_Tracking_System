<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    
    <!-- Font Styles via googlefonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Castoro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Castoro&family=Commissioner:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Press+Start+2P&display=swap" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Sarabun&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">



    <style>
        .navigation-text {
            font-family: 'Bebas Neue', sans-serif;
        }

        .placeholder-black::placeholder {
            color: black;
        }

        .buttonFormat {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'IBM Plex Mono', monospace;
        }

        .searchBarPlaceHolder {
            font-family: 'Roboto', sans-serif;
        }

        .circle {
            width: 40px;
            border-radius: 5rem;
        }

        .labelname {
            font-size: 1.15rem;
            font-family: 'IBM Plex Mono', monospace;
        }

        .placeholderfont {
            /* color: #F8861E; */
            font-size: 1rem;
            font-family: 'IBM Plex Mono', monospace;
        }

        .sections {
            font-size: 1.5rem;
            font-family: 'Sarabun', sans-serif;
            color: #686576; 
        }

        h1 {
            font-family: 'IBM Plex Mono', monospace;
        }

        h3 {
            color: #686576;
            font-family: 'Castoro', serif;
        }

        input[type=text], input[type=date], input[type=email], input[type=password], textarea {
            background-color: rgba(165, 42, 42, 0);
            color: black;
            font-family: 'Nunito', sans-serif;
        }

        /* input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(46%) sepia(24%) saturate(2944%) hue-rotate(10deg) brightness(91%) contrast(87%);
        }

        input[type="date"]:focus::-webkit-calendar-picker-indicator {
            filter: grayscale(100%);
        } */


        select {
            /* background-color: rgba(165, 42, 42, 0);
            color: #F8861E;
            font-family: 'IBM Plex Mono', monospace;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding-right: 20px; adjust the padding to create space for the arrow */
            /* background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='10' height='10' fill='%23F8861E' viewBox='0 0 24 24'><path d='M7 10l5 5 5-5z'/></svg>");
            background-repeat: no-repeat;
            background-position: right center; */
        }

        /* select:focus {
            color: black;
        } */

        /* input[type=text]:focus {
            background-color: #F8861E;
            color: black;
            font-family: 'IBM Plex Mono', monospace;
        }

        input[type=text]::placeholder {
            color: #F8861E;
        }

        input[type=text]:focus::placeholder {
            color: black;
        }

        .form-control:focus {
            box-shadow: 0 0 0 2px #F8861E !important;
            outline: none !important;
        } */

        .selected {
            background-color: #e2e8f0; /* Change this to your desired background color */
        }

    </style>

    <!-- Navigation Bar -->
    <div class="w-full bg-white flex items-center justify-between p-5">
        

        <!-- Logo and System Name -->
        <a class="flex items-center gap-1" href="{{ route('dashboard') }}">
            <div>
                <img class="circle" src="{{ asset('logos/pao-logo-bw.png') }}" alt="PAO Logo">
            </div>
            <div>
                <img class="circle" src="{{ asset('logos/bjmp-logo-bw.png') }}" alt="BJMP Logo">
            </div>
            <div>
                <div class="navigation-text text-3xl ml-3">DETAINEE TRACKING SYSTEM</div>
            </div>
        </a>

        <div x-data="{ open: false }" class="flex justify-center items-center mr-8">
            <div @click="open = !open" >
                <div class="flex justify-center items-center cursor-pointer">
                    <a class="mr-2 relative flex flex-row items-center h-12 rounded-md hover:bg-gray-100">
                        <svg width="40" height="40" fill="none" viewBox="0 0 24 24" id="yui_3_17_2_1_1701351524975_36">
                            <path stroke="Black" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M17.25 12V10C17.25 7.1005 14.8995 4.75 12 4.75C9.10051 4.75 6.75 7.10051 6.75 10V12L4.75 16.25H19.25L17.25 12Z"></path>
                            <path stroke="Black" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M9 16.75C9 16.75 9 19.25 12 19.25C15 19.25 15 16.75 15 16.75"></path>
                        </svg>
                        @if (isset($Cases))
                            <span class="absolute top-0 right-0 h-5 w-5 rounded-full text-xs text-white bg-red-600 flex justify-center items-center items">
                                <span>1</span>
                            </span>
                        @else
                            <span class="absolute top-0 right-0 h-5 w-5 rounded-full text-xs text-white bg-red-600 flex justify-center items-center items">
                                <span>3</span>
                            </span>
                        @endif
                    </a>
                </div>

                <div x-show="open" class="absolute right-10 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20 border-2 border-black" style="width:20rem;">
                    <div class="py-2">
                        <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                            <p class="text-gray-600 text-sm mx-2">
                                <span class="font-bold" href="#">Blank</span> is currently in the status of <span class="font-bold text-yellow-500" href="#">Pretrial</span> . 2m
                            </p>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                            <p class="text-gray-600 text-sm mx-2">
                                <span class="font-bold" href="#">Blank</span> is currently in the status of <span class="font-bold text-yellow-500" href="#">Bail Hearing</span> . 45m
                            </p>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                            <p class="text-gray-600 text-sm mx-2">
                                <span class="font-bold" href="#">Blank</span> is currently in the status of <span class="font-bold text-yellow-500" href="#">Case Creation/Initial Appearance</span> . 1hr
                            </p>
                        </a>
                    </div>
                    <a href="{{url('cases-list')}}" class="block bg-yellow-600 text-white text-center font-bold py-2">See All Pending Cases</a>
                </div>
            </div>
        </div>
        
    </div>

    
</nav>
        