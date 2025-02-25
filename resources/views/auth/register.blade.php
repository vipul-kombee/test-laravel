<x-guest-layout>
    <form id="registerForm" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- First Name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contact Number -->
        <div class="mt-4">
            <x-input-label for="contact_number" :value="__('Contact Number')" />
            <x-text-input id="contact_number" class="block mt-1 w-full" type="text" name="contact_number" :value="old('contact_number')" pattern="^[0-9]{10,15}$" title="Enter a valid contact number" />
            <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
        </div>

        <!-- Role (Multi-Select with Auto-Complete) -->
        <div class="mt-4">
            <x-input-label for="state" :value="__('State')" />
            <select id="state" name="state_id" class="block mt-1 w-full">
                <option value="">Select State</option>
                @foreach($states as $state)
                <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('state_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="city" :value="__('City')" />
            <select id="city" name="city_id" class="block mt-1 w-full">
                <option value="">Select City</option>
            </select>
            <x-input-error :messages="$errors->get('city_id')" class="mt-2" />
        </div>

        <!-- Postcode -->
        <div class="mt-4">
            <x-input-label for="postcode" :value="__('Postcode')" />
            <x-text-input id="postcode" class="block mt-1 w-full" type="text" name="postcode" :value="old('postcode')" pattern="^[0-9]{4,6}$" title="Enter a valid postcode" />
            <x-input-error :messages="$errors->get('postcode')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                type="password"
                name="password_confirmation" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Multiple File Upload -->
        <div class="mt-4">
            <x-input-label for="files" :value="__('Upload Files')" />
            <input id="files" class="block mt-1 w-full" type="file" name="files[]" multiple />
            <x-input-error :messages="$errors->get('files')" class="mt-2" />
        </div>

        <!-- Hobbies (Checkboxes) -->
        <div class="mt-4">
            <x-input-label :value="__('Hobbies')" />
            <div class="flex space-x-4">
                <label class="px-2"><input type="checkbox" name="hobbies[]" value="Reading"> Reading</label>
                <label class="px-2"><input type="checkbox" name="hobbies[]" value="Gaming"> Gaming</label>
                <label class="px-2"><input type="checkbox" name="hobbies[]" value="Traveling"> Traveling</label>
            </div>
            <x-input-error :messages="$errors->get('hobbies')" class="mt-2" />
        </div>

        <!-- Gender (Radio Buttons) -->
        <div class="mt-4">
            <x-input-label :value="__('Gender')" />
            <div class="flex space-x-4">
                <label class="px-2"><input type="radio" name="gender" value="Male" /> Male</label>
                <label class="px-2"><input type="radio" name="gender" value="Female" /> Female</label>
                <label class="px-2"><input type="radio" name="gender" value="Other" /> Other</label>
            </div>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Role (Multi-Select with Auto-Complete) -->
        <div class="mt-4">
            <x-input-label for="roles" :value="__('Roles')" />
            <select id="roles" name="roles[]" class="block mt-1 w-full" multiple>
            </select>
            <x-input-error :messages="$errors->get('roles')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>