<div
    class="p-4 sm:ml-64 min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Form Section -->
                <div class="w-full lg:w-1/2 z-10 motion-preset-bounce motion-duration-200 ">
                    <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/10">
                        <!-- Verification Section -->
                        <div class="mb-12 text-center">
                            <h2 class="text-3xl font-bold text-black mb-4">Verify Your Voucher</h2>
                            <p class="text-black mb-6">Check the authenticity of your voucher instantly</p>
                            <a href="" class="inline-block px-8 py-4 rounded-xl bg-gradient-to-r from-blue-500 to-purple-500
          text-white font-bold text-lg transition-all hover:shadow-xl hover:scale-105">
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
                            <div class="w-full p-6 inline-block px-8 py-4 rounded-xl bg-gradient-to-r from-blue-500 to-purple-500
                                text-white font-bold text-lg transition-all hover:shadow-xl hover:scale-105">
                                <h2 class="text-2xl font-bold text-gray-900 text-center ">Purchase Data Package</h2>
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
                                        @foreach($datas as $data)
                                            <option value="{{$data->price}}">{{$data->quantity}} -
                                                GHC {{$data->price}}</option>
                                        @endforeach
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
                                        class="w-full p-6 inline-block px-8 py-4 rounded-xl bg-gradient-to-r from-blue-500 to-purple-500
                                text-white font-bold text-lg transition-all hover:shadow-xl hover:scale-105">
                                    Purchase Now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="w-full lg:w-1/2">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Previous Purchased Data </h3>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Package
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Data Volume
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Price
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Reference
                                    </th>

                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contact
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Time
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                @if($dataum->isEmpty())
                                    <tr>
                                        <td class="px-4 py-4 text-center" colspan="7">No record found</td>
                                    </tr>
                                @else
                                    @foreach($dataum as $data)
                                        @php
                                            $packages = is_string($data->package) ? json_decode($data->package, true) : $data->package;
                                            $packages = is_array($packages) ? $packages : [$packages];
                                        @endphp

                                        @foreach($packages as $package)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    @switch($package)
                                                        @case(1)
                                                            One Ghana for your pocket
                                                            @break
                                                        @case(2)
                                                            Ashanti Two
                                                            @break
                                                        @case(5)
                                                            Blue up
                                                            @break
                                                        @default
                                                            Unknown
                                                    @endswitch
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    @switch($package)
                                                        @case(1)
                                                            1 GB
                                                            @break
                                                        @case(2)
                                                            2 GB
                                                            @break
                                                        @case(5)
                                                            5 GB
                                                            @break
                                                        @default
                                                            N/A
                                                    @endswitch
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    GHC {{ number_format($data->amount, 2) }}</td>
                                                <td class="px-4 py-4 whitespace-nowrap">{{ $data->reference ?? 'N/A' }}</td>
                                                <td class="px-4 py-4 whitespace-nowrap">{{ $data->number ?? 'N/A' }}</td>
                                                <td class="px-4 py-4 whitespace-nowrap">{{$data->created_at->format('jS D Y')}}</td>
                                                <td class="px-4 py-4 whitespace-nowrap">{{$data->created_at->format('h:i A')}}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endif
                                </tbody>
                                {{$dataum->links()}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
