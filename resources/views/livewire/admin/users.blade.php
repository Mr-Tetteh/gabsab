<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:col-span-2 w-full">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Users </h3>
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
                                        Name
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contact
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Address
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role
                                    </th>

                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
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
                                            {{$data->first_name}} {{$data->last_name}}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            {{$data->email}}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">{{$data->contact}}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">{{$data->address}}</td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            {{$data->role}}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            {{$data->created_at->format('jS D Y')}}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <button
                                                wire:click="executeFunctions({{$data->id}})" value="admin"
                                                class="gap-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl flex items-center space-x-2 transition duration-200 ease-in-out shadow-sm hover:shadow">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="3"/>
                                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                                                </svg>
                                                Update Role
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                {{$datas->links()}}
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
                                    <div class="relative bg-white rounded-xl shadow-2xl transform transition-all duration-300 hover:shadow-3xl">
                                        <!-- Single Header (removed duplicate headers) -->
                                        <div class="bg-gradient-to-r from-blue-600 to-blue-800 p-6 rounded-t-xl relative overflow-hidden">
                                            <div class="absolute inset-0 bg-black/10"></div>
                                            <h2 class="text-2xl font-bold text-white relative z-10">Update User Role</h2>
                                        </div>

                                        <!-- Form Content -->
                                        <div class="p-6">
                                            <form wire:submit="updateRole" class="space-y-5">
                                                <!-- Form Fields Grid -->
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                                    <!-- First Name -->
                                                    <div class="space-y-2">
                                                        <label class="text-sm font-medium text-gray-700">
                                                            First Name <span class="text-red-500">*</span>
                                                        </label>
                                                        <input
                                                            wire:model="first_name"
                                                            type="text"
                                                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-gray-50 text-gray-500 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"
                                                            disabled
                                                        >
                                                        @error('first_name')
                                                        <p class="text-red-500 text-sm">{{$message}}</p>
                                                        @enderror
                                                    </div>

                                                    <!-- Last Name -->
                                                    <div class="space-y-2">
                                                        <label class="text-sm font-medium text-gray-700">
                                                            Last Name <span class="text-red-500">*</span>
                                                        </label>
                                                        <input
                                                            wire:model="last_name"
                                                            type="text"
                                                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-gray-50 text-gray-500 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"
                                                            disabled
                                                        >
                                                        @error('last_name')
                                                        <p class="text-red-500 text-sm">{{$message}}</p>
                                                        @enderror
                                                    </div>

                                                    <!-- Email -->
                                                    <div class="space-y-2">
                                                        <label class="text-sm font-medium text-gray-700">Email</label>
                                                        <input
                                                            wire:model="email"
                                                            type="email"
                                                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-gray-50 text-gray-500 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"
                                                            disabled
                                                        >
                                                        @error('email')
                                                        <p class="text-red-500 text-sm">{{$message}}</p>
                                                        @enderror
                                                    </div>

                                                    <!-- Contact -->
                                                    <div class="space-y-2">
                                                        <label class="text-sm font-medium text-gray-700">Contact</label>
                                                        <input
                                                            wire:model="contact"
                                                            type="number"
                                                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 bg-gray-50 text-gray-500 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all"
                                                            disabled
                                                        >
                                                        @error('contact')
                                                        <p class="text-red-500 text-sm">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Role Selection (Full Width) -->
                                                <div class="space-y-2">
                                                    <label class="text-sm font-medium text-gray-700">Role</label>
                                                    <div class="relative">
                                                        <select
                                                            wire:model="role"
                                                            class="w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all appearance-none bg-white pr-10"
                                                        >
                                                            <option value="" disabled>Select a Role</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="super_admin">Supper Admin</option>
                                                            <option value="user">User</option>
                                                        </select>
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    @error('role')
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
                                                        Update Role
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
</div>
