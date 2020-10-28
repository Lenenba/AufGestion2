
 <modal name="{{ $supp['Supplier']}}" class="rounded-full" width="800" height="auto" >
            <div class="py-2 overflow-hidden justify-between rounded-lg">
                <div class="text-gray-600 text-sm  flex-cols bg-white mx-4 px-10 rounded-lg">
                    <h3 class="text-lg leading-6 font-medium  text-gray-600 py-4 text-center">
                        Sites de  {{ utf8_decode($supp['Supplier']) }}
                                
                    </h3>
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"> 
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    sites
                                </th>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Site de Paiement
                                </th>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Type de Paiement
                                </th>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>             
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($supp['sites'] as $sites)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="text-gray-600" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                                 </svg>
                                                </div>
                                            <div class="ml-4">
                                                <div class="text-xs leading-5 font-medium text-gray-900">
                                                    {{ $sites['SupplierSite']}} 
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-center">
                                             {{ $sites['PayGroup']}}     
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-center">
                                             {{ $sites['PaymentTerms']}}     
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-center">
                                             {{ $sites['Status']}}     
                                        </td>
                                    </tr>
                                @endforeach
 
                            </tbody>
                        </table>
                    </div>
                </div>
           </div> 
    </modal>