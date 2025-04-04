<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Register\Controller;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/register',[RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register',[RegisterController::class,'register']);
Route::get('login',[LoginController::class, 'showLoginForm']) ->name('login');
Route::post('/login',[LoginController::class, 'login']);
Route::post('/logout',[LoginController::class, 'logout']) -> name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login',[LoginController::class, 'logout']);

Route::get('/dashboard', function (){
    return view('dashboard');
})->name('dashboard');