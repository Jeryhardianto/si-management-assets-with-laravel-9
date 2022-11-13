<?php

use Illuminate\Support\Facades\Route;

// Backsite
use App\Http\Controllers\backsite\Dashboard;
use App\Http\Controllers\backsite\PostController;

// User Manegement 
use App\Http\Controllers\backsite\AssetController;
use App\Http\Controllers\backsite\SatuanController;
use App\Http\Controllers\backsite\GolonganController;
use App\Http\Controllers\backsite\KategoriController;
use App\Http\Controllers\UserManegement\RoleController;
use App\Http\Controllers\UserManegement\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\backsite\Cetak;
use App\Http\Controllers\backsite\LaporanAssets;
use App\Http\Controllers\backsite\Pengembalian;
use App\Http\Controllers\backsite\Pinjaman;

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
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::prefix('webapp')->middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    // Role
    Route::get('/role/select', [RoleController::class, 'select'])->name('roles.select');
    Route::resource('role', RoleController::class);
    // Users
    Route::resource('users', UserController::class);
    
    // Post
    Route::resource('post', PostController::class);
    
    // Asset
    Route::get('/assets/selectkategori', [AssetController::class, 'selectKategori'])->name('assets.selectkategori');
    Route::get('/assets/selectsatuan', [AssetController::class, 'selectSatuan'])->name('assets.selectsatuan');
    Route::get('/assets/selectgolongan', [AssetController::class, 'selectGolongan'])->name('assets.selectgolongan');
    Route::resource('assets', AssetController::class);
    // Kategori
    Route::resource('kategori', KategoriController::class)->except('show');   
     // Kategori
    Route::resource('golongan', GolonganController::class)->except('show');
    // satuan
    Route::resource('satuan', SatuanController::class)->except('show');
    
    // Laporan assets
    Route::get('/laporan/asset', [LaporanAssets::class, 'index'])->name('laporanassset.index');
    Route::get('/laporan/stok', [LaporanAssets::class, 'laporan_stok'])->name('laporan_stok.stok');
    Route::get('/laporan/pinjam', [LaporanAssets::class, 'laporan_pinjam'])->name('laporan_pinjam.pinjam');
    Route::get('/laporan/kembali', [LaporanAssets::class, 'laporan_kembali'])->name('laporan_kembali.kembali');
    
    
    // Transaksi Pinjaman
    Route::resource('pinjaman', Pinjaman::class);

    // Transaksi Pengembalian
    Route::get('/pengembalian', [Pengembalian::class, 'index'])->name('kembali.index');
    Route::get('/pengembalian/detail/{id}', [Pengembalian::class, 'detail'])->name('kembali.detail');
    
    Route::get('/pengembalian/{id}', [Pengembalian::class, 'show'])->name('kembali.show');
    Route::post('/pengembalian', [Pengembalian::class, 'kembali'])->name('kembali.kembali');

    
    // Cetak Slip 
    Route::get('/cetak/slippinjam/{transaksi}', [Cetak::class, 'cetakSlipPinjam'])->name('cetakSlipPinjam');
    Route::get('/cetak/slipkembali/{transaksi}', [Cetak::class, 'cetakSlipKembali'])->name('cetakSlipKembali');
    Route::get('/cetak/laporanpeminjaman', [Cetak::class, 'laporan_pinjam'])->name('laporan_pinjam');
    Route::get('/cetak/laporanpengembalian', [Cetak::class, 'laporan_kembali'])->name('laporan_kembali');



    



});

require __DIR__.'/auth.php';
