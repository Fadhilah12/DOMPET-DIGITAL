<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\SaldoController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

<<<<<<< HEAD
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('dashboardsaldo', SaldoController::class)->name('dashboardsaldo');
Route::resource('saldo', SaldoController::class);
Route::resource('pemasukan', PemasukanController::class);
Route::resource('kategori', KategoriController::class);
=======
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashbord', [DashboardController::class, 'index'])->name('dashbord');
Route::resource('pemasukan', PemasukanController::class);
Route::resource('pengeluaran', PengeluaranController::class);

>>>>>>> deb9e45fb9592bbd0aa7c7cd71fd8103c36e7d5e
