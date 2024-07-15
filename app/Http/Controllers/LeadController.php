<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Http\Requests\CreateLeadRequest;


class LeadController extends Controller
{
    function index(): array
    {
        $leads = Lead::all();
        return [
            'leads' => $leads
        ];
    }

    function create(CreateLeadRequest $request): array
    {
        $lead = Lead::query()->create($request->validated());
        return [
            'lead' => $lead
        ];
    }

    function exportCSV() 
    {
        
    }
}
