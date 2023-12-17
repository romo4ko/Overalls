<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\OverallsController;
use App\Http\Controllers\ReceivingController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\QueriesController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
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

Route::middleware([Authenticate::class])->group(function () {

    Route::resource('employers', EmployerController::class);
    Route::resource('overalls', OverallsController::class);
    Route::resource('receiving', ReceivingController::class);
    Route::resource('workshops', WorkshopController::class);

    Route::get('/queries', [QueriesController::class, 'index'])->name('layout.queries.index');
    Route::get('/queries/result', [QueriesController::class, 'query1'])->name('layout.queries.result');

    Route::get('/queries/{q}', [QueriesController::class, 'exec']);
});

Route::get('/', function () {
    return view('layout.main');
})->name('main');

Route::get('/register', [RegistrationController::class, 'index']);
Route::post('/register', [RegistrationController::class, 'store']);

Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login', [AuthController::class, 'getlogin'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin']);