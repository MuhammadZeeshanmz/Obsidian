<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use Illuminate\Http\Request;


Route::apiResource('practices', PracticeController::class);