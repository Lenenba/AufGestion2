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


        return view('dashboard.index', compact('supplier', 'project', 'compte', 'employer'));
    }
}
