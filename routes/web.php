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

Route::get('/cancelados', [App\Http\Controllers\ClientesController::class, 'showInactiveClients'])->middleware('auth')->name('cancelados');



// Client Card Routes

Route::get('home/cliente/{cliente_id}', [App\Http\Controllers\ClientesController::class, 'show'])->middleware('auth')->name('cliente'); // mostrar card cliente
Route::post('home/cliente/{cliente_id}', [App\Http\Controllers\PagosClienteController::class, 'store'])->middleware('auth'); // registrar pago cliente
Route::get('/cliente/{cliente_id}', [App\Http\Controllers\ClientesController::class, 'showClienteView'])->name('view_cliente'); // mostrar tarjeta digital
Route::patch('/cliente/cancelar/{cliente_id}', [App\Http\Controllers\ClientesController::class, 'update'])->middleware('auth'); // cancelar tarjeta cliente
Route::get('/cliente/edit/{cliente_id}', [App\Http\Controllers\ClientesController::class, 'edit'])->middleware('auth')->name('cliente_edit'); // mostrar view editar cliente
Route::patch('/cliente/edit/{cliente_id}', [App\Http\Controllers\ClientesController::class, 'updateClient'])->name('update_cliente')->middleware('auth'); // actualizar datos del cliente


// GASTOS Routes

Route::get('home/gastos', [App\Http\Controllers\GastosController::class, 'index'])->middleware('auth')->name('gastos'); // mostrar card cliente
