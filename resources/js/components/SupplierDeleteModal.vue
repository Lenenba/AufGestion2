<template>
   <modal name="supplier-delete" class="p-10 rounded-lg" @before-open="beforeOpen" height="auto">
            <!-- post card -->
        <div class="flex bg-white shadow-lg rounded-lg mx-4 md:mx-auto max-w-md md:max-w-2xl "><!--horizantil margin is just for display-->
        <div class="flex items-start px-4 py-6">
            <img class="w-12 h-12 rounded-full object-cover mr-4 shadow" src="/images/supplier.png" alt="avatar">
            <div class="">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900 -mt-1">{{ form.nomFournisseur }}</h2>
                </div>
                <p class="text-gray-700"> crée il y a {{ form.created | moment("from") }} </p>
                <p class="mt-3 text-gray-700 text-sm">
                    {{ form.statut }} - {{ form.typeFournisseur }} - {{ form.typeOrganisation }}
                </p>
                <div class="mt-4 flex items-center">
                    <form @submit.prevent="submit" >
                        <button class="rounded shadow-md flex items-center bg-gray-500 px-4 py-2 mx-2 text-white hover:bg-red-400" >
                            <svg  class="h-4"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Confirmer
                        </button>
                    </form>
                    <button type="button" class="rounded shadow-md flex items-center bg-red-500 px-4 py-2 mx-2 text-white hover:bg-red-400" @click="$modal.hide('supplier-delete')">
                        <svg class="h-4"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Annuler
                    </button>
                </div>
            </div>
        </div>
        </div>
    </modal>
</template>

<script>
import SupplierForm from './SupplierForm';

export default {
    data(){
        return{
            supplier:'',
            form: new SupplierForm({
                    
                    id:'',
                    typeFournisseur:'',
                    typeOrganisation:'',
                    nomFournisseur:'',
                    autreNom:'',
                    prestationFourni:'',
                    titreCiviliteE:'',
                    nomEntete:'',
                    prenomEntete:'',
                    deuxiemePrenomEntete:'',
                    deactivationEntete:'',
                    dateNaissance:'',
                    statut:'',
                    created:'',
                    nationalite:''})
        }
    },
    methods: {
        beforeOpen (event) {
            // this.supplier = new SupplierForm(JSON.parse(event.params.supplier));
            this.form.nomFournisseur = event.params.nom;
            this.form.typeFournisseur = event.params.type;
            this.form.typeOrganisation = event.params.org;
            this.form.statut = event.params.statut;
            this.form.created = event.params.created;
            this.form.id = event.params.id;
        },
        submit() {
                   this.form.submit('/suppliers/'+this.form.id, 'delete')
                            .then(response => location);
                    this.$modal.hide('supplier-delete')                         
            }

    }

}
</script>