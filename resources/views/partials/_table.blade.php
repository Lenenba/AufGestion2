     <div>
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"> 
                <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Fournisseur
                        </th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Site
                        </th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Addresse
                        </th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Contact
                        </th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 bg-gray-100"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($suppliers as $supp)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full" src="/images/supplier.png" alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-xs leading-5 font-medium text-gray-900">
                                        {{ $supp['SupplierNumber']}} |  {{ $supp['Supplier']}}
                                    </div>
                                    <div class="text-xs leading-5 text-gray-500">
                                        {{ $supp['SupplierTypeCode']}} - {{ $supp['TaxOrganizationTypeCode']}}
                                    </div>
                                </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                @foreach($supp['sites'] as $site)
                                    <div class="text-sm leading-5 text-gray-800">{{ $site['SupplierSite']}}</div>
                                    <div class="text-xs leading-5 text-gray-600">{{ $site['PayGroup']}}</div>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                @foreach($supp['addresses'] as $addresse)
                                    <div class="text-sm leading-5 text-gray-800">{{ $addresse['AddressName']}}</div>
                                    <div class="text-xs leading-5 text-gray-600">{{ $addresse['Country']}} - {{ Illuminate\Support\Str::substr($addresse['AddressLine1'], 0,10) }} </div>
                                @endforeach 
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                @foreach($supp['contacts'] as $contact)
                                    <div class="text-sm leading-5 text-gray-800">{{ $contact['Salutation']}} {{ $contact['FirstName']}} {{ $contact['LastName']}}</div>
                                    <div class="text-xs leading-5 text-gray-600">{{ $contact['JobTitle']}} - {{ $addresse['Email']}} </div>
                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                               {{ $supp['Status'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    <!-- More rows... -->
                </tbody>
            </table>
         </div>
     </div>