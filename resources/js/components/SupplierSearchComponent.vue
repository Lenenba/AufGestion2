<template>
    <div>
        <div class="bg-white shadow p-4 flex mt-20 mb-auto mx-20 my-5">
            <span class="w-auto flex justify-end items-center text-gray-500 p-2">
                    <svg class="h-5 text-red-400 hover:text-red-300 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
            </span>
            <input class="w-full rounded-lg p-2 mx-2 text-gray-500 focus:outline-none" v-model="search" type="text" placeholder="Entrer le nom du fournisseur">
            <button class="bg-red-400 hover:bg-red-300 rounded text-white p-2 pl-4 pr-4" @click.prevent="searchs">
                    <p class="font-semibold italic text-xs">Recherche</p>
            </button>
        </div>    


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
    </div>
</template>

<script>
    export default {

        data() {
            return {
                search:'',
                resultat:null,
                loading: true,
                errored: false
            }
        },
        methods:{
            
            searchs:function(){
                 axios
                    .get('/utility/'+this.search)
                    .then(res=>{ if(res.status==200){
                            this.resultat=res.data.supplier.items;
                            }
                        })
                    .catch(err=>{
                        console.log(err)
                    });
            }
        }
    }
</script>