<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:col-span-2 w-full">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <button wire:click="toggleModal" class="bg-blue-400 p-3 rounded-full text-white text-2x">Add
                            Location
                        </button>

                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Locations Covered </h3>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                @if (session()->has('message'))
                                    <div
                                        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Location Name
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Latitude
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Longitude
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>

                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                @foreach($datas as $data)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            {{$data->location_name}}
                                        </td>

                                        <td class="px-4 py-4 whitespace-nowrap">{{$data->latitude}}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">{{$data->longitude}}</td>
                                        <td class="px-4 py-4">
                                            <div class="flex space-x-2">
                                                <button
                                                    wire:click="executeFunctions({{$data->id}})" value="admin"
                                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl flex items-center space-x-2 transition duration-200 ease-in-out shadow-sm hover:shadow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="12" cy="12" r="3"/>
                                                        <path
                                                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                                                    </svg>
                                                    <span>Update</span>
                                                </button>
                                                <button
                                                    wire:click="delete({{$data->id}})" value="admin"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl flex items-center space-x-2 transition duration-200 ease-in-out shadow-sm hover:shadow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M3 6h18M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/>
                                                        <line x1="10" y1="11" x2="10" y2="17"/>
                                                        <line x1="14" y1="11" x2="14" y2="17"/>
                                                    </svg>
                                                    <span>Delete</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                {{--                                {{$datas->links()}}--}}
                            </table>
                        </div>
                    </div>
                </div>
                @if($modal)
                    <div class="relative z-10 modal" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <!-- Backdrop -->
                        <div class="fixed inset-0 bg-black/40 backdrop-blur-sm transition-opacity"></div>

                        <!-- Modal Container -->
                        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                            <div class="flex min-h-full items-center justify-center p-4">
                                <div class="relative w-full max-w-2xl mx-auto">
                                    <!-- Modal Content -->
                                    <div
                                        class="relative bg-white rounded-xl shadow-2xl transform transition-all duration-300 hover:shadow-3xl">
                                        <!-- Single Header (removed duplicate headers) -->
                                        <div
                                            class="bg-gradient-to-r from-blue-600 to-blue-800 p-6 rounded-t-xl relative overflow-hidden">
                                            <div class="absolute inset-0 bg-black/10"></div>
                                            <h2 class="text-2xl font-bold text-white relative z-10">Update User
                                                Role</h2>
                                        </div>
                                        <div
                                            class="relative w-full max-w-5xl transform rounded-2xl shadow-2xl transition-all  right-4 top-4">
                                            <button wire:click="closeModal"
                                                    class="rounded-full p-2 text-gray-400 hover:bg-gray-100 bg-blue-400 hover:text-gray-600">
                                                <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                                     viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M6 18L18 6M6 6l12 12"/>
                                                </svg>

                                            </button>
                                        </div>

                                        <!-- Form Content -->
                                        <div class="p-6">

                                            <form wire:submit.prevent="{{$Edit ? "update" : "create"}}" class="space-y-5">
                                                <!-- Form Fields Grid -->
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                                    <!-- First Name -->
                                                    <div class="space-y-2">
                                                        <label class="text-sm font-medium text-gray-700">
                                                            Location Name <span class="text-red-500">*</span>
                                                        </label>
                                                        <input
                                                            wire:model="location_name"
                                                            type="text"
                                                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-gray-50 text-gray-500 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"

                                                        >
                                                        @error('location_name')
                                                        <p class="text-red-500 text-sm">{{$message}}</p>
                                                        @enderror
                                                    </div>

                                                    <!-- Last Name -->
                                                    <div class="space-y-2">
                                                        <label class="text-sm font-medium text-gray-700">
                                                            Latitude <span class="text-red-500">*</span>
                                                        </label>
                                                        <input
                                                            wire:model="latitude"
                                                            step="any"
                                                            type="number"
                                                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-gray-50 text-gray-500 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"

                                                        >
                                                        @error('latitude')
                                                        <p class="text-red-500 text-sm">{{$message}}</p>
                                                        @enderror
                                                    </div>

                                                    <div class="space-y-2">
                                                        <label
                                                            class="text-sm font-medium text-gray-700">Longitude</label>
                                                        <span class="text-red-500">*</span>
                                                        <input
                                                            wire:model="longitude"
                                                            step="any"
                                                            type="number"
                                                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-gray-50 text-gray-500 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"
                                                        >
                                                        @error('email')
                                                        <p class="text-red-500 text-sm">{{$message}}</p>
                                                        @enderror
                                                    </div>


                                                    <!-- Action Buttons -->
                                                    <div class="flex items-center justify-end space-x-4 pt-4">
                                                        <button type="button" wire:click="closeModal"
                                                                class="px-6 py-2.5 text-sm font-medium text-gray-700 hover:text-gray-800 transition-colors duration-200">
                                                            Cancel
                                                        </button>
                                                        <button
                                                            type="submit"
                                                            class="px-6 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200"
                                                        >
                                                            {{$Edit ? "Update" : "Submit Location" }}
                                                        </button>
                                                    </div>
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
    </section>
</div>
