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


    <section class="relative py-20 mt-20 px-4 min-h-screen  from-gray-900 to-gray-800">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-16">
                <!-- Left Content - Hero Section -->
                <div class="w-full lg:w-1/2 text-center lg:text-left z-10 -py-60 space-y-32">
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

                        @guest()
                            <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                                <a href="{{route('login')}}"
                                   class="group inline-flex items-center px-8 py-4 rounded-full bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold text-lg transition-all hover:shadow-xl hover:shadow-green-400/20">
                                    Start Selling
                                    <svg class="ml-2 w-6 h-6 transform group-hover:translate-x-1 transition-transform"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                                <a href="{{route('users.home')}}"
                                   class="inline-flex items-center px-8 py-4 rounded-full border-2 border-white text-white font-bold text-lg hover:bg-white hover:text-gray-900 transition-all">
                                    Learn More
                                </a>
                            </div>
                        @endguest

                        <!-- Added "For better user experience" section -->
                        <div class="mt-12 space-y-4">
                            <div class="flex items-center justify-center lg:justify-start gap-3 text-gray-200">
                                <span class="text-xl">For better user experience, Click here</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                     class="w-8 h-8 fill-current animate-bounce">
                                    <path d="M2 334.5c-3.8 8.8-2 19 4.6 26l136 144c4.5 4.8 10.8 7.5 17.4 7.5s12.9-2.7 17.4-7.5l136-144c6.6-7 8.4-17.2 4.6-26s-12.5-14.5-22-14.5l-72 0 0-288c0-17.7-14.3-32-32-32L128 0C110.3 0 96 14.3 96 32l0 288-72 0c-9.6 0-18.2 5.7-22 14.5z"/>
                                </svg>
                            </div>

                            @guest()
                                <div class="flex justify-center lg:justify-start">
                                    <a href="{{route('login')}}"
                                       class="group inline-flex items-center px-8 py-4 rounded-full bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold text-lg transition-all hover:shadow-xl hover:shadow-green-400/20">
                                        Sign Up Now
                                        <svg class="ml-2 w-6 h-6 transform group-hover:translate-x-1 transition-transform"
                                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>

                <!-- Right Content - Verify & Purchase Form -->
                <div class="w-full lg:w-1/2 z-10 ">
                    <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/10">
                        <!-- Verification Section -->
                        <div class="mb-12 text-center">
                            <h2 class="text-3xl font-bold text-white mb-4">Verify Your Voucher</h2>
                            <p class="text-gray-300 mb-6">Check the authenticity of your voucher instantly</p>
                            <a href=""
                               class="inline-block px-8 py-4 rounded-xl bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold text-lg transition-all hover:shadow-xl hover:scale-105">
                                Verify Now
                            </a>
                        </div>

                        <!-- Success Message -->
                        @if (session()->has('message'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md mb-8">
                                {{ session('message') }}
                            </div>
                        @endif

                        <!-- Purchase Form -->
                        <form class="bg-white rounded-2xl overflow-hidden shadow-xl" wire:submit="create">
                            <div class="bg-gradient-to-r from-green-400 to-yellow-400 p-6">
                                <h2 class="text-2xl font-bold text-gray-900 text-center">Purchase Data Package</h2>
                            </div>

                            <div class="p-8 space-y-6">
                                <!-- Data Package Selection -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Select Package <span class="text-red-500">*</span>
                                    </label>
                                    <select wire:model="package"
                                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                                        <option value="">Choose your package</option>
                                        <option value="50">30 GB - GHC 50</option>
                                        <option value="100">50 GB - GHC 100</option>
                                        <option value="200">100 GB - GHC 200</option>
                                    </select>
                                    @error('package')
                                    <p class="text-red-600 text-sm">{{$message}}</p>
                                    @enderror
                                </div>

                                <!-- Phone Number -->
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

                                <!-- Submit Button -->
                                <button type="submit"
                                        class="w-full py-4 bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold rounded-lg hover:shadow-lg transition-all duration-300">
                                    Purchase Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
