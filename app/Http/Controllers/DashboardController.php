<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection as SupportCollection;
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
       
        $suppliers = $this->listElements('fscmRestApi', 'suppliers');

        return view('dashboard.index', compact('supplier', 'suppliers', 'project', 'compte', 'employer'));
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

    public function listElements($modules, $elements)
    {
        $total = new Collection();
        $date = Carbon::now()->subDays(2);

        $objects =  Http::withBasicAuth('jules.bilitik@auf.org', 'Kiliane486')
                            ->withHeaders([
                                'content-type' =>'application/json'])
                            ->timeout(1200)
                            ->get('https://ejxa.fa.ca2.oraclecloud.com:443/'.$modules.'/resources/11.13.18.05/'.$elements.'?q=CreationDate>'.$date.'&onlyData=true&expand=all&limit=15')
                            ->json();

        $total = collect($objects['items']);

        return $total;
    }
}
