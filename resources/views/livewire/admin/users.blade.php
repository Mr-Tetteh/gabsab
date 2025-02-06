<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:col-span-2 w-full">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Users </h3>
                        <div class="overflow-x-auto">
                            @if($isEdit)
                                <form
                                    class="bg-white shadow-2xl rounded-2xl overflow-hidden max-w-xl mx-auto transform transition-all duration-300 hover:scale-[1.01]"
                                    wire:submit="updateRole">
                                    <!-- Gradient Header with Subtle Animation -->
                                    <div
                                        class="bg-gradient-to-r from-blue-600 to-blue-800 p-6 relative overflow-hidden">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-800 opacity-50 animate-pulse"></div>
                                        <h2 class="text-3xl font-bold text-white text-center relative z-10 tracking-wide">
                                            Update User Role
                                        </h2>
                                    </div>

                                    <!-- Form Content with Enhanced Spacing and Design -->
                                    <div class="p-8 space-y-6">
                                        <!-- First Name Field -->
                                        <div class="group">
                                            <label
                                                class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                                First Name <span class="text-red-500">*</span>
                                            </label>
                                            <input wire:model="first_name"
                                                   type="text"
                                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all
                          hover:shadow-md group-focus-within:shadow-lg"
                                                   disabled
                                            >
                                            @error('first_name')
                                            <div class="text-red-600 mt-1 text-sm animate-bounce">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <!-- Phone Number Field -->
                                        <div class="group">
                                            <label
                                                class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                                Last Name <span class="text-red-500">*</span>
                                            </label>
                                            <input wire:model="last_name"
                                                   type="text"
                                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all
                          hover:shadow-md group-focus-within:shadow-lg"
                                                   disabled
                                            >
                                            @error('last_name')
                                            <div class="text-red-600 mt-1 text-sm animate-bounce">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <!-- Email Field -->
                                        <div class="group">
                                            <label
                                                class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                                Email
                                            </label>
                                            <input
                                                wire:model="email"
                                                type="email"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all
                       hover:shadow-md group-focus-within:shadow-lg"
                                                disabled
                                            >
                                            @error('email')
                                            <div class="text-red-600 mt-1 text-sm animate-bounce">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <!-- Contact Field -->
                                        <div class="group">
                                            <label
                                                class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                                Contact
                                            </label>
                                            <input
                                                wire:model="contact"
                                                type="number"
                                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all
                       hover:shadow-md group-focus-within:shadow-lg"
                                                disabled
                                            >
                                            @error('contact')
                                            <div class="text-red-600 mt-1 text-sm animate-bounce">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>

                                        <!-- Role Selection with Enhanced Styling -->
                                        <div class="group">
                                            <label
                                                class="block text-sm font-medium text-gray-700 mb-2 group-focus-within:text-blue-600 transition-colors">
                                                Role
                                            </label>
                                            <div class="relative">
                                                <select
                                                    wire:model="role"
                                                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all
                           appearance-none bg-white hover:shadow-md group-focus-within:shadow-lg
                           pr-10 cursor-pointer"
                                                >
                                                    <option value="" disabled>Select a Role</option>
                                                    <option value="admin" class="hover:bg-blue-50">Admin</option>
                                                    <option value="reseller" class="hover:bg-blue-50">Reseller</option>
                                                    <option value="user" class="hover:bg-blue-50">User</option>
                                                </select>
                                                <div
                                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            @error('role')
                                            <div class="text-red-600 mt-1 text-sm animate-bounce">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit Button with Hover and Transition Effects -->
                                    <div class="p-6">
                                        <button
                                            type="submit"
                                            class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-300
                   transform hover:-translate-y-1 active:translate-y-0 shadow-lg hover:shadow-xl
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                                        >
            <span class="flex items-center justify-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
                <span>Update Role</span>
            </span>
                                        </button>
                                    </div>
                                </form>
                            @endif
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
                                        Gender
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date of birth
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
                                            {{$data->gender}}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            {{$data->date_of_birth}}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            {{$data->created_at->format('jS D Y')}}
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <button
                                                wire:click="edit({{$data->id}})" value="admin"
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
            </div>
        </div>
    </section>
</div>
