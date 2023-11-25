<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\OverallsController;
use App\Http\Controllers\ReceivingController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\QueriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('employers', EmployerController::class);
Route::resource('overalls', OverallsController::class);
Route::resource('receiving', ReceivingController::class);
Route::resource('workshops', WorkshopController::class);

Route::get('/', function () {
    return view('layout.main');
});

Route::get('/queries', [QueriesController::class, 'index'])->name('layout.queries.index');
Route::get('/queries/result', [QueriesController::class, 'query1'])->name('layout.queries.result');

Route::get('/queries/{q}', [QueriesController::class, 'exec']);
