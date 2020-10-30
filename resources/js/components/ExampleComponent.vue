<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
        
        <h1 class="block uppercase tracking-wide text-blue-400 text-lg mb-16 text-center"><slot name="titreFormulaire"></slot></h1>

                <div class="flex mx-10">
                    <div class="w-1/4 h-8 mx-6">
                        <label class="labelHead">
                            ENTETE
                        </label>
                    </div>
                    <div class="w-1/4 h-8 mx-6">
                        <label class="labelHead">
                            SITES
                        </label>
                    </div>
                    <div class="w-1/4 h-8 mx-6">
                        <label class="labelHead">
                            ADRESSES
                        </label>    
                    </div>
                    <div class="w-1/4 h-8 mx-6">
                        <label class="labelHead">
                            CONTACT
                        </label>
                    </div>
                </div>

    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
