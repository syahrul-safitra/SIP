<?php

use App\Http\Controllers\AnakController;
use App\Http\Controllers\IbuController;
use App\Http\Controllers\ImunisasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeriksaIbuHamilController;
use App\Http\Controllers\PenimbanganAnakController;

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('dashboardAdmin', function () {
    return view('adminpage.index');
})->middleware('auth');

Route::resource('dashboard/ibu', IbuController::class)->middleware('auth');
Route::resource('dashboard/anak', AnakController::class)->middleware('auth');
Route::resource('dashboard/imunisasi', ImunisasiController::class)->middleware('auth');
Route::resource('dashboard/periksaibuhamil', PeriksaIbuHamilController::class)->middleware('auth');
Route::resource('dashboard/penimbangananak', PenimbanganAnakController::class)->middleware('auth');

Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout']);
