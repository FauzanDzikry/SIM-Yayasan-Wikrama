<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\SkController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\GajiPegawaiController;
use App\Http\Controllers\SkPegawaiController;

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
    return view('login');
});

Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
// Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::GET('/Dashboard/Admin', [AdminController::class,'index'])->name('admin');
        // Pegawai
        Route::GET('/Dashboard/Admin/Data-Pegawai', [UserController::class,'user'])->name('p_admin');
        Route::GET('/Dashboard/Admin/Data-Pegawai/Create', [UserController::class,'create'])->name('p_create');
        Route::POST('/Dashboard/Admin/Data-Pegawai/Create/Save',[UserController::class,'store'])->name('p_store');
        Route::GET('/Dashboard/Admin/Data-Pegawai/Edit/{id}', [UserController::class,'edit'])->name('p_edit');
        Route::PUT('/Dashboard/Admin/Data-Pegawai/Edit/Update/{id}', [UserController::class,'update'])->name('p_update');
        Route::DELETE('/Dashboard/Admin/Data-Pegawai/Delete/{id}', [UserController::class,'destroy'])->name('p_destroy');
        Route::get('/Dashboard/Admin/Data-Pegawai/Search', [UserController::class, 'search'])->name('cari_user');
        // END Pegawai
        // Surat Keputusan
        Route::GET('/Dashboard/Admin/Surat-Keputusan', [SkController::class,'index'])->name('sk_admin');
        Route::GET('/Dashboard/Admin/Surat-Keputusan/Create', [SkController::class,'create'])->name('sk_create');
        Route::POST('/Dashboard/Admin/Surat-Keputusan/Create/Save',[SkController::class,'store'])->name('sk_store');
        Route::GET('/Dashboard/Admin/Surat-Keputusan/Edit', [SkController::class,'edit'])->name('sk_edit');
        Route::PUT('/Dashboard/Admin/Surat-Keputusan/Edit/Save', [SkController::class,'update'])->name('sk_update');
        Route::DELETE('/Dashboard/Admin/Surat-Keputusan/Delete/{id}', [SkController::class,'destroy'])->name('sk_destroy');
        Route::get('npp/{id}', [SkController::class,'npp']);
        Route::get('/Dashboard/Admin/Surat-Keputusan/Search', [SkController::class, 'search'])->name('cari_sk');
        Route::DELETE('/Dashboard/Admin/Surat-Keputusan/Delete/', [SkController::class,'hapus'])->name('sk_hapus');
        // END Surat Keputusan
        // Absen
        Route::GET('/Dashboard/Admin/Absen', [AbsenController::class,'admin'])->name('absen_admin');
        Route::DELETE('/Dashboard/Admin/Absen/Delete/{id}', [AbsenController::class,'destroy'])->name('absen_destroy');
        Route::DELETE('/Dashboard/Admin/Absen/Delete/', [AbsenController::class,'hapus'])->name('absen_hapus');
        Route::get('/Dashboard/Admin/Absen/Search', [AbsenController::class, 'search'])->name('search');
        // END Absen
        // Slip Gaji
        Route::GET('/Dashboard/Admin/Slip-Gaji', [GajiController::class,'index'])->name('sg_admin');
        Route::GET('/Dashboard/Admin/Slip-Gaji/Create', [GajiController::class,'create'])->name('sg_create');
        Route::POST('/Dashboard/Admin/Slip-Gaji/Create/Save', [GajiController::class,'store'])->name('sg_store');
        Route::DELETE('/Dashboard/Admin/Slip-Gaji/Delete/{id}', [GajiController::class,'destroy'])->name('sg_destroy');
        Route::GET('/Dashboard/Admin/Slip-Gaji/Simpan_Data_{id}', [GajiController::class,'simpan'])->name('simpan');
        Route::get('name/{id}', [GajiController::class,'name']);
        Route::DELETE('/Dashboard/Admin/Slip-Gaji/Delete/', [GajiController::class,'hapus'])->name('sg_hapus');
        Route::get('/Dashboard/Admin/Slip-Gaji/Search', [GajiController::class, 'search'])->name('cari_sg');
        // END Slip Gaji
        route::get('/Dashboard/Admin/registrasi',[AuthController::class,'registrasi'])->name('registrasi');
        route::post('/Dashboard/Admin/simpanregistrasi',[AuthController::class,'simpanregistrasi'])->name('simpanregistrasi');
    });
    Route::group(['middleware' => ['cek_login:user']], function () {
        Route::GET('/Dashboard/User',[UserController::class,'index'])->name('user');
        // Absen
        Route::GET('/Dashboard/User/Absen/Pegawai',[AbsenController::class,'index'])->name('absen');
        Route::POST('/Dashboard/User/Absen/Pegawai/Create/Save',[AbsenController::class,'store'])->name('absen_store');
        // END Absen
        // Surat Keputusan
        Route::GET('/Dashboard/User/Surat-Keputusan',[SkPegawaiController::class,'index'])->name('sk');
        // END Surat Keputusan
        // Gaji
        Route::GET('/Dashboard/User/Slip-Gaji/Pegawai',[GajiPegawaiController::class,'index'])->name('gaji');
        Route::POST('/Dashboard/User/Slip-Gaji/Pegawai/Create/Save',[GajiPegawaiController::class,'store'])->name('gaji_store');
        Route::GET('/Dashboard/User/Slip-Gaji/Simpan_Data_{id}', [GajiPegawaiController::class,'simpan'])->name('print');

        // END Gaji
    });
});
