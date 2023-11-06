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
    return view('layout.app');
});

Route::get('/main', function () {
    return view('layout.main');
});

Route::get('/queries', [QueriesController::class, 'index'])->name('layout.queries.index');
// Route::get('/workshops/create', [WorkshopController::class, 'create'])->name('layout.workshops.create');
// Route::post('/workshops', [WorkshopController::class, 'store'])->name('layout.workshops.store');
// Route::get('/workshops/{workshop}', [WorkshopController::class, 'show'])->name('layout.workshops.show');
// Route::get('/workshops/{workshop}/edit', [WorkshopController::class, 'edit'])->name('layout.workshops.edit');
// Route::put('/workshops/{workshop}', [WorkshopController::class, 'update'])->name('layout.workshops.update');
// Route::delete('/workshops/{workshop}', [WorkshopController::class, 'destroy'])->name('layout.workshops.destroy');
