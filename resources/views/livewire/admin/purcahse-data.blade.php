<div class="p-4 sm:ml-64 min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="w-full">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-6">Previous Purchased Data</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Package</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Volume</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reference</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>

                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                @if($datas->isEmpty())
                                    <tr>
                                        <td class="px-4 py-4 text-center" colspan="7">No record found</td>
                                    </tr>
                                @else
                                    @foreach($datas as $data)
                                        @php
                                            $packages = is_string($data->package) ? json_decode($data->package, true) : $data->package;
                                            $packages = is_array($packages) ? $packages : [$packages];
                                        @endphp

                                        @foreach($packages as $package)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    @switch($package)
                                                        @case(1)
                                                            One Ghana for your pocket
                                                            @break
                                                        @case(2)
                                                            Ashanti Two
                                                            @break
                                                        @case(5)
                                                            Blue up
                                                            @break
                                                        @default
                                                            Unknown
                                                    @endswitch
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    @switch($package)
                                                        @case(1)
                                                            1 GB
                                                            @break
                                                        @case(2)
                                                            2 GB
                                                            @break
                                                        @case(5)
                                                            5 GB
                                                            @break
                                                        @default
                                                            N/A
                                                    @endswitch
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">GHC {{ number_format($data->amount, 2) }}</td>
                                                <td class="px-4 py-4 whitespace-nowrap">{{ $data->reference ?? 'N/A' }}</td>
                                                <td class="px-4 py-4 whitespace-nowrap">
                                                    @if($data->user)
                                                        {{ $data->user->first_name }} {{ $data->user->last_name }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td class="px-4 py-4 whitespace-nowrap">{{ $data->number ?? 'N/A' }}</td>
                                                <td class="px-4 py-4 whitespace-nowrap">{{$data->created_at->format('jS D Y')}}</td>
                                                <td class="px-4 py-4 whitespace-nowrap">{{$data->created_at->format('h:i A')}}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endif
                                </tbody>
                                {{ $datas->links() }}

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
