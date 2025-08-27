<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ProviderController;
use Illuminate\Http\Request;


Route::apiResource('/practices', PracticeController::class);
Route::get('/practice/recent', [PracticeController::class, 'recentlyAccessed']);
Route::get('/practice/filter', [PracticeController::class, 'filter']);
Route::apiResource('/providers', ProviderController::class);
Route::get('/provider/recent', [ProviderController::class, 'recentlyAccssed']);