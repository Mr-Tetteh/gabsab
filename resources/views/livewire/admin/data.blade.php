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
                            <h2 class="text-3xl font-bold text-white text-center">Purchase Data</h2>
                        </div>

                        <!-- Form Content -->
                        <div class="p-8 space-y-6">
                            <!-- Data Package Selection -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Data Package <span class="text-red-500">*</span>
                                </label>
                                <select wire:model="package"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                    <option value="">Select Data Package</option>
                                    <option value="50">30 GB - GHC 50</option>
                                    <option value="100">50 GB - GHC 100</option>
                                    <option value="200">100 GB - GHC 200</option>
                                </select>

                                @error('package')
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

                                @error('number')
                                <div class="text-red-600">

                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- Amount -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Amount to Pay
                                </label>
                                <input
                                    wire:model="amount"
                                    type="number"
                                    placeholder="Enter amount"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                >
                                @error('amount')
                                <div class="text-red-600">

                                    {{$message}}
                                </div>
                                @enderror
                            </div>

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
                                            Price
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Reference
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Validity
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                    @foreach($datas as $data)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            @if($data->package == '200')
                                                Enterpise

                                            @elseif($data->package == '100')
                                                Start up

                                            @elseif($data->package == '50')
                                                Basic
                                            @endif
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            @if($data->package == '200')
                                                100 GB

                                            @elseif($data->package == '100')
                                                50 GB

                                            @elseif($data->package == '50')
                                                30 GB
                                            @endif
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">GHC  {{$data->amount}}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">{{$data->reference}}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">30 Days</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
