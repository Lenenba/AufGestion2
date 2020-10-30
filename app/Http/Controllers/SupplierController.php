<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $regulier = totalElts('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=SUPPLIER&', 'CreationDate');
        $allocataire = totalElts('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_ALLOCATAIRE&', 'CreationDate');
        $missionnaire = totalElts('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_MISSIONNAIRE&', 'CreationDate');
        $membre = totalElts('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_MEMBRE&', 'CreationDate');
        $stagiaire = totalElts('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_STAGIAIRE_FINANCE&', 'CreationDate');
        $stagiaireN = totalElts('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_STAGIAIRE_NON_FINANCE&', 'CreationDate');
        $stagiaireCo = totalElts('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_STAGIAIRE_COFINANCE&', 'CreationDate');

        $suppliers = totalElts('fscmRestApi', 'suppliers', '', 'CreationDate');

        $ListeFour = Supplier::all();

        return view('suppliers.index', compact('suppliers', 'regulier', 'allocataire', 'missionnaire', 'membre', 'stagiaire', 'stagiaireN', 'stagiaireCo'));
    }

    public function create()
    {
        $nationalite =  listElts('https://ejxa-dev1.fa.ca2.oraclecloud.com/fscmRestApi/resources/11.13.18.05/suppliers/300000023903020/child/DFF/300000023903020/lov/LVVO_nationalite?onlyData=true&limit=400');
        $paigroup =  listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000023903020/child/sites/300000024864475/lov/PayGroupLookup?onlyData=true&limit=490');
        $pays =  listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000023903020/lov/CountryLookup?onlyData=true&limit=490');
        $project = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/child/DFF/300000040964028/lov/LVVO_projet?onlyData=true&limit=490');
        $typemobilite = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/child/DFF/300000040964028/lov/LVVO_typeDeMobilite?onlyData=true&limit=490');
        $domaine = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/child/DFF/300000040964028/lov/LVVO_domaine?onlyData=true&limit=490');
        $etablissemn = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/child/DFF/300000040964028/lov/LVVO_etablissementAccueil?onlyData=true&limit=490');
        $devise = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/child/DFF/300000040964028/lov/LVVO_devise?onlyData=true&limit=490');
        $discipline = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/child/DFF/300000040964028/lov/LVVO_disciplines?onlyData=true&limit=490');
        $region = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/child/DFF/300000040964028/lov/LVVO_regionFournisseurAuf?onlyData=true&limit=490');
        $paymentterm = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/lov/PaymentTermsLookup?onlyData=true&limit=490');
        $tolerancemontant = listElts('https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers/300000040964011/child/sites/300000040964028/lov/AmountTolerancesLookup');
        // dd($pays);
        return view('suppliers.create', compact('nationalite', 'paigroup', 'pays', 'project', 'typemobilite', 'domaine', 'etablissemn', 'devise', 'discipline', 'region', 'paymentterm', 'tolerancemontant'));
    }

    public function store()
    {

        // entete typeFournisseur, typeOrganisation, nomFournisseur, prestationFourni, deactivationEntete, dateNaissance, titreCivilité, nomEntete, prenomEntete, deuxiemePrenomEntete, nationalite
        // site nomSite, envoicde, modePaiement, courrielSite, paieOnRecip, conditionPaiement, groupePaie,tolerancesMontant, devise, ventilation, banque, iban, numeroCompteB, projet, domaine, region, mobilite, etablismnOrigine, etablismnAcceuil, debutMobilite, finMobilite, discipline, montantUnitaire
        // adresses nomAdresse, adresse1, adresse2, pays, ville, codePostal, codeRegionaTelAdresse, codePaysTelAdresse, extensionTelAdresse, TelAdresse, codeRegFaxAdresse, codePaysFaxAdresse, faxAdresse, courrielAdresse, deactivationAdresse, province
        // contact titreCivilité, nomContact, prenomContact, deuxiemePrenomContact, intituleEmploi, codeRegionaTelContact, codePaysTelContact, extensionTelContact, TelContact, codeRegFaxContact, codePaysFaxContact, faxContact, courrielContact


        $suppliersForm = request()->validate([
            'typeFournisseur' => 'required',
            'typeOrganisation'=> 'required',
            'nomFournisseur' => 'required|min:4',
        ]);


        $suppliers = Supplier::create($suppliersForm);

        return redirect('/');
    }
}
