<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BalaiController;
use App\Http\Controllers\PendaftaranMagangController;
use App\Http\Controllers\PendaftaranPenelitianController;
use App\Http\Controllers\PostinganController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\KirimEmailController;

Route::get('/kirim', [KirimEmailController::class,'index']);
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{user}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
});
Route::group(['prefix' => 'balai', 'middleware' => ['auth']], function () {
    Route::get('/', [BalaiController::class, 'index'])->name('balai.index');
    Route::get('/create', [BalaiController::class, 'create'])->name('balai.create');
    Route::post('/store', [BalaiController::class, 'store'])->name('balai.store');
    Route::get('/{balai}/edit', [BalaiController::class, 'edit'])->name('balai.edit');
    Route::put('/{balai}/update', [BalaiController::class, 'update'])->name('balai.update');
    Route::delete('/{balai}/destroy', [BalaiController::class, 'destroy'])->name('balai.destroy');
});
Route::group(['prefix' => 'daftar'], function () {
    Route::get('/magang/{id_balai}', [HomeController::class, 'magang'])->name('daftar.magang');
    Route::post('/magang/daftar', [PendaftaranMagangController::class, 'store'])->name('magang.register');
    Route::get('/penelitian/{id_balai}', [HomeController::class, 'penelitian'])->name('daftar.penelitian');
    Route::post('/penelitian/daftar', [PendaftaranPenelitianController::class, 'store'])->name('penelitian.register');
});
Route::group(['prefix' => 'postingan', 'middleware' => ['auth']], function () {
    Route::get('/', [PostinganController::class, 'index'])->name('postingan.index');
    Route::get('/create', [PostinganController::class, 'create'])->name('postingan.create');
    Route::post('/store', [PostinganController::class, 'store'])->name('postingan.store');
    Route::get('/{magangs}/edit', [PostinganController::class, 'edit'])->name('postingan.edit');
    Route::put('/{magangs}/update', [PostinganController::class, 'update'])->name('postingan.update');
    Route::delete('/{magangs}/destroy', [PostinganController::class, 'destroy'])->name('postingan.destroy');
});
Route::group(['prefix' => 'magang', 'middleware' => ['auth']], function () {
    Route::get('/', [PendaftaranMagangController::class, 'index'])->name('magang.index');
    Route::get('/{pendaftaranMagang}', [PendaftaranMagangController::class, 'show'])->name('magang.show');
    Route::put('/{pendaftaranMagang}/terima', [PendaftaranMagangController::class, 'terima'])->name('magang.terima');
    Route::put('/{pendaftaranMagang}/selesai', [PendaftaranMagangController::class, 'selesai'])->name('magang.selesai');
    Route::put('/{pendaftaranMagang}/tolak', [PendaftaranMagangController::class, 'tolak'])->name('magang.tolak');
});
Route::group(['prefix' => 'penelitian', 'middleware' => ['auth']], function () {
    Route::get('/', [PendaftaranPenelitianController::class, 'index'])->name('penelitian.index');
    Route::get('/{pendaftaranMagang}', [PendaftaranPenelitianController::class, 'show'])->name('penelitian.show');
    Route::put('/{pendaftaranMagang}/terima', [PendaftaranPenelitianController::class, 'terima'])->name('penelitian.terima');
    Route::put('/{pendaftaranMagang}/selesai', [PendaftaranPenelitianController::class, 'selesai'])->name('penelitian.selesai');
    Route::put('/{pendaftaranMagang}/tolak', [PendaftaranPenelitianController::class, 'tolak'])->name('penelitian.tolak');


Route::get('/kirim_email', [KirimEmailController::class, 'kirim']);
});

Route::get('/storage/files/{filename}', [FileController::class, 'showPDF'])->name('pdf.show');


