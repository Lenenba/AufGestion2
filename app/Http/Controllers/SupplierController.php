<?php

namespace App\Http\Controllers;

use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $regulier = listElements('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=SUPPLIER&', 'CreationDate');
        $allocataire = listElements('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_ALLOCATAIRE&', 'CreationDate');
        $missionnaire = listElements('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_MISSIONNAIRE&', 'CreationDate');
        $membre = listElements('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_MEMBRE&', 'CreationDate');
        $stagiaire = listElements('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_STAGIAIRE_FINANCE&', 'CreationDate');
        $stagiaireN = listElements('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_STAGIAIRE_NON_FINANCE&', 'CreationDate');
        $stagiaireCo = listElements('fscmRestApi', 'suppliers', 'q=SupplierTypeCode=AUF_STAGIAIRE_COFINANCE&', 'CreationDate');

        $suppliers = listElements('fscmRestApi', 'suppliers', '', 'CreationDate');

        $ListeFour = Supplier::all();

        return view('suppliers.index', compact('suppliers', 'regulier', 'allocataire', 'missionnaire', 'membre', 'stagiaire', 'stagiaireN', 'stagiaireCo'));
    }
}
