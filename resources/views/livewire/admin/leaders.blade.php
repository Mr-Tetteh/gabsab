@php use Illuminate\Support\Facades\Storage; @endphp
<div
    class="p-4 sm:ml-64 min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="w-full">
                    <button class="bg-blue-400 p-3 rounded-2xl" wire:click="toggleModal">Add Leader</button>
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Leaders</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Position
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Department
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Image
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
                                            {{$data->first_name}} {{$data->other_names}} {{$data->last_name}}

                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            {{$data->position}}

                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap">{{$data->department}}</td>
                                        <td class="px-4 py-4 whitespace-nowrap"><img
                                                src="{{ Storage::url($data->image)}}" class="rounded-2xl" width="50%"
                                                height="50%" alt=""></td>
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="flex flex-row space-x-2">
                                                <button wire:click="executeFunctions({{ $data->id }})"
                                                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl flex items-center space-x-2 transition duration-200 ease-in-out shadow-sm hover:shadow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M12 20h9"/>
                                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>
                                                    </svg>
                                                    Edit
                                                </button>
                                                <button wire:click="delete({{ $data->id }})"
                                                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl flex items-center space-x-2 transition duration-200 ease-in-out shadow-sm hover:shadow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="3 6 5 6 21 6"/>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                                        <line x1="10" y1="11" x2="10" y2="17"/>
                                                        <line x1="14" y1="11" x2="14" y2="17"/>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    @endforeach
                                @endif
                                </tbody>
                                {{ $datas->links() }}

                            </table>
                        </div>
                        @if($modal)
                            <div class="relative z-10 modal" aria-labelledby="modal-title" role="dialog"
                                 aria-modal="true">
                                <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity"></div>

                                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                    <div class="flex min-h-full items-center justify-center p-4">
                                        <div
                                            class="relative transform  md:mb-4 overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">
                                            <!-- Modal Header -->
                                            <div class="bg-gradient-to-r from-blue-600 to-blue-800 px-6 py-4">
                                                <h2 class="text-2xl font-bold text-white">Add A Leader </h2>
                                            </div>

                                            <div class="bg-white px-6 py-6">
                                                <form class="space-y-6" wire:submit="{{$edit ? 'update' : 'create '}}">
                                                    <!-- Success Message -->
                                                    @if (session()->has('message'))
                                                        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6">
                                                            <div class="flex">
                                                                <div class="flex-shrink-0">
                                                                    <svg class="h-5 w-5 text-green-500" fill="none"
                                                                         stroke="currentColor" viewBox="0 0 24 24">
                                                                        <path stroke-linecap="round"
                                                                              stroke-linejoin="round" stroke-width="2"
                                                                              d="M5 13l4 4L19 7"></path>
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
                                                            <label
                                                                class="text-sm font-medium text-gray-700 flex items-center">
                                                                First Name
                                                                <span class="text-red-500 ml-1">*</span>
                                                            </label>
                                                            <div class="relative rounded-lg shadow-sm">
                                                                <div
                                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                    <svg class="h-5 w-5 text-gray-400"
                                                                         xmlns="http://www.w3.org/2000/svg"
                                                                         viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor">
                                                                        <path
                                                                            d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                                                        <circle cx="12" cy="7" r="4"/>
                                                                    </svg>
                                                                </div>
                                                                <input type="text" wire:model="first_name"
                                                                       class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                       placeholder="Enter your first name">
                                                            </div>
                                                            @error('first_name')
                                                            <p class="text-sm text-red-600">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <!-- Last Name -->
                                                        <div class="space-y-2">
                                                            <label
                                                                class="text-sm font-medium text-gray-700 flex items-center">
                                                                Last Name
                                                                <span class="text-red-500 ml-1">*</span>
                                                            </label>
                                                            <div class="relative rounded-lg shadow-sm">
                                                                <div
                                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                    <svg class="h-5 w-5 text-gray-400"
                                                                         xmlns="http://www.w3.org/2000/svg"
                                                                         viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor">
                                                                        <path
                                                                            d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                                                        <circle cx="12" cy="7" r="4"/>
                                                                    </svg>
                                                                </div>
                                                                <input type="text" wire:model="last_name"
                                                                       class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                       placeholder="Enter your last name">
                                                            </div>
                                                            @error('last_name')
                                                            <p class="text-sm text-red-600">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <!-- Other Names -->
                                                        <div class="space-y-2">
                                                            <label
                                                                class="text-sm font-medium text-gray-700 flex items-center">
                                                                Other Names
                                                                <span
                                                                    class="text-gray-400 ml-1 text-xs">(Optional)</span>
                                                            </label>
                                                            <div class="relative rounded-lg shadow-sm">
                                                                <div
                                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                    <svg class="h-5 w-5 text-gray-400"
                                                                         xmlns="http://www.w3.org/2000/svg"
                                                                         viewBox="0 0 24 24" fill="none"
                                                                         stroke="currentColor">
                                                                        <path d="M22 7L12 13 2 7"/>
                                                                        <rect width="20" height="16" x="2" y="4"
                                                                              rx="2"/>
                                                                    </svg>
                                                                </div>
                                                                <input type="text" wire:model="other_names"
                                                                       class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                       placeholder="Enter your other names">
                                                            </div>
                                                            @error('other_names')
                                                            <p class="text-sm text-red-600">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <!-- Position -->
                                                        <div class="space-y-2">
                                                            <label
                                                                class="text-sm font-medium text-gray-700 flex items-center">
                                                                Position
                                                            </label>
                                                            <div class="relative rounded-lg shadow-sm">
                                                                <div
                                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">

                                                                </div>
                                                                <input type="text" wire:model="position"
                                                                       class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                       placeholder="Enter your position">
                                                            </div>
                                                            @error('position')
                                                            <p class="text-sm text-red-600">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <!-- Department -->
                                                        <div class="space-y-2">
                                                            <label
                                                                class="text-sm font-medium text-gray-700 flex items-center">
                                                                Department
                                                            </label>
                                                            <div class="relative rounded-lg shadow-sm">
                                                                <div
                                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">

                                                                </div>
                                                                <input type="text" wire:model="department"
                                                                       class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                                       placeholder="Enter your department">
                                                            </div>
                                                            @error('department')
                                                            <p class="text-sm text-red-600">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <!-- Image -->
                                                        <div class="space-y-2">
                                                            <label
                                                                class="text-sm font-medium text-gray-700 flex items-center">
                                                                Image
                                                            </label>
                                                            <div class="relative rounded-lg shadow-sm">
                                                                <div
                                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">

                                                                </div>
                                                                <input type="file" wire:model="image"
                                                                       class="block w-full pl-10 pr-4 py-2.5 text-gray-900 placeholder-gray-400 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                                            </div>
                                                            @error('image')
                                                            <p class="text-sm text-red-600">{{$message}}</p>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <!-- Submit Buttons -->
                                                    <div
                                                        class="flex items-center justify-end space-x-4 mt-8 pt-4 border-t">
                                                        <button type="button" wire:click="closeModal"
                                                                class="px-6 py-2.5 text-sm font-medium text-gray-700 hover:text-gray-800 transition-colors duration-200">
                                                            Cancel
                                                        </button>
                                                        <button type="submit"
                                                                class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all duration-200 flex items-center space-x-2 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                                            <span>{{ $edit ? 'Update Leader' : 'Add Leader' }}</span>
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                                                <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </form>
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
