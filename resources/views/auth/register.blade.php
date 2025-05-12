<x-guest-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <!-- Header Section -->
        <div class="text-center">
            <h2 class="mt-6 text-4xl font-bold text-gray-900 dark:text-gray-100">
                Create your account
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Already registered?
                <a href="{{ route('login') }}"
                   class="font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 transition duration-150 ease-in-out">
                    Sign in to your account
                </a>
            </p>
        </div>

        <!-- Form Section -->
        <div class=" dark:bg-gray-800 rounded-xl sm:px-10 ">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name Fields -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <!-- First Name -->
                    <div>
                        <x-input-label for="first_name" :value="__('First Name')" class="font-medium"/>
                        <div class="mt-1">
                            <x-text-input
                                id="first_name"
                                type="text"
                                name="first_name"
                                :value="old('first_name')"
                                autofocus
                                autocomplete="given-name"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 dark:bg-gray-700 dark:text-gray-100"
                                placeholder="Abena"

                            />
                        </div>
                        <x-input-error :messages="$errors->get('first_name')" class="mt-2"/>
                    </div>

                    <!-- Last Name -->
                    <div>
                        <x-input-label for="last_name" :value="__('Last Name')" class="font-medium"/>
                        <div class="mt-1">
                            <x-text-input
                                id="last_name"
                                type="text"
                                name="last_name"
                                :value="old('last_name')"
                                autocomplete="family-name"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 dark:bg-gray-700 dark:text-gray-100"
                                placeholder="Adu"

                            />
                        </div>
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
                    </div>
                </div>

                <!-- Email Address -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                    <div>
                        <x-input-label for="email" :value="__('Email address')" class="font-medium"/>
                        <div class="mt-1">
                            <x-text-input
                                id="email"
                                type="email"
                                name="email"
                                :value="old('email')"
                                autocomplete="email"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 dark:bg-gray-700 dark:text-gray-100"
                                placeholder="you@example.com"

                            />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <x-input-label for="contact" :value="__('Phone Number')" class="font-medium"/>
                        <div class="mt-1">
                            <x-text-input
                                id="contact"
                                type="number"
                                name="contact"
                                :value="old('contact')"
                                autocomplete="tel"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 dark:bg-gray-700 dark:text-gray-100"
                                placeholder="0550000000"
                                pattern="[0-9+\s()-]*"

                            />
                        </div>
                        <x-input-error :messages="$errors->get('contact')" class="mt-2"/>
                    </div>
                </div>
                <!-- Gender and Date of Birth -->


                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="font-medium"/>
                        <div class="mt-1">
                            <x-text-input
                                id="password"
                                type="password"
                                name="password"
                                autocomplete="new-password"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 dark:bg-gray-700 dark:text-gray-100"
                                placeholder="••••••••"
                                minlength="8"

                            />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="font-medium"/>
                        <div class="mt-1">
                            <x-text-input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                autocomplete="new-password"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 dark:bg-gray-700 dark:text-gray-100"
                                placeholder="••••••••"
                                minlength="8"

                            />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <x-primary-button
                        class="w-full flex justify-center py-2 px-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 text-white rounded-lg transition duration-200">
                        {{ __('Create Account') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
