<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">

                <div class="lg:w-5/12">
                    @if (session()->has('message'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form class="bg-white shadow-2xl rounded-xl overflow-hidden" wire:submit="create">
                        <!-- Gradient Header -->
                        <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-6">
                            <h2 class="text-3xl font-bold text-white text-center">Bulk Data Purchase</h2>
                        </div>

                        <!-- Form Content -->
                        <div class="p-8 space-y-6">
                            <!-- Data Package Selection -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Data Package <span class="text-red-500">*</span>
                                </label>

                                <div class="space-y-2">
                                    @foreach($new_datas as $data)
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" wire:model="packages" value="{{$data->price}}"
                                               class="rounded border-gray-300 focus:ring-2 focus:ring-blue-500">
                                        <span>{{$data->quantity}} - GH{{$data->price}}</span>
                                    </label>
                                    @endforeach
                                </div>

                                @error('packages')
                                <div class="text-red-600">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>


                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Quantity <span class="text-red-500">*</span>
                                </label>
                                <input wire:model.live="quantity"
                                       type="text"
                                       placeholder="Enter quantities in order of the selection andseparated by commas (e.g., 2,3,1)"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                >
                                @error('quantity')
                                <div class="text-red-600">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>


                            <!-- Phone Number -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Phone Number <span class="text-red-500">*</span>
                                </label>
                                <input wire:model="number"
                                       type="number"
                                       placeholder="Enter phone number"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                >
                                <span class="text-gray-400">A voucher PIN will be sent to the provided number, which will also be used for payment.</span>

                                @error('number')
                                <div class="text-red-600">

                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-medium text-gray-700">Total Amount:</span>
                                    <span class="text-2xl font-bold text-blue-600">GHC {{ number_format($calculatedTotal, 2) }}</span>
                                </div>
                            </div>

                            <!-- Amount -->
                            <input type="hidden" wire:model="amount">


                            <!-- Submit Button -->
                            <button
                                type="submit"
                                class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300 shadow-lg"
                            >
                                Purchase Data
                            </button>
                        </div>
                    </form>
                </div>

                <div class="lg:w-7/12">
                    <div class="lg:col-span-2 w-full">
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
                                            Quantity
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Price
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Reference
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
                                    @if($datas->isEmpty())
                                        <tr>
                                            <td class="px-4 py-4 text-center" colspan="6">No record found</td>
                                        </tr>
                                    @else
                                        @foreach($datas as $data)
                                            @php
                                                $packages = json_decode($data->package, true);
                                                $quantities = json_decode($data->quantity, true);

                                                // Add safety check
                                                if (!is_array($packages)) {
                                                    $packages = [$data->package];
                                                }
                                                if (!is_array($quantities)) {
                                                    $quantities = [$data->quantity];
                                                }
                                            @endphp


                                            @foreach($packages as $index => $package)
                                                <tr class="hover:bg-gray-50">
                                                    <td class="px-4 py-4 whitespace-nowrap">
                                                        @switch($package)
                                                            @case('1')
                                                                One Ghana for your pocket
                                                                @break
                                                            @case('2')
                                                                Ashanti Two
                                                                @break
                                                            @case('5')
                                                                Blue up
                                                                @break
                                                        @endswitch
                                                    </td>
                                                    <td class="px-4 py-4 whitespace-nowrap">
                                                        @switch($package)
                                                            @case('1')
                                                                1 GB
                                                                @break
                                                            @case('2')
                                                                2 GB
                                                                @break
                                                            @case('5')
                                                                5 GB
                                                                @break
                                                        @endswitch
                                                    </td>
                                                    <td class="px-4 py-4 whitespace-nowrap">
                                                        {{ $quantities[$index] ?? 1 }}
                                                    </td>
                                                    <td class="px-4 py-4 whitespace-nowrap">
                                                        GHC {{ $package * ($quantities[$index] ?? 1) }}
                                                    </td>
                                                    <td class="px-4 py-4 whitespace-nowrap">
                                                        {{$data->reference}}
                                                    </td>
                                                    <td class="px-4 py-4 whitespace-nowrap">
                                                        {{$data->created_at->format('jS F, Y') }}
                                                    </td>
                                                    <td class="px-4 py-4 whitespace-nowrap">
                                                        {{$data->created_at->format('h:i A') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                {{$datas->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
