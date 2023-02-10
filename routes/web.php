<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/index', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/konsumen', [KonsumenController::class, 'index'])->name('konsumen.index');

Route::delete('/konsumen/destroy/{user}', [KonsumenController::class, 'destroy'])->name('konsumen.destroy');

Route::get('/konsumen/create', [KonsumenController::class, 'create'])->name('konsumen.create');

Route::post('/konsumen/store', [KonsumenController::class, 'store'])->name('konsumen.store');

Route::get('/konsumen/edit/{user}', [KonsumenController::class, 'edit'])->name('konsumen.edit');

Route::patch('/konsumen/update/{user}', [KonsumenController::class, 'update'])->name('konsumen.update');

Route::get('/konsumen/show/{user}', [KonsumenController::class, 'show'])->name('konsumen.show');


Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');

Route::delete('/karyawan/destroy/{user}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');

Route::post('/karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');

Route::get('/karyawan/edit/{user}', [KaryawanController::class, 'edit'])->name('karyawan.edit');

Route::patch('/karyawan/update/{user}', [KaryawanController::class, 'update'])->name('karyawan.update');

Route::get('/karyawan/show/{user}', [KaryawanController::class, 'show'])->name('karyawan.show');


Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');