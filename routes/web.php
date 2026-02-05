<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontakController;



Route::get('/', function () {
    return view('home');   // beranda
})->name('beranda');

Route::get('/tentang-kami', function () {
    return view('about');  // halaman tentang kami
})->name('tentang');

Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');

Route::get('/produk', function () {
    return view('produk');
})->name('produk');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::post('/kontak/kirim', [KontakController::class, 'kirim'])
    ->name('kontak.kirim');