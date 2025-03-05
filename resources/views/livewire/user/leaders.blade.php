@php use Illuminate\Support\Facades\Storage; @endphp
    <div class="container mx-auto px-4">
        <div class="bg-white py-24 sm:py-32">
            <div class="mx-auto grid max-w-7xl gap-20 px-6 lg:px-8 xl:grid-cols-3">
                <div class="max-w-xl">
                    <h2 class="text-3xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-4xl">Our
                        Leadership Team
                    </h2>
                    <p class="mt-6 text-lg/8 text-gray-600">At the heart of our organization are innovative leaders who
                        combine expertise, passion, and a commitment to excellence. We're driven by a shared vision of
                        delivering exceptional value and transformative solutions.r</p>
                </div>
                <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
                    @foreach($leaders as $leader)
                        <li>
                            <div class="flex items-center gap-x-6">
                                <img class="size-16 rounded-full" src="{{Storage::url($leader->image)}}" alt="">


                                <div>
                                    <h3 class="text-base/7 font-semibold tracking-tight text-gray-900">{{$leader->first_name}} {{$leader->other_names}} {{$leader->last_name}}</h3>
                                    <span class="text-sm/6 font-semibold text-emerald-400">Department:</span>
                                    <p class="text-sm/6 font-semibold text-indigo-600">{{$leader->department}}</p>

                                    <span class="text-sm/6 font-semibold text-emerald-400">Position:</span>
                                    <p class="text-sm/6 font-semibold text-indigo-600">{{$leader->position}}</p>
                                </div>

                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
