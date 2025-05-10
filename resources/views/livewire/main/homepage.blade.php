<div class="min-h-screen relative overflow-hidden bg-gradient-to-br from-indigo-900 via-purple-800 to-pink-600">
    <!-- Decorative Elements -->
    <div class="absolute inset-0">
        <div
            class="absolute top-20 left-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div
            class="absolute top-40 right-10 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div
            class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <section class="relative py-20 mt-52 px-4 min-h-screen from-gray-900 to-gray-800">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-16">
                <!-- Left Content - Hero Section -->
                <div class="w-full lg:w-1/2 text-center lg:text-left z-10 space-y-8">
                    <div class="space-y-6">
                        <h1 class="text-5xl lg:text-7xl font-black text-white mb-6">
                            ASHANTI
                            <span class="bg-gradient-to-r from-green-400 to-yellow-400 bg-clip-text text-transparent">
                            HOTSPOT
                            </span>
                        </h1>

                        <p class="text-xl text-gray-200 max-w-2xl mx-auto lg:mx-0">
                            Transform your financial future with Ghana's premier data voucher marketplace. Join our
                            network of successful sellers and start earning today.
                        </p>

                        @guest
                            <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                                <button wire:click="toggleModal"
                                   class="group inline-flex items-center px-8 py-4 rounded-full bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold text-lg transition-all hover:shadow-xl hover:shadow-green-400/20">
                                    Become an agent
                                    <svg class="ml-2 w-6 h-6 transform group-hover:translate-x-1 transition-transform"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </button>
                                <a href="{{route('users.home')}}"
                                   class="inline-flex items-center px-8 py-4 rounded-full border-2 border-white text-white font-bold text-lg hover:bg-white hover:text-gray-900 transition-all">
                                    Learn More
                                </a>
                            </div>
                        @endguest

                    </div>
                </div>

                <!-- Right Content - Verify & Purchase Form -->
                <div class="w-full lg:w-1/2 z-10">
                    <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/10">
                        <!-- Verification Section -->
                        <div class="mb-12 text-center">
                            <h2 class="text-3xl font-bold text-white mb-4">Verify Your Voucher</h2>
                            <p class="text-gray-300 mb-6">Check the authenticity of your voucher instantly</p>
                            <a href="#"
                               class="inline-block px-8 py-4 rounded-xl bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold text-lg transition-all hover:shadow-xl hover:scale-105">
                                Verify Now
                            </a>
                        </div>

                        <!-- Success Message -->
                        @if (session()->has('message'))
                            <div
                                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md mb-8">
                                {{ session('message') }}
                            </div>
                        @endif

                        <!-- Purchase Form -->
                        <form class="bg-white rounded-2xl overflow-hidden shadow-xl" wire:submit="create">
                            <div class="bg-gradient-to-r from-green-400 to-yellow-400 p-6">
                                <h2 class="text-2xl font-bold text-gray-900 text-center">Purchase Data Package</h2>
                            </div>

                            <div class="p-8 space-y-6">
                                @if($currentStep == 1)
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Select Duration <span class="text-red-500">*</span>
                                        </label>
                                        <select wire:model="duration"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                                            <option value="">Choose your package</option>
                                            <option value="Daily">Daily</option>
                                            <option value="Weekly">Weekly</option>
                                            <option value="Monthly">Monthly</option>
                                        </select>
                                        @error('duration')
                                        <p class="text-red-600 text-sm">{{$message}}</p>
                                        @enderror

                                        <label class="block text-sm font-medium text-gray-700">
                                            Select Agent <span class="text-red-500">*</span>
                                        </label>
                                        <select wire:model="agent"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                                            <option value="">Select Agent</option>
                                            <option value="No Agent">No Agent</option>

                                        @foreach($agents as $agent)
                                            <option value="{{$agent->username}}">{{$agent->username}}</option>
                                            @endforeach
                                        </select>
                                        @error('agent')
                                        <p class="text-red-600 text-sm">{{$message}}</p>
                                        @enderror
                                        <button type="button"
                                                wire:click="nextStep"
                                                class="w-full py-4 bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold rounded-lg hover:shadow-lg transition-all duration-300">
                                            Next
                                        </button>
                                    </div>
                                @endif
                                @if($currentStep == 2)
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Phone Number <span class="text-red-500">*</span>
                                        </label>
                                        <input wire:model="number"
                                               type="tel"
                                               placeholder="Enter your phone number"
                                               class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all"
                                        >
                                        @error('number')
                                        <p class="text-red-600 text-sm">{{$message}}</p>
                                        @enderror
                                        <p class="text-sm text-gray-500">You'll receive the voucher PIN via SMS for
                                            payment</p>

                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Select Package <span class="text-red-500">*</span>
                                            </label>

                                            @if($duration == "Daily")
                                                <select wire:model="package"
                                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                                                    <option value="">Choose your package</option>
                                                    @foreach($datas as $data)
                                                        <option value="{{$data->price}}">{{$data->quantity}}GB -
                                                            GHC {{$data->price}}</option>
                                                    @endforeach
                                                </select>
                                            @elseif($duration == "Weekly")
                                                <select wire:model="package"
                                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                                                    <option value="">Choose your package</option>
                                                    @foreach($weekly as $data)
                                                        <option value="{{$data->price}}">{{$data->quantity}}GB -
                                                            GHC {{$data->price}}</option>
                                                    @endforeach
                                                </select>
                                            @elseif($duration == "Monthly")
                                                <select wire:model="package"
                                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                                                    <option value="">Choose your package</option>
                                                    @foreach($monthly as $data)
                                                        <option value="{{$data->price}}">{{$data->quantity}}GB -
                                                            GHC {{$data->price}}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <select wire:model="package"
                                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all"
                                                        disabled>
                                                    <option value="">Please select a duration first</option>
                                                </select>
                                            @endif

                                            @error('package')
                                            <p class="text-red-600 text-sm">{{$message}}</p>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <button type="button"
                                                wire:click="previousStep"
                                                class="w-full py-4 bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold rounded-lg hover:shadow-lg transition-all duration-300">
                                            Previous
                                        </button>
                                        <button type="submit"
                                                class="w-full py-4 bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold rounded-lg hover:shadow-lg transition-all duration-300">
                                            Purchase Now
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>


                    @if($modal)
                        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <!-- Backdrop with improved opacity and blur effect -->
                            <div class="fixed inset-0 bg-gray-900/75 backdrop-blur-sm transition-opacity" aria-hidden="true"></div>

                            <!-- Modal positioning -->
                            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                                <!-- Modal container with improved animation -->
                                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg animate-fadeIn">
                                    <!-- Close button at the top right -->
                                    <button wire:click="closeModal" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none z-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>

                                    <!-- Form container -->
                                    <form class="bg-white rounded-2xl overflow-hidden" wire:submit="createAgent">

                                        @if (session()->has('message'))
                                            <div
                                                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md mb-8">
                                                {{ session('message') }}
                                            </div>
                                        @endif
                                        <!-- Header with gradient and icon -->
                                        <div class="relative bg-gradient-to-r from-green-400 to-yellow-400 p-6">
                                            <div class="flex items-center justify-center mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white bg-green-500/20 p-2 rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                            </div>
                                            <h2 class="text-2xl font-bold text-gray-900 text-center">Become An Agent</h2>
                                            <p class="text-gray-800/80 text-center mt-1">Join our network of successful agents</p>
                                        </div>

                                        <!-- Form fields with improved spacing and visual feedback -->
                                        <div class="p-8 space-y-5">
                                            <!-- Progress indicator -->
                                            <div class="flex justify-center mb-2">
                                                <div class="h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                                                    <div class="h-full bg-gradient-to-r from-green-400 to-yellow-400 w-1/3 rounded-full transition-all duration-300"></div>
                                                </div>
                                            </div>

                                            <!-- Two-column layout for first name and last name -->
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                <div class="space-y-1">
                                                    <label class="block text-sm font-medium text-gray-700">
                                                        First Name <span class="text-red-500">*</span>
                                                    </label>
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                            </svg>
                                                        </div>
                                                        <input wire:model="firstname"
                                                               type="text"
                                                               placeholder="First name"
                                                               class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all"
                                                        >
                                                    </div>
                                                    @error('firstname')
                                                    <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                                                    @enderror
                                                </div>

                                                <div class="space-y-1">
                                                    <label class="block text-sm font-medium text-gray-700">
                                                        Last Name <span class="text-red-500">*</span>
                                                    </label>
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                            </svg>
                                                        </div>
                                                        <input wire:model="lastname"
                                                               type="text"
                                                               placeholder="Last name"
                                                               class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all"
                                                        >
                                                    </div>
                                                    @error('lastname')
                                                    <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="space-y-1">
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Phone Number <span class="text-red-500">*</span>
                                                </label>
                                                <div class="relative">
                                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                        </svg>
                                                    </div>
                                                    <input wire:model="phone"
                                                           type="tel"
                                                           placeholder="e.g., 024 123 4567"
                                                           class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all"
                                                    >
                                                </div>
                                                @error('phone')
                                                <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="space-y-1">
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Email <span class="text-red-500">*</span>
                                                </label>
                                                <div class="relative">
                                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                    <input wire:model="email"
                                                           type="email"
                                                           placeholder="your.email@example.com"
                                                           class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all"
                                                    >
                                                </div>
                                                @error('email')
                                                <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="space-y-1">
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Username <span class="text-red-500">*</span>
                                                </label>
                                                <div class="relative">
                                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                                        </svg>
                                                    </div>
                                                    <input wire:model="username"
                                                           type="text"
                                                           placeholder="Choose a username"
                                                           class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all"
                                                    >
                                                </div>
                                                @error('username')
                                                <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <!-- Terms and conditions checkbox -->
                                            <div class="flex items-start mt-4">
                                                <div class="flex items-center h-5">
                                                    <input wire:model="agreeTerms" id="terms" type="checkbox" class="h-4 w-4 text-green-500 border-gray-300 rounded focus:ring-green-400">
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="terms" class="font-medium text-gray-700">I agree to the <a href="#" class="text-green-500 hover:text-green-600">Terms and Conditions</a></label>
                                                    @error('agreeTerms')
                                                    <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Action buttons -->
                                            <div class="flex flex-col sm:flex-row gap-3 mt-6">
                                                <button wire:click="closeModal" type="button" class="w-full sm:w-1/3 py-3 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-all duration-300 flex justify-center items-center">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="w-full sm:w-2/3 py-3 bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold rounded-lg hover:shadow-lg transition-all duration-300 flex justify-center items-center group">
                                                    Register
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
