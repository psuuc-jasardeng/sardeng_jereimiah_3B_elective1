<?php

use App\Http\Controllers\JokeController;
use Illuminate\Support\Facades\Route;

Route::get('/joke', [JokeController::class, 'index'])->name('joke.index');
