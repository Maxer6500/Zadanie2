<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'login'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('registration');
Route::post('post-registration', [AuthController::class, 'register'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function (){
    Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
    Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
    Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
    Route::post('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
    Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

        Route::middleware('can:isAdmin')->group(function (){

            Route::get('/users/list', [UserController::class, 'index'])->name('users.index');
            Route::get('/users/status/{user_id}/{status_code}', [UserController::class, 'updateStatus'])->name('users.status.update');

            Route::get('/cars/edit/{car}', [CarController::class, 'edit'])->name('cars.edit');
            Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
    });
});



