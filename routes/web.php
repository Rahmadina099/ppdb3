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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

route::get('dashboard',[DashboardController::class,
'index'])->name('dashboard');
route::get('login',[AuthController::class,
'login'])->name('login');
route::get('user',[UserController::class,    
'index'])->name('user');
route::get('pendaftaran',[PendaftaranController::class,    
'pendaftaran'])->name('pendaftaran');
