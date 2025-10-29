<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Welcome Back</h2>
        <p class="mt-2 text-sm text-gray-600">Sign in to your account</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Register here
                </a>
            </p>
        </div>
    </form>

    <!-- Demo Accounts -->
    <div class="mt-8 pt-6 border-t border-gray-200">
        <div class="text-center">
            <p class="text-xs text-gray-500 mb-3">Demo Accounts for Testing</p>
            <div class="grid grid-cols-1 gap-2 text-xs">
                <div class="bg-gray-50 p-2 rounded">
                    <span class="font-medium text-red-600">Admin:</span> willoid.webdev+admin1@gmail.com / Iam4dm1n!
                </div>
                <div class="bg-gray-50 p-2 rounded">
                    <span class="font-medium text-blue-600">Entrepreneur:</span> Create account with "Entrepreneur" role
                </div>
                <div class="bg-gray-50 p-2 rounded">
                    <span class="font-medium text-green-600">Job Seeker:</span> Create account with "Job Seeker" role
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
