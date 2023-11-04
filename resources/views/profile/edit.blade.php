<x-app-layout>

    <!-- Canvas -->
    <div class="grid grid-cols-5 bg-[#f0f2f5] grid-row-4">

        <!-- Update Profile -->
        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-3 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-[2.38rem]">
            <div>
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-3 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-1">
            <div>
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="col-start-2 my-[2.36rem] mx-[3rem] col-span-3 bg-[#FFFFFF] py-[2.81rem] px-[2.84rem] border-black rounded-md mt-1">
            <div>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
