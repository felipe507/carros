<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CarsController;
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

Route::get('user/list', [UserController::class, 'index'])->middleware('auth');
Route::get('login', [AuthenticationController::class, 'login'])->name('login');
Route::get('user/delete/{id}', [UserController::class, 'delete'])->middleware('auth');
Route::get('user/create', [UserController::class, 'create'])->middleware('auth');
Route::post('user/save', [UserController::class, 'save'])->middleware('auth');
Route::get('user/edit/{id}', [UserController::class, 'edit'])->middleware('auth');
Route::post('authenticate', [AuthenticationController::class, 'authenticate']);
Route::get('logout', [AuthenticationController::class, 'logout'])->middleware('auth');

Route::get('/', [CarsController::class, 'index'])->name('home')->middleware('auth');
Route::get('car/create', [CarsController::class, 'create'])->middleware('auth');
Route::get('car/delete/{id}', [CarsController::class, 'delete'])->middleware('auth');
Route::post('car/save', [CarsController::class, 'save'])->middleware('auth');
Route::post('/car/capturar', [CarsController::class, 'capturar'])->middleware('auth');
Route::post('/car/search', [CarsController::class, 'search'])->middleware('auth');
Route::get('/car/capture', [CarsController::class, 'capture'])->name('capturar-dados')->middleware('auth');
Route::get('/car/deleteAll', [CarsController::class, 'deleteall'])->middleware('auth');

