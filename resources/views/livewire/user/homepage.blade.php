@php use Illuminate\Support\Facades\Auth; @endphp
<div class="min-h-screen w-full bg-gradient-to-b from-gray-50 to-white motion-preset-blur-right motion-duration-2000">
    <section class="relative overflow-hidden py-20 ">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col items-center lg:flex-row lg:justify-between lg:space-x-12">
                <div class="w-full text-center lg:w-1/2 lg:text-left">
                    <h1 class="bg-gradient-to-r from-green-400 to-yellow-500 bg-clip-text text-4xl font-bold tracking-tight text-transparent sm:text-5xl lg:text-6xl">
                        GABSAB IT SERVICES
                    </h1>
                    <p class="mt-6 text-lg text-gray-600">
                        Welcome to GABSAB IT Services, your trusted partner in delivering
                        cutting-edge internet solutions across Ghana. We are more than just an
                        IT firm; we are a team of dedicated professionals committed to revolutionizing
                        the way you stay connected. Our fast and reliable internet services are designed
                        to meet the demands of modern businesses, families, and individuals, ensuring
                        seamless communication and productivity. At GABSAB, we pride ourselves on innovation,
                        customer satisfaction, and a relentless pursuit of excellence. Whether you're streaming,
                        working, or connecting with loved ones, count on us to deliver an experience that
                        is not just reliable but extraordinary. Join us as we bridge the digital gap and
                        power your world with unparalleled connectivity.
                    </p>


                    <a class="group mt-8 inline-flex items-center space-x-2 rounded-full bg-teal-500 px-8 py-4 text-white transition-all hover:bg-teal-600"
                       href="#">
                        Register With Us
                        <svg class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" fill="none"
                             stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="mt-12 w-full lg:mt-0 lg:w-1/2">
                    <div class="relative">
                        <img class="w-full rounded-xl object-cover shadow-2xl"
                             src="../../../images/426621632_941485844114069_4585417825702734986_n.jpg"
                             alt="company logo"/>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto px-4">
            <p class="bg-gradient-to-r from-green-400 to-yellow-500 bg-clip-text text-3xl font-bold tracking-tight
            text-transparent sm:text-5xl lg:text-6xl text-gray-800 mb-10 justify-center ml-10 lg:ml-96 lg:px-52" >Our Flexible plans</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($datas as $index => $data)
                    <div
                        class="group relative transform transition-all duration-300 hover:-translate-y-4 hover:shadow-2xl">
                        <div
                            class="absolute -inset-0.5 bg-gradient-to-r from-{{ ['red', 'yellow', 'blue'][$index % 3] }}-400 to-{{ ['red', 'yellow', 'blue'][$index % 3] }}-600 opacity-50 rounded-3xl blur-lg group-hover:opacity-75 transition duration-300"></div>

                        <div class="relative bg-white p-6 rounded-3xl shadow-lg overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-32 h-32 bg-{{ ['red', 'yellow', 'blue'][$index % 3] }}-100 -rotate-45 translate-x-1/3 -translate-y-1/3"></div>

                            <div class="relative z-10 text-center">
                                <div class="flex justify-center mb-6">
                                    <div
                                        class="w-24 h-24 rounded-full border-4 border-{{ ['red', 'yellow', 'blue'][$index % 3] }}-300 overflow-hidden shadow-lg">
                                        <img
                                            src="https://res.cloudinary.com/williamsondesign/abstract-1.jpg"
                                            alt="{{ $data->name }}"
                                            class="w-full h-full object-cover"
                                        />
                                    </div>
                                </div>

                                <h3 class="text-3xl font-bold text-gray-800 mb-4">{{ $data->name }}</h3>

                                <div class="flex justify-center items-center space-x-2 mb-4">
                                    <span class="text-gray-500 text-xl">GHC</span>
                                    <span
                                        class="text-4xl font-extrabold text-{{ ['red', 'yellow', 'blue'][$index % 3] }}-600">{{ $data->price }}</span>
                                </div>

                                <div class="flex justify-center items-center space-x-2 mb-6">
                                    <span class="text-gray-500 text-lg">Quantity:</span>
                                    <span class="text-2xl font-bold text-gray-800">{{ $data->quantity }}</span>
                                </div>

                                <div class="space-y-3 mb-8">
                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-6 h-6 mr-3 text-{{ ['red', 'yellow', 'blue'][$index % 3] }}-500"
                                             fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span>Quantity: <span class="font-bold text-gray-800">{{$data->quantity}}</span></span>
                                    </div>

                                    @for($i = 1; $i <= 15; $i++)
                                        @if($data->{'adv_'.$i})
                                            <div class="flex items-center text-gray-600">
                                                <svg
                                                    class="w-6 h-6 mr-3 text-{{ ['red', 'yellow', 'blue'][$index % 3] }}-500"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span>{{ $data->{'adv_'.$i} }}</span>
                                            </div>
                                        @endif
                                    @endfor
                                </div>

                                @if(Auth::user())

                                    <a href="{{route('admin.buy-data')}}"
                                       class="group inline-flex items-center justify-center w-full py-4 px-6 bg-gradient-to-r from-{{ ['red', 'yellow', 'blue'][$index % 3] }}-500 to-{{ ['red', 'yellow', 'blue'][$index % 3] }}-600 text-white font-bold rounded-xl transition-all duration-300 hover:shadow-xl hover:scale-105">
                                        Choose Plan
                                        <svg
                                            class="ml-3 w-6 h-6 transform group-hover:translate-x-1 transition-transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </a>
                                @else
                                    <a href="{{route('dashboard')}}"
                                       class="group inline-flex items-center justify-center w-full py-4 px-6 bg-gradient-to-r from-{{ ['red', 'yellow', 'blue'][$index % 3] }}-500 to-{{ ['red', 'yellow', 'blue'][$index % 3] }}-600 text-white font-bold rounded-xl transition-all duration-300 hover:shadow-xl hover:scale-105">
                                        Choose Plan
                                        <svg
                                            class="ml-3 w-6 h-6 transform group-hover:translate-x-1 transition-transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="bg-gradient-to-r from-green-400 to-yellow-500 bg-clip-text text-3xl font-bold tracking-tight
            text-transparent sm:text-5xl lg:text-4xl text-gray-800 mb-10 justify-center ml-10 lg:ml-96 lg:px-52 p-5" >Our Contract Plans</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($datum as $index => $data)
                    <div
                        class="group relative transform transition-all duration-300 hover:-translate-y-4 hover:shadow-2xl">
                        <div
                            class="absolute -inset-0.5 bg-gradient-to-r from-{{ ['fuchsia', 'violet', 'zinc', 'cyan'][$index % 3] }}-400 to-{{ ['fuchsia', 'violet', 'zinc', 'cyan'][$index % 3] }}-600 opacity-50 rounded-3xl blur-lg group-hover:opacity-75 transition duration-300"></div>

                        <div class="relative bg-white p-6 rounded-3xl shadow-lg overflow-hidden">
                            <div
                                class="absolute top-0 right-0 w-32 h-32 bg-{{ ['fuchsia', 'violet', 'zinc', 'cyan'][$index % 3] }}-100 -rotate-45 translate-x-1/3 -translate-y-1/3"></div>

                            <div class="relative z-10 text-center">
                                <div class="flex justify-center mb-6">
                                    <div
                                        class="w-24 h-24 rounded-full border-4 border-{{ ['fuchsia', 'violet', 'zinc', 'cyan'][$index % 3] }}-300 overflow-hidden shadow-lg">
                                        <img
                                            src="https://res.cloudinary.com/williamsondesign/abstract-1.jpg"
                                            alt="{{ $data->name }}"
                                            class="w-full h-full object-cover"
                                        />
                                    </div>
                                </div>

                                <h3 class="text-3xl font-bold text-gray-800 mb-4">{{ $data->name }}</h3>

                                <div class="flex justify-center items-center space-x-2 mb-4">
                                    <span class="text-gray-500 text-xl">GHC</span>
                                    <span
                                        class="text-4xl font-extrabold text-{{ ['fuchsia', 'violet', 'zinc', 'cyan'][$index % 3] }}-600">{{ $data->price }}</span>
                                </div>

                                <div class="flex justify-center items-center space-x-2 mb-6">
                                    <span class="text-gray-500 text-lg">Quantity:</span>
                                    <span class="text-2xl font-bold text-gray-800">{{ $data->quantity }}</span>
                                </div>

                                <div class="space-y-3 mb-8">
                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-6 h-6 mr-3 text-{{ ['fuchsia', 'violet', 'zinc', 'cyan'][$index % 3] }}-500"
                                             fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span>Quantity: <span class="font-bold text-gray-800">{{$data->quantity}}</span></span>
                                    </div>

                                    @for($i = 1; $i <= 15; $i++)
                                        @if($data->{'advantage_'.$i})
                                            <div class="flex items-center text-gray-600">
                                                <svg
                                                    class="w-6 h-6 mr-3 text-{{ ['fuchsia', 'violet', 'zinc', 'cyan'][$index % 3] }}-500"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span>{{ $data->{'advantage_'.$i} }}</span>
                                            </div>
                                        @endif
                                    @endfor
                                </div>

                                    <button  wire:click="toggleModal" class="contract group inline-flex items-center justify-center w-full py-4 px-6 bg-gradient-to-r from-{{ ['fuchsia', 'yellow', 'zinc', 'cyan'][$index % 4] }}-500 to-{{ ['fuchsia', 'yellow', 'zinc', 'cyan'][$index % 4] }}-600 text-white font-bold rounded-xl transition-all duration-300 hover:shadow-xl hover:scale-105">
                                        Choose Plan
                                        <svg
                                            class="ml-3 w-6 h-6 transform group-hover:translate-x-1 transition-transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </button>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>


            @if($modal)
                <div class="relative z-10 modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity"></div>

                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex min-h-full items-center justify-center p-4">
                            <div class="relative transform  md:mb-4 overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">
                                <!-- Modal Header -->
                                <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-4">
                                    <h2 class="text-2xl font-bold text-white">Contract Request Form</h2>
                                    <p class="text-blue-100 mt-1">Please fill out the details below to proceed with your contract request</p>
                                </div>

                                <div class="bg-white px-6 py-6">
                                    <form class="space-y-6" wire:submit="create">
                                        <!-- Success Message -->
                                        @if (session()->has('message'))
                                            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6">
                                                <div class="flex">
                                                    <div class="flex-shrink-0">
                                                        <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm text-green-700">{{ session('message') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Form Grid -->
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <!-- First Name -->
                                            <div class="space-y-2">
                                                <label class="text-sm font-medium text-gray-700 flex items-center">
                                                    First Name
                                                    <span class="text-red-500 ml-1"></span>
                                                </label>
                                                <div class="relative rounded-lg shadow-sm">
                                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                                            <circle cx="12" cy="7" r="4"/>
                                                        </svg>
                                                    </div>
                                                    <input type="text" wire:model="first_name"
                                                           class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                           placeholder="Daniel">
                                                </div>
                                                @error('first_name')
                                                <p class="text-sm text-red-600">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <!-- Last Name -->
                                            <div class="space-y-2">
                                                <label class="text-sm font-medium text-gray-700 flex items-center">
                                                    Last Name
                                                    <span class="text-red-500 ml-1"></span>
                                                </label>
                                                <div class="relative rounded-lg shadow-sm">
                                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                                            <circle cx="12" cy="7" r="4"/>
                                                        </svg>
                                                    </div>
                                                    <input type="text" wire:model="last_name"
                                                           class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                           placeholder="Tetteh">
                                                </div>
                                                @error('last_name')
                                                <p class="text-sm text-red-600">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <!-- Email -->
                                            <div class="space-y-2">
                                                <label class="text-sm font-medium text-gray-700 flex items-center">
                                                    Email Address
                                                    <span class="text-red-500 ml-1"></span>
                                                </label>
                                                <div class="relative rounded-lg shadow-sm">
                                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                            <path d="M22 7L12 13 2 7"/>
                                                            <rect width="20" height="16" x="2" y="4" rx="2"/>
                                                        </svg>
                                                    </div>
                                                    <input type="email" wire:model="email"
                                                           class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                           placeholder="john@example.com">
                                                </div>
                                                @error('email')
                                                <p class="text-sm text-red-600">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <!-- Phone -->
                                            <div class="space-y-2">
                                                <label class="text-sm font-medium text-gray-700 flex items-center">
                                                    Phone Number
                                                    <span class="text-gray-400 ml-1 text-xs"></span>
                                                </label>
                                                <div class="relative rounded-lg shadow-sm">
                                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/>
                                                        </svg>
                                                    </div>
                                                    <input type="tel" wire:model="phone"
                                                           class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                           placeholder="(233) XXX-XXXX">
                                                </div>
                                                @error('phone')
                                                <p class="text-sm text-red-600">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <!-- Location -->
                                            <div class="space-y-2">
                                                <label class="text-sm font-medium text-gray-700 flex items-center">
                                                    Location
                                                    <span class="text-gray-400 ml-1 text-xs"></span>
                                                </label>
                                                <div class="relative rounded-lg shadow-sm">
                                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                            <path d="M12 21s-8-4.5-8-11a8 8 0 1116 0c0 6.5-8 11-8 11z"/>
                                                            <circle cx="12" cy="10" r="3"/>
                                                        </svg>
                                                    </div>
                                                    <input type="text" wire:model="location"
                                                           class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                           placeholder="Enter your location">
                                                </div>
                                                @error('location')
                                                <p class="text-sm text-red-600">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <!-- Ghana Post GPS -->
                                            <div class="space-y-2">
                                                <label class="text-sm font-medium text-gray-700 flex items-center">
                                                    Ghana Post GPS
                                                    <span class="text-gray-400 ml-1 text-xs"></span>
                                                </label>
                                                <div class="relative rounded-lg shadow-sm">
                                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                                                            <circle cx="12" cy="10" r="3"/>
                                                        </svg>
                                                    </div>
                                                    <input type="text" wire:model="ghana_post_gps"
                                                           class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                           placeholder="Enter Ghana Post GPS">
                                                </div>
                                                @error('ghana_post_gps')
                                                <p class="text-sm text-red-600">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <!-- Contract Type -->
                                            <div class="space-y-2 md:col-span-2">
                                                <label class="text-sm font-medium text-gray-700 flex items-center">
                                                    Contract Type
                                                    <span class="text-red-500 ml-1"></span>
                                                </label>
                                                <select wire:model="contract_type"
                                                        class="block w-full px-4 py-2.5 text-gray-900 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                                    <option disabled selected>Select a contract type</option>
                                                    @foreach($datum as $data)
                                                        <option value="{{$data->name}}">{{$data->name}} - GHC {{$data->price}}</option>
                                                    @endforeach
                                                </select>
                                                @error('contract_type')
                                                <p class="text-sm text-red-600">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <!-- Additional Info -->
                                            <div class="space-y-2 md:col-span-2">
                                                <label class="text-sm font-medium text-gray-700 flex items-center">
                                                    Additional Information
                                                    <span class="text-red-500 ml-1"></span>
                                                </label>
                                                <textarea wire:model="additional_info" rows="4"
                                                          class="block w-full px-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                                          placeholder="Please provide any additional information..."></textarea>
                                            </div>
                                        </div>

                                        <!-- Submit Buttons -->
                                        <div class="flex items-center justify-end space-x-4 mt-8 pt-4 border-t">
                                            <button type="button" wire:click="closeModal"
                                                    class="px-6 py-2.5 text-sm font-medium text-gray-700 hover:text-gray-800 transition-colors duration-200">
                                                Cancel
                                            </button>
                                            <button type="submit"
                                                    class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all duration-200 flex items-center space-x-2 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                                <span>Submit Request</span>
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                    <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>


