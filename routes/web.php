<?php

use App\Http\Controllers\AuthControllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers\LoginController;
use App\Http\Controllers\AuthControllers\RegistController;
use App\Http\Controllers\ProjectControllers\ProjectController;

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

Route::post('/log',[LoginController::class,'log'])->name('log');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/gestier',[RegistController::class,'index'])->name('register');
Route::post('/registration',[RegistController::class,'create'])->name('registration');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware('auth')->group( function(){
   

    Route::get('/project',[ProjectController::class,'index'])->name('projects.index');
    // non è necessaria la pagina per creare il progetto, poiché si trova nel controller precedente

    Route::post('/project/create',[ProjectController::class,'create'])->name('projects.create'); // prende dati per crearlo

    Route::get('/project/{id}/edit',[ProjectController::class,'edit'])->name('projects.edit');
    Route::put('/project/{project}',[ProjectController::class,'update'])->name('projects.update');
    Route::put('/project/{id}/archive',[ProjectController::class,'archive'])->name('projects.archive');
    Route::delete('/project/{project}',[ProjectController::class,'delete'])->name('projects.delete');

});

