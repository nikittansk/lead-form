<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

Route::get('/api/leads', [LeadController::class, 'index']);
Route::post('/api/leads', [LeadController::class, 'create']);
Route::get('/api/export', [LeadController::class, 'exportCSV']);
Route::get('{any?}', fn () => view('app'))->where('any', '.*');