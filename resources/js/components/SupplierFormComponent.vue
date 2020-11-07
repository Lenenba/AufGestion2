<template>
        <templateForm :data = "data"></templateForm>
</template>

<script>
    import templateForm from './templateForm';

    export default {
        
        components: {
            templateForm
        },       
        data() {
            return {
                data: {                
                    // entete fields
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
                    nationalite:'',

                    // site fields
                    nomSite : '',
                    courrielSite:'',
                    envoicde:'NONE',
                    modePaiement:'Espece',
                    paieOnRecip:'0',
                    groupePaie:'',
                    conditionPaiement:'',
                    tolerancesMontant:'',
                    ventilation:'101-000-40100-000-000-000-000-000',
                    banque:'',
                    iban:'',
                    numeroCompteB:'',
                    projet:'',
                    domaine:'',
                    region:'',
                    mobilite:'',
                    etablismnOrigine:'',
                    etablismnAcceuil:'',
                    debutMobilité:'',
                    finMobilité:'',
                    discipline:'',
                    montantUnitaire:'',
                    devise:'EUR',

                    //adresse fields
                    nomAdresse:'',
                    adresse1:'',
                    adresse2:'',
                    pays:'',
                    ville:'',    
                    codePostal:'',
                    codeRegionTelAdresse:'',
                    codePaysTelAdresse:'',
                    ExtensionTelAdresse:'',
                    TelAdresse:'',
                    codeRegFaxAdresse:'',
                    codePaysFaxAdresse:'',
                    faxAdresse:'',
                    courrielAdresse:'',
                    deactivationAdresse:'',
                    province:'',

                    // contact fields
                    titreCivilite:'',
                    nomContact:'',
                    prenomContact:'',
                    deuxiemePrenomContact:'',
                    intituleEmploi:'',
                    codeRegionTelContact:'',
                    codePaysTelContact:'',
                    ExtensionTelContact:'',
                    TelContact:'',
                    codeRegFaxContact:'',
                    codePaysFaxContact:'',
                    faxContact:'',
                    CourrielContact:''


                }
            };
        },
        methods: { }
    }
</script>
