<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

Route::get('/leads', [LeadController::class, 'index']);
Route::post('/leads', [LeadController::class, 'create']);
Route::get('/export', [LeadController::class, 'exportCSV']);
Route::get('{any?}', fn () => view('app'))->where('any', '.*');