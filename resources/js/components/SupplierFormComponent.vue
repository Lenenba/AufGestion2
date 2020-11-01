<template>
        <form @submit.prevent="submit" >
             <div class="block uppercase tracking-wide text-blue-400 text-lg mb-16 text-center"><slot name="titre"></slot></div>
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


                 <!-- ligne 1 -->

                <div class="flex mx-10" :class="'typeFournisseur' in form.errors || 'typeOrganisation' in form.errors || 'nomSite' in form.errors || 'nomAdresse' in form.errors || 'titreCivilite' in form.errors ? 'my-10':''">  
                    <div class="w-1/4 h-8 flex-col mx-6 my-4">
                        <div class="flex justify-between ">
                                <div class=" mr-2">
                                <div class="flex">
                                    <label  class="labelInput" >
                                        Type de Fournisseurs
                                    </label> 
                                    <span class="required text-red-600 ml-3">*</span>
                                </div>
                                <div class="relative">
                                    <select class="select"  :class="form.errors.typeFournisseur ? 'border-red-500' : 'border-gray-200'"
                                            v-model="form.typeFournisseur" @click.prevent="allocataire" required>
                                        <option disabled value=""></option>
                                        <option value="SUPPLIER">Fournisseur</option>
                                        <option value="AUF_ALLOCATAIRE">Auf Allocataire</option>
                                        <option value="AUF_MISSIONNAIRE">Auf Missionnaire</option>
                                        <option value="AUF_STAGIAIRE">Auf stagiaire</option>
                                        <option value="AUF_STAGIAIRE">Auf stagiaire Co-Financé</option>
                                        <option value="AUF_STAGIAIRE">Auf stagiaire Non-Financé</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div>
                                 <div class="flex">
                                    <label  class="labelInput" >
                                        Type d'Organisation
                                    </label> 
                                    <span class="required text-red-600 ml-3">*</span>
                                </div>
                                <div class="relative">
                                    <div v-if=" form.typeFournisseur === 'SUPPLIER'">
                                        <select class="select" :class="form.errors.typeOrganisation ? 'border-red-500' : 'border-gray-200'"
                                        v-model="form.typeOrganisation" @click.prevent="allocataire2" required>
                                            <option disabled value=""></option>
                                            <option value="CORPORATION">Societé</option>
                                            <option value="INDIVIDUAL">Personne Physique</option>
                                        </select>
                                    </div>
                                    <div v-else-if=" form.typeFournisseur === ''">
                                        <select class="select" :class="form.errors.typeOrganisation ? 'border-red-500' : 'border-gray-200'"
                                        v-model="form.typeOrganisation" @click.prevent="allocataire2" required>
                                            <option disabled value=""></option>
                                            <option value="CORPORATION">Societé</option>
                                            <option value="INDIVIDUAL">Personne Physique</option>
                                        </select>
                                    </div>
                                    <div v-else>
                                        <select class="select" :class="form.errors.typeOrganisation ? 'border-red-500' : 'border-gray-200'"
                                        v-model="form.typeOrganisation" disabled required>
                                            <option disabled value=""></option>
                                            <option value="INDIVIDUAL">Personne Physique</option>
                                        </select>
                                    </div>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.typeOrganisation" v-text="form.errors.typeOrganisation[0]"></span>
                        </div>
                        <div>
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.typeFournisseur" v-text="form.errors.typeFournisseur[0]"></span>
                        </div>
                    </div>
                    <div class="w-1/4 h-8 mx-6 my-4">
                         <div class="flex">
                            <label  class="labelInput" >
                                Nom du Site
                            </label> 
                            <span class="required text-red-600 ml-3">*</span>
                         </div>
                        <input class="inputText " type="text"  :class="form.errors.nomSite ? 'border-red-500' : 'border-gray-200'" 
                                        v-model="form.nomSite" disabled required>
                        <span class="text-xs text-red-600 italic text-error mx-4" v-if="form.errors.nomSite" v-text="form.errors.nomSite[0]"></span>
                    </div>
                    <div class="w-1/4 h-8 mx-6 my-4">
                        <div class="flex">
                            <label  class="labelInput" >
                                Nom du l'Adresses
                           </label> 
                           <span class="required text-red-600 ml-3">*</span>
                        </div>                        
                        <input class="inputText" type="text"  :class="form.errors.nomAdresse ? 'border-red-500' : 'border-gray-200'" 
                                    v-model="form.nomAdresse" disabled required>  
                        <span class="text-xs text-red-600 italic text-error mx-4" v-if="form.errors.nomAdresse" v-text="form.errors.nomAdresse[0]"></span>
                    </div>
                    <div class="w-1/4 h-8 mx-6 my-4">
                        <span class="labelInput">Titre de Civilité</span>
                               <div class="mt-2">
                                    <label class="inline-flex items-center justify-between">
                                        <input type="radio" class="form-radio border" :class="form.errors.titreCivilite ? 'border-red-500' : 'border-gray-200'" 
                                              value="Mr." v-model="form.titreCivilite" :disabled="!this.suppFields">
                                        <span class="block  tracking-wide text-gray-500 text-xs font-bold mx-2">Mr</span>
                                    </label>
                                    <label class="inline-flex items-center ml-6">
                                        <input type="radio" class="form-radio border" :class="form.errors.titreCivilite ? 'border-red-500' : 'border-gray-200'" 
                                              value="Mme." v-model="form.titreCivilite" :disabled="!this.suppFields">
                                        <span class="block  tracking-wide text-gray-500 text-xs font-bold mx-2">Mme</span>
                                    </label>
                                </div>
                        <span class="text-xs text-red-600 italic text-error mx-4" v-if="form.errors.titreCivilite" v-text="form.errors.titreCivilite[0]"></span>

                    </div>
                </div>

         <!-- ligne 2 -->


                    <div class="flex mx-10" :class="'nomFournisseur' in form.errors || 'envoicde' in form.errors || 'modePaiement' in form.errors || 'adresse1' in form.errors || 'nomContact' in form.errors ? 'my-10':''">
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <div class="flex">
                                <label  class="labelInput" >
                                    Nom du Fournisseur
                                </label> 
                                <span class="required text-red-600 ml-3">*</span>
                            </div>   
                            <input class="uppercase inputText" :class="form.errors.nomFournisseur ? 'border-red-500' : 'border-gray-200'"
                                   type="text" v-model="form.nomFournisseur" required>
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.nomFournisseur" v-text="form.errors.nomFournisseur[0]"></span>
                        </div>
                        <div class="w-1/4 h-8 flex-col mx-6 my-4">
                            <div class="flex justify-between">
                                 <div class=" mr-2">
                                    <label class="labelInput" >
                                        Envoie du Bon de Commande
                                    </label>
                                    <div class="relative">
                                        <select class="select" :class="form.errors.envoicde ? 'border-red-500' : 'border-gray-200'"  v-model="form.envoicde">
                                            <option value="NONE">Aucun</option>
                                            <option value="EMAIL">Courriel</option>
                                            <option value="FAX">Télécopie</option>
                                            <option value="PRINT">Impression</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="labelInput" >
                                    Mode de Paiement
                                    </label>
                                    <div class="relative">
                                        <select class="select" :class="form.errors.modePaiement ? 'border-red-500' : 'border-gray-200'"  v-model="form.modePaiement" required>
                                            <option></option>
                                            <option value="Espece" selected>AUF Espece</option>
                                            <option value="Cheque" >AUF Cheque</option>
                                            <option value="AUF_Virement">AUF Virement</option>
                                            <option value="Electronique">AUF Electronique</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.envoicde" v-text="form.errors.typeOrganisation[0]"></span>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.modePaiement" v-text="form.errors.typeFournisseur[0]"></span>
                            </div>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                             <div class="flex">
                                <label  class="labelInput" >
                                    Ligne d'adresse 1
                                </label> 
                                 <span class="required text-red-600 ml-3">*</span>
                            </div>   
                            <input class="inputText"  :class="form.errors.adresse1 ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.adresse1" required> 
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.adresse1" v-text="form.errors.adresse1[0]"></span>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <label class="labelInput" >
                                    Nom
                            </label>
                                <input class="inputText"  :class="form.errors.nomContact ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.nomContact" :disabled="!this.suppFields" >
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.nomContact" v-text="form.errors.nomContact[0]"></span>
                        </div>
                    </div>

                     <!-- ligne 3 -->
                
                    <div class="flex mx-10" :class="'autreNom' in form.errors || 'courrielSite' in form.errors || 'adresse2' in form.errors || 'prenomContact' in form.errors? 'my-10':''">
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <div class="flex">
                                <label  class="labelInput" >
                                    Autre Nom 
                                </label> 
                                 <span class="required text-red-600 ml-3">*</span>
                            </div>   
                            <input class="inputText"  :class="form.errors.autreNom ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.autreNom">
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.autreNom" v-text="form.errors.autreNom[0]"></span>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <label class="labelInput" >
                                Courriel
                            </label>
                            <input class="inputText" :class="form.errors.courrielSite ? 'border-red-500' : 'border-gray-200'" type="email" v-model="form.courrielSite">
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.courrielSite" v-text="form.errors.courrielSite[0]"></span>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                             <div class="flex">
                                <label  class="labelInput" >
                                    ligne d'adresse 2
                                </label> 
                                <span class="required text-red-600 ml-3">*</span>
                            </div>   
                            <input class="inputText"  :class="form.errors.adresse2 ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.adresse2">  
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.adresse2" v-text="form.errors.adresse2[0]"></span>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <label class="labelInput" >
                                Prénom
                            </label>
                            <input class="inputText"  :class="form.errors.prenomContact ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.prenomContact" :disabled="!this.suppFields">
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.prenomContact" v-text="form.errors.prenomContact[0]"></span>
                        </div>
                    </div>


                    <!-- ligne 4 -->


                    <div class="flex mx-10" :class="'prestationFourni' in form.errors || 'pays' in form.errors || 'ville' in form.errors || 'deuxiemePrenomContact' in form.errors? 'my-10':''">
                        <div class="w-1/4 h-8  mx-6 my-4">
                        <label class="labelInput" >
                                Type de Prestation Fournie
                            </label>
                            <input class="inputText" :class="form.errors.prestationFourni ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.prestationFourni">
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.prestationFourni" v-text="form.errors.prestationFourni[0]"></span>
                        </div>       
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <label class="inline-flex items-center mt-3">
                                <input  type="checkbox" class="form-radio h-5 w-5 text-red-600" :class="form.errors.paieOnRecip ? 'border-red-500' : 'border-gray-200'"  v-model="form.paieOnRecip">
                                <span class="block  tracking-wide text-gray-500 text-xs font-bold m-2 " > Payer a la Réception </span>
                            </label>
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.paieOnRecip" v-text="form.errors.paieOnRecip[0]"></span>
                        </div>
                        <div class="w-1/4 h-8  flex-col mx-6 my-4">
                            <div class="flex justify-between">
                                    <div class="mr-2">
                                    <label class="labelInput" >
                                        Pays
                                    </label>
                                    <div class="relative">
                                        <select class="select" :class="form.errors.pays ? 'border-red-500' : 'border-gray-200'" v-model="form.pays" @mouseleave="valeurSite">
                                                <option></option>
                                                <option v-for="pay in pays" :key="pay.index" :value="pay.TerritoryCode">{{ pay.TerritoryShortName }}</option>
                                        
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="labelInput" >
                                        Ville
                                    </label>
                                    <input class="inputText" :class="form.errors.ville ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.ville" @mouseleave="valeurSite">
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.ville" v-text="form.errors.ville[0]"></span>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.pays" v-text="form.errors.pays[0]"></span>
                            </div>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <label class="labelInput" >
                                Deuxieme Prénom
                            </label>
                                <input class="inputText" :class="form.errors.deuxiemePrenomContact ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.deuxiemePrenomContact" :disabled="!this.suppFields">
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.deuxiemePrenomContact" v-text="form.errors.deuxiemePrenomContact[0]"></span>
                        </div>
                    </div>


             <!-- ligne 5 -->


                    <div class="flex mx-10" :class="'titreCiviliteE' in form.errors || 'conditionPaiement' in form.errors || 'groupePaie' in form.errors || 'codePostal' in form.errors || 'intituleEmploi' in form.errors ? 'my-10':''">
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <div :hidden="suppFields">
                                <span class="labelInput">Titre de Civilité</span>
                                    <div class="mt-2">
                                        <label class="inline-flex items-center justify-between">
                                            <input type="radio" class="form-radio border" :class="form.errors.titreCiviliteE ? 'border-red-500' : 'border-gray-200'"  v-model="form.titreCiviliteE" value="Mr." @mouseleave="nomContact">
                                            <span class="block  tracking-wide text-gray-500 text-xs font-bold mx-2">Mr</span>
                                        </label>
                                        <label class="inline-flex items-center ml-6">
                                            <input type="radio" class="form-radio border" :class="form.errors.titreCiviliteE ? 'border-red-500' : 'border-gray-200'"  v-model="form.titreCiviliteE" value="Mme." @mouseleave="nomContact">
                                            <span class="block  tracking-wide text-gray-500 text-xs font-bold mx-2">Mme</span>
                                        </label>
                                    </div>
                            </div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.titreCiviliteE" v-text="form.errors.titreCiviliteE[0]"></span>
                        </div>
                        <div class="w-1/4 h-8 flex-col  mx-6 my-4">
                            <div class="flex justify-between">
                                <div class=" mr-2">
                                    <label class="labelInput" >
                                        Conditions de Paiement
                                    </label>
                                    <div class="relative">
                                        <select class="select" :class="form.errors.conditionPaiement ? 'border-red-500' : 'border-gray-200'" v-model="form.conditionPaiement">
                                            <option></option>
                                            <option v-for="paymentterms in paymentterm" :key="paymentterms.index">{{ paymentterms.Name }}</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex">
                                        <label  class="labelInput" >
                                            Groupe de Paie
                                        </label> 
                                        <span class="required text-red-600 ml-3">*</span>
                                    </div>   
                                    <div class="relative">
                                        <select class="select" :class="form.errors.groupePaie ? 'border-red-500' : 'border-gray-200'" v-model="form.groupePaie" required>
                                            <option></option>
                                            <option v-for="paygroup in paigroup" :key="paygroup.index" :value="paygroup.LookupCode">{{ paygroup.DisplayedField.substring(0,30) }}</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.groupePaie" v-text="form.errors.codePostal[0]"></span>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.conditionPaiement" v-text="form.errors.codePostal[0]"></span>
                            </div>     
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                        <label class="labelInput" >
                                Code Postale
                            </label>
                            <input class="inputText" :class="form.errors.codePostal ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.codePostal">
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.codePostal" v-text="form.errors.codePostal[0]"></span>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <label class="labelInput" >
                                Intitulé du l'emploi
                            </label>
                            <input class="inputText" :class="form.errors.intituleEmploi ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.intituleEmploi">
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.intituleEmploi" v-text="form.errors.intituleEmploi[0]"></span>
                        </div>
                    </div>


                  <!-- ligne 6 -->



                    <div class="flex mx-10" :class="'nomEntete' in form.errors || 'devise' in form.errors || 'codeRegionTelAdresse' in form.errors || 'codePaysTelAdresse' in form.errors || 'codeRegionTelContact' in form.errors || 'codePaysTelContact' in form.errors ? 'my-10':''">
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <div :hidden="suppFields">
                                <label class="labelInput" >
                                    Nom
                                </label>
                                <input class="inputText" :class="form.errors.nomEntete ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.nomEntete" @mouseleave="nomContact">
                            </div>
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.nomEntete" v-text="form.errors.nomEntete[0]"></span>
                        </div>
                        <div class="w-1/4 h-8 flex-col mx-6 my-4">
                            <div class="flex">
                                <div class=" mr-2">
                                    <label class="labelInput" >
                                        Tolerances montant
                                    </label>
                                    <div class="relative">
                                        <select class="select"  :class="form.errors.tolerancesMontant ? 'border-red-500' : 'border-gray-200'" v-model="form.tolerancesMontant">
                                            <option></option>
                                            <option v-for="tolerancemontants in tolerancemontant" :key="tolerancemontants.index" :value=" tolerancemontants.ToleranceId ">{{ tolerancemontants.Description }}</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <label class="labelInput" >
                                        Devise
                                    </label>
                                    <div class="relative">
                                        <select class="select" :class="form.errors.devise ? 'border-red-500' : 'border-gray-200'" v-model="form.devise">
                                            <option></option>
                                            <option v-for="devises in devise" :key="devises.index" :value=" devises.Value ">{{ devises.Description.substring(0, 25) }}</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.devise" v-text="form.errors.devise[0]"></span>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.tolerancesMontant" v-text="form.errors.tolerancesMontant[0]"></span>
                            </div>
                        </div>
                        <div class="w-1/4 h-8 flex-col mx-6 my-4">
                            <div class="flex">
                                <div class="mr-2">
                                    <label class="block tracking-wide text-gray-500 text-xs font-bold mb-2" >
                                        Code Régionale Tel
                                    </label>
                                    <input class="inputText" :class="form.errors.codeRegionTelAdresse ? 'border-red-500' : 'border-gray-200'" type="number" v-model="form.codeRegionTelAdresse">
                                </div>
                                <div>
                                    <label class="labelInput" >
                                        Code pays Tel
                                    </label>
                                    <input class="inputText" :class="form.errors.codePaysTelAdresse ? 'border-red-500' : 'border-gray-200'" type="number" v-model="form.codePaysTelAdresse">
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.codeRegionTelAdresse" v-text="form.errors.codeRegionTelAdresse[0]"></span>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.codePaysTelAdresse" v-text="form.errors.codePaysTelAdresse[0]"></span>
                            </div>
                        </div>
                        <div class="w-1/4 h-8 flex-col mx-6 my-4">
                            <div class="flex">
                                <div class="mr-2">
                                    <label class="block tracking-wide text-gray-500 text-xs font-bold mb-2" >
                                        Code Régionale Tel
                                    </label>
                                    <input class="inputText" :class="form.errors.codeRegionTelContact ? 'border-red-500' : 'border-gray-200'" type="number" v-model="form.codeRegionTelContact">
                                </div>
                                <div>
                                    <label class="labelInput" >
                                        Code pays Tel
                                    </label>
                                    <input class="inputText" :class="form.errors.codePaysTelContact ? 'border-red-500' : 'border-gray-200'" type="number" v-model="form.codePaysTelContact">
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.codeRegionTelContact" v-text="form.errors.codeRegionTelContact[0]"></span>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.codePaysTelContact" v-text="form.errors.codePaysTelContact[0]"></span>
                            </div>
                        </div>
                    </div>


                      <!-- ligne 7 -->

                    <div class="flex mx-10" :class="'prenomEntete' in form.errors || 'ventilation' in form.errors || 'ExtensionTelAdresse' in form.errors || 'TelAdresse' in form.errors || 'ExtensionTelContact' in form.errors || 'TelContact' in form.errors ? 'my-10':''">
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <div :hidden="suppFields">
                                <label class="labelInput" >
                                    Prénom
                                </label>
                                <input class="inputText" :class="form.errors.prenomEntete ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.prenomEntete" @mouseleave="nomContact">
                            </div>
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.prenomEntete" v-text="form.errors.prenomEntete[0]"></span>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <label class="labelInput" >
                                Ventilation du Passif
                            </label>
                            <input class="inputText" :class="form.errors.ventilation ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.ventilation" 
                                        disabled>
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.ventilation" v-text="form.errors.ventilation[0]"></span>    
                        </div>
                        <div class="w-1/4 h-8 flex-col mx-6 my-4">
                            <div class="flex">
                                <div class="mr-2">
                                    <label class="labelInput" >
                                        Extension du Tél
                                    </label>
                                    <input class="inputText" :class="form.errors.ExtensionTelAdresse ? 'border-red-500' : 'border-gray-200'" type="number" v-model="form.ExtensionTelAdresse">
                                </div>
                                <div>
                                    <label class="labelInput" >
                                        Téléphone
                                    </label>
                                    <input class="inputText" :class="form.errors.TelAdresse ? 'border-red-500' : 'border-gray-200'" type="number" v-model="form.TelAdresse">
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.TelAdresse" v-text="form.errors.TelAdresse[0]"></span>    
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.ExtensionTelAdresse" v-text="form.errors.ExtensionTelAdresse[0]"></span>    
                            </div>
                        </div>
                        <div class="w-1/4 h-8 flex-col mx-6 my-4">
                            <div class="flex">
                                <div class="mr-2">
                                    <label class="labelInput" >
                                        Extension du Tél
                                    </label>
                                    <input class="inputText" :class="form.errors.ExtensionTelContact ? 'border-red-500' : 'border-gray-200'" type="number" v-model="form.ExtensionTelContact">
                                </div>
                                <div>
                                    <label class="labelInput" >
                                        Téléphone
                                    </label>
                                    <input class="inputText" :class="form.errors.TelContact ? 'border-red-500' : 'border-gray-200'" type="number" v-model="form.TelContact">
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.ExtensionTelContact" v-text="form.errors.ExtensionTelContact[0]"></span>    
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.TelContact" v-text="form.errors.TelContact[0]"></span>    
                            </div>
                        </div>
                    </div>


