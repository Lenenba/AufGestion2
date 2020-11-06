<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $supplier =  totalElts('fscmRestApi', 'suppliers', '', 'CreationDate');
        $project =  totalElts('fscmRestApi', 'projects', '', 'ProjectStartDate');
        $employer =  totalElts('hcmRestApi', 'emps', '', 'CreationDate');
        $compte =  totalElts('crmRestApi', 'accounts', '', 'CreationDate');
        $poste =  totalElts('hcmRestApi', 'positions', '', 'CreationDate');


        $projectB = listElts("https://ejxa.fa.ca2.oraclecloud.com:443/fscmRestApi/resources/11.13.18.05/projectBudgets?q=PlanVersionName+LIKE+'%DM2%'&onlyData=true");
        return view('dashboard.index', compact('supplier', 'project', 'compte', 'employer', 'poste', 'projectB'));
    }
}
