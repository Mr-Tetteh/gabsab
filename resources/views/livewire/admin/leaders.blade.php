<div
    class="p-4 sm:ml-64 min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="w-full">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Contract Offers</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contact
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Location
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Ghana Post GPS
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contract Type
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Additional Info
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Time
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>

                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                @if($datas->isEmpty())
                                    <tr>
                                        <td class="px-4 py-4 text-center" colspan="7">No record found</td>
                                    </tr>
                                @else
                                    @foreach($datas as $data)

                                        <td class="px-4 py-4 whitespace-nowrap">
                                            {{$data->first_name}} {{$data->last_name}}

                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            {{$data->email}}

                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">{{$data->phone}}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">{{ $data->location}}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            @if($data->status == 0)
                                                <span
                                                    class="inline-flex px-2 py-1 text-sm font-medium rounded-full bg-red-100 text-red-700 hover:bg-red-200 transition-colors duration-150">
                                                        Not Contacted
                                                    </span>
                                            @else
                                                <span
                                                    class="inline-flex px-2 py-1 text-sm font-medium rounded-full bg-green-100 text-green-700 hover:bg-green-200 transition-colors duration-150">
                                                        Contacted
                                                    </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            {{$data->ghana_post_gps}}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">{{ $data->contract_type }}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">{{ $data->additional_info }}</td>


                                        <td class="px-4 py-4 whitespace-nowrap">{{$data->created_at->format('jS D Y')}}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">{{$data->created_at->format('h:i A')}}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <button wire:click="executeFunctions({{ $data->id }})"

                                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl flex items-center space-x-2 transition duration-200 ease-in-out shadow-sm hover:shadow">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                                Edit
                                            </button>
                                        </td>

                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                {{ $datas->links() }}

                            </table>
                        </div>
                        @if($modal)
                            <div class="relative z-10 modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity"></div>

                                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                    <div class="flex min-h-full items-center justify-center p-4">
                                        <div class="relative transform  md:mb-4 overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">
                                            <!-- Modal Header -->
                                            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-4">
                                                <h2 class="text-2xl font-bold text-white">Update Request Form</h2>
                                            </div>

                                            <div class="bg-white px-6 py-6">
                                                <form class="space-y-6" wire:submit="update">
                                                    <!-- Success Message -->
                                                    @if (session()->has('message'))
                                                        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6">
                                                            <div class="flex">
                                                                <div class="flex-shrink-0">
                                                                    <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                                    </svg>
                                                                </div>
                                                                <div class="ml-3">
                                                                    <p class="text-sm text-green-700">{{ session('message') }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <!-- Form Grid -->
                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                        <!-- First Name -->
                                                        <div class="space-y-2">
                                                            <label class="text-sm font-medium text-gray-700 flex items-center">
                                                                First Name
                                                                <span class="text-red-500 ml-1"></span>
                                                            </label>
                                                            <div class="relative rounded-lg shadow-sm">
                                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                                                        <circle cx="12" cy="7" r="4"/>
                                                                    </svg>
                                                                </div>
                                                                <input type="text" wire:model="first_name"
                                                                       class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                       placeholder="Daniel" disabled>
                                                            </div>
                                                            @error('first_name')
                                                            <p class="text-sm text-red-600">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <!-- Last Name -->
                                                        <div class="space-y-2">
                                                            <label class="text-sm font-medium text-gray-700 flex items-center">
                                                                Last Name
                                                                <span class="text-red-500 ml-1"></span>
                                                            </label>
                                                            <div class="relative rounded-lg shadow-sm">
                                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                                        <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                                                        <circle cx="12" cy="7" r="4"/>
                                                                    </svg>
                                                                </div>
                                                                <input type="text" wire:model="last_name"
                                                                       class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                       placeholder="Tetteh" disabled>
                                                            </div>
                                                            @error('last_name')
                                                            <p class="text-sm text-red-600">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="space-y-2">
                                                            <label class="text-sm font-medium text-gray-700 flex items-center">
                                                                Email Address
                                                                <span class="text-red-500 ml-1"></span>
                                                            </label>
                                                            <div class="relative rounded-lg shadow-sm">
                                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                                        <path d="M22 7L12 13 2 7"/>
                                                                        <rect width="20" height="16" x="2" y="4" rx="2"/>
                                                                    </svg>
                                                                </div>
                                                                <input type="email" wire:model="email"
                                                                       class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                       placeholder="john@example.com" disabled>
                                                            </div>
                                                            @error('email')
                                                            <p class="text-sm text-red-600">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <!-- Phone -->
                                                        <div class="space-y-2">
                                                            <label class="text-sm font-medium text-gray-700 flex items-center">
                                                                Phone Number
                                                                <span class="text-gray-400 ml-1 text-xs"></span>
                                                            </label>
                                                            <div class="relative rounded-lg shadow-sm">
                                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/>
                                                                    </svg>
                                                                </div>
                                                                <input type="tel" wire:model="phone"
                                                                       class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                       placeholder="(233) XXX-XXXX" disabled>
                                                            </div>
                                                            @error('phone')
                                                            <p class="text-sm text-red-600">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <!-- Location -->
                                                        <div class="space-y-2">
                                                            <label class="text-sm font-medium text-gray-700 flex items-center">
                                                                Location
                                                                <span class="text-gray-400 ml-1 text-xs"></span>
                                                            </label>
                                                            <div class="relative rounded-lg shadow-sm">
                                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                                        <path d="M12 21s-8-4.5-8-11a8 8 0 1116 0c0 6.5-8 11-8 11z"/>
                                                                        <circle cx="12" cy="10" r="3"/>
                                                                    </svg>
                                                                </div>
                                                                <input type="text" wire:model="location"
                                                                       class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                       placeholder="Enter your location" disabled>
                                                            </div>
                                                            @error('location')
                                                            <p class="text-sm text-red-600">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <!-- Ghana Post GPS -->
                                                        <div class="space-y-2">
                                                            <label class="text-sm font-medium text-gray-700 flex items-center">
                                                                Ghana Post GPS
                                                                <span class="text-gray-400 ml-1 text-xs"></span>
                                                            </label>
                                                            <div class="relative rounded-lg shadow-sm">
                                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                                                                        <circle cx="12" cy="10" r="3"/>
                                                                    </svg>
                                                                </div>
                                                                <input type="text" wire:model="ghana_post_gps"
                                                                       class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                       placeholder="Enter Ghana Post GPS" disabled>
                                                            </div>
                                                            @error('ghana_post_gps')
                                                            <p class="text-sm text-red-600">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <!-- Contract Type -->
                                                        <div class="space-y-2 md:col-span-2">
                                                            <label class="text-sm font-medium text-gray-700 flex items-center">
                                                                Contract Type
                                                                <span class="text-red-500 ml-1"></span>
                                                            </label>
                                                            <select wire:model="contract_type"
                                                                    class="block w-full px-4 py-2.5 text-gray-900 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                                                <option disabled selected>Select a contract type</option>
                                                                @foreach($datum as $data)
                                                                    <option value="{{$data->name}}">{{$data->name}} - GHC {{$data->price}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('contract_type')
                                                            <p class="text-sm text-red-600">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <div class="space-y-2 md:col-span-2">
                                                            <label class="text-sm font-medium text-gray-700 flex items-center">
                                                                Contract Type
                                                                <span class="text-red-500 ml-1"></span>
                                                            </label>
                                                            <select wire:model="status"
                                                                    class="block w-full px-4 py-2.5 text-gray-900 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                                                <option disabled selected>Select a contract type</option>
                                                                <option value="0">Not Connected </option>
                                                                <option value="1"> Connected </option>

                                                            </select>
                                                            @error('contract_type')
                                                            <p class="text-sm text-red-600">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <!-- Additional Info -->
                                                        <div class="space-y-2 md:col-span-2">
                                                            <label class="text-sm font-medium text-gray-700 flex items-center">
                                                                Additional Information
                                                                <span class="text-red-500 ml-1"></span>
                                                            </label>
                                                            <textarea wire:model="additional_info" rows="4"
                                                                      class="block w-full px-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                                                      placeholder="Please provide any additional information..." disabled></textarea>
                                                        </div>
                                                    </div>

                                                    <!-- Submit Buttons -->
                                                    <div class="flex items-center justify-end space-x-4 mt-8 pt-4 border-t">
                                                        <button type="button" wire:click="closeModal"
                                                                class="px-6 py-2.5 text-sm font-medium text-gray-700 hover:text-gray-800 transition-colors duration-200">
                                                            Cancel
                                                        </button>
                                                        <button type="submit"
                                                                class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all duration-200 flex items-center space-x-2 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                                            <span>Update Contract</span>
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                                <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
