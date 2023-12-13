<?php

use App\Http\Controllers\Admin\BarangCategoryController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\ManajemenPeminjamanController;
use App\Http\Controllers\Admin\UserAccountController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestAccountModelController;
use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\User;

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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    $data['user_count'] = User::all()->count();
    $data['barang_count'] = Barang::withTrashed()->get()->count();
    $data['peminjaman_count'] = Peminjaman::all()->count();

    return view('admin.pages.dashboard', compact('data'));
})->name('admin.dashboard')->middleware('auth');


Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index'])->name('admin.barang');
    Route::post('/', [BarangController::class, 'store'])->name('admin.barang.store');
    Route::delete('/{kode}', [BarangController::class, 'destroy'])->name('admin.barang.destroy');
    Route::get('/categories', [BarangCategoryController::class, 'index'])->name('admin.category');
    Route::post('/categories', [BarangCategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/categories/{id}/edit', [BarangCategoryController::class, 'edit'])->name('admin.category.edit');
    Route::patch('/categories/{id}/update', [BarangCategoryController::class, 'update'])->name('admin.category.update');
});

Route::get('/peminjaman', [ManajemenPeminjamanController::class, 'index'])->name('admin.peminjaman.index');
Route::get('/peminjaman/{id}', [ManajemenPeminjamanController::class, 'lihatSurat'])->name('admin.peminjaman.surat');
Route::patch('/peminjaman/{id}/setujui', [ManajemenPeminjamanController::class, 'updateStatus'])->name('admin.peminjaman.approve');

Route::get('/request-account', [RequestAccountModelController::class, 'index'])->name('request.account');
Route::post('/request-account', [RequestAccountModelController::class, 'store'])->name('request.account.store');


Route::post('/pinjam', [PeminjamanController::class, 'pinjamBarang'])->name('ajukan-pinjam');
Route::get('/status-pinjam', [PeminjamanController::class, 'lihatStatusPeminjaman'])->name('lihat.status.pinjam');
Route::get('/proses-bayar/{id}', [PeminjamanController::class, 'prosesPembayaran'])->name('pinjam.proses.pembayaran');
Route::post('/delete/{peminjaman_id}', [PeminjamanController::class, 'deleteUnpaidData'])->name('delete.peminjaman.unpaid');
require __DIR__ . '/auth.php';
