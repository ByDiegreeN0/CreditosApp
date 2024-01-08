<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;



Auth::routes();

// Login Routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');


// Dashboard Routes

// Client Routes
Route::get('/', [App\Http\Controllers\ClientesController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/', [App\Http\Controllers\ClientesController::class, 'store'])->middleware('auth'); // POST CLIENTES
Route::patch('/', [App\Http\Controllers\ClientesController::class, 'update'])->middleware('auth'); // PATCH CLIENTES


// Client Card Routes

Route::get('/cliente/{cliente_id}', [App\Http\Controllers\ClientesController::class, 'show'])->middleware('auth')->name('cliente');