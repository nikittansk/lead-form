<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LeadController extends Controller
{
    function index()
    {
        $leads = Lead::all();
        return view('leads.index', ['leads' => $leads]);
    }

    function create()
    {
        dump(request()->input());
    }

    function exportCSV() 
    {
        
    }
}
