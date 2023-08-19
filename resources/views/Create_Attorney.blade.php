<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Attorney Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  
                      
                        <div class="mb-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle Name</label>
                            <input type="text" name="middle_name" id="middle_name" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="office_address" class="block text-sm font-medium text-gray-700">Office Address</label>
                            <textarea name="office_address" id="office_address" rows="4" class="mt-1 p-2 border rounded-md w-full" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                            <input type="text" name="contact_number" id="contact_number" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="email_address" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" name="email_address" id="email_address" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Gender</label>
                            <div class="flex items-center mt-2">
                                <input type="radio" name="gender" id="gender_male" value="male" class="mr-1">
                                <label for="gender_male" class="text-sm">Male</label>
                                <input type="radio" name="gender" id="gender_female" value="female" class="ml-4 mr-1">
                                <label for="gender_female" class="text-sm">Female</label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="education_eualifications" class="block text-sm font-medium text-gray-700">Education and Qualifications</label>
                            <input type="text" name="education_eualifications" id="education_eualifications" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="practice_areas" class="block text-sm font-medium text-gray-700">Practice Areas</label>
                            <input type="text" name="practice_areas" id="practice_areas" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="work_experience" class="block text-sm font-medium text-gray-700">Work Experience</label>
                            <input type="text" name="work_experience" id="work_experience" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="professional_affiliations" class="block text-sm font-medium text-gray-700">Professional Affiliations</label>
                            <input type="text" name="professional_affiliations" id="professional_affiliations" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="professional_affiliations" class="block text-sm font-medium text-gray-700">Case Handled</label>
                            <input type="text" name="case_handled" id="case_handled" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="language_spoken" class="block text-sm font-medium text-gray-700">Language Spoken</label>
                            <input type="text" name="language_spoken" id="language_spoken" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="Office Hours" class="block text-sm font-medium text-gray-700">Office Hours</label>
                            <input type="text" name="office_hours" id="office_hours" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="profile_photo" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                            <input type="file" name="profile_photo" id="profile_photo" class="mt-1 p-2 border rounded-md w-full">
                        </div>          
                        <div>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Create Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
