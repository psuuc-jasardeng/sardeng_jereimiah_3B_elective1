<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;

// Route to handle two sets of operations
Route::get('/{operation1}/{num1}/{num2}/{operation2}/{num3}/{num4}', [CalculatorController::class, 'calculate']);
