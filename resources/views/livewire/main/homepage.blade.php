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
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <button type="button"
                                                wire:click="previousStep"
                                                class="w-full py-4 bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold rounded-lg hover:shadow-lg transition-all duration-300">
                                            Previous
                                        </button>
                                        <button type="button"
                                                wire:click="nextStep"
                                                class="w-full py-4 bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold rounded-lg hover:shadow-lg transition-all duration-300">
                                            Next
                                        </button>
                                    </div>
                                @endif
                                @if($currentStep == 3)
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
                    <div  class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

                        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">

                                                <form class="bg-white rounded-2xl overflow-hidden shadow-xl" wire:submit="create">
                                                    <div class="bg-gradient-to-r from-green-400 to-yellow-400 p-6">
                                                        <h2 class="text-2xl font-bold text-gray-900 text-center">Become An Agent</h2>
                                                    </div>
                                                    <div class="p-8 space-y-6">
                                                        <div class="space-y-2">
                                                            <label class="block text-sm font-medium text-gray-700">
                                                                Phone Number <span class="text-red-500">*</span>
                                                            </label>
                                                            <input wire:model="number"
                                                                   type="text"
                                                                   placeholder="Enter your first name"
                                                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all"
                                                            >
                                                            @error('number')
                                                            <p class="text-red-600 text-sm">{{$message}}</p>
                                                            @enderror

                                                        </div>


                                                        <div class="space-y-2">
                                                            <label class="block text-sm font-medium text-gray-700">
                                                                Last Name <span class="text-red-500">*</span>
                                                            </label>
                                                            <input wire:model="number"
                                                                   type="text"
                                                                   placeholder="Enter your last name"
                                                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all"
                                                            >
                                                            @error('number')
                                                            <p class="text-red-600 text-sm">{{$message}}</p>
                                                            @enderror

                                                        </div>


                                                        <div class="space-y-2">
                                                            <label class="block text-sm font-medium text-gray-700">
                                                                Phone Number <span class="text-red-500">*</span>
                                                            </label>
                                                            <input wire:model="number"
                                                                   type="text"
                                                                   placeholder="Enter your number"
                                                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all"
                                                            >
                                                            @error('number')
                                                            <p class="text-red-600 text-sm">{{$message}}</p>
                                                            @enderror

                                                        </div>



                                                        <div class="space-y-2">
                                                            <label class="block text-sm font-medium text-gray-700">
                                                                Email <span class="text-red-500">*</span>
                                                            </label>
                                                            <input wire:model="number"
                                                                   type="email"
                                                                   placeholder="Enter your email"
                                                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all"
                                                            >
                                                            @error('number')
                                                            <p class="text-red-600 text-sm">{{$message}}</p>
                                                            @enderror

                                                        </div>

                                                        <div class="space-y-2">
                                                            <label class="block text-sm font-medium text-gray-700">
                                                                Username <span class="text-red-500">*</span>
                                                            </label>
                                                            <input wire:model="number"
                                                                   type="text"
                                                                   placeholder="Enter your Username"
                                                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all"
                                                            >
                                                            @error('number')
                                                            <p class="text-red-600 text-sm">{{$message}}</p>
                                                            @enderror

                                                        </div>

                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                        <button type="button" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">Deactivate</button>
                                        <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs ring-1 ring-gray-300 ring-inset hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
</div>
