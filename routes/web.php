<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\DokumenPribadiController;
use App\Http\Controllers\SuratPengantarController;
use App\Http\Controllers\SuratKeteranganController;
use App\Http\Controllers\ListAdministrasiController;
use App\Models\DokumenPribadi;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [BerandaController::class, 'index'])->name('beranda.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
Route::resource('pengumuman', PengumumanController::class);

Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    // Route::resource('laporan', LaporanController::class);
    /* Routing untuk laporan */
    Route::get('/laporan-create/infrastruktur', [LaporanController::class, 'create_infrastruktur'])->name('laporan.create-infrastruktur');
    Route::get('/laporan-create/kriminal', [LaporanController::class, 'create_kriminal'])->name('laporan.create-kriminal');
    Route::get('/laporan-create/bencana', [LaporanController::class, 'create_bencana'])->name('laporan.create-bencana');

    Route::get('/laporan-create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('/laporan/store', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/delete/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
    Route::get('/laporan/edit/{id}', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::post('/laporan/update/{id}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::get('/laporan/show/{id}', [LaporanController::class, 'show'])->name('laporan.show');
    Route::post('/laporan-status/{id}', [LaporanController::class, 'status'])->name('laporan.status');
    Route::get('/laporan-pdf/{id}', [LaporanController::class, 'pdf'])->name('laporan.pdf');

    Route::get('/pribadi/create-akta-lahir', [DokumenPribadiController::class, 'create_aktaLahir'])->name('pribadi.create_aktaLahir');
    Route::get('/pribadi/create-akta-mati', [DokumenPribadiController::class, 'create_aktaMati'])->name('pribadi.create_aktaMati');
    Route::post('/pribadi/status/{id}', [DokumenPribadiController::class, 'status'])->name('pribadi.status');
    Route::resource('pribadi', DokumenPribadiController::class);

    Route::post('/pengantar/status/{id}', [SuratPengantarController::class, 'status'])->name('pengantar.status');
    Route::get('/pengantar/pindah', [SuratPengantarController::class, 'create_pindah'])->name('pengantar.pindah');
    Route::get('/pengantar/ktp', [SuratPengantarController::class, 'create_ktp'])->name('pengantar.ktp');
    Route::resource('pengantar', SuratPengantarController::class);

    Route::post('/keterangan/status/{id}', [SuratKeteranganController::class, 'status'])->name('keterangan.status');
    Route::get('/keterangan/domisili', [SuratKeteranganController::class, 'create_domisili'])->name('keterangan.domisili');
    Route::get('/keterangan/kematian', [SuratKeteranganController::class, 'create_kematian'])->name('keterangan.kematian');
    Route::get('/keterangan/kurang-mampu', [SuratKeteranganController::class, 'create_kurangMampu'])->name('keterangan.kurang-mampu');
    Route::resource('keterangan', SuratKeteranganController::class);

    Route::get('/administrasi/dokumen-pribadi', [ListAdministrasiController::class, 'show_dokumen_pribadi'])->name('administrasi.pribadi');
    Route::get('/administrasi/surat-pengantar', [ListAdministrasiController::class, 'show_surat_pengantar'])->name('administrasi.pengantar');
    Route::get('/administrasi/surat-keterangan', [ListAdministrasiController::class, 'show_surat_keterangan'])->name('administrasi.keterangan');
});
