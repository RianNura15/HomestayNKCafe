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

//AUTH ADMIN
Route::prefix('loginadmin')->group(function () {
    Route::get('index', [AdminController::class, 'login'])->name('loginadmin');
    Route::post('masuk', [AdminController::class, 'cekLogin'])->name('cekloginadmin');
});

Route::prefix('register')->group(function () {
    Route::get('index', [AdminController::class, 'register'])->name('register');
    Route::post('register', [AdminController::class, 'addreg'])->name('addreg');
});

Route::get('logoutadmin', [AdminController::class, 'logout'])->name('logoutadmin');

//AUTH PELANGGAN
Route::prefix('login')->group(function () {
    Route::get('index', [PelangganController::class, 'login'])->name('loginpelanggan');
    Route::post('masuk', [PelangganController::class, 'cekLogin'])->name('cekloginpelanggan');
});

Route::prefix('registrasi')->group(function () {
    Route::get('index', [PelangganController::class, 'register'])->name('registerpelanggan');
    Route::post('registrasi', [PelangganController::class, 'addreg'])->name('addregpelanggan');
});

Route::get('logout', [PelangganController::class, 'logout'])->name('logoutpelanggan');

//-----------------------------------------ADMIN---------------------------------------------

Route::group(['middleware' => ['auth','ceklevel:Admin']], function () {
    Route::get('/menu', [AdminController::class, 'home'])->name('dashboard');
    
    Route::prefix('homestay')->group(function () {
        Route::get('index', [AdminController::class, 'homestay'])->name('homestay');
        Route::post('create', [AdminController::class, 'add_homestay'])->name('tambahhomestay');
        Route::post('update/{id_homestay}', [AdminController::class, 'update_homestay'])->name('updatehomestay');
        Route::get('destroy/{id_homestay}', [AdminController::class, 'delete_homestay'])->name('deletehomestay');
    });
    
    Route::prefix('perlengkapan')->group(function () {
        Route::get('index/{id_homestay}', [AdminController::class, 'perlengkapan'])->name('perlengkapan');
        Route::post('create', [AdminController::class, 'add_perlengkapan'])->name('tambahperlengkapan');
        Route::post('update/{id_perlengkapan}', [AdminController::class, 'update_perlengkapan'])->name('updateperlengkapan');
        Route::get('destroy/{id_perlengkapan}', [AdminController::class, 'delete_perlengkapan'])->name('deleteperlengkapan');
    });
    
    Route::prefix('fasilitas')->group(function () {
        Route::get('index/{id_homestay}', [AdminController::class, 'fasilitas'])->name('fasilitas');
        Route::post('create', [AdminController::class, 'add_fasilitas'])->name('tambahfasilitas');
        Route::post('update/{id_fasilitas}', [AdminController::class, 'update_fasilitas'])->name('updatefasilitas');
        Route::get('destroy/{id_fasilitas}', [AdminController::class, 'delete_fasilitas'])->name('deletefasilitas');
    });
    
    Route::get('/datasewa', [AdminController::class, 'datasewa'])->name('datasewa');
    
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
    
    Route::get('/datauser', [AdminController::class, 'datauser'])->name('datauser');
});


//----------------------------------------PELANGGAN------------------------------------------
Route::get('/landingpage', [PelangganController::class, 'home'])->name('landingpage');

Route::get('/about', [PelangganController::class, 'about'])->name('about');

Route::get('/contactus', [PelangganController::class, 'contactus'])->name('contactus');

Route::get('/detail/{id_homestay}', [PelangganController::class, 'detailhomestay'])->name('detailhomestay');