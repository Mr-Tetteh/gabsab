<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:col-span-2 w-full">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Users </h3>
                        <div class="overflow-x-auto">
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
                                            <input wire:model="contact"
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
