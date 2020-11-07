<template>
    <modal name="site" class="rounded-full" width="1000" height="auto" @before-open="beforeOpen" @before-close="beforeClose" >    
        <div class="py-2 overflow-hidden justify-between rounded-lg">
                <div class="text-gray-600 text-sm  flex-cols bg-white mx-4 px-10 rounded-lg">
                    <h3 class="text-lg leading-6 font-medium  text-gray-600 py-4 text-center" v-if="site">

                        Sites de {{ supplier }}
                                
                    </h3>
                    <h3 class="text-lg leading-6 font-medium  text-gray-600 py-4 text-center" v-if="contact">

                        Contacts de {{ supplier }}
                                
                    </h3>
                    <h3 class="text-lg leading-6 font-medium  text-gray-600 py-4 text-center" v-if="adresse">

                        Adresses de {{ supplier }}
                                
                    </h3>
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"> 
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead v-if="site">
                                <tr>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                   Nom du site
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
                            <thead v-if="adresse">
                                <tr>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Nom de l'Adresse
                                </th>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Pays
                                </th>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Ville
                                </th>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>             
                                </tr>
                            </thead>
                            <thead v-if="contact">
                                <tr>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                   Nom Complet
                                </th>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Intitulé de l'emploie
                                </th>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>             
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200" v-if="site">
                                    <tr v-for="site in sites" :key="site.index">
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                         
                                            <div class="ml-4">
                                                <div class="text-xs leading-5 font-medium text-gray-900">
                                                   {{ site.SupplierSite }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-center">
                                                   {{ site.PayGroup }}
                                             
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-center">
                                                   {{ site.PaymentTerms }}
                                             
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-center">
                                                   {{ site.Status }}
                                           
                                        </td>
                                    </tr>
                            </tbody>
                            <tbody class="bg-white divide-y divide-gray-200" v-if="adresse">
                                    <tr v-for="site in sites" :key="site.index">
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                         
                                            <div class="ml-4">
                                                <div class="text-xs leading-5 font-medium text-gray-900">
                                                   {{ site.AddressName }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-center">
                                                   {{ site.Country }}
                                             
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-center">
                                                   {{ site.City }}
                                             
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-center">
                                                   {{ site.Status }}
                                           
                                        </td>
                                    </tr>
                            </tbody>
                             <tbody class="bg-white divide-y divide-gray-200" v-if="contact">
                                    <tr v-for="site in sites" :key="site.index">
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                         
                                            <div class="ml-4">
                                                <div class="text-xs leading-5 font-medium text-gray-900">
                                                    {{ site.Salutation }}  {{ site.FirstName }}  {{ site.LastName }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-center">
                                                   {{ site.JobTitle }}
                                             
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-center">
                                                   {{ site.Email }}
                                             
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-center">
                                                   {{ site.Status }}
                                           
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
           </div> 
    </modal>
</template>

<script>
export default {
    data(){
        return{
          supplier:'',
          sites:'',
          site:false,
          adresse:false,
          contact:false

        }
    },
    mounted () {
        console.log(this.sites)
    },
    methods: {
        beforeOpen (event) {
          this.supplier = event.params.supplier
          this.valeur = event.params.valeur
          this.sites = JSON.parse(event.params.sites)
          if( 'SupplierSite' in this.sites[0] ){

              this.site = true
          }
          if( 'AddressName' in this.sites[0] ){

              this.adresse = true
          }
          if( 'Salutation' in this.sites[0] ){

              this.contact = true
          }
          console.log(this.site.length)
        },
        beforeClose (event) {
          this.supplier = ''
          this.sites = ''
          this.site = ''
          this.adresse = ''
          this.contact = ''
        },
        

    }
}
</script>