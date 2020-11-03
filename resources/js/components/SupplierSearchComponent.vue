<template>
    <div>
        <div class="bg-white shadow p-4 flex mt-20 mb-auto mx-20 my-5">
            <span class="w-auto flex justify-end items-center text-gray-500 p-2">
                    <svg class="h-5 text-red-400 hover:text-red-300 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
            </span>
            <input class="w-full rounded-lg p-2 px-2 text-gray-500 focus:outline-none" v-model="search" type="text" placeholder="Entrer le nom du fournisseur">
            <button class="bg-red-400 hover:bg-red-300 rounded text-white p-2 pl-4 pr-4" @click.prevent="searchs" @keyup.enter="searchs">
                    <p class="font-semibold italic text-xs">Recherche</p>
            </button>
        </div>    


        <div class="bg-white mt-12 h-auto shadow p-4 mx-20 my-10">
            <section v-if="totalResults.length == 0 && search.length > 0">

                    <div class="bg-white shadow flex w-1/5 rounded-full mb-4 mt-8">
                                <span class="w-auto flex justify-end items-center text-gray-500 p-2">
                                        <svg class="h-5 text-gray-400 hover:text-red-300 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                </span>
                                <input class="w-full rounded-lg p-2 mx-2 text-gray-500 focus:outline-none" type="text" placeholder="rechercher">
                    </div>  
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"> 
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Fournisseur
                                        </th>
                                        <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Site
                                        </th>
                                        <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Addresse
                                        </th>
                                        <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Contact
                                        </th>
                                        <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th class="px-2 py-3 bg-gray-100"></th>
                                    </tr>
                                </thead>
                            </table>
                    </div>
            </section>
            <section v-else>
                <div v-if="loading && search.length > 0">
                    <div class="bg-white shadow flex w-1/5 rounded-full mb-4 mt-8">
                                <span class="w-auto flex justify-end items-center text-gray-500 p-2">
                                        <svg class="h-5 text-gray-400 hover:text-red-300 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                </span>
                                <input class="w-full rounded-lg p-2 mx-2 text-gray-500 focus:outline-none" type="text" placeholder="rechercher">
                    </div>  
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"> 
                            <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Fournisseur
                                    </th>
                                    <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Site
                                    </th>
                                    <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Addresse
                                    </th>
                                    <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Contact
                                    </th>
                                    <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-2 py-3 bg-gray-100"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="text-center">
                                        <td class="animate-pulse flex px-2 py-4 whitespace-no-wrap">
                                            <div class=" p-4 max-w-sm w-full mx-auto">
                                                <div class="animate-pulse flex space-x-4">
                                                    <div class="rounded-full bg-gray-400 h-12 w-12"></div>
                                                    <div class="flex-1 space-y-4 py-1">
                                                    <div class="h-4 bg-gray-400 rounded w-3/4"></div>
                                                    <div class="space-y-2">
                                                        <div class="h-4 bg-gray-400 rounded"></div>
                                                        <div class="h-4 bg-gray-400 rounded w-5/6"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="animate-pulse px-2 py-4 whitespace-no-wrap">
                                            <div class=" p-4 max-w-sm w-full mx-auto">
                                                <div class="animate-pulse flex space-x-4">
                                                    <div class="flex-1 space-y-4 py-1">
                                                    <div class="h-4 bg-gray-400 rounded w-3/4"></div>
                                                    <div class="space-y-2">
                                                        <div class="h-4 bg-gray-400 rounded"></div>
                                                        <div class="h-4 bg-gray-400 rounded w-5/6"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                            <div class=" p-4 max-w-sm w-full mx-auto">
                                                <div class="animate-pulse flex space-x-4">
                                                    <div class="flex-1 space-y-4 py-1">
                                                    <div class="h-4 bg-gray-400 rounded w-3/4"></div>
                                                    <div class="space-y-2">
                                                        <div class="h-4 bg-gray-400 rounded"></div>
                                                        <div class="h-4 bg-gray-400 rounded w-5/6"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500" >
                                            <div class=" p-4 max-w-sm w-full mx-auto">
                                                <div class="animate-pulse flex space-x-4">
                                                    <div class="flex-1 space-y-4 py-1">
                                                    <div class="h-4 bg-gray-400 rounded w-3/4"></div>
                                                    <div class="space-y-2">
                                                        <div class="h-4 bg-gray-400 rounded"></div>
                                                        <div class="h-4 bg-gray-400 rounded w-5/6"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-2 py-4 whitespace-no-wrap">
                                           <div class=" p-4 max-w-sm w-full mx-auto">
                                                <div class="animate-pulse flex space-x-4">
                                                    <div class="flex-1 space-y-4 py-1">
                                                    <div class="h-4 bg-gray-400 rounded w-3/4"></div>
                                                    <div class="space-y-2">
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-2 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            <div class=" p-4 max-w-sm w-full mx-auto">
                                                <div class="animate-pulse flex space-x-4">
                                                    <div class="flex-1 space-y-4 py-1">
                                                    <div class="h-4 bg-gray-400 rounded w-3/4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>         
                    </div>
                </div>    
                <div v-else>
                    <div class="bg-white shadow flex w-1/5 rounded-full mb-4 mt-8">
                                <span class="w-auto flex justify-end items-center text-gray-500 p-2">
                                        <svg class="h-5 text-gray-400 hover:text-red-300 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                </span>
                                <input class="w-full rounded-lg p-2 mx-2 text-gray-500 focus:outline-none" type="text" placeholder="rechercher">
                    </div>  
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"> 
                            <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Fournisseur
                                    </th>
                                    <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Site
                                    </th>
                                    <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Addresse
                                    </th>
                                    <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Contact
                                    </th>
                                    <th class="px-2 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th class="px-2 py-3 bg-gray-100"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="supp in resultat" :key="supp.index" class="text-center">
                                        <td class="px-2 py-4 whitespace-no-wrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" src="/images/supplier.png" alt="">
                                                </div>
                                                <div class="ml-4 text-left">
                                                    <div class="text-xs leading-5 font-medium text-gray-900">
                                                        {{ supp.SupplierNumber}} |  {{ supp.Supplier.substring(0, 30) }}
                                                    </div>
                                                    <div class="text-xs leading-5 text-gray-500">
                                                        {{ supp.SupplierTypeCode}} - {{ supp.TaxOrganizationTypeCode}}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-2 py-4 whitespace-no-wrap" >
                                            <div class="flex items-center" v-for="site in supp.sites" :key="site.index">
                                                <div class="text-left">
                                                    <div class="text-sm leading-5 text-gray-800" >{{ site.SupplierSite}}</div>
                                                    <div class="text-xs leading-5 text-gray-600">{{ site.PayGroup}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500" >
                                            <div class="flex items-center" v-for="addresse in supp.addresses" :key="addresse.index">
                                                <div class="text-left">       
                                                    <div class="text-sm leading-5 text-gray-800">{{ addresse.AddressName}}</div>
                                                    <div class="text-xs leading-5 text-gray-600">{{ addresse.Country}} - {{ addresse.AddressLine1.substring(0, 10) }} </div>
                                                </div>
                                            </div>
                                    
                                        </td>
                                        <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500" >
                                            <div class="flex items-center" v-for="contact in supp.contacts" :key="contact.index">
                                                <div class="text-left">
                                                    <div  class="text-sm leading-5 text-gray-800">{{ contact.Salutation }} {{ contact.FirstName}} {{ contact.LastName }}</div>
                                                    <div  class="text-xs leading-5 text-gray-600">{{ contact.JobTitle }} - {{ contact.Email}} </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-2 py-4 whitespace-no-wrap">
                                            <span class="px-2 text-left text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                              {{ supp.Status }}
                                            </span>
                                        </td>
                                        <td class="px-2 py-4 whitespace-no-wrap text-right text-green-700 hover:text-green-900  text-sm leading-5 font-medium">
                                            <svg  class="h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>       
                        <pagination v-if="resultat.length > 0" :limit="limit" :totalResult="totalResults"></pagination>     
                    </div>
                </div>
            </section>
        </div>  
    </div>
</template>

<script>
    import pagination from './PaginationComponent.vue';
    export default {
        data() {
            return {
                search:'',
                resultat:'',
                limit:'',
                offset:'',
                totalResults:'',
                currentPage:'',
                hasMore:false,
                loading: true,
                errored: false
            }
        },
        components:{
            pagination,
        },
        methods:{
            
            searchs:function(){
                 this.loading = true;
                 axios
                    .get('/utility/'+this.search)
                    .then(res=>{ if(res.status==200){
                            this.resultat=res.data.supplier.items;
                            this.limit = res.data.supplier.limit;
                            this.offet = res.data.supplier.offset;
                            this.totalResults = res.data.supplier.totalResults;
                            this.hasMore = res.data.supplier.hasMore;
                                if( this.totalResults == 0){
                                    this.errored = true;
                                };
                            }
                        })
                    .catch(err=>{
                        console.log(err)
                        this.errored = true;
                    }).finally(() => this.loading = false);
            }
        }
    }
</script>