<div
    class="p-4 sm:ml-64  min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 motion-preset-expand motion-duration-2000">
    <section class="py-8 px-4">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                    <div class="lg:col-span-2 w-full">
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-6">Previous Purchased Data </h3>
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Package
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Data Volume
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Price
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Reference
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Contact
                                        </th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Validity
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                    @foreach($datas as $data)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-4 whitespace-nowrap">
                                                @if($data->package == '200')
                                                    Enterpise

                                                @elseif($data->package == '100')
                                                    Start up

                                                @elseif($data->package == '50')
                                                    Basic
                                                @endif
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap">
                                                @if($data->package == '200')
                                                    100 GB

                                                @elseif($data->package == '100')
                                                    50 GB

                                                @elseif($data->package == '50')
                                                    30 GB
                                                @endif
                                            </td>
                                            <td class="px-4 py-4 whitespace-nowrap">GHC {{$data->amount}}</td>
                                            <td class="px-4 py-4 whitespace-nowrap">{{$data->reference}}</td>
                                            <td class="px-4 py-4 whitespace-nowrap">@if($data->user?->first_name == 0)
                                                    NaN user
                                                @else
                                                    {{$data->user?->first_name}} {{$data->user->last_name}}
                                                @endif </td>
                                            <td class="px-4 py-4 whitespace-nowrap">{{$data->number}}</td>
                                            <td class="px-4 py-4 whitespace-nowrap">Unlimited for 1 month</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
</div>
