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
                            <h2 class="text-3xl font-bold text-white text-center">Load Wallet</h2>
                        </div>

                        <!-- Form Content -->
                        <div class="p-8 space-y-6">
                            <!-- Data Package Selection -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Payment Method<span class="text-red-500">*</span>
                                </label>
                                <select
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2
                                    focus:ring-blue-500 focus:border-blue-500 transition-all" wire:model="provider">
                                    <option value="">Select Network</option>
                                    <option value="MTN">MTN</option>
                                    <option value="Telecel">Telecel</option>
                                    <option value="AirtelTigo">AirtelTigo</option>
                                </select>
                                @error('provider')
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
                                <input
                                    type="number"
                                    placeholder="Phone Number"
                                    wire:model="phone_number"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                >
                                @error('phone_number')
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
                                    type="number"
                                    placeholder="Enter amount"
                                    wire:model="amount"
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
                            <h3 class="text-xl font-semibold text-gray-800 mb-6">Previous Top Ups </h3>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Payment Method
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Phone Number
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Reference Number
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Amount
                                        </th>

                                    </tr>
                                    </thead>
                                    @foreach($wallets as $wallet)
                                    <tbody class="divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-4 whitespace-nowrap">{{$wallet->provider}}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">{{$wallet->phone_number}}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">{{$wallet->reference}}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">GHC {{$wallet->amount}}</td>
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
