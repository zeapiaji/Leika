<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KondisiController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\MountingController;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [LandingController::class, 'index'])->name('landing_page');
Route::middleware(['role:admin||petugas'])->group(function () {

    Route::get('/dasbor', [App\Http\Controllers\HomeController::class, 'index'])->name('dasbor');
    Route::prefix('administrator')->group(function () {
        // Barang
        Route::get('/barang', [BarangController::class, 'index'])->name('index');
        Route::prefix('barang')->group(function () {
            
            Route::get('/detail/{id}', [BarangController::class, 'detail'])->name('detail');
            
            Route::get('/edit-kamera/{id}', [BarangController::class, 'edit_kamera'])->name('edit.kamera');
            Route::get('/edit-lensa/{id}', [BarangController::class, 'edit_lensa'])->name('edit.lensa');
            
            Route::get('/tambah-kamera', [BarangController::class, 'tambah_kamera'])->name('tambah.kamera');
            Route::get('/tambah-lensa', [BarangController::class, 'tambah_lensa'])->name('tambah.lensa');
            
            Route::post('/unggah-kamera', [BarangController::class, 'unggah_kamera'])->name('unggah.kamera');
            Route::post('/unggah-lensa', [BarangController::class, 'unggah_lensa'])->name('unggah.lensa');
    
            Route::post('/perbarui-kamera/{id}', [BarangController::class, 'perbarui_kamera'])->name('perbarui.kamera');
            Route::put('/perbarui-lensa/{id}', [BarangController::class, 'perbarui_lensa'])->name('perbarui.lensa');
            
            Route::get('/hapus-kamera/{id}', [BarangController::class, 'hapus_kamera'])->name('hapus.kamera');
            Route::get('/hapus-lensa/{id}', [BarangController::class, 'hapus_lensa'])->name('hapus.lensa');
    
            Route::get('/export/excel', [BarangController::class, 'export_excel'])->name('export.excel');
            Route::get('/export/pdf', [BarangController::class, 'export_pdf'])->name('export.pdf');
        });
        
        Route::middleware(['role:admin'])->group(function () {
        Route::get('/data_pendukung', [MerekController::class, 'index'])->name('data_pendukung');
            Route::prefix('merek')->group(function() {
                Route::view('/tambah', 'merek.tambah')->name('tambah.merek');
                Route::post('/unggah', [MerekController::class, 'unggah'])->name('unggah.merek');
                Route::get('/edit/{id}', [MerekController::class, 'edit'])->name('edit.merek');
                Route::put('/perbarui/{id}', [MerekController::class, 'perbarui'])->name('perbarui.merek');
                Route::delete('/hapus/{id}', [MerekController::class, 'hapus'])->name('hapus.merek');
            });
            Route::prefix('mounting')->group(function() {
                Route::view('/tambah', 'mounting.tambah')->name('tambah.mounting');
                Route::post('/unggah', [MountingController::class, 'unggah'])->name('unggah.mounting');
                Route::get('/edit/{id}', [MountingController::class, 'edit'])->name('edit.mounting');
                Route::put('/perbarui/{id}', [MountingController::class, 'perbarui'])->name('perbarui.mounting');
                Route::delete('/hapus/{id}', [MountingController::class, 'hapus'])->name('hapus.mounting');
            });
            Route::prefix('kategori')->group(function() {
                Route::view('/tambah', 'kategori.tambah')->name('tambah.kategori');
                Route::post('/unggah', [KategoriController::class, 'unggah'])->name('unggah.kategori');
                Route::get('/edit/{id}', [KategoriController::class, 'edit'])->name('edit.kategori');
                Route::put('/perbarui/{id}', [KategoriController::class, 'perbarui'])->name('perbarui.kategori');
                Route::delete('/hapus/{id}', [KategoriController::class, 'hapus'])->name('hapus.kategori');
            });
            Route::prefix('kondisi')->group(function() {
                Route::view('/tambah', 'kondisi.tambah')->name('tambah.kondisi');
                Route::post('/unggah', [KondisiController::class, 'unggah'])->name('unggah.kondisi');
                Route::get('/edit/{id}', [KondisiController::class, 'edit'])->name('edit.kondisi');
                Route::put('/perbarui/{id}', [KondisiController::class, 'perbarui'])->name('perbarui.kondisi');
                Route::delete('/hapus/{id}', [KondisiController::class, 'hapus'])->name('hapus.kondisi');
            });

            Route::get('/petugas', [AdminController::class, 'index'])->name('petugas');
            Route::prefix('petugas')->group(function() {
                Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('petugas.edit');
                Route::put('/perbarui/{id}', [AdminController::class, 'perbarui'])->name('petugas.perbarui');
            Route::view('/tambah','kelola_petugas.tambah')->name('petugas.tambah');
            Route::post('/unggah', [AdminController::class, 'petugas_unggah'])->name('petugas.unggah');
                Route::get('/hapus/{id}', [AdminController::class, 'hapus'])->name('petugas.hapus');
            });
        });
    });
});


Route::middleware(['role:masyarakat'])->group(function () {
    Route::get('/home',[LelangController::class, 'index'])->name('home');
    Route::prefix('lelang')->group(function () {
        Route::get('/bid/{id}', [LelangController::class, 'bid'])->name('bid');
    });
});

Route::middleware(['role:petugas'])->group(function () {
    Route::get('/lelang', [LelangController::class, 'lelang'])->name('lelang');
        Route::prefix('lelang')->group(function () {
            Route::get('/{id}', [LelangController::class, 'lelang_barang'])->name('lelang_barang');
            Route::post('/buka/{id}', [LelangController::class, 'buka_lelang'])->name('buka_lelang');
            Route::get('/tutup/{id}', [LelangController::class, 'tutup_lelang'])->name('tutup_lelang');
            Route::get('/akhiri/{id}', [LelangController::class, 'akhiri_lelang'])->name('akhiri_lelang');
        });
});

Route::get('/lihat_lelang/{id}', [LandingController::class, 'lihat_lelang'])->name('lihat_lelang');

Route::prefix('pengguna')->group(function(){
    Route::get('/{id}', [HomeController::class, 'lihat_profil'])->name('lihat_profil');
    Route::put('/perbarui/{id}', [HomeController::class, 'perbarui_profil'])->name('perbarui_profil');
    Route::put('/perbarui_password/{id}', [HomeController::class, 'perbarui_sandi'])->name('edit_user_password');
    Route::get('/hapus/{id}', [HomeController::class, 'hapus_akun'])->name('hapus_akun');
    
    Route::get('/inbox/{id}', [HomeController::class, 'lihat_inbox'])->name('lihat_inbox');
    Route::get('/invoice/{id}', [HomeController::class, 'lihat_invoice'])->name('lihat_invoice');

});

Auth::routes();
