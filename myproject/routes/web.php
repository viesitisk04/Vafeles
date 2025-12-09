<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VafelesKontrolieris;

Route::get('/', [VafelesKontrolieris::class, 'sakums'])->name('sakums');

Route::get('/kontakti', [VafelesKontrolieris::class, 'kontakti'])->name('kontakti');
Route::post('/kontakti', [VafelesKontrolieris::class, 'sutitZinu'])->name('kontakti.sutit');
    