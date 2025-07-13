<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
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

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');
Route::get('user',[UserController::class,    
'index'])->name('user');
Route::get('pendaftaran',[PendaftaranController::class,    
'pendaftaran'])->name('pendaftaran');
Route::post('pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
