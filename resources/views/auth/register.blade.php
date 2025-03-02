<x-guest-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <!-- Header Section -->
        <div class="text-center">
            <h2 class="mt-6 text-4xl font-bold text-gray-900 dark:text-gray-100">
                Create your account
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Already registered?
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 transition duration-150 ease-in-out">
                    Sign in to your account
                </a>
            </p>
        </div>

        <!-- Form Section -->
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white dark:bg-gray-800 py-8 px-6 shadow-lg rounded-xl sm:px-10">
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

                    <!-- Gender and Date of Birth -->
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <!-- Gender -->
                        <div>
                            <x-input-label for="gender" :value="__('Gender')" class="font-medium"/>
                            <div class="mt-1">
                                <select
                                    id="gender"
                                    name="gender"
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 dark:bg-gray-700 dark:text-gray-100"

                                >
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2"/>
                        </div>

                        <!-- Date of Birth -->
                        <div>
                            <x-input-label for="date_of_birth" :value="__('Date of Birth')" class="font-medium"/>
                            <div class="mt-1">
                                <x-text-input
                                    id="date_of_birth"
                                    type="date"
                                    name="date_of_birth"
                                    :value="old('date_of_birth')"
                                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 dark:bg-gray-700 dark:text-gray-100"
                                    max="{{ date('Y-m-d', strtotime('-18 years')) }}"

                                />
                            </div>
                            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2"/>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="text-gray-700 dark:text-gray-200">Do you want to be a Reseller or a User for better experience?</div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center space-x-2">
                                <x-text-input
                                    id="reseller"
                                    type="radio"
                                    name="role"
                                    value="reseller"
                                    :checked="old('role') === 'reseller'"
                                    class="border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700"
                                />
                                <x-input-label for="reseller" :value="__('Reseller')" class="font-medium cursor-pointer"/>
                            </div>

                            <div class="flex items-center space-x-2">
                                <x-text-input
                                    id="user"
                                    type="radio"
                                    name="role"
                                    value="user"
                                    :checked="old('role') === 'user'"
                                    class="border-gray-300 dark:border-gray-700 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700"
                                />
                                <x-input-label for="user" :value="__('User')" class="font-medium cursor-pointer"/>
                            </div>
                        </div>
                    </div>


                    <div>
                        <x-input-label for="address" :value="__('Location')" class="font-medium"/>
                        <div class="mt-1">
                            <select
                                id="address"
                                name="address"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 dark:bg-gray-700 dark:text-gray-100"
                            >
                                <option value="">Select Location</option>
                                @foreach($locations as $location)
                                    <option
                                        value="{{$location->location_name}}"
                                        {{ old('address') == $location->location_name ? 'selected' : '' }}>
                                        {{$location->location_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                    </div>


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

                    <!-- Submit Button -->
                    <div>
                        <x-primary-button class="w-full flex justify-center py-2 px-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 text-white rounded-lg transition duration-200">
                            {{ __('Create Account') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
