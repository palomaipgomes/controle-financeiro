<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceitasController;
use App\Http\Controllers\DespesasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContasController;


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

/* DASHBOARD */
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

/* DESPESAS */
Route::resource('despesas', DespesasController::class);

/* RECEITAS */
Route::resource('receitas', ReceitasController::class);

/* CONTAS BANCÁRIAS */
Route::resource('contas', ContasController::class);