<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $supplier =  listElements('fscmRestApi', 'suppliers', '', 'CreationDate');
        $project =  listElements('fscmRestApi', 'projects', '', 'ProjectStartDate');
        $employer =  listElements('hcmRestApi', 'emps', '', 'CreationDate');
        $compte =  listElements('crmRestApi', 'accounts', '', 'CreationDate');


        return view('dashboard.index', compact('supplier', 'project', 'compte', 'employer'));
    }
}
