<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\OverallsController;
use App\Http\Controllers\ReceivingController;
use App\Http\Controllers\WorkshopController;
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
    return view('layout.app');
});

Route::get('/main', function () {
    return view('layout.main');
});
