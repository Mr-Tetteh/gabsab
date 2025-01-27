<div class="min-h-screen relative overflow-hidden bg-gradient-to-br from-indigo-900 via-purple-800 to-pink-600">
<!-- Decorative Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-72 h-72 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-40 right-10 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-indigo-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>


    <section class="relative py-80 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
                <!-- Left Content -->
                <div class="w-full lg:w-1/2 text-center lg:text-left z-10">
                    <h1 class="text-5xl lg:text-7xl font-black text-white mb-6">
                         ASHANTI
                        <span class="bg-gradient-to-r from-green-400 to-yellow-400 bg-clip-text text-transparent">
                            HOTSPOT
                            </span>
                    </h1>
                    <p class="text-xl text-gray-100 mb-8 max-w-2xl">
                        Transform your financial future! Join our network of successful voucher card sellers and start earning today. Easy registration, instant rewards.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{route('login')}}" class="inline-flex items-center px-8 py-4 rounded-full bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold text-lg transform transition hover:scale-105 hover:shadow-2xl">
                            Start Earning Now
                            <svg class="ml-2 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="{{route('users.home')}}" class="inline-flex items-center px-8 py-4 rounded-full border-2 border-white text-white font-bold text-lg hover:bg-white hover:text-gray-900 transition-colors">
                            Learn More
                        </a>
                    </div>
                </div>

                <!-- Right Content -->
                <div class="w-full lg:w-1/2 z-10">
                    <div class="bg-white/10 backdrop-blur-xl rounded-2xl p-8 shadow-2xl float-animation">
                        <h2 class="text-3xl font-bold text-white mb-8">Verify Voucher</h2>
                        <form class="space-y-6">
                            <div>
                                <label class="block text-white text-sm font-medium mb-2">Voucher PIN</label>
                                <input
                                    type="text"
                                    class="w-full px-6 py-4 rounded-xl bg-white/20 border border-white/30 text-white placeholder-white/50 focus:ring-4 focus:ring-green-400/30 focus:border-green-400 transition-all"
                                    placeholder="Enter your 16-digit voucher PIN"
                                />
                            </div>
                            <button
                                type="submit"
                                class="w-full py-4 rounded-xl bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold text-lg transform transition hover:scale-105 hover:shadow-xl"
                            >
                                Verify Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
