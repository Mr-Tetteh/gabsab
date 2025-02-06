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
                    <form class="bg-white shadow-2xl rounded-xl overflow-hidden" wire:submit="{{$isEdit? 'update': 'create'}}" >
                        <!-- Gradient Header -->
                        <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-6">
                            <h2 class="text-3xl font-bold text-white text-center">Bundle Prices</h2>
                        </div>

                        <!-- Form Content -->
                        <div class="p-8 space-y-6">
                            <!-- Data Package Selection -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Bundle Name <span class="text-red-500">*</span>
                                </label>
                                <input wire:model.live="name"
                                       type="text"
                                       placeholder="Enter the name of the bundle here"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                >
                                @error('name')
                                <div class="text-red-600">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Price <span class="text-red-500">*</span>
                                </label>
                                <input wire:model="price"
                                       type="number"
                                       placeholder="Enter price of bundle"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                >

                                @error('price')
                                <div class="text-red-600">

                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Number of devices <span class="text-red-500">*</span>
                                </label>
                                <input wire:model="devices"
                                       type="number"
                                       placeholder="Enter Number of devices that can be connected"
                                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                >

                                @error('devices')
                                <div class="text-red-600">

                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- Amount -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Quantity
                                </label>
                                <input
                                    wire:model="quantity"
                                    type="text"
                                    placeholder="Enter quality"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                >
                                @error('quality')
                                <div class="text-red-600">

                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            @for ($i = 1; $i <= 15; $i++)
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Advantage {{ $i }}
                                    </label>
                                    <input
                                        wire:model="adv_{{ $i }}"
                                        type="text"
                                        placeholder="Enter Advantage {{ $i }}"
                                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                    >
                                    @error('adv_{{ $i }}')
                                    <div class="text-red-600">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            @endfor


                            <!-- Submit Button -->
                            <button
                                type="submit"
                                class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300 shadow-lg"
                            >
                                {{$isEdit ? 'Set Bundle Plan' : 'Update Bundle Plan' }}
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
                                            Bundle Name
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Price
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Quantity
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Devices
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.1
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.2

                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.3
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.4

                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.5
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.6

                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.7
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.8

                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.9
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.10

                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.11
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.12

                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.13
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.14

                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Adv.15
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Date
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
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
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->name}}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    GHC {{$data->price}}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->quantity}}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->devices}}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_1}}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_2}}
                                                </td>

                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_3}}
                                                </td>

                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_4}}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_5}}
                                                </td>

                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_6}}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_7}}
                                                </td>

                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_8}}
                                                </td>

                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_9}}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_10}}
                                                </td>

                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_12}}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_12}}
                                                </td>

                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_13}}
                                                </td>

                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_14}}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->adv_15}}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{$data->created_at->format('jS F, Y') }}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    <button wire:click="edit({{$data->id}})" class="px-3 py-1.5 bg-amber-100 text-amber-700 rounded-lg">Edit</button>
                                                    <button wire:click="delete({{$data->id}})" class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg">Delete</button>


                                                </td>
                                            </tr>
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
