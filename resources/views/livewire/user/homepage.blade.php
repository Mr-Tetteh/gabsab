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

    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($datas as $index => $data)
                    <div class="w-full min-h-[200px] p-2 bg-{{ ['yellow-100', 'red-100', 'blue-100'][$index % 3] }} shadow-xl rounded-3xl flex flex-col items-center text-center">
                        <div class="mb-7 pb-7 flex flex-col items-center border-b border-gray-300">
                            <img src="https://res.cloudinary.com/williamsondesign/abstract-1.jpg" class="rounded-3xl w-20 h-20" />
                            <div class="mt-5 space-x-4">
                                <span class="block text-2xl font-semibold">{{ $data->name }}</span>
                                <span><span class="font-medium  text-gray-500 text-xl align-top">GHC&thinsp;</span><span class="text-3xl font-bold">{{ $data->price }}</span></span>
                            </div>

                            <div class="mt-5">
                                <span><span class="font-medium text-gray-500 text-xl align-top">Quantity &thinsp;</span><span class="text-2xl font-bold">{{ $data->quantity }}</span></span>
                            </div>
                        </div>
                        <ul class="mb-7 font-medium text-gray-500 flex-grow">
                            <li class="flex text-lg mb-2">
                                <img src="https://res.cloudinary.com/williamsondesign/check-grey.svg" />
                                <span class="ml-3">Quantity <span class="text-black">{{$data->quantity}}</span></span>
                            </li>
                            @for($i = 1; $i <= 15; $i++)
                            <li class="flex text-lg mb-2">
                                <img src="https://res.cloudinary.com/williamsondesign/check-grey.svg" />
                                <span class="ml-3"> <span class="text-black">{{$data->{'adv_'.$i} }}</span></span>
                            </li>
                            @endfor

                        </ul>
                        <a href="#/" class="flex justify-center items-center bg-indigo-600 rounded-xl py-5 px-4 text-center text-white text-xl mt-auto">
                            Choose Plan
                            <img src="https://res.cloudinary.com/williamsondesign/arrow-right.svg" class="ml-2" />
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section></div>
