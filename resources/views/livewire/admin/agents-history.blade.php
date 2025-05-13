<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:col-span-2 w-full">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-2xl font-semibold font-serif text-gray-800 mb-6 text-center">Monthly Activities
                            for month of {{now()->format('F')}}  </h3>
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
                                        Data Volume
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Amount
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contact
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
                                                @switch($data->duration)
                                                    @case('Daily')
                                                        @switch($data->package)
                                                            @case(2)
                                                                1 GB
                                                                @break
                                                            @case(3)
                                                                2 GB
                                                                @break
                                                            @case(5)
                                                                3 GB
                                                                @break
                                                            @default
                                                                N/A
                                                        @endswitch
                                                        @break
                                                    @case('Weekly')
                                                        @switch($data->package)
                                                            @case(10)
                                                                2 GB
                                                                @break
                                                            @case(15)
                                                                3 GB
                                                                @break
                                                            @case(18)
                                                                6 GB
                                                                @break
                                                            @default
                                                                N/A
                                                        @endswitch
                                                        @break
                                                    @case('Monthly')
                                                        @switch($data->package)
                                                            @case(15)
                                                                5 GB
                                                                @break
                                                            @case(20)
                                                                10 GB
                                                                @break
                                                            @case(30)
                                                                15 GB
                                                                @break
                                                            @default
                                                                N/A
                                                        @endswitch
                                                        @break
                                                    @default
                                                        N/A
                                                @endswitch
                                            </td>


                                            <td class="px-4 py-4 whitespace-nowrap">
                                                GHC {{ $data->amount }}
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap">
                                                {{ $data->number }}
                                            </td>

                                            <td class="px-4 py-4 whitespace-nowrap">
                                                {{ $data->reference }}
                                            </td>

                                            <td class="px-4 py-4 whitespace-nowrap">
                                                {{ $data->created_at ? $data->created_at->format('jS D Y') : 'N/A' }}
                                            </td>

                                            <td class="px-4 py-4 whitespace-nowrap">
                                                {{ $data->created_at ? $data->created_at->format('h:i A') : 'N/A' }}
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
