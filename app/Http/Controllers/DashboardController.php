<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class DashboardController extends Controller
{
    public function index()
    {
        $supplier =  $this->totalElements('fscmRestApi', 'suppliers');
        $project =  $this->totalElements('fscmRestApi', 'projects');
        $employer =  $this->totalElements('hcmRestApi', 'emps');
        $compte =  $this->totalElements('crmRestApi', 'accounts');
       
       
        return view('dashboard.index', compact('supplier', 'project', 'compte', 'employer'));
    }


    public function totalElements($modules, $elements)
    {
        $total = null;

        $supplier =  Http::withBasicAuth('jules.bilitik@auf.org', 'Kiliane486')
                            ->withHeaders([
                                'content-type' =>'application/json',
                                'REST-Framework-Version' => '8'])
                            ->timeout(1200)
                            ->get('https://ejxa.fa.ca2.oraclecloud.com:443/'.$modules.'/resources/11.13.18.05/'.$elements.'?onlyData=true&totalResults=true')
                            ->json();

        $total = $supplier['totalResults'];

        return $total;
    }
}
