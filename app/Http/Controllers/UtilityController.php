<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function rechercehFounisseur($search)
    {
        $liens = "https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/suppliers?onlyData=true&expand=all&limit=10&totalResults=true&orderBy=CreationDate:desc&q=Supplier+LIKE+'%".$search. "%'+OR+SupplierType+LIKE+'%".$search. "%'";
        $supplier = listElts($liens);
        return compact('supplier');
    }
}
