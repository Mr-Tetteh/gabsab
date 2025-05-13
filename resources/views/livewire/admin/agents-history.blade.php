<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:col-span-2 w-full">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-2xl font-semibold font-serif text-gray-800 mb-6 text-center">List of all agents </h3>
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
                                        Duration
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Package
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Number
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Amount
                                    </th>

                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Quantity
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
                                    @forelse($datas as $agentId => $records)
                                        <tr>
                                            <td colspan="7" class="bg-gray-100 font-bold px-4 py-2">
                                                Agent: {{ $records->first()->agent->username ?? 'Unknown' }}
                                            </td>

                                        </tr>
                                        @foreach($records as $data)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{ $data->duration }}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{ $data->package }}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{ $data->number }}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{ $data->amount }}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{ $data->quantity }}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    {{ $data->created_at ? $data->created_at->format('jS D Y') : 'N/A' }}
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    <button
                                                        wire:click="executeFunctions({{ $data->id }})"
                                                        class="gap-4 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl flex items-center space-x-2 transition duration-200 ease-in-out shadow-sm hover:shadow">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="3"/>
                                                            <path d="..."/> <!-- your existing path -->
                                                        </svg>
                                                        Update Role
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4 text-gray-500">No data available</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                          </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
</div>