<!-- ligne 8 -->


                <div class="flex mx-10" :class="'deuxiemePrenomEntete' in form.errors || 'banque' in form.errors || 'iban' in form.errors || 'codeRegFaxAdresse' in form.errors || 'codePaysFaxAdresse' in form.errors || 'codeRegFaxContact' in form.errors || 'codePaysFaxContact' in form.errors ? 'my-10':''">
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <div :hidden="suppFields">
                                <label class="labelInput" >
                                Deuxieme Prénom
                                </label>
                                <input class="inputText" :class="form.errors.deuxiemePrenomEntete ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.deuxiemePrenomEntete" @mouseleave="nomContact">
                            </div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.deuxiemePrenomEntete" v-text="form.errors.deuxiemePrenomEntete[0]"></span>    
                        </div>
                        <div class="w-1/4 h-8 flex-col mx-6 my-4">
                            <div class="flex">
                                <div class="mr-2" >
                                    <label class="block tracking-wide text-gray-500 text-xs font-bold mb-2" >
                                        Nom de la Banque
                                    </label>
                                    <input class="inputText" :class="form.errors.banque ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.banque">
                                </div>
                                <div >
                                    <label class="labelInput" >
                                    IBAN
                                    </label>
                                    <input class="inputText" :class="form.errors.iban ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.iban">
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.iban" v-text="form.errors.iban[0]"></span>    
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.banque" v-text="form.errors.banque[0]"></span>    
                            </div>
                        </div>
                        <div class="w-1/4 h-8 flex-col mx-6 my-4">
                            <div class="flex">
                                <div class="mr-2">
                                    <label class="block tracking-wide text-gray-500 text-xs font-bold mb-2" >
                                        Code Régionale Fax
                                    </label>
                                    <input class="inputText" :class="form.errors.codeRegFaxAdresse ? 'border-red-500' : 'border-gray-200'" type="number" v-model="form.codeRegFaxAdresse">
                                </div>
                                <div>
                                    <label class="labelInput" >
                                        Code pays Fax
                                    </label>
                                    <input class="inputText" :class="form.errors.codePaysFaxAdresse ? 'border-red-500' : 'border-gray-200'" type="number" v-model="form.codePaysFaxAdresse">
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.iban" v-text="form.errors.iban[0]"></span>    
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.banque" v-text="form.errors.banque[0]"></span>    
                            </div>
                        </div>
                        <div class="w-1/4 h-8 flex-col  mx-6 my-4">
                            <div class="flex">
                                <div class="mr-2" >
                                    <label class="block tracking-wide text-gray-500 text-xs font-bold mb-2" >
                                        Code Régionale Fax
                                    </label>
                                    <input class="inputText" :class="form.errors.codeRegFaxContact ? 'border-red-500' : 'border-gray-200'" type="number" v-model="form.codeRegFaxContact">
                                </div>
                                <div>
                                    <label class="labelInput" >
                                        Code pays Fax
                                    </label>
                                    <input class="inputText" :class="form.errors.codePaysFaxContact ? 'border-red-500' : 'border-gray-200'"  type="number" v-model="form.codePaysFaxContact">
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.iban" v-text="form.errors.iban[0]"></span>    
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.banque" v-text="form.errors.banque[0]"></span>    
                            </div>
                        </div>
                    </div>



                    <!-- Ligne 9 -->


                    <div class="flex mx-10" :class="'deactivationEntete' in form.errors || 'dateNaissance' in form.errors || 'numeroCompteB' in form.errors || 'faxAdresse' in form.errors || 'faxContact' in form.errors ? 'my-12':''">
                        <div class="w-1/4 h-8 flex-col mx-6 my-4">
                            <div class="flex justify-between">
                                <div :hidden="suppFields">
                                    <label class="labelInput" >
                                        Date de Deactivation
                                    </label>
                                    <input class="inputText" :class="form.errors.deactivationEntete ? 'border-red-500' : 'border-gray-200'" type="date" v-model="form.deactivationEntete">
                                </div>
                                <div :hidden="suppFields">
                                    <label class="labelInput" >
                                        Date de Naissance
                                    </label>
                                    <input class="inputText" :class="form.errors.dateNaissance ? 'border-red-500' : 'border-gray-200'" type="date" v-model="form.dateNaissance">
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.dateNaissance" v-text="form.errors.dateNaissance[0]"></span>
                            </div>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <label class="labelInput" >
                            Numero Compte Bancaire
                            </label>
                            <input class="inputText" :class="form.errors.numeroCompteB ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.numeroCompteB"> 
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.numeroCompteB" v-text="form.errors.numeroCompteB[0]"></span>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <label class="labelInput" >
                                Fax
                            </label>
                            <input class="inputText" :class="form.errors.faxAdresse ? 'border-red-500' : 'border-gray-200'" type="number" v-model="form.faxAdresse">
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.faxAdresse" v-text="form.errors.faxAdresse[0]"></span>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <label class="labelInput" >
                                Fax
                            </label>
                            <input class="inputText" :class="form.errors.faxContact ? 'border-red-500' : 'border-gray-200'" type="number" v-model="form.faxContact">
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.faxContact" v-text="form.errors.faxContact[0]"></span>
                        </div>
                    </div>


              <!-- ligne 10 -->

                    <div class="flex mx-10" :class="'nationalite' in form.errors || 'domaine' in form.errors || 'discipline' in form.errors || 'courrielAdresse' in form.errors || 'CourrielContact' in form.errors ? 'my-10':''">
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <div :hidden="suppFields">
                                    <label class="labelInput" >
                                        Nationalité
                                    </label>
                                    <div class="relative">
                                        <select class="select" :class="form.errors.nationalite ? 'border-red-500' : 'border-gray-200'" v-model="form.nationalite">
                                            <option></option>
                                            <option v-for="nationalites in nationalite" :key="nationalites.index" >{{ nationalites.Value}}</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                    <span class="text-xs text-red-600 italic text-error" v-if="form.errors.nationalite" v-text="form.errors.nationalite[0]"></span>
                            </div>
                        </div>
                        <div class="w-1/4 h-8 flex-col mx-6 my-4">
                            <div class="flex">
                                <div class="mr-2" :hidden="suppFields">
                                    <label class="labelInput" >
                                    Domaine
                                    </label>
                                    <div class="relative">
                                        <select class="select" :class="form.errors.domaine ? 'border-red-500' : 'border-gray-200'" v-model="form.domaine">
                                            <option></option>
                                            <option v-for="domaines in domaine" :key="domaines.index" :value=" domaines.Value ">{{ domaines.Description.substring(0, 35) }}</option>

                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div :hidden="suppFields">
                                    <label class="labelInput" >
                                        Discipline
                                        </label>
                                        <div class="relative">
                                            <select class="select" :class="form.errors.discipline ? 'border-red-500' : 'border-gray-200'" v-model="form.discipline">
                                                <option></option>
                                                <option v-for="disciplines in discipline" :key="disciplines.index" :value=" disciplines.discipline ">{{ disciplines.discipline.substring(0, 35) }}</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.domaine" v-text="form.errors.domaine[0]"></span>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.discipline" v-text="form.errors.discipline[0]"></span>
                            </div>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <label class="labelInput" >
                                Courriel
                            </label>
                            <input class="inputText" :class="form.errors.courrielAdresse ? 'border-red-500' : 'border-gray-200'" type="email" v-model="form.courrielAdresse"> 
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.courrielAdresse" v-text="form.errors.courrielAdresse[0]"></span>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <label class="labelInput" >
                                Couriel
                            </label>
                            <input class="inputText" :class="form.errors.CourrielContact ? 'border-red-500' : 'border-gray-200'" type="email" v-model="form.CourrielContact">
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.CourrielContact" v-text="form.errors.CourrielContact[0]"></span>
                        </div>
                    </div>

             <!-- ligne 11 -->


                    <div class="flex mx-10" :class="'region' in form.errors || 'mobilite' in form.errors || 'deactivationAdresse' in form.errors ? 'my-10':''">
                        <div class="w-1/4 h-8 mx-6 my-4">
                        
                        </div>
                        <div class="w-1/4 h-8 flex-col mx-6 my-4">
                            <div class="flex">
                                <div class="mr-2" :hidden="suppFields">
                                    <label class="labelInput" >
                                        Region
                                        </label>
                                        <div class="relative">
                                            <select class="select" :class="form.errors.region ? 'border-red-500' : 'border-gray-200'" v-model="form.region">
                                                <option></option>
                                                <option v-for="regions in region" :key="regions.index" :value=" regions.Value ">{{ regions.Description.substring(0, 35) }}</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                            </div>
                                        </div>
                                </div>
                                <div :hidden="suppFields">
                                    <label class="labelInput" >
                                    Type de Mobilité
                                    </label>
                                    <div class="relative">
                                        <select class="select" :class="form.errors.mobilite ? 'border-red-500' : 'border-gray-200'" v-model="form.mobilite">
                                            <option></option>
                                            <option v-for="typemobilites in typemobilite" :key="typemobilites.index" :value=" typemobilites.Value ">{{ typemobilites.Description }}</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.region" v-text="form.errors.region[0]"></span>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.mobilite" v-text="form.errors.mobilite[0]"></span>
                            </div>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <label class="labelInput" >
                                Date de Désactivation
                            </label>
                            <input class="inputText" :class="form.errors.deactivationAdresse ? 'border-red-500' : 'border-gray-200'" type="date" v-model="form.deactivationAdresse"> 
                            <span class="text-xs text-red-600 italic text-error" v-if="form.errors.deactivationAdresse" v-text="form.errors.deactivationAdresse[0]"></span>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                        
                        </div>
                    </div>


                     <!-- ligne 12 -->


                    <div class="flex mx-10" :class="'etablismnOrigine' in form.errors || 'etablismnAcceuil' in form.errors || 'etat' in form.errors || 'province' in form.errors || 'canton' in form.errors ? 'my-10':''">
                        <div class="w-1/4 h-8 mx-6 my-4">
                        
                        </div>
                        <div class="w-1/4 h-8 flex-col mx-6 my-4">
                            <div class="flex">
                                <div class="mr-2" :hidden="suppFields">
                                <label class="labelInput" >
                                    Etablissement Origine
                                    </label>
                                    <div class="relative">
                                        <select class="select" :class="form.errors.etablismnOrigine ? 'border-red-500' : 'border-gray-200'" v-model="form.etablismnOrigine">
                                            <option></option>
                                            <option v-for="etablissemns in etablissemn" :key="etablissemns.index" :value=" etablissemns.Id ">{{ etablissemns.Description.substring(0, 35) }}</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <div :hidden="suppFields">
                                    <label class="labelInput" >
                                    Etablissement Acceuil
                                    </label>
                                    <div class="relative">
                                        <select class="select" :class="form.errors.etablismnAcceuil ? 'border-red-500' : 'border-gray-200'" v-model="form.etablismnAcceuil">
                                            <option></option>
                                            <option v-for="etablissemns in etablissemn" :key="etablissemns.index" :value=" etablissemns.Id ">{{ etablissemns.Description.substring(0, 35) }}</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.etablismnAcceuil" v-text="form.errors.etablismnAcceuil[0]"></span>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.etablismnOrigine" v-text="form.errors.etablismnOrigine[0]"></span>
                            </div>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                            <div v-if="form.pays ==='US'" :hidden="false">
                                <div class="flex">
                                    <label class="labelInput">
                                        Etat
                                    </label>
                                    <span class="required text-red-600 ml-3">*</span>
                                </div>
                                <input class="inputText" :class="form.errors.etat ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.etat" required> 
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.etat" v-text="form.errors.etat[0]"></span>
                            </div>
                            <div v-else-if="form.pays ==='CA'" :hidden="false">
                                <div class="flex">
                                        <label class="labelInput" >
                                            Provimce 
                                        </label>
                                    <span class="required text-red-600 ml-3">*</span>
                                </div>
                                <input class="inputText" :class="form.errors.province ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.province" required> 
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.province" v-text="form.errors.province[0]"></span>
                            </div>
                            <div v-else-if="form.pays ==='ZA'" :hidden="false">
                                <div class="flex">
                                        <label class="labelInput" >
                                            Canton 
                                        </label>
                                    <span class="required text-red-600 ml-3">*</span>
                                </div>
                                <input class="inputText" :class="form.errors.canton ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.canton" required>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.canton" v-text="form.errors.canton[0]"></span>
                            </div>
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                        
                        </div>
                    </div>



                    <!-- ligne 13 -->


                    <div class="flex mx-10" :class="'debutMobilité' in form.errors || 'finMobilité' in form.errors? 'my-10':''">
                        <div class="w-1/4 h-8 mx-6 my-4">
                        
                        </div>
                        <div class="w-1/4 h-8 flex-col mx-6 my-4">
                            <div class="flex justify-between" >
                                <div :hidden="suppFields">
                                    <label class="labelInput" >
                                        Date de Fin de Mobilité
                                    </label>
                                    <input class="inputText" :class="form.errors.debutMobilité ? 'border-red-500' : 'border-gray-200'" type="date" v-model="form.debutMobilité">
                                </div>
                                <div :hidden="suppFields">
                                    <label class="labelInput" >
                                        Date de Début de Mobilité
                                    </label>
                                    <input class="inputText" :class="form.errors.finMobilité ? 'border-red-500' : 'border-gray-200'"  type="date" v-model="form.finMobilité">
                                </div>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.debutMobilité" v-text="form.errors.debutMobilité[0]"></span>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.finMobilité" v-text="form.errors.finMobilité[0]"></span>
                            </div>
                        </div>  
                        <div class="w-1/4 h-8 mx-6 my-4">
                        
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                        
                        </div>
                    </div>



                    <!-- ligne 14 -->


                    <div class="flex mx-10" :class="'projet' in form.errors || 'montantUnitaire' in form.errors ? 'my-10':''">
                        <div class="w-1/4 h-8 mx-6 my-4">
                        
                        </div>
                        <div class="w-1/4 h-8 flex-col mx-6 my-4">
                            <div class="flex justify-between">
                                <div class="mr-2" :hidden="suppFields">
                                    <label class="labelInput" >
                                        Projet
                                        </label>
                                        <div class="relative">
                                            <select class="select" :class="form.errors.projet ? 'border-red-500' : 'border-gray-200'" v-model="form.projet">
                                                <option></option>
                                                <option v-for="projects in project" :key="projects.index" :value=" projects.Value ">{{ projects.Description.substring(0, 35) }}</option>
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div :hidden="suppFields">
                                        <label class="labelInput" >
                                            Montant Unitaire
                                        </label>
                                        <input class="inputText" :class="form.errors.montantUnitaire ? 'border-red-500' : 'border-gray-200'" type="text" v-model="form.montantUnitaire">
                                    </div>  
                            </div>
                             <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.projet" v-text="form.errors.projet[0]"></span>
                            </div>
                            <div>
                                <span class="text-xs text-red-600 italic text-error" v-if="form.errors.montantUnitaire" v-text="form.errors.montantUnitaire[0]"></span>
                            </div>
                        </div>  
                        <div class="w-1/4 h-8 mx-6 my-4">
                        
                        </div>
                        <div class="w-1/4 h-8 mx-6 my-4">
                        
                        </div>
                    </div>

    
            <!-- ligne 15 -->

                    <div class="flex mx-10">
                        <div class="w-1/4 h-8 mx-6 my-4">
                        
                        </div>
                        <div class="w-1/4 h-8 flex justify-between mx-6 my-4">
                        
                        </div>  
                        <div class="w-1/4 h-8 mx-6 my-4">
                        
                        </div>
                        <div class="w-1/4 h-8 flex justify-between mx-6 my-4">
                            <div >
                                <button class="submitButoon"> Sauvegarder </button>
                            </div>
                            <div>
                                <button class="cancelButton" type="button"> Annuler</button>
                            </div>
                        </div>  
                    </div>

    </form>
