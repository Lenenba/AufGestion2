@extends('layouts.layout')
@section('content')



<form class="bg-white rounded-lg px-10 py-10" method="POST" action="/suppliers">
    @csrf   

<h1 class="block uppercase tracking-wide text-blue-400 text-lg mb-16 text-center"> Formulaire de Demande de Création de Fournisseur</h1>

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

        <div class="flex mx-10">
            <div class="w-1/4 h-8 flex justify-between mx-6 my-4">
                <div class=" mr-2">
                    <div class="flex">
                        <label class="labelInput" >
                            Type de Fournisseurs
                        </label> 
                        <span class="required text-red-600 ml-3">*</span>
                    </div>
                    <div class="relative">
                        <select class="{{$errors->has('typeFournisseur') ? 'border-red-500' : 'border-gray-200'}} select" name="typeFournisseur">
                            <option></option>
                            <option value="SUPPLIER">Fournisseur</option>
                            <option value="AUF_ALLOCATAIRE">Auf Allocataire</option>
                            <option value="AUF_MISSIONNAIRE">Auf Missionnaire</option>
                            <option value="AUF_STAGIAIRE">Auf stagiaire</option>
                            <option>Auf stagiaire Co-Financé</option>
                            <option>Auf stagiaire Non-Financé</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="labelInput" >
                        Type d'Organisation
                    </label>
                    <div class="relative">
                        <select class="{{$errors->has('typeOrganisation') ? 'border-red-500' : 'border-gray-200'}} select" name="typeOrganisation">
                            <option></option>
                            <option value="CORPORATE">Societé</option>
                            <option value="INDIVIDUAL">Personne Physique</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput">
                        Nom du Site
                </label>
                <input class="inputText {{$errors->has('nomSite') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="nomSite">
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                     Nom du l'Adresses
                </label>
                <input class="inputText {{$errors->has('nomAdresse') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="nomAdresse">  
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                <span class="labelInput">Titre de Civilité</span>
                        <div class="mt-2">
                            <label class="inline-flex items-center justify-between">
                                <input type="radio" class="form-radio border {{$errors->has('titreCivilite') ? 'border-red-500' : 'border-gray-200'}}" name="titreCivilite" value="Mr.">
                                <span class="block  tracking-wide text-gray-500 text-xs font-bold mx-2">Mr</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" class="form-radio border {{$errors->has('titreCivilite') ? 'border-red-500' : 'border-gray-200'}}" name="titreCivilite" value="Mme.">
                                <span class="block  tracking-wide text-gray-500 text-xs font-bold mx-2">Mme</span>
                            </label>
                        </div>
            </div>
        </div>


        <!-- ligne 2 -->



        <div class="flex mx-10">
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                    Nom du Fournisseur
                </label>
                <input class="uppercase {{$errors->has('nomFournisseur') ? 'border-red-500' : 'border-gray-200'}} inputText" type="text" name="nomFournisseur" placeholder="">
            </div>
            <div class="w-1/4 h-8 flex justify-between mx-6 my-4">
                    <div class=" mr-2">
                    <label class="labelInput" >
                         Envoie du Bon de Commande
                    </label>
                    <div class="relative">
                        <select class="{{$errors->has('envoicde') ? 'border-red-500' : 'border-gray-200'}} select" name="envoicde">
                            <option></option>
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
                        <select class=" {{$errors->has('modePaiement') ? 'border-red-500' : 'border-gray-200'}} select" name="modePaiement">
                            <option></option>
                            <option>AUF Cheque</option>
                            <option>AUF Virement</option>
                            <option>AUF Espece</option>
                            <option>AUF Electronique</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                 <label class="labelInput" >
                        Ligne d'adresse 1
                </label>
                <input class="inputText {{$errors->has('adresse1') ? 'border-red-500' : 'border-gray-200'}}" type="text" mane="adresse1">   
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                        Nom
                </label>
                <input class="inputText {{$errors->has('nomContact') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="nomContact">
            </div>
        </div>

        <!-- ligne 3 -->
       
        <div class="flex mx-10">
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                     Type de Prestation Fournie
                </label>
                <input class="inputText {{$errors->has('nomContact') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="prestationFourni">
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                 <label class="labelInput" >
                     Courriel
                </label>
                <input class="inputText {{$errors->has('nomContact') ? 'border-red-500' : 'border-gray-200'}}" type="email" name="courrielSite">
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                     ligne d'adresse 2
                </label>
                <input class="inputText {{$errors->has('nomContact') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="adresse2">  
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                     Prénom
                </label>
                <input class="inputText  {{$errors->has('nomContact') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="prenomContact">
            </div>
        </div>

        <!-- ligne 4 -->



        <div class="flex mx-10">
            <div class="w-1/4 h-8 flex justify-between mx-6 my-4">
                <div >
                    <label class="labelInput" >
                        Date de Deactivation
                    </label>
                    <input class="inputText {{$errors->has('deactivationEntete') ? 'border-red-500' : 'border-gray-200'}} " type="date" name="deactivationEntete">
                </div>
                <div>
                    <label class="labelInput" >
                        Date de Naissance
                    </label>
                    <input class="inputText {{$errors->has('dateNaissance') ? 'border-red-500' : 'border-gray-200'}} " type="date" name="dateNaissance">
                </div>
            </div>       
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="inline-flex items-center mt-3">
                    <input type="checkbox" class="form-radio h-5 w-5 text-red-600 {{$errors->has('paieOnRecip') ? 'border-red-500' : 'border-gray-200'}}
                    "  name="paieOnRecip"><span class="block  tracking-wide text-gray-500 text-xs font-bold m-2 " > Payer a la Réception </span>
                </label>
            </div>
            <div class="w-1/4 h-8 flex justify-between mx-6 my-4">
                <div class="mr-2">
                    <label class="labelInput" >
                        Pays
                    </label>
                    <div class="relative">
                        <select class="{{$errors->has('pays') ? 'border-red-500' : 'border-gray-200'}} select" name="pays">
                                <option></option>
                            @foreach( $pays['items'] as $pay)
                            <option value="{{$pay['TerritoryCode']}}">{{ $pay['TerritoryShortName'] }}</option>
                            @endforeach
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
                    <input class="inputText {{$errors->has('ville') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="ville">
                </div>
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                    Deuxieme Prénom
                </label>
                <input class="inputText {{$errors->has('deuxiemePrenomContact') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="deuxiemePrenomContact">
            </div>
        </div>


        <!-- ligne 5 -->


        <div class="flex mx-10">
            <div class="w-1/4 h-8 mx-6 my-4">
                     <span class="labelInput">Titre de Civilité</span>
                        <div class="mt-2">
                            <label class="inline-flex items-center justify-between">
                                <input type="radio" class="form-radio border {{$errors->has('titreCivilite') ? 'border-red-500' : 'border-gray-200'}}" name="titreCivilite" value="Mr.">
                                <span class="block  tracking-wide text-gray-500 text-xs font-bold mx-2">Mr</span>
                            </label>
                            <label class="inline-flex items-center ml-6">
                                <input type="radio" class="form-radio border {{$errors->has('titreCivilite') ? 'border-red-500' : 'border-gray-200'}}" name="titreCivilite" value="Mme.">
                                <span class="block  tracking-wide text-gray-500 text-xs font-bold mx-2">Mme</span>
                            </label>
                        </div>
            </div>
            <div class="w-1/4 h-8 flex  mx-6 my-4">
              <div class=" mr-2">
                     <label class="labelInput" >
                        Conditions de Paiement
                    </label>
                    <div class="relative">
                        <select class="{{$errors->has('conditionPaiemnet') ? 'border-red-500' : 'border-gray-200'}} select" name="conditionPaiemnet">
                            <option></option>
                            @foreach( $paymentTerm['items'] as $paymentTerms)
                                <option>{{$paymentTerms['Name']}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="labelInput" >
                         Groupe de Paie
                    </label>
                    <div class="relative">
                        <select class="{{$errors->has('groupePaie') ? 'border-red-500' : 'border-gray-200'}} select" name="groupePaie">
                            <option></option>
                            @foreach($paigroup['items'] as $paygroup)
                            <option value="{{$paygroup['LookupCode']}}">{{ Illuminate\Support\Str::substr($paygroup['DisplayedField'], 0, 30)}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
            <label class="labelInput" >
                    Code Postale
                </label>
                <input class="inputText {{$errors->has('codePostal') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="codePostal">
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                 <label class="labelInput" >
                     Intitulé du l'emploi
                </label>
                <input class="inputText {{$errors->has('intituleEmploi') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="intituleEmploi">
            </div>
        </div>


        <!-- ligne 6 -->



        <div class="flex mx-10">
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                    Nom
                </label>
                <input class="inputText {{$errors->has('nomEntete') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="nomEntete">
            </div>
            <div class="w-1/4 h-8 flex mx-6 my-4">
                <div class=" mr-2">
                     <label class="labelInput" >
                         Tolerances montant
                    </label>
                    <div class="relative">
                        <select class="{{$errors->has('tolerancesMontant') ? 'border-red-500' : 'border-gray-200'}} select" name="tolerancesMontant">
                            <option></option>
                            @foreach($toleranceMontant['items'] as $toleranceMontants)
                            <option value="{{ $toleranceMontants['ToleranceId'] }}">{{ $toleranceMontants['Description'] }}</option>
                            @endforeach
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
                        <select class="{{$errors->has('devise') ? 'border-red-500' : 'border-gray-200'}} select" name="devise">
                            <option></option>
                            @foreach( $devise['items'] as $devises)
                                <option value="{{$devises['Value']}}">{{ Illuminate\Support\Str::substr($devises['Description'],0,25) }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/4 h-8 flex mx-6 my-4">
            <div class="mr-2">
                    <label class="block tracking-wide text-gray-500 text-xs font-bold mb-2" >
                        Code Régionale Tel
                    </label>
                    <input class="inputText {{$errors->has('codeRegionTelAdresse') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="codeRegionTelAdresse">
                </div>
                <div>
                    <label class="labelInput" >
                        Code pays Tel
                    </label>
                    <input class="inputText {{$errors->has('codePaysTelAdresse') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="codePaysTelAdresse">
                </div>
            </div>
            <div class="w-1/4 h-8 flex mx-6 my-4">
                <div class="mr-2">
                    <label class="block tracking-wide text-gray-500 text-xs font-bold mb-2" >
                        Code Régionale Tel
                    </label>
                    <input class="inputText {{$errors->has('codeRegionTelContact') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="codeRegionTelContact">
                </div>
                <div>
                    <label class="labelInput" >
                        Code pays Tel
                    </label>
                    <input class="inputText {{$errors->has('codePaysTelContact') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="codePaysTelContact">
                </div>
            </div>
        </div>



        <!-- ligne 7 -->

        <div class="flex mx-10">
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                    Prénom
                </label>
                <input class="inputText {{$errors->has('codePaysTelAdresse') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="prenomEntete">
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                    <label class="labelInput" >
                       Ventilattion du Passif
                    </label>
                    <div class="relative">
                        <select class="{{$errors->has('codePaysTelAdresse') ? 'border-red-500' : 'border-gray-200'}} select" name="ventilation">
                            <option></option>
                            <option>101-000-46710-000-000-000-000-000</option>
                            <option>101-000-41000-000-000-000-000-000</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
            </div>
            <div class="w-1/4 h-8 flex mx-6 my-4">
                <div class="mr-2">
                    <label class="labelInput" >
                        Extension du Tél
                    </label>
                    <input class="inputText {{$errors->has('ExtensionTelAdresse') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="ExtensionTelAdresse">
                </div>
                <div>
                    <label class="labelInput" >
                        Téléphone
                    </label>
                    <input class="inputText {{$errors->has('TelAdresse') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="TelAdresse">
                </div>
            </div>
            <div class="w-1/4 h-8 flex mx-6 my-4">
            <div class="mr-2">
                    <label class="labelInput" >
                        Extension du Tél
                    </label>
                    <input class="inputText {{$errors->has('ExtensionTelContact') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="ExtensionTelContact">
                </div>
                <div>
                    <label class="labelInput" >
                        Téléphone
                    </label>
                    <input class="inputText {{$errors->has('TelContact') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="TelContact">
                </div>
            </div>
        </div>

    <!-- ligne 8 -->


       <div class="flex mx-10">
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                   Deuxieme Prénom
                </label>
                <input class="inputText {{$errors->has('deuxiemePrenomEntete') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="deuxiemePrenomEntete">
            </div>
            <div class="w-1/4 h-8 flex mx-6 my-4">
                 <div class="mr-2">
                    <label class="block tracking-wide text-gray-500 text-xs font-bold mb-2" >
                        Nom de la Banque
                    </label>
                    <input class="inputText {{$errors->has('banque') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="banque">
                </div>
                <div>
                    <label class="labelInput" >
                      IBAN
                    </label>
                    <input class="inputText {{$errors->has('iban') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="iban">
                </div>
            </div>
            <div class="w-1/4 h-8 flex mx-6 my-4">
                 <div class="mr-2">
                    <label class="block tracking-wide text-gray-500 text-xs font-bold mb-2" >
                        Code Régionale Fax
                    </label>
                    <input class="inputText {{$errors->has('codeRegFaxAdresse') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="codeRegFaxAdresse">
                </div>
                <div>
                    <label class="labelInput" >
                        Code pays Fax
                    </label>
                    <input class="inputText {{$errors->has('codePaysFaxAdresse') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="codePaysFaxAdresse">
                </div>
            </div>
            <div class="w-1/4 h-8 flex  mx-6 my-4">
                <div class="mr-2">
                    <label class="block tracking-wide text-gray-500 text-xs font-bold mb-2" >
                        Code Régionale Fax
                    </label>
                    <input class="inputText {{$errors->has('codeRegFaxContact') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="">
                </div>
                <div>
                    <label class="labelInput" >
                        Code pays Fax
                    </label>
                    <input class="inputText {{$errors->has('codePaysFaxContact') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="">
                </div>
            </div>
        </div>



        <!-- Ligne 9 -->


        <div class="flex mx-10">
            <div class="w-1/4 h-8 mx-6 my-4">
                    <label class="labelInput" >
                            Nationalité
                        </label>
                        <div class="relative">
                            <select class="{{$errors->has('nationalite') ? 'border-red-500' : 'border-gray-200'}} select" name="nationalite">
                                    <option></option>
                                @foreach( $nationalite['items'] as $nationalites)
                                <option>{{ $nationalites['Value'] }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                   Numero Compte Bancaire
                </label>
                 <input class="inputText {{$errors->has('numeroCompteB') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="numeroCompteB"> 
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                    Fax
                </label>
                <input class="inputText {{$errors->has('faxAdresse') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="faxAdresse">
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                    Fax
                </label>
              <input class="inputText {{$errors->has('faxContact') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="faxContact">
            </div>
        </div>


        <!-- ligne 10 -->

        <div class="flex mx-10">
            <div class="w-1/4 h-8 mx-6 my-4">
               
            </div>
            <div class="w-1/4 h-8 flex mx-6 my-4">
                <div class="mr-2">
                   <label class="labelInput" >
                      Projet
                    </label>
                    <div class="relative">
                        <select class="{{$errors->has('projet') ? 'border-red-500' : 'border-gray-200'}} select" name="projet">
                            <option></option>
                            @foreach($project['items'] as $Projet)
                            <option value="{{$Projet['Value']}}">{{ Illuminate\Support\Str::substr($Projet['Description'], 0, 35)}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="labelInput" >
                      Domaine
                    </label>
                    <div class="relative">
                        <select class="{{$errors->has('domaine') ? 'border-red-500' : 'border-gray-200'}} 
                             select" name="domaine">
                            <option></option>
                            @foreach($domaine['items'] as $domaines)
                            <option>{{$domaines['Value']}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                    Courriel
                </label>
                <input class="inputText {{$errors->has('courrielAdresse') ? 'border-red-500' : 'border-gray-200'}} " type="email" name="courrielAdresse"> 
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
            <label class="labelInput" >
                     Couriel
                </label>
                <input class="inputText {{$errors->has('CourrielContact') ? 'border-red-500' : 'border-gray-200'}} " type="email" name="CourrielContact">
            </div>
        </div>


        <!-- ligne 11 -->


        <div class="flex mx-10">
            <div class="w-1/4 h-8 mx-6 my-4">
               
            </div>
            <div class="w-1/4 h-8 flex mx-6 my-4">
                <div class="mr-2">
                   <label class="labelInput" >
                      Region
                    </label>
                    <div class="relative">
                        <select class="{{$errors->has('region') ? 'border-red-500' : 'border-gray-200'}} 
                                 select" name="region">
                            <option></option>
                            @foreach($region['items'] as $regions)
                            <option>{{ Illuminate\Support\Str::substr($regions['Description'], 0, 35)}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="labelInput" >
                      Type de Mobilité
                    </label>
                    <div class="relative">
                        <select class="{{$errors->has('mobilite') ? 'border-red-500' : 'border-gray-200'}} 
                                 select" name="mobilite">
                            <option></option>
                            @foreach($typeMobilite['items'] as $typeMobilites)
                            <option value="{{$typeMobilites['Value']}}">{{$typeMobilites['Description']}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                    Date de Désactivation
                </label>
                <input class="inputText {{$errors->has('deactivationAdresse') ? 'border-red-500' : 'border-gray-200'}}" type="date" name="deactivationAdresse"> 
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
               
            </div>
        </div>



         <!-- ligne 12 -->


         <div class="flex mx-10">
            <div class="w-1/4 h-8 mx-6 my-4">
               
            </div>
            <div class="w-1/4 h-8 flex mx-6 my-4">
                <div class="mr-2">
                   <label class="labelInput" >
                      Etablissement Origine
                    </label>
                    <div class="relative">
                        <select class="{{$errors->has('etablismnOrigine') ? 'border-red-500' : 'border-gray-200'}} select" name="etablismnOrigine">
                            <option></option>
                            @foreach($etablissemn['items'] as $etablissemns)
                            <option value="{{$etablissemns['Id']}}">{{ Illuminate\Support\Str::substr($etablissemns['Description'], 0, 35)}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="labelInput" >
                      Etablissement Acceuil
                    </label>
                    <div class="relative">
                        <select class="{{$errors->has('etablismnAcceuil') ? 'border-red-500' : 'border-gray-200'}} 
                                     select" name="etablismnAcceuil">
                            <option></option>
                            @foreach($etablissemn['items'] as $etablissemns)
                            <option value="{{$etablissemns['Id']}}">{{ Illuminate\Support\Str::substr($etablissemns['Description'], 0, 35)}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
                <label class="labelInput" >
                    Province / Etat / Canton 
                </label>
                <input class="inputText {{$errors->has('province') ? 'border-red-500' : 'border-gray-200'}} " type="text" name="province"> 
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
               
            </div>
        </div>



         <!-- ligne 13 -->


         <div class="flex mx-10">
            <div class="w-1/4 h-8 mx-6 my-4">
               
            </div>
            <div class="w-1/4 h-8 flex justify-between mx-6 my-4">
                <div >
                    <label class="labelInput" >
                        Date de Fin de Mobilité
                    </label>
                    <input class="inputText {{$errors->has('debutMobilité') ? 'border-red-500' : 'border-gray-200'}} " type="date" name="debutMobilité">
                </div>
                <div>
                    <label class="labelInput" >
                        Date de Début de Mobilité
                    </label>
                    <input class="inputText {{$errors->has('finMobilité') ? 'border-red-500' : 'border-gray-200'}} " type="date" name="finMobilité">
                </div>
            </div>  
            <div class="w-1/4 h-8 mx-6 my-4">
               
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
               
            </div>
        </div>



         <!-- ligne 13 -->


         <div class="flex mx-10">
            <div class="w-1/4 h-8 mx-6 my-4">
               
            </div>
            <div class="w-1/4 h-8 flex justify-between mx-6 my-4">
                <div class="mr-2">
                <label class="labelInput" >
                      Discipline
                    </label>
                    <div class="relative">
                        <select class=" {{$errors->has('discipline') ? 'border-red-500' : 'border-gray-200'}} 
                                 select" name="discipline">
                            <option></option>
                            @foreach($etablissemn['items'] as $etablissemns)
                            <option>{{ Illuminate\Support\Str::substr($etablissemns['Description'], 0, 35)}}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293-8.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="labelInput" >
                        Montant Unitaire
                    </label>
                    <input class="inputText  {{$errors->has('montantUnitaire') ? 'border-red-500' : 'border-gray-200'}}" type="text" name="montantUnitaire">
                </div>   
            </div>  
            <div class="w-1/4 h-8 mx-6 my-4">
               
            </div>
            <div class="w-1/4 h-8 mx-6 my-4">
               
            </div>
        </div>


        <!-- ligne 14 -->


        <div class="flex mx-10">
            <div class="w-1/4 h-8 mx-6 my-4">
               
            </div>
            <div class="w-1/4 h-8 flex justify-between mx-6 my-4">
               
            </div>  
            <div class="w-1/4 h-8 mx-6 my-4">
               
            </div>
            <div class="w-1/4 h-8 flex justify-between mx-6 my-4">
                <div >
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline shadow-lg" type="submit"> Sauvegarder</button>
                </div>
                <div>
                    <button class="border border-blue-500 hover:bg-blue-100 text-gray-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline shadow-lg" type="button"> Annuler</button>
                </div>
            </div>  
        </div>


</form>

@endsection