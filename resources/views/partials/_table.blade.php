<div class="bg-white mt-12 h-auto shadow p-4 mx-20">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg my-10"> 
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
                            <tr v-for="supp in resultat" :key="supp.index" class="text-center">
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="/images/supplier.png" alt="">
                                        </div>
                                        <div class="ml-4 text-left">
                                            <div class="text-xs leading-5 font-medium text-gray-900">
                                                {{ supp.SupplierNumber}} |  {{ supp.Supplier}}
                                            </div>
                                            <div class="text-xs leading-5 text-gray-500">
                                                {{ supp.SupplierTypeCode}} - {{ supp.TaxOrganizationTypeCode}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap" v-for="site in supp.sites" :key="site.index">
                                     <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                        </div>
                                        <div class="ml-4 text-left">
                                            <div class="text-sm leading-5 text-gray-800" >{{ site.SupplierSite}}</div>
                                            <div class="text-xs leading-5 text-gray-600">{{ site.PayGroup}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500" v-for="addresse in supp.addresses" :key="addresse.index">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                        </div>
                                        <div class="ml-4 text-left">       
                                            <div class="text-sm leading-5 text-gray-800">{{ addresse.AddressName}}</div>
                                            <div class="text-xs leading-5 text-gray-600">{{ addresse.Country}} - {{ addresse.AddressLine1.substring(0, 10) }} </div>
                                        </div>
                                    </div>
                               
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500" v-for="contact in supp.contacts" :key="contact.index">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                        </div>
                                        <div class="ml-4 text-left">
                                            <div  class="text-sm leading-5 text-gray-800">{{ contact.Salutation }} {{ contact.FirstName}} {{ contact.LastName }}</div>
                                            <div  class="text-xs leading-5 text-gray-600">{{ contact.JobTitle }} - {{ contact.Email}} </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ supp.Status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>