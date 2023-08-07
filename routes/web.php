<?php

use App\Http\Controllers\HomeController;

use App\Http\Controllers\KategoripemasukanController;
use App\Http\Controllers\KategoripengeluaranController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\SaldoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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

Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
// Route::get('dashboardsaldo', SaldoController::class)->name('dashboardsaldo');
// Route::resource('saldo', SaldoController::class)->middleware('role:Admin');
// Route::resource('pemasukan', PemasukanController::class)->middleware('role:Admin');
// // Route::resource('kategoripemasukan', KategoripemasukanController::class)->middleware('role:Admin');
// Route::resource('pengeluaran', PengeluaranController::class)->middleware('role:Admin');

Route::group(['middleware' => 'auth','Admin'], function() {
    Route::resource('pemasukan', PemasukanController::class, ['except' => 'pemasukan,index']);
    Route::resource('pengeluaran',PengeluaranController::class,['except' => 'pengeluaran,index']);
    Route::resource('kategoripemasukan', KategoripemasukanController::class);
    Route::resource('kategoripengeluaran', KategoripengeluaranController::class);
    Route::resource('saldo',SaldoController::class,['except' => 'saldo,index']);
  });

  Route::group(['middleware' => 'auth','User'], function() {
    Route::resource('pemasukan', PemasukanController::class, ['except' => 'pemasukan,index']);
    Route::resource('pengeluaran',PengeluaranController::class,['except' => 'pengeluaran,index']);
    Route::resource('kategoripemasukan', KategoripemasukanController::class,['except' => 'kategoripemasukan,index']);
    Route::resource('kategoripengeluaran', KategoripengeluaranController::class,['except' => 'kategoripengeluaran,index']);
    Route::resource('saldo',SaldoController::class,['except' => 'saldo,index']);
  });


Route::get('exportPdf', [PemasukanController::class, 'exportPdf'])->name('pemasukan.exportPdf');
Route::get('exportPdf2', [PengeluaranController::class, 'exportPdf2'])->name('pengeluaran.exportPdf2');

Route::get('exportExcel1', [PemasukanController::class, 'exportExcel1'])->name('pemasukan.exportExcel1');
Route::get('exportExcel', [PengeluaranController::class, 'exportExcel'])->name('pengeluaran.exportExcel');

Route::get('download-file/{pengeluaranId}', [PengeluaranController::class, 'downloadFile'])->name('pengeluarans.downloadFile');
