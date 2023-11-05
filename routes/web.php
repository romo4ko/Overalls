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


Route::get('/workshops', [WorkshopController::class, 'index'])->name('layout.workshops.index');
Route::get('/workshops/create', [WorkshopController::class, 'create'])->name('layout.workshops.create');
Route::post('/workshops', [WorkshopController::class, 'store'])->name('layout.workshops.store');
Route::get('/workshops/{workshop}', [WorkshopController::class, 'show'])->name('layout.workshops.show');
Route::get('/workshops/{workshop}/edit', [WorkshopController::class, 'edit'])->name('layout.workshops.edit');
Route::put('/workshops/{workshop}', [WorkshopController::class, 'update'])->name('layout.workshops.update');
Route::delete('/workshops/{workshop}', [WorkshopController::class, 'destroy'])->name('layout.workshops.destroy');

Route::get('/overalls', [OverallsController::class, 'index'])->name('layout.overalls.index');
Route::get('/overalls/create', [OverallsController::class, 'create'])->name('layout.overalls.create');
Route::post('/overalls', [OverallsController::class, 'store'])->name('layout.overalls.store');
Route::get('/overalls/{overall}', [OverallsController::class, 'show'])->name('layout.overalls.show');
Route::get('/overalls/{overall}/edit', [OverallsController::class, 'edit'])->name('layout.overalls.edit');
Route::put('/overalls/{overall}', [OverallsController::class, 'update'])->name('layout.overalls.update');
Route::delete('/overalls/{overall}', [OverallsController::class, 'destroy'])->name('layout.overalls.destroy');

Route::get('/employers', [EmployerController::class, 'index'])->name('layout.employers.index');
Route::get('/employers/create', [EmployerController::class, 'create'])->name('layout.employers.create');
Route::post('/employers', [EmployerController::class, 'store'])->name('layout.employers.store');
Route::get('/employers/{employer}', [EmployerController::class, 'show'])->name('layout.employers.show');
Route::get('/employers/{employer}/edit', [EmployerController::class, 'edit'])->name('layout.employers.edit');
Route::put('/employers/{employer}', [EmployerController::class, 'update'])->name('layout.employers.update');
Route::delete('/employers/{employer}', [EmployerController::class, 'destroy'])->name('layout.employers.destroy');

Route::get('/receiving', [ReceivingController::class, 'index'])->name('layout.receiving.index');
Route::get('/receiving/create', [ReceivingController::class, 'create'])->name('layout.receiving.create');
Route::post('/receiving', [ReceivingController::class, 'store'])->name('layout.receiving.store');
Route::get('/receiving/{record}', [ReceivingController::class, 'show'])->name('layout.receiving.show');
Route::get('/receiving/{record}/edit', [ReceivingController::class, 'edit'])->name('layout.receiving.edit');
Route::put('/receiving/{record}', [ReceivingController::class, 'update'])->name('layout.receiving.update');
Route::delete('/receiving/{record}', [ReceivingController::class, 'destroy'])->name('layout.receiving.destroy');
