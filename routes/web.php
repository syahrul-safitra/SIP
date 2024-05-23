<?php

use App\Http\Controllers\AnakController;
use App\Http\Controllers\IbuController;
use App\Http\Controllers\ImunisasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeriksaIbuHamilController;
use App\Http\Controllers\PenimbanganAnakController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BeritaController;

use App\Models\Anggota;
use App\Models\Ibu;
use App\Models\Anak;
use App\Models\Berita;
use App\Models\Imunisasi;
use App\Models\PenimbanganAnak;
use App\Models\PeriksaIbuHamil;
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
    return view('index', [
        'anggotas' => Anggota::all(),
        'beritaUtama' => Berita::all(),
        'beritas' => Berita::latest()->skip(1)->paginate(3)
    ]);
});

Route::get('dashboardAdmin', function () {
    $tahunSekarang = date('Y');

    $dataIbu = Ibu::all();
    $dataAnak = Anak::all();
    $dataImunisasiPertahun = Imunisasi::whereYear('tanggal', $tahunSekarang)->get();
    $dataPeriksaKehamilanPertahun = PeriksaIbuHamil::whereYear('tanggal', $tahunSekarang)->get();
    $dataPenimbanganAnakPertahun = PenimbanganAnak::whereYear('tanggal', $tahunSekarang)->get();

    return view('adminpage.index', [
        'countDataIbu' => $dataIbu->count(),
        'countDataAnak' => $dataAnak->count(),
        'countDataImunisasiTahunSekarang' => $dataImunisasiPertahun->count(),
        'countDataPeriksaKehamilanPertahun' => $dataPeriksaKehamilanPertahun->count(),
        'countDataPenimbanganPertahun' => $dataPenimbanganAnakPertahun->count()
    ]);
})->middleware('auth');

Route::resource('dashboard/ibu', IbuController::class)->middleware('auth');
Route::resource('dashboard/anak', AnakController::class)->middleware('auth');
Route::resource('dashboard/imunisasi', ImunisasiController::class)->middleware('auth');
Route::resource('dashboard/periksaibuhamil', PeriksaIbuHamilController::class)->middleware('auth');
Route::resource('dashboard/penimbangananak', PenimbanganAnakController::class)->middleware('auth');
Route::resource('dashboard/anggota', AnggotaController::class)->middleware('auth');
Route::resource('dashboard/berita', BeritaController::class)->middleware('auth');

// lihat data imunisasi : 
Route::get('dashboard/cekimunisasi', [ImunisasiController::class, 'cekimunisasi']);
Route::get('dashboard/cekanak', [AnakController::class, 'cekanak']);
Route::get('dashboard/cekberatbadan/{data}', [AnakController::class, 'cekberat']);

// cetak data : 
Route::post('cetakdataibu', [IbuController::class, 'cetak']);
Route::post('cetakdataanak', [AnakController::class, 'cetak']);
Route::post('cetakdataimunisasi', [ImunisasiController::class, 'cetak']);
Route::post('cetakdataibuhamil', [PeriksaIbuHamilController::class, 'cetak']);
Route::post('cetakdatapenimbangananak', [PenimbanganAnakController::class, 'cetak']);

Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout']);
Route::get('bacaberita/{berita}', [BeritaController::class, 'bacaberita']);
