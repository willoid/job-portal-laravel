<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Create Your Account</h2>
        <p class="mt-2 text-sm text-gray-600">Join our job portal community</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role Selection -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('I want to register as')" />
            <div class="mt-2 space-y-3">
                <div class="flex items-center">
                    <input id="role_job_seeker" name="role" type="radio" value="job_seeker"
                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                        {{ old('role', 'job_seeker') == 'job_seeker' ? 'checked' : '' }}>
                    <label for="role_job_seeker" class="ml-3 block text-sm font-medium text-gray-700">
                        <span class="font-semibold text-green-600">Job Seeker</span>
                        <span class="block text-xs text-gray-500">Looking for job opportunities</span>
                    </label>
                </div>

                <div class="flex items-center">
                    <input id="role_entrepreneur" name="role" type="radio" value="entrepreneur"
                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                        {{ old('role') == 'entrepreneur' ? 'checked' : '' }}>
                    <label for="role_entrepreneur" class="ml-3 block text-sm font-medium text-gray-700">
                        <span class="font-semibold text-blue-600">Entrepreneur/Employer</span>
                        <span class="block text-xs text-gray-500">Looking to hire talent</span>
                    </label>
                </div>
            </div>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
