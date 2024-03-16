<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers\LoginController;
use App\Http\Controllers\AuthControllers\RegistController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::get('/gestier',[RegistController::class,'index'])->name('register');
Route::post('/registration',[RegistController::class,'create'])->name('registration');
