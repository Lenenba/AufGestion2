<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SupplierController extends Controller
{
    /**
     * page de recherche ou d'acceuil pour Supplier.
     *
     */

    public function index()
    {
        return view('suppliers.index', $this->listedeTotaux());
    }

    /**
     * formulaire de creation de nouveau Supplier.
     *
     * @param  $id
     */
    public function create()
    {
        return view('suppliers.create', $this->listesElements());
    }


    /**
     * suivi du Supplier.
     *
     */

    public function suivi()
    {
        $suppliers = Supplier::orderBy('created_at', 'desc')->paginate(6);
        
        return view('suppliers.suivi', compact('suppliers'));
    }

    /**
     * enregistre le Supplier.
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store()
    {
        $entete = $this->validationSupplier();
        $site = $this->validationSite();
        $adresse = $this->validationAdresse();
        $contact = $this->validationContact();

        $suppliers = Supplier::create($entete);
        $adr = $suppliers->ajouterAdresse($adresse);
        $site = Arr::add($site, 'adresse_id', $adr->id);
        $suppliers->ajouterSite($site);
        $suppliers->ajouterContact($contact);


        if (request()->wantsJson()) {
            return ['message' => $suppliers->path()];
        }

        return redirect($suppliers->path());
    }


    /**
     * Edit the Supplier.
     *
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit()
    {
        return $this->listesElements();
    }

    /**
     * Destroy the Supplier.
     *
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($id)
    {
        Supplier::where('id', $id)->delete();


        return response()->json(null, 204);
    }



    
    private function validationSupplier()
    {
        return request()->validate([
            'typeFournisseur' => 'required',
            'typeOrganisation'=> 'required',
            'nomFournisseur' => 'required|unique:suppliers|max:255|min:5',
            'prestationFourni'=>'nullable',
            'autreNom' =>'nullable',
            'nationalite' =>'required_if:typeOrganisation,=,INDIVIDUAL',
            'deactivationEntete'=>'nullable',
            'dateNaissance'=>'required_if:typeOrganisation,=,INDIVIDUAL'
        ]);
    }


    private function validationSite()
    {
        return request()->validate([
            'nomSite' => 'required',
            'numeroCompteB'=>'nullable',
            'projet'=>'nullable',
            'domaine'=>'nullable',
            'region'=>'nullable',
            'mobilite'=>'nullable',
            'etablismnOrigine'=>'nullable',
            'etablismnAcceuil'=>'nullable',
            'debutMobilite'=>'nullable',
            'finMobilite'=>'nullable',
            'discipline'=>'nullable',
            'montantUnitaire'=>'nullable',
            'conditionPaiement' =>'nullable',
            'modePaiement' => 'required',
            'groupePaie'=>'required',
            'courrielSite'=>'nullable',
            'banque'=>'nullable',
            'ventilation'=>'nullable',
            'iban'=>'nullable',
            'tolerancesMontant'=>'nullable',
            'devise'=>'nullable',
            'envoicde'=> 'nullable',
            'paieOnRecip' =>'nullable'
        ]);
    }


    private function validationAdresse()
    {
        $adresse = request()->validate([
            'nomAdresse' => 'required|min:5',
            'adresse1'=> 'required|min:3',
            'adresse2'=> 'required|min:3',
            'pays'=> 'required',
            'ville'=> 'required|min:3',
            'codePostal'=>'nullable|required_if:pays,=,FR,CA,US',
            'codeRegionaTelAdresse'=>'nullable|number|max:5|required_with_all:TelAdresse,codePaysTelAdresse',
            'codePaysTelAdresse'=>'nullable|number|max:5|required_with_all:TelAdresse,codeRegionaTelAdresse',
            'extensionTelAdresse'=>'nullable|number|max:5|required_with_all:TelAdresse,codePaysTelAdresse,codeRegionaTelAdresse',
            'TelAdresse'=>'nullable|number|max:10|required_with:TelAdresse,codePaysTelAdresse,codeRegionaTelAdresse,extensionTelAdresse',
            'codeRegFaxAdresse'=>'nullable|number|max:5',
            'codePaysFaxAdresse'=>'nullable|number|max:5',
            'faxAdresse'=>'nullable|number|max:10',
            'courrielAdresse'=>'nullable',
            'deactivationAdresse'=>'nullable',
            'province'=>'required_if:pays,=,CA',
            'etat'=>'required_if:pays,=,US',
            'canton'=>'required_if:pays,=,ZA',
        ]);

        return $adresse;
    }


    private function validationContact()
    {
        return request()->validate([
            'titreCivilite' =>'required_if:typeOrganisation,=,INDIVIDUAL',
            'nomContact' => 'required_if:typeOrganisation,=,INDIVIDUAL|min:3',
            'prenomContact' => 'required_if:typeOrganisation,=,INDIVIDUAL|min:3',
            'deuxiemePrenomContact' => 'required|min:3',
            'intituleEmploi' => 'nullable',
            'codeRegionaTelContact' => 'nullable|number|max:5|required_with_all:TelContact,codePaysTelContact',
            'codePaysTelContact' => 'nullable|number|max:5|required_with_all:TelContact,codeRegionaTelContact',
            'extensionTelContact' => 'nullable|number|max:5|required_with_all:TelContact,codeRegionaTelContact,codePaysTelContact',
            'TelContact' => 'nullable|number|max:10',
            'codeRegFaxContact' => 'nullable|number|max:5',
            'codePaysFaxContact' => 'nullable|number|max:5',
            'faxContact' => 'nullable|number|max:10',
            'courrielContact' => 'nullable'
        ]);
    }


    public function listesElements()
    {
        $nationalite =  listElts('https://ejxa.fa.ca2.oraclecloud.com/fscmRestApi/resources/11.13.18.05/suppliers/300000023903020/child/DFF/300000023903020/lov/LVVO_nationalite?onlyData=true&limit=400');
        $paigroup =  listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000023903020/child/sites/300000024864475/lov/PayGroupLookup?onlyData=true&limit=490');
        $pays =  listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000023903020/lov/CountryLookup?onlyData=true&limit=490');
        $project = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/child/DFF/300000040964028/lov/LVVO_projet?onlyData=true&limit=490');
        $typemobilite = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/child/DFF/300000040964028/lov/LVVO_typeDeMobilite?onlyData=true&limit=490');
        $domaine = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/child/DFF/300000040964028/lov/LVVO_domaine?onlyData=true&limit=490');
        $etablissemn = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/child/DFF/300000040964028/lov/LVVO_etablissementAccueil?onlyData=true&limit=490');
        $devise = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/child/DFF/300000040964028/lov/LVVO_devise?onlyData=true&limit=490');
        $discipline = listElts2('https://ejxa-test-apps6.builder.ocp.oraclecloud.com/ic/builder/rt/App_FRS_Test/live/resources/data/DomainesEtDisciplines?onlyData=true&limit=200');
        $region = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/child/DFF/300000040964028/lov/LVVO_regionFournisseurAuf?onlyData=true&limit=490');
        $paymentterm = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/lov/PaymentTermsLookup?onlyData=true&limit=490');
        $tolerancemontant = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/lov/AmountTolerancesLookup');
       

        return (compact('nationalite', 'paigroup', 'pays', 'project', 'typemobilite', 'domaine', 'etablissemn', 'devise', 'discipline', 'region', 'paymentterm', 'tolerancemontant'));
    }

    public function listedeTotaux()
    {
        $regulier = totalElts('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=SUPPLIER&', 'CreationDate');
        $allocataire = totalElts('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_ALLOCATAIRE&', 'CreationDate');
        $missionnaire = totalElts('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_MISSIONNAIRE&', 'CreationDate');
        $membre = totalElts('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_MEMBRE&', 'CreationDate');
        $stagiaire = totalElts('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_STAGIAIRE_FINANCE&', 'CreationDate');
        $stagiaireN = totalElts('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_STAGIAIRE_NON_FINANCE&', 'CreationDate');
        $stagiaireCo = totalElts('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_STAGIAIRE_COFINANCE&', 'CreationDate');

        return  (compact('regulier', 'allocataire', 'missionnaire', 'membre', 'stagiaire', 'stagiaireN', 'stagiaireCo'));
    }
}
