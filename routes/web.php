<?php

use App\Http\Controllers\AuthControllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers\LoginController;
use App\Http\Controllers\AuthControllers\RegistController;
use App\Http\Controllers\CookiesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectControllers\FolderController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/log', [LoginController::class, 'log'])->name('log');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/restier', [RegistController::class, 'index'])->name('register');
Route::post('/registration', [RegistController::class, 'create'])->name('registration');

Route::get('/cookie-consent',[CookiesController::class, 'index']);


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/folders', [FolderController::class, 'index'])->name('folder.index');
    Route::post('/folders/create', [FolderController::class, 'create'])->name('folder.create');

    // visualizza tutti i progetti
    Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');

    //presel singolo progetto
    Route::get('/projects/{idProject}/{idFolder}',[ProjectController::class,'getByFolder'])->name('project.index.tag');
    // non è necessaria la pagina per creare il progetto, poiché si trova nel controller precedente

    Route::post('/project/create', [ProjectController::class, 'create'])->name('project.create'); // prende dati per crearlo

    Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    
    Route::put('/project/{project}', [ProjectController::class, 'update'])->name('project.update');


    Route::post('/project/exchange', [ProjectController::class, 'exg'])->name('project.exg');


    Route::put('/project/{id}/archive', [ProjectController::class, 'archive'])->name('project.archive');
    Route::delete('/project/{project}', [ProjectController::class, 'delete'])->name('project.delete');

    /**
     * Folder Routes
     */
    Route::get('/folders',[FolderController::class,'index'])->name('folder.index');
    Route::get('/folder/{id}',[FolderController::class,'edit'])->name('folder.edit');
});
