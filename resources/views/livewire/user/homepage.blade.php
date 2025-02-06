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
                             src="../../../images/426621632_941485844114069_4585417825702734986_n.jpg" alt="company logo"/>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($datas as $index => $data)
                    <div class="group relative transform transition-all duration-300 hover:-translate-y-4 hover:shadow-2xl">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-{{ ['yellow', 'red', 'blue'][$index % 3] }}-400 to-{{ ['yellow', 'red', 'blue'][$index % 3] }}-600 opacity-50 rounded-3xl blur-lg group-hover:opacity-75 transition duration-300"></div>

                        <div class="relative bg-white p-6 rounded-3xl shadow-lg overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-{{ ['yellow', 'red', 'blue'][$index % 3] }}-100 -rotate-45 translate-x-1/3 -translate-y-1/3"></div>

                            <div class="relative z-10 text-center">
                                <div class="flex justify-center mb-6">
                                    <div class="w-24 h-24 rounded-full border-4 border-{{ ['yellow', 'red', 'blue'][$index % 3] }}-300 overflow-hidden shadow-lg">
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
                                    <span class="text-4xl font-extrabold text-{{ ['yellow', 'red', 'blue'][$index % 3] }}-600">{{ $data->price }}</span>
                                </div>

                                <div class="flex justify-center items-center space-x-2 mb-6">
                                    <span class="text-gray-500 text-lg">Quantity:</span>
                                    <span class="text-2xl font-bold text-gray-800">{{ $data->quantity }}</span>
                                </div>

                                <div class="space-y-3 mb-8">
                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-6 h-6 mr-3 text-{{ ['yellow', 'red', 'blue'][$index % 3] }}-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <span>Quantity: <span class="font-bold text-gray-800">{{$data->quantity}}</span></span>
                                    </div>

                                    @for($i = 1; $i <= 15; $i++)
                                        @if($data->{'adv_'.$i})
                                            <div class="flex items-center text-gray-600">
                                                <svg class="w-6 h-6 mr-3 text-{{ ['yellow', 'red', 'blue'][$index % 3] }}-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span>{{ $data->{'adv_'.$i} }}</span>
                                            </div>
                                        @endif
                                    @endfor
                                </div>

                                <a href="#/" class="group inline-flex items-center justify-center w-full py-4 px-6 bg-gradient-to-r from-{{ ['yellow', 'red', 'blue'][$index % 3] }}-500 to-{{ ['yellow', 'red', 'blue'][$index % 3] }}-600 text-white font-bold rounded-xl transition-all duration-300 hover:shadow-xl hover:scale-105">
                                    Choose Plan
                                    <svg class="ml-3 w-6 h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
