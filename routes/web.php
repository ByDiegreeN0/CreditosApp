<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;



Auth::routes();

// Login Routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


// Dashboard Routes
Route::get('/home', [App\Http\Controllers\ClientesController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/home', [App\Http\Controllers\ClientesController::class, 'store'])->middleware('auth'); // POST CLIENTES
Route::patch('/home', [App\Http\Controllers\ClientesController::class, 'update'])->middleware('auth'); // PATCH CLIENTES


// Client Card Routes

Route::get('home/cliente/{cliente_id}', [App\Http\Controllers\ClientesController::class, 'show'])->middleware('auth')->name('cliente');
Route::post('home/cliente/{cliente_id}', [App\Http\Controllers\PagosClienteController::class, 'store'])->middleware('auth');
