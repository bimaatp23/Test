<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;

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

Route::get('/Login', [MasterController::class, 'Login'])->name('Login');
Route::post('/AuthLogin', [MasterController::class, 'AuthLogin'])->name('AuthLogin');
Route::get('/Logout', [MasterController::class, 'Logout'])->name('Logout');

Route::middleware(['Login'])->group(function() {
    Route::get('/Dashboard', [MasterController::class, 'Dashboard'])->name('Dashboard');
    Route::get('/PengaturanProfile', [MasterController::class, 'PengaturanProfile'])->name('PengaturanProfile');
    Route::post('/AuthPengaturanProfile', [MasterController::class, 'AuthPengaturanProfile'])->name('AuthPengaturanProfile');
});
