<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Support\Facades\Http;

class SupplierController extends Controller
{
    public function index()
    {
        $regulier = $this->totalElements('fscmRestApi', 'suppliers', 'SUPPLIER');
        $allocataire = $this->totalElements('fscmRestApi', 'suppliers', 'AUF_ALLOCATAIRE');
        $missionnaire = $this->totalElements('fscmRestApi', 'suppliers', 'AUF_MISSIONNAIRE');
        $membre = $this->totalElements('fscmRestApi', 'suppliers', 'AUF_MEMBRE');
        $stagiaire = $this->totalElements('fscmRestApi', 'suppliers', 'AUF_STAGIAIRE_FINANCE');
        $stagiaireN = $this->totalElements('fscmRestApi', 'suppliers', 'AUF_STAGIAIRE_NON_FINANCE');
        $stagiaireCo = $this->totalElements('fscmRestApi', 'suppliers', 'AUF_STAGIAIRE_COFINANCE');


        $ListeFour = Supplier::all();

        return view('suppliers.index', compact('ListeFour', 'regulier', 'allocataire', 'missionnaire', 'membre', 'stagiaire', 'stagiaireN', 'stagiaireCo'));
    }


    public function totalElements($modules, $elements, $append)
    {
        $total = null;

        $elements =  Http::withBasicAuth('jules.bilitik@auf.org', 'Kiliane486')
                            ->withHeaders([
                                'content-type' =>'application/json'])
                            ->timeout(1200)
                            ->get('https://ejxa.fa.ca2.oraclecloud.com:443/'.$modules.'/resources/11.13.18.05/'.$elements.'?q=SupplierTypeCode='.$append.'&onlyData=true&totalResults=true')
                            ->json();

        $total = $elements['totalResults'];

        return $total;
    }
}
