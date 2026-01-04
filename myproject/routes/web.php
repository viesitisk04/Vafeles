<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VafelesKontrolieris;
use App\Http\Controllers\DzerieniKontrolieris;
use App\Http\Controllers\UzkodasKontrolieris;
use App\Http\Controllers\KontaktiKontrolieris;
use App\Http\Controllers\GrozsKontrolieris;
use App\Http\Controllers\AdminKontrolieris;
use App\Http\Controllers\AdminProduktuKontrolieris;
use App\Http\Controllers\ProduktuKontrolieris;
use App\Http\Controllers\ProfiluKontrolieris;
use App\Http\Controllers\PasutijumaKontrolieris;
use App\Http\Controllers\AdminPasutijumuKontrolieris;
use App\Http\Controllers\AdminLietotajuKontrolieris;


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/', [AdminKontrolieris::class, 'panelis'])
        ->name('admin.panelis');

    Route::get('/produkti', [AdminProduktuKontrolieris::class, 'index'])
        ->name('admin.produkti');

    Route::post('/produkti', [AdminProduktuKontrolieris::class, 'store'])
        ->name('admin.produkti.pievienot');

    Route::get('/produkti/{id}/edit', [AdminProduktuKontrolieris::class, 'edit'])
        ->name('admin.produkti.edit');

    Route::put('/produkti/{id}', [AdminProduktuKontrolieris::class, 'update'])
        ->name('admin.produkti.update');

    Route::delete('/produkti/{id}', [AdminProduktuKontrolieris::class, 'dzest'])
        ->name('admin.produkti.dzest');
});

Route::get('/', [VafelesKontrolieris::class, 'index'])
    ->name('sakums');

Route::get('/vafele/{id}', [VafelesKontrolieris::class, 'show'])
    ->name('vafele.show');

Route::get('/dzerieni', [DzerieniKontrolieris::class, 'index'])
    ->name('dzerieni.index');

Route::get('/uzkodas', [UzkodasKontrolieris::class, 'index'])
    ->name('uzkodas.index');

Route::get('/produkts/{id}', [ProduktuKontrolieris::class, 'show'])
    ->name('produkts.show');

Route::get('/kategorija/{slug}', [ProduktuKontrolieris::class, 'kategorija'])
    ->name('kategorija.show');

Route::get('/kontakti', [KontaktiKontrolieris::class, 'index'])
    ->name('kontakti.index');

Route::post('/kontakti', [KontaktiKontrolieris::class, 'sutit'])
    ->name('kontakti.sutit');

Route::middleware('auth')->group(function () {
    Route::get('/grozs', [GrozsKontrolieris::class, 'index'])
        ->name('grozs.index');

    Route::post('/grozs/pievienot', [GrozsKontrolieris::class, 'pievienot'])
        ->name('grozs.pievienot');

    Route::post('/grozs/atjauninat', [GrozsKontrolieris::class, 'atjauninat'])
        ->name('grozs.atjauninat');

    Route::post('/grozs/dzest', [GrozsKontrolieris::class, 'dzest'])
        ->name('grozs.dzest');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfiluKontrolieris::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfiluKontrolieris::class, 'update'])
        ->name('profile.update');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfiluKontrolieris::class, 'edit'])
    //     ->name('profile.edit');

    // Route::patch('/profile', [ProfiluKontrolieris::class, 'update'])
    //     ->name('profile.update');

    // Route::delete('/profile', [ProfiluKontrolieris::class, 'destroy'])
    //     ->name('profile.destroy');
});

Route::post('/pasutit', [PasutijumaKontrolieris::class, 'saglabat'])
    ->middleware('auth')
    ->name('pasutit');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/pasutijumi', [AdminPasutijumuKontrolieris::class, 'index'])
        ->name('admin.pasutijumi');

    Route::delete('/pasutijumi/{id}', [AdminPasutijumuKontrolieris::class, 'dzest'])
        ->name('admin.pasutijumi.dzest');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/lietotaji', [AdminLietotajuKontrolieris::class, 'index'])
        ->name('admin.lietotaji');

    Route::delete('/lietotaji/{id}', [AdminLietotajuKontrolieris::class, 'dzest'])
        ->name('admin.lietotaji.dzest');

    Route::post('/lietotaji/{id}/padarit-admin', [AdminLietotajuKontrolieris::class, 'padaritAdmin'])
        ->name('admin.lietotaji.padarit-admin');
});


require __DIR__.'/auth.php';