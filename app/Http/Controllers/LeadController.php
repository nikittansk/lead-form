<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Http\Requests\CreateLeadRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;


class LeadController extends Controller
{
    function index(Request $request): array
    {
        $leads = $this->getLeadsByCity($request);
        return [
            'leads' => $leads
        ];
    }

    function create(CreateLeadRequest $request)
    {
        $ip = $request->ip();
        $count = Lead::query()
                    ->where('ip_address', $ip)
                    ->where('created_at', '>=', now()->subHour())
                    ->count();

        if ($count >= 5) {
            return response()->json([
                'message' => 'Форма заблокирована на 2 часа из-за множественных отправок с вашего IP.',
                'blocked' => true
            ], 403);
        }

        $lead = Lead::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'city' => $request->input('city'),
            'ip_address' => $ip,
        ]);

        return [
            'lead' => $lead
        ];
    }

    function exportCSV(Request $request)
    {
        $leads = $this->getLeadsByCity($request);

        $response = new StreamedResponse(function() use ($leads) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['Name', 'Email', 'Phone', 'City']);

            foreach ($leads as $lead) {
                fputcsv($handle, [$lead->name, $lead->email, $lead->phone, $lead->city]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="leads.csv"');

        return $response;
    }

    private function getLeadsByCity(Request $request)
    {
        $city = $request->input('city');
        if ($city) {
            return Lead::query()->where('city', $city)->get();
        } else {
            return Lead::all();
        }
    }
}
