<?php

use App\Http\Controllers\VafelesKontrolieris;
use App\Http\Controllers\KontaktiKontrolieris;

Route::get('/', [VafelesKontrolieris::class, 'index'])->name('sakums');
Route::get('/vafele/{id}', [VafelesKontrolieris::class, 'show'])->name('vafele.show');

Route::get('/kontakti', [KontaktiKontrolieris::class, 'forma'])->name('kontakti');
Route::post('/kontakti', [KontaktiKontrolieris::class, 'sutit'])->name('kontakti.sutit');
