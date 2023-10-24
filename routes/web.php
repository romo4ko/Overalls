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

Route::resource('employer', EmployerController::class);
Route::resource('overalls', OverallsController::class);
Route::resource('receiving', ReceivingController::class);
Route::resource('workshop', WorkshopController::class);

Route::post('workshops.store', WorkshopController::class .'@store')->name('workshops.store');

Route::view('workshops.create', 'layout.workshops.create')->name('workshops.create');
Route::view('workshops.update', 'layout.workshops.update')->name('workshops.update');
Route::view('workshops.index', 'layout.workshops.index')->name('workshops.index');

Route::get('/', function () {
    return view('main');
});
