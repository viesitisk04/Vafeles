<?php

use App\Http\Controllers\VafelesKontrolieris;
use App\Http\Controllers\UzkodasKontrolieris;
use App\Http\Controllers\DzerieniKontrolieris;
use App\Http\Controllers\KontaktiKontrolieris;
use App\Http\Controllers\GrozsKontrolieris;

Route::get('/', [VafelesKontrolieris::class, 'index'])->name('sakums');

Route::get('/vafele/{id}', [VafelesKontrolieris::class, 'show'])->name('vafele.show');

Route::get('/uzkodas', [UzkodasKontrolieris::class, 'index'])->name('uzkodas');
Route::get('/dzerieni', [DzerieniKontrolieris::class, 'index'])->name('dzerieni');
Route::get('/kontakti', [KontaktiKontrolieris::class, 'forma'])->name('kontakti');
Route::post('/kontakti', [KontaktiKontrolieris::class, 'sutit'])->name('kontakti.sutit');


Route::post('/grozs/pievienot', [GrozsKontrolieris::class, 'pievienot'])->name('grozs.pievienot');
Route::get('/grozs', [GrozsKontrolieris::class, 'index'])->name('grozs.index');
Route::post('/grozs/atjauninat', [GrozsKontrolieris::class, 'atjauninat'])->name('grozs.atjauninat');
Route::post('/grozs/dzest', [GrozsKontrolieris::class, 'dzest'])->name('grozs.dzest');
