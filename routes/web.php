<?php

use App\Models\Absensi;

use App\Http\Controllers\MasterGajiController;
use App\Http\Controllers\MasterHariKerjaController;
use App\Http\Controllers\MasterPegawaiController;
use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::resource('/master_gaji', MasterGajiController::class);

Route::resource('/master_hari_kerja', MasterHariKerjaController::class);

Route::resource('/master_pegawai', MasterPegawaiController::class);

Route::resource('/absensi', AbsensiController::class);


Route::get('/laporan', function () {
    return view('absensi.laporan', [
        "absensis" => Absensi::all()
    ]);
});

Route::get('/slip/{pegawai_id}', function () {
    return view('absensi.slip', [
        "absensis" => Absensi::all()
    ]);
});
