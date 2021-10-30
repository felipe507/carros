<?php

use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\CarsCotroller;
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
Route::get('login', [AutenticacaoController::class, 'login'])->name('login');
Route::get('user/delete/{id}', [UserController::class, 'delete'])->middleware('auth');
Route::get('user/create', [UserController::class, 'create'])->middleware('auth');
Route::post('user/save', [UserController::class, 'save'])->middleware('auth');
Route::get('user/edit/{id}', [UserController::class, 'edit'])->middleware('auth');
Route::post('autentica', [AutenticacaoController::class, 'authenticate'])->middleware('auth');
Route::get('sair', [AutenticacaoController::class, 'sair'])->middleware('auth');

Route::get('/', [CarsCotroller::class, 'index'])->name('carros')->middleware('auth');
Route::get('car/create', [CarsCotroller::class, 'create'])->name('criar-carro')->middleware('auth');
Route::get('car/delete/{id}', [CarsCotroller::class, 'delete'])->name('deletar-carro')->middleware('auth');
Route::post('car/save', [CarsCotroller::class, 'save'])->name('deletar-carro')->middleware('auth');