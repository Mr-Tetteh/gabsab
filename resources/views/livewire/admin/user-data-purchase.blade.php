<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto p-4">
            <section class="py-4 sm:py-8">
                <div class="mx-auto">
                    <!-- Main Content Container -->
                    <div class="flex flex-col lg:flex-row gap-6 bg-white rounded-xl shadow-lg">

                        <!-- Purchase Form Section -->
                        <div class="w-full lg:w-1/3 p-4">
                            <form class="bg-white rounded-2xl overflow-hidden shadow-md" wire:submit="create">
                                <div class="bg-gradient-to-r from-green-400 to-yellow-400 p-4">
                                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 text-center">Purchase Data
                                        Package</h2>
                                </div>

                                <div class="p-4 sm:p-6 space-y-4">
                                    @if($currentStep == 1)
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Select Duration <span class="text-red-500">*</span>
                                            </label>
                                            <select wire:model="duration"
                                                    class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
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
                                                    class="w-full py-3 bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold rounded-lg hover:shadow-lg transition-all duration-300">
                                                Next
                                            </button>
                                        </div>
                                    @endif
                                    @if($currentStep == 2)
                                        <div class="space-y-3">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Phone Number <span class="text-red-500">*</span>
                                            </label>
                                            <input wire:model="contact"
                                                   type="tel"
                                                   placeholder="Enter your phone number"
                                                   class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all"
                                            >
                                            @error('number')
                                            <p class="text-red-600 text-sm">{{$message}}</p>
                                            @enderror
                                            <p class="text-xs sm:text-sm text-gray-500">You'll receive the voucher PIN
                                                via SMS for payment</p>

                                            <div class="space-y-2">
                                                <label class="block text-sm font-medium text-gray-700">
                                                    Select Package <span class="text-red-500">*</span>
                                                </label>

                                                @if($duration == "Daily")
                                                    <select wire:model="package"
                                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                                                        <option value="">Choose your package</option>
                                                        @foreach($datas as $data)
                                                            <option value="{{$data->price}}">{{$data->quantity}}GB -
                                                                GHC {{$data->price}}</option>
                                                        @endforeach
                                                    </select>
                                                @elseif($duration == "Weekly")
                                                    <select wire:model="package"
                                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                                                        <option value="">Choose your package</option>
                                                        @foreach($weekly as $data)
                                                            <option value="{{$data->price}}">{{$data->quantity}}GB -
                                                                GHC {{$data->price}}</option>
                                                        @endforeach
                                                    </select>
                                                @elseif($duration == "Monthly")
                                                    <select wire:model="package"
                                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all">
                                                        <option value="">Choose your package</option>
                                                        @foreach($monthly as $data)
                                                            <option value="{{$data->price}}">{{$data->quantity}}GB -
                                                                GHC {{$data->price}}</option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <select wire:model="package"
                                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-green-400 transition-all"
                                                            disabled>
                                                        <option value="">Please select a duration first</option>
                                                    </select>
                                                @endif

                                                @error('package')
                                                <p class="text-red-600 text-sm">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-3">
                                            <button type="button"
                                                    wire:click="previousStep"
                                                    class="w-full py-3 bg-gray-200 text-gray-800 font-bold rounded-lg hover:bg-gray-300 transition-all duration-300">
                                                Previous
                                            </button>
                                            <button type="submit"
                                                    class="w-full py-3 bg-gradient-to-r from-green-400 to-yellow-400 text-gray-900 font-bold rounded-lg hover:shadow-lg transition-all duration-300">
                                                Purchase Now
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>

                        <!-- Transaction History Section -->
                        <div class="w-full lg:w-2/3 p-4">
                            <div class="bg-white rounded-xl overflow-hidden">
                                <div class="bg-gradient-to-r from-green-400 to-yellow-400 p-4">
                                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Transaction History</h2>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="w-full">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Duration
                                            </th>
                                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Data
                                            </th>
                                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Price
                                            </th>
                                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                                Reference
                                            </th>

                                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">
                                                Contact
                                            </th>
                                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Date
                                            </th>
                                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden sm:table-cell">
                                                Time
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                        @if($userDataHistory->isEmpty())
                                            <tr>
                                                <td class="px-3 py-4 text-center text-sm" colspan="8">No transaction
                                                    records found
                                                </td>
                                            </tr>
                                        @else
                                            @foreach($userDataHistory as $data)
                                                @php
                                                    $packages = is_string($data->package) ? json_decode($data->package, true) : $data->package;
                                                    $packages = is_array($packages) ? $packages : [$packages];
                                                @endphp

                                                @foreach($packages as $package)
                                                    <tr class="hover:bg-gray-50 text-sm">
                                                        <td class="px-3 py-3 whitespace-nowrap">{{$data->duration}}</td>
                                                        <td class="px-3 py-3 whitespace-nowrap">
                                                            @if($data->duration == "Daily")
                                                                @switch($package)
                                                                    @case(2)
                                                                        1 GB
                                                                        @break
                                                                    @case(3)
                                                                        2 GB
                                                                        @break
                                                                    @case(5)
                                                                        3 GB
                                                                        @break
                                                                    @default
                                                                        N/A
                                                                @endswitch
                                                            @endif

                                                            @if($data->duration == "Weekly")
                                                                @switch($package)
                                                                    @case(10)
                                                                        2 GB
                                                                        @break
                                                                    @case(15)
                                                                        3 GB
                                                                        @break
                                                                    @case(18)
                                                                        6 GB
                                                                        @break
                                                                    @default
                                                                        N/A
                                                                @endswitch
                                                            @endif

                                                            @if($data->duration == "Monthly")
                                                                @switch($package)
                                                                    @case(15)
                                                                        5 GB
                                                                        @break
                                                                    @case(20)
                                                                        10 GB
                                                                        @break
                                                                    @case(30)
                                                                        15 GB
                                                                        @break
                                                                    @default
                                                                        N/A
                                                                @endswitch
                                                            @endif
                                                        </td>
                                                        <td class="px-3 py-3 whitespace-nowrap">
                                                            GHC {{ number_format($data->amount, 2) }}</td>
                                                        <td class="px-3 py-3 whitespace-nowrap hidden md:table-cell">{{ $data->reference ?? 'N/A' }}</td>
                                                        <td class="px-3 py-3 whitespace-nowrap hidden md:table-cell">{{ $data->number ?? 'N/A' }}</td>
                                                        <td class="px-3 py-3 whitespace-nowrap">{{$data->created_at->format('jS M Y')}}</td>
                                                        <td class="px-3 py-3 whitespace-nowrap hidden sm:table-cell">{{$data->created_at->format('h:i A')}}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="px-4 py-3 bg-gray-50">
                                    {{ $userDataHistory->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
