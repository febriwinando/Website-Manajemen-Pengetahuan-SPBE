<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('form');
});


Route::post('/nama_penulis', [ArtikelController::class, 'nama_penulis'])->name('nama_penulis');

Route::get('/', [DashboardController::class, 'index']);
Route::get('/tentang', [DashboardController::class, 'tentang']);

Route::get('/search/dash', [DashboardController::class, 'cariartikel']);
Route::get('/baca/{id}', [DashboardController::class, 'bacaartikel']);


Route::get('file/download/{filename}', [DashboardController::class, 'download'])->name('file.download');


Route::resource('/dashadmin', ArtikelController::class)->middleware('auth');
Route::resource('artikel', ArtikelController::class)->middleware('auth');
Route::get('daftar_artikel', [ArtikelController::class,'daftar_artikel'])->middleware('auth');
Route::resource('/artikel/post', ArtikelController::class);
Route::resource('/artikel/update', ArtikelController::class)->middleware('auth');
Route::resource('/artikel/delete', ArtikelController::class)->middleware('auth');


Route::get('/daftarmpadmin', [LoginController::class, 'registrasi'])->middleware('auth');
Route::post('/mendaftar', [LoginController::class, 'store'])->middleware('auth');

Route::get('/mpadmin', [LoginController::class, 'index'])->name('mpadmin');
Route::post('/login/auth', [LoginController::class, 'authenticate']);
Route::post('/keluarmpadmin', [LoginController::class, 'logout'])->name('keluarmpadmin');
Route::get('/login', [LoginController::class, 'index']);




