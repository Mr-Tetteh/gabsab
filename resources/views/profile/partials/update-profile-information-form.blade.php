<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="first_name" :value="__('First Name')"/>
            <x-text-input id="first_name" name="first_name" type="text" class="appearance-none rounded-md relative
            block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 placeholder-gray-500 text-gray-900
             dark:text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm
              dark:bg-gray-700"

                          :value="old('first_name', $user->first_name)" required autofocus autocomplete="name"/>
            <x-input-error
                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 placeholder-gray-500 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm dark:bg-gray-700"
                :messages="$errors->get('first_name')"/>
        </div>

        <div>
            <x-input-label for="last_name" :value="__('Last Name')"/>
            <x-text-input id="last_name" name="last_name" type="text" class="appearance-none rounded-md relative
            block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 placeholder-gray-500 text-gray-900
            dark:text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm dark:bg-gray-700"

                          :value="old('last_name', $user->last_name)" required autofocus autocomplete="name"/>
            <x-input-error
                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 placeholder-gray-500 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm dark:bg-gray-700"
                :messages="$errors->get('last_name')"/>
        </div>

        <div>
            <x-input-label for="contact" :value="__('Contact')"/>
            <x-text-input id="contact" name="contact" type="tel" class="appearance-none rounded-md relative block
            w-full px-3 py-2 border border-gray-300 dark:border-gray-700 placeholder-gray-500 text-gray-900
             dark:text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10
             sm:text-sm dark:bg-gray-700"

                          :value="old('contact', $user->contact)" required autofocus autocomplete="tel"/>
            <x-input-error class="mt-2" :messages="$errors->get('contact')"/>
        </div>

        <div>
            <x-input-label for="contact" :value="__('Address')"/>
            <x-text-input id="contact" name="address" type="text" class="appearance-none rounded-md relative block
            w-full px-3 py-2 border border-gray-300 dark:border-gray-700 placeholder-gray-500 text-gray-900
             dark:text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10
             sm:text-sm dark:bg-gray-700"

                          :value="old('address', $user->address)" required autofocus autocomplete="text"/>
            <x-input-error class="mt-2" :messages="$errors->get('address')"/>
        </div>


        <div>
            <x-input-label for="gender" :value="__('Gender')"/>
            <select id="gender" name="gender" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700
        rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700
        dark:text-gray-100 sm:text-sm">
                <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('gender')"/>
        </div>

        <div>
            <x-input-label for="date_of_birth" :value="__('Date of Birth')"/>
            <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="appearance-none rounded-md relative
             block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 placeholder-gray-500 text-gray-900
             dark:text-gray-100 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm
             dark:bg-gray-700"

                          :value="old('date_of_birth', $user->date_of_birth)" required autofocus/>
            <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')"/>
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" name="email" type="email" class="appearance-none rounded-md relative block w-full
             px-3 py-2 border border-gray-300 dark:border-gray-700 placeholder-gray-500 text-gray-900 dark:text-gray-100
              focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm dark:bg-gray-700"

                          :value="old('email', $user->email)" required autocomplete="username"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')"/>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
