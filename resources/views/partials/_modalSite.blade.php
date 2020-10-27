
 <modal name="{{ $supp['Supplier']}}" class="rounded-full" width="800" height="auto" >
            <div class="py-2 overflow-hidden justify-between rounded-lg">
                <div class="text-gray-600 text-sm  flex-cols bg-white mx-4 px-10 rounded-lg">
                    <h3 class="text-lg leading-6 font-medium  text-gray-600 py-4 text-center">
                        Sites de {{ $supp['Supplier'] }}
                                
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
                                                <img class="h-10 w-10 rounded-full" src="/images/lieu.png" alt="">
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