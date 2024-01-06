<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;



Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->Middleware('auth')->name('dashboard');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
