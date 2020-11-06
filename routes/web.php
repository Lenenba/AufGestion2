<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UtilityController;

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/suppliers', [SupplierController::class, 'index'])->name('index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('create');
Route::get('/suppliers/suivi', [SupplierController::class, 'suivi'])->name('suivi');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('store');
Route::delete('/suppliers/{id}', [SupplierController::class, 'destroy']);


Route::get('/utility/{search}', [UtilityController::class, 'rechercehFounisseur'])->name('helpers');