</template>

<script>
    import SupplierForm from './SupplierForm';

    export default {
        props: ['pays', 'nationalite', 'paigroup',
                'project', 'typemobilite', 'domaine',
                'etablissemn', 'devise', 'discipline',
                'region', 'paymentterm', 'tolerancemontant'],
        data() {
            return {
                suppFields:true,
                form: new SupplierForm({
                    
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


                })
            };
        },
        methods: {
            valeurSite(){
                return this.form.nomSite = this.form.pays + "-" + this.form.ville, this.form.nomAdresse = this.form.pays + "-" + this.form.ville     
            },

            nomContact(){
                 if (this.form.typeOrganisation === 'INDIVIDUAL') {
                    return this.form.titreCivilite = this.form.titreCiviliteE ,this.form.nomContact =this.form.nomEntete , this.form.prenomContact = this.form.prenomEntete ,this.form.deuxiemePrenomContact = this.form.deuxiemePrenomEntete
                 }
            },

            allocataire(){
                if (this.form.typeFournisseur !== 'SUPPLIER') {
                
                    return this.form.typeOrganisation = "INDIVIDUAL", this.suppFields = false, this.form.ventilation="101-000-46710-000-000-000-000-000"

                }else{
                    return this.form.typeOrganisation = "", this.suppFields = true, this.form.ventilation="101-000-40100-000-000-000-000-000"
                }
            },

            allocataire2(){
                if (this.form.typeOrganisation === 'INDIVIDUAL' && this.form.typeFournisseur === 'SUPPLIER') {
        
                    return this.suppFields = false  
                    
                }else{
                    return this.suppFields = true
                }
            },

            async submit() {
                this.form.submit('/suppliers')
                         .then(response => location = response.data.message);
            }

        }
    }
</script>
