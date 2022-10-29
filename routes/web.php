<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AdminController;

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

//-----------------------------------------ADMIN---------------------------------------------
Route::get('/menu', [AdminController::class, 'home'])->name('dashboard');

Route::get('/homestay', [AdminController::class, 'homestay'])->name('homestay');

Route::get('/perlengkapan', [AdminController::class, 'perlengkapan'])->name('perlengkapan');

Route::get('/fasilitas', [AdminController::class, 'fasilitas'])->name('fasilitas');

Route::get('/datasewa', [AdminController::class, 'datasewa'])->name('datasewa');

Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');

Route::get('/datauser', [AdminController::class, 'datauser'])->name('datauser');

//----------------------------------------PELANGGAN------------------------------------------
Route::get('/landingpage', [PelangganController::class, 'home'])->name('landingpage');

Route::get('/about', [PelangganController::class, 'about'])->name('about');

Route::get('/contactus', [PelangganController::class, 'contactus'])->name('contactus');